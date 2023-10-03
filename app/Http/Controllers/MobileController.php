<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phong;
use App\Models\Datphong;
use App\Models\Khachhang;
use App\Models\Thanhtoan;
use App\Models\Comment;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Danhsachdatphong;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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
            ->with('phongs.mieutas')->with('phongs.chinhanhs')->with('dichvus')->with('anuongs')->with('thanhtoans')->where("khachhangid", $request->khachhangid)->get();

        return response()->json($datphong, 200);
    }

    public function kiemtraphongtrong(Request $request)
    {
        $phongslist = Phong::with('giuongs')->with('thietbis')->with('loaiphongs')->with('hinhs')
            ->with('mieutas')->with('chinhanhs')->get();
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

        if (!Auth::validate($credentials)) :
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
        Thanhtoan::create(array(
            "hinhthuc" => "chuyenkhoan",
            "gia" => $request->sotien,
            "loaitien" => "datcoc",
            "chuyenkhoan_token" => $request->stripeToken,
            "datphongid" => $dat->id,
            // chua co thoi gian
        ));

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
}
