<?php

namespace App\Http\Controllers;

use App\Models\Datphong;
use App\Models\Traphong;
use App\Mail\MyTestEmail;
use App\Models\Khachhang;
use App\Models\Thanhtoan;
use Illuminate\Http\Request;
use App\Models\Danhsachdatphong;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\IndexController;

class ThanhtoanClientController extends Controller
{
    public function index(Request $request)
    {
        return view("client.thanhtoanvnpay", compact('request'));
    }

    public function create(Request $request)
    {
        require_once("config.php");
        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $request->amount; // Số tiền thanh toán
        $vnp_Locale = $request->language; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $request->bankCode; //Mã phương thức thanh toán
        $vnp_IpAddr = $request->ip(); //IP Khách hàng thanh toán
        $vnp_Returnurl = "http://khachsan-b1910261.local/client/vnpay_return?"
            . "ten=" . $request->ten .
            "&sdt=" . $request->sdt .
            "&email=" . $request->email .
            "&ngaydat=" . $request->ngaydat .
            "&ngaytra=" . $request->ngaytra .
            "&soluong=" . $request->soluong .
            "&phongid=" . $request->phongid .
            "&loaitien=" . $request->loaitien .
            "&khachhangid=" . $request->khachhangid . "";

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }

    public function return(Request $request)
    {
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // luu vao database
        // $datphong = Datphong::find($request->datphongid);

        // $datphong->tinhtrangthanhtoan = 1;
        // $datphong->tinhtrangnhanphong = 1;

        // $traphongs = array();
        // $traphongs['ten'] = $datphong->khachhangs->ten;
        // $traphongs['datphongid'] = $datphong->id;

        // Traphong::create($traphongs);

        // $datphong->save();

        $khachhang = $this->index_store($request);
        Log::info($request);
        // Luu thong tin chuyen khoan
        $request->vnp_Amount = substr($request->vnp_Amount, 0, -1);
        $request->vnp_Amount = substr($request->vnp_Amount, 0, -1);
        Thanhtoan::create(array(
            "hinhthuc" => "chuyenkhoan",
            "gia" => $request->vnp_Amount,
            "loaitien" => $request->loaitien,
            "chuyenkhoan_token" => $request->vnp_TxnRef,
            "khachhangid" => $khachhang->id,
            // chua co thoi gian
        ));

        // Gui mail cho client
        Mail::to(Auth::user()->email)->send(new MyTestEmail($request, $vnp_SecureHash, $secureHash));

        return view("client.thanhtoanvnpayreturn", compact('request', 'secureHash', 'vnp_SecureHash'));
    }

    public function index_store(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required',
            'email' => 'required',
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required',
        ]);

        // Log::info($request);

        Khachhang::create([
            'ten' => $request->ten,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'userid' => $request->khachhangid
        ]);

        $khachhangs = Khachhang::max('id');

        $request->tinhtrangthanhtoan = 0;
        $request->tinhtrangnhanphong = 0;
        $request->huydatphong = 0;
        Datphong::create([
            'ngaydat' => $request->ngaydat,
            'ngaytra' => $request->ngaytra,
            'soluong' => $request->soluong,
            'tinhtrangthanhtoan' => $request->tinhtrangthanhtoan,
            'tinhtrangnhanphong' => $request->tinhtrangnhanphong,
            'huydatphong' => $request->huydatphong,
            'khachhangid' => $khachhangs,
        ]);

        $dat = Datphong::max('id');

        $khachhangs = Khachhang::find($khachhangs);
        $khachhangs->datphongid = $dat;
        $khachhangs->save();

        Danhsachdatphong::create([
            'phongid' => $request->phongid,
            'ngaybatdauo' => $request->ngaydat,
            'ngayketthuco' => $request->ngaytra,
            'datphongid' => $dat,
        ]);

        // return redirect('client/index')->with('success', 'Datphong has been created successfully.');
        return $khachhangs;
    }
}
