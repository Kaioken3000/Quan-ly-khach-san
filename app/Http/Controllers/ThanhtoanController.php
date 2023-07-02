<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Thanhtoan;
use App\Models\Traphong;
use App\Models\Datphong;
use Omnipay\Omnipay;

use Illuminate\Support\Facades\File;

class ThanhtoanController extends Controller
{
    public function index(Request $request)
    {
        return view("thanhtoanvnpay", compact('request'));
    }

    public function create(Request $request)
    {
        require_once("config.php");
        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $request->amount; // Số tiền thanh toán
        $vnp_Locale = $request->language; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $request->bankCode; //Mã phương thức thanh toán
        $vnp_IpAddr = $request->ip(); //IP Khách hàng thanh toán
        $vnp_Returnurl = "http://quanlykhachsan-b1910261-new.local/vnpay_return?datphongid=" . $request->datphongid . "&loaitien=" . $request->loaitien . "&khachhangid=" . $request->khachhangid . "";

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
        $datphong = Datphong::find($request->datphongid);

        $datphong->tinhtrangthanhtoan = 1;
        $datphong->tinhtrangnhanphong = 1;

        $traphongs = array();
        $traphongs['ten'] = $datphong->khachhangs->ten;
        $traphongs['datphongid'] = $datphong->id;

        Traphong::create($traphongs);

        $datphong->save();

        // Luu thong tin chuyen khoan
        Thanhtoan::create(array(
            "hinhthuc" => "chuyenkhoan",
            "gia" => $request->vnp_Amount,
            "loaitien" => $request->loaitien,
            "chuyenkhoan_token" => $request->vnp_TxnRef,
            "khachhangid" => $request->khachhangid,
            // chua co thoi gian
        ));

        return view("thanhtoanvnpayreturn", compact('request', 'secureHash', 'vnp_SecureHash'));
    }
}
