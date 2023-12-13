<?php

namespace App\Http\Controllers;

use App\Models\DichvuDatphong;
use App\Models\AnuongDatphong;
use App\Models\User;
use App\Models\Phong;
use App\Models\Datphong;
use App\Models\Khachhang;
use App\Models\Thanhtoan;
use App\Models\Comment;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Danhsachdatphong;
use App\Models\Loaiphong;
use App\Http\Requests\LoginRequest;
use App\Models\Chinhanh;
use App\Models\Dichvu;
use App\Models\Anuong;
use App\Models\Virtualtour;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Svg\Tag\Rect;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMobile()
    {
        $phongs = Phong::with('giuongs')->with('thietbis')->with('loaiphongs')->with('hinhs')
            ->with('mieutas')->with('chinhanhs')->with('comments.users')->with('danhsachdatphongs')->with('datphongs')->get();
        return response()->json($phongs, 200);
    }
    public function getUserById(Request $request)
    {
        $user = User::with('khachhangs')->where("id", $request->userid)->first();
        return response()->json($user, 200);
    }

    public function indexMobileWithSoPhong(Request $request)
    {
        $phongs = Phong::with('giuongs')->with('thietbis')->with('loaiphongs')->with('hinhs')
            ->with('mieutas')->with('chinhanhs')->with('comments.users')->with('danhsachdatphongs')->with('datphongs')->where("so_phong", $request->soPhong)->first();

        return response()->json($phongs, 200);
    }


    public function getDatphongByKhachhangid(Request $request)
    {
        $datphong = Datphong::with('phongs.giuongs')->with('phongs.thietbis')->with('phongs.loaiphongs')->with('phongs.hinhs')
            ->with('phongs.mieutas')->with('phongs.chinhanhs')->with('phongs.danhsachdatphongs')->with('phongs.datphongs')->with('dichvus')->with('anuongs')->with('thanhtoans')->where("khachhangid", $request->khachhangid)->get();

        return response()->json($datphong, 200);
    }

    public function kiemtraphongtrong(Request $request)
    {
        $phongslist = Phong::with('giuongs')->with('thietbis')->with('loaiphongs')->with('hinhs')
            ->with('mieutas')->with('chinhanhs')->with('danhsachdatphongs')->with('datphongs')->get();
        $phongs = array();
        $datphongs = Datphong::get();

        if ($datphongs->count() > 0) {
            foreach ($phongslist as $phong) {
                $xacnhan = 0;
                if ($request->soluong > $phong->loaiphongs->soluong) {
                    $xacnhan++;
                } else if (count($phong->datphongs) > 0) {
                    if (
                        $phong->datphongs->last()->phongs->last()->so_phong == $phong->so_phong
                        && $phong->datphongs->last()->tinhtrangthanhtoan == 0
                        && $phong->datphongs->last()->huydatphong == 0
                    ) {
                        $xacnhan++;
                    }
                } else {
                    foreach ($datphongs as $datphong) {
                        $danhsachdatphong = Danhsachdatphong::where('datphongid', $datphong->id)->orderBy('id', 'desc')->first();
                        if ($danhsachdatphong->phongid == $phong->so_phong && $request->ngaytra >= $request->ngaydat) {
                            if ($request->ngaydat >= $danhsachdatphong->ngaybatdauo && $request->ngaydat <= $danhsachdatphong->ngayketthuco) {
                                $xacnhan++;
                            } else if ($request->ngaytra >= $danhsachdatphong->ngaybatdauo && $request->ngaytra <= $danhsachdatphong->ngayketthuco) {
                                $xacnhan++;
                            }
                        }
                    }
                }
                if ($xacnhan == 0) {
                    array_push($phongs, $phong);
                }
            }
            // Log::info($phongs);
        } else {
            $phongs = $phongslist;
        }

        return response()->json($phongs, 200);
    }

    public function loginMobile(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)):
            return response()->json("error", 404);
        endif;

        $userAuth = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($userAuth);
        $user = User::with('khachhangs')->where("id", $userAuth->id)->get();

        return response()->json($user, 200);
    }
    public function registerMobile(LoginRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'sdt' => $request->sdt,
            'password' => $request->password,
        ]);

        $role = Role::where('name', 'Khachhang')->first();

        $user->assignRole($role);

        auth()->login($user);

        $khachhangs = Khachhang::create([
            'ten' => $request->username,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'diachi' => null,
            'gioitinh' => null,
            'vanbang' => null,
            'userid' => $user->id
        ]);

        return response()->json($user, 200);
    }

    public function datphong(Request $request)
    {
        $dat = $this->index_store($request);
        Log::info($dat);
        Thanhtoan::create(
            array(
                "hinhthuc" => "chuyenkhoan",
                "gia" => $request->sotien,
                "loaitien" => "datcoc",
                "chuyenkhoan_token" => $request->stripeToken,
                "datphongid" => $dat->id,
                // chua co thoi gian
            )
        );

        return response()->json("success", 200);
    }

    public function index_store(Request $request)
    {
        Log::info($request);
        $khachhang = Khachhang::where("userid", $request->khachhangid)->first();
        Log::info($khachhang);

        if (!($khachhang)) {
            $khachhang = Khachhang::create([
                'ten' => $request->ten,
                'sdt' => $request->sdt,
                'email' => $request->email,
                'diachi' => $request->diachi,
                'vanbang' => $request->vanbang,
                'gioitinh' => $request->gioitinh,
                'userid' => $request->khachhangid
            ]);
        } else {
            if (isset($khachhang->diachi) || isset($khachhang->gioitinh) || isset($khachhang->vanbang)) {
                $khachhang->diachi = $request->diachi;
                $khachhang->gioitinh = $request->gioitinh;
                $khachhang->vanbang = $request->vanbang;
                $khachhang->save();

                $user = User::find($request->khachhangid);
                $user->diachi = $request->diachi;
                $user->gioitinh = $request->gioitinh;
                $user->vanbang = $request->vanbang;
                $user->save();
            }
        }

        // $khachhangs = Khachhang::max('id');

        $request->tinhtrangthanhtoan = 0;
        $request->tinhtrangnhanphong = 0;
        $request->tinhtrangxuly = 0;
        $request->huydatphong = 0;
        $dat = Datphong::create([
            'ngaydat' => $request->ngaydat,
            'ngaytra' => $request->ngaytra,
            'soluong' => $request->soluong,
            'tinhtrangthanhtoan' => $request->tinhtrangthanhtoan,
            'tinhtrangnhanphong' => $request->tinhtrangnhanphong,
            'tinhtrangxuly' => $request->tinhtrangxuly,
            'huydatphong' => $request->huydatphong,
            'khachhangid' => $khachhang->id,
        ]);

        // $dat = Datphong::max('id');

        // $khachhangs = Khachhang::find($khachhangs);
        // $khachhangs->datphongid = $dat;
        // $khachhangs->save();

        Danhsachdatphong::create([
            'phongid' => $request->phongid,
            'ngaybatdauo' => $request->ngaydat,
            'ngayketthuco' => $request->ngaytra,
            'datphongid' => $dat->id,
        ]);

        //cap nhat diem cho khachhang
        $khachhang->diem += 1000;
        $khachhang->save();

        // return redirect('client/index')->with('success', 'Datphong has been created successfully.');
        return $dat;
    }

    public function getPaymentIntent(Request $request)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51NshpwDMpQkkZbCda1csmoHu7ov2z1Yc0X3iq0HksqPy06iApRqzmVwx4OzW3bgGRdAhSVPNghz5g1vuuSVElKgu00lPzgK5xU');
        $intent = $stripe->paymentIntents->create([
            'amount' => $request->sotien,
            'currency' => 'VND',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

        return $intent;
    }

    public function storeComment(Request $request)
    {
        Comment::create([
            'noidung' => $request->noidung,
            'userid' => $request->userid,
            'phongid' => $request->phongid,
        ]);

        return response()->json("success", 200);
    }
    public function getComment(Request $request)
    {
        $comments = Comment::with('users')->where("phongid", $request->phongid)->get();
        return response()->json($comments, 200);
    }

    public function searchPhong(Request $request)
    {
        // $phongs = Phong::where('so_phong', 'LIKE', '%' . $request->search . "%")
        //                 ->orderBy('so_phong','asc')->paginate(5);
        if ($request->songuoiphong == null || $request->songuoiphong == "") {
            $request->songuoiphong = "1";
        }
        if ($request->chinhanhid) {
            $phongs = Phong
                ::with('giuongs')->with('thietbis')->with('loaiphongs')->with('hinhs')
                ->with('mieutas')->with('chinhanhs')->with('comments.users')->with('danhsachdatphongs')->with('datphongs')
                ->where('loaiphongs.ma', 'LIKE', '%' . $request->tenphong . "%")
                ->where('loaiphongs.gia', $request->tuychonggia, $request->giaphong)
                ->where('loaiphongs.soluong', '>=', $request->songuoiphong)
                ->where('phongs.chinhanhid', '=', $request->chinhanhid)
                ->join('loaiphongs', 'phongs.loaiphongid', '=', 'loaiphongs.ma')
                ->get();
        } else {
            $phongs = Phong
                ::with('giuongs')->with('thietbis')->with('loaiphongs')->with('hinhs')
                ->with('mieutas')->with('chinhanhs')->with('comments.users')->with('danhsachdatphongs')->with('datphongs')
                ->where('loaiphongs.ma', 'LIKE', '%' . $request->tenphong . "%")
                ->where('loaiphongs.gia', $request->tuychonggia, $request->giaphong)
                ->where('loaiphongs.soluong', '>=', $request->songuoiphong)
                ->join('loaiphongs', 'phongs.loaiphongid', '=', 'loaiphongs.ma')
                ->get();
        }
        return response()->json($phongs, 200);
    }

    public function loaiphongAll()
    {
        $loaiphongs = Loaiphong::get();
        return response()->json($loaiphongs, 200);
    }
    public function chinhanhAll()
    {
        $chinhanhs = Chinhanh::get();
        return response()->json($chinhanhs, 200);
    }

    public function dichvuAll()
    {
        $dichvus = Dichvu::with('dichvuDatphongs')->get();
        return response()->json($dichvus, 200);
    }
    public function anuongAll()
    {
        $anuongs = Anuong::get();
        return response()->json($anuongs, 200);
    }
    public function dichvu_datphong_store(Request $request)
    {
        $request->validate([
            'datphongid' => 'required',
            'dichvuid' => 'required',
        ]);

        foreach ($request->dichvuid as $dichvu) {
            $dich = array();
            $dich['datphongid'] = $request->datphongid;
            $dich['dichvuid'] = $dichvu;

            DichvuDatphong::create($dich);

            //cap nhat diem cho khachhang
            $diem = Dichvu::find($dichvu);
            $diem = $diem->diem;
            $khachhang = Khachhang::find($request->khachhangid);
            $khachhang->diem += $diem;
            $khachhang->save();
        }

        return response()->json("OK", 200);
    }

    public function anuong_datphong_store(Request $request)
    {

        $dich = array();
        $dich['datphongid'] = $request->datphongid;
        $dich['soluong'] = $request->soluong;
        $dich['anuongid'] = $request->anuongid;

        AnuongDatphong::create($dich);

        //cap nhat diem cho khachhang
        $diem = Anuong::find($request->anuongid);
        $diem = $diem->diem;
        $khachhang = Khachhang::find($request->khachhangid);
        $khachhang->diem += $diem;
        $khachhang->save();

        return response()->json("OK", 200);
    }

        public function virtualtourByPhongId(Request $request)
    {
        $virtualTour = Virtualtour::with("virtualtourphongs")->whereRelation('virtualtourphongs', 'phongid', $request->phongid)->first();

        return response()->json($virtualTour, 200);
    }
}
