<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Check;
use App\Models\Phong;
use App\Models\Anuong;
use App\Models\Catruc;
use App\Models\Dichvu;
use App\Models\Datphong;
use App\Models\Nhanvien;
use App\Models\Khachhang;
use App\Models\Loaiphong;
use Illuminate\Http\Request;
use App\Models\DichvuDatphong;
use Illuminate\Validation\Rule;
use App\Models\Danhsachdatphong;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Hien trang index cua client
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaiphongs = Loaiphong::orderBy('ma', 'asc')->paginate(4);
        // $phongs = Phong::orderBy('so_phong', 'asc')->paginate(4);
        $phongs = Phong::get();
        return view('client.index', compact('loaiphongs', 'phongs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPhong(Request $request)
    {
        // $phongs = Phong::where('so_phong', 'LIKE', '%' . $request->search . "%")
        //                 ->orderBy('so_phong','asc')->paginate(5);
        $phongs = Phong::where('phongs.so_phong', 'LIKE', '%' . $request->search . "%")
            ->orWhere('loaiphongs.ma', 'LIKE', '%' . $request->search . "%")
            ->orWhere('loaiphongs.ten', 'LIKE', '%' . $request->search . "%")
            ->orWhere('loaiphongs.gia', 'LIKE', '%' . $request->search . "%")
            ->orWhere('loaiphongs.soluong', 'LIKE', '%' . $request->search . "%")
            ->orWhere('loaiphongs.mieuTa', 'LIKE', '%' . $request->search . "%")
            ->join('loaiphongs', 'phongs.loaiphongid', '=', 'loaiphongs.ma')
            ->get();
        $loaiphongs = Loaiphong::all();
        return view('client.roomSearch', compact('phongs', 'loaiphongs'));
    }
    public function searchPhongWithManySearch(Request $request)
    {
        // $phongs = Phong::where('so_phong', 'LIKE', '%' . $request->search . "%")
        //                 ->orderBy('so_phong','asc')->paginate(5);
        if($request->songuoiphong == null || $request->songuoiphong == ""){
            $request->songuoiphong = "1";
        }
        $phongs = Phong
            ::where('loaiphongs.ma', 'LIKE', '%' . $request->tenphong . "%")
            ->where('loaiphongs.gia', $request->tuychonggia , $request->giaphong)
            ->where('loaiphongs.soluong', '>=', $request->songuoiphong)
            ->join('loaiphongs', 'phongs.loaiphongid', '=', 'loaiphongs.ma')
            ->get();
        $loaiphongs = Loaiphong::all();
        return view('client.roomSearch', compact('phongs', 'loaiphongs'));  
    }

    /**
     * Hien trang phong cua client
     *
     * @return \Illuminate\Http\Response
     */
    public function hientrangphong()
    {
        // $phongs = Phong::orderBy('so_phong', 'asc')->paginate(6);
        $phongs = Phong::get();
        $loaiphongs = Loaiphong::get();
        return view('client.phong', compact('phongs', 'loaiphongs'));
    }

    /**
     * Hien trang chi tiet phong cua client
     *
     * @return \Illuminate\Http\Response
     */
    public function hientrangchitietphong(Request $request)
    {
        $phong = DB::table('phongs')
            ->join('loaiphongs', 'phongs.loaiphongid', '=', 'loaiphongs.ma')
            ->where('phongs.so_phong', $request->phongid)
            ->select('*')
            ->first();
        return view('client.roomdetail', compact('request', 'phong'));
    }





    /**
     * Hien thong tin khach hang
     *
     * @return \Illuminate\Http\Response
     */
    public function hienkhachhang()
    {
        return view('client.thongtinkhachhang');
    }

    /**
     * Xoá thong tin khach hang
     *
     * @return \Illuminate\Http\Response
     */
    public function xoakhachhang(User $user)
    {
        $user->delete();
        return redirect('/client/login');
    }

    /**
     * Xoá thong tin khach hang
     *
     * @return \Illuminate\Http\Response
     */
    public function khachhangedit(Request $request, User $user)
    {
        $request->validate([
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($user->email, 'email')
            ],
            'username' => 'required',
            'sdt' => 'required|numeric|digits:10',
        ]);
        $user->fill($request->post())->save();

        return redirect('/client/khachhang')->with('success', 'Khách hàng Has Been updated successfully');
    }

    /**
     * hien trang nhap thong tin dat phong tren client
     *
     * @return \Illuminate\Http\Response
     */
    public function reservation(Request $request)
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
        return view('client.reservation', compact('request'));
    }

    // Hien thi danh sach datphong cua client
    public function danhsachdatphong(Request $request)
    {
        $userid = Auth::user()->id;
        $datphongs = DB::table('datphongs')
            ->join('khachhangs', 'datphongs.id', '=', 'khachhangs.datphongid')
            ->select('*', 'datphongs.id as datphongid')
            ->where('khachhangs.userid', $userid)
            ->where('huydatphong', 0)
            ->orderBy('datphongs.id', 'desc')->get();
        $dichvus = Dichvu::get();
        $anuongs = Anuong::get();
        return view('client.danhsachdatphong', compact('datphongs', 'dichvus', 'anuongs'));
    }

    // kiem tra phong trong cua client
    public function checkroom(Request $request)
    {
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
        ]);

        $phongslist = Phong::get();
        $phongs = array();
        $datphongs = Datphong::get();

        if ($datphongs->count() > 0) {
            foreach ($phongslist as $phong) {
                $xacnhan = 0;
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
                if ($xacnhan == 0) {
                    array_push($phongs, $phong);
                }
            }
            // Log::info($phongs);
        } else {
            $phongs = $phongslist;
        }
        return view('client.check', compact('request', 'phongs'));
    }

    // hien phong de doi phong
    public function hiendoiphongclient(Request $request)
    {
        $dat = Datphong::find($request->datphongid);

        $phongslist = Phong::get();
        $phongs = array();
        foreach ($phongslist as $phong) {
            $xacnhan = 0;
            $danhsachdatphong = Danhsachdatphong::where('phongid', $phong->so_phong)->orderBy('id', 'desc')->first();
            // Log::info($danhsachdatphong);
            if ($danhsachdatphong) {
                $datphongs = Datphong::where('id', $danhsachdatphong->datphongid)->get();
                if (count($datphongs) != 0) {
                    foreach ($datphongs as $datphong) {
                        if ($dat->ngaytra >= $dat->ngaydat) {
                            if ($dat->ngaydat < $danhsachdatphong->ngaybatdauo && $dat->ngaytra < $danhsachdatphong->ngaybatdauo) {
                                $xacnhan++;
                            } else if ($dat->ngaydat > $danhsachdatphong->ngaybatdauo && $dat->ngaydat > $danhsachdatphong->ngaybatdauo) {
                                $xacnhan++;
                            }
                        }
                    }
                    if ($xacnhan == count($datphongs)) {
                        array_push($phongs, $phong);
                    }
                } else array_push($phongs, $phong);
            } else array_push($phongs, $phong);
        }
        $loaiphongs = Loaiphong::get();
        return view('client.doiphongclient', compact('phongs', 'dat', 'loaiphongs'));
    }

    public function doiphongclient(Request $request)
    {
        $datphong = Datphong::find($request->datphongid);

        //get current date
        $today = date('y-m-d h:i:s');
        // $todaysub = date('Y-m-d', strtotime('-1 day', strtotime($today)));

        //cap nhap ngay ket thuc cho phong truoc do
        $danhsachdatphong = Danhsachdatphong::orderBy('id', 'desc')->first();
        $danhsachdatphong->ngayketthuco = $today;
        $danhsachdatphong->save();

        $phongid = $request->phongid;
        $datphongid = $datphong->id;
        $ngaybatdauo = $today;
        $ngayketthuco = $datphong->ngaytra;

        if ($datphong->tinhtrangnhanphong == 1) {
            Danhsachdatphong::create([
                'phongid' => $phongid,
                'datphongid' => $datphongid,
                'ngaybatdauo' => $today,
                'ngayketthuco' => $ngayketthuco,
            ]);
        } else {
            // Log::info($datphong);
            $danhsachdatphong->phongid = $request->phongid;
            $danhsachdatphong->datphongid = $datphong->id;
            $danhsachdatphong->ngaybatdauo = $datphong->ngaydat;
            $danhsachdatphong->ngayketthuco = $datphong->ngaytra;
            $danhsachdatphong->save();
        }

        return redirect('/client/index')->with('success', 'Datphong has been change successfully');
    }


    //Xoa dat phong
    public function xoadatphong(Datphong $datphong)
    {
        $datphong = Datphong::find($datphong->id);
        $datphong->huydatphong = 1;
        $datphong->save();
        return redirect('/client/index')->with('success', 'Datphong has been deleted successfully');
    }

    // luu dat phong tren client
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
            'userid' => $request->clientid
        ]);

        $khachhangs = Khachhang::max('id');

        $request->tinhtrangthanhtoan = 0;
        $request->tinhtrangnhanphong = 0;
        $request->tinhtrangxuly = 0;
        $request->huydatphong = 0;
        Datphong::create([
            'ngaydat' => $request->ngaydat,
            'ngaytra' => $request->ngaytra,
            'soluong' => $request->soluong,
            'tinhtrangthanhtoan' => $request->tinhtrangthanhtoan,
            'tinhtrangnhanphong' => $request->tinhtrangnhanphong,
            'tinhtrangxuly' => $request->tinhtrangxuly,
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

        return redirect('client/index')->with('success', 'Datphong has been created successfully.');
    }

    // Kiem tra trong chi tiet phong. Neu phong trong thi dat phong thanh cong khong thi tra ve la khong thanh cong
    public function kiemtra_index_store(Request $request)
    {
        // Kiem tra khong co truong nao trong
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required',
            'email' => 'required',
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required',
        ]);

        // Kiem tra la phong do trong
        $phongslist = Phong::get();
        $phongs = array();
        $datphongs = Datphong::get();

        if ($datphongs->count() > 0) {
            foreach ($phongslist as $phong) {
                $xacnhan = 0;
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
                if ($xacnhan == 0) {
                    array_push($phongs, $phong);
                }
            }
        } else {
            $phongs = $phongslist;
        }

        $i = 0;
        $sus = "Đặt phòng thành công";
        $fail = "Đặt phòng không thành công do đã có khách khác đặt phòng này";
        foreach ($phongs as $p) {
            if ($p->so_phong == $request->phongid) {
                $i++;
                break;
            }
        }
        if ($i > 0) {
            $this->index_store($request);
            return redirect('client/chitietphong/' . $request->phongid)->with('success', $sus);
        } else return redirect('client/chitietphong/' . $request->phongid)->with('success', $fail);
    }

    public function dichvu_satphong_store(Request $request)
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
        }

        return redirect('/client/index');
    }


    // cua nhan vien
    public function dashboard()
    {
        $phong = Phong::get();
        $sophong = $phong->count();

        $khachhang = Khachhang::get();
        $sokhachhang = $khachhang->count();

        $nhanvien = Nhanvien::get();
        $sonhanvien = $nhanvien->count();

        $user = User::get();
        $souser = $user->count();

        //thanh toan
        $datphong = Datphong::get();

        $chuathanhtoan = collect();
        $dathanhtoan = collect();
        $chuanhanphong = collect();
        $danhanphong = collect();
        foreach ($datphong as $d) {
            $temp = $d->tinhtrangthanhtoan;
            $temp2 = $d->tinhtrangnhanphong;
            if ($temp == 0) {
                $chuathanhtoan->add($temp);
            } else {
                $dathanhtoan->add($temp);
            }
            if ($temp2 == 0) {
                $chuanhanphong->add($temp);
            } else {
                $danhanphong->add($temp);
            }
        }

        $thanhtoan = collect();
        $thanhtoan->add(array(
            'chuathanhtoan' => 'chuathanhtoan',
            'sochuathanhtoan' => $chuathanhtoan->count(),
            'dathanhtoan' => 'dathanhtoan',
            'sodathanhtoan' => $dathanhtoan->count(),
        ));
        $nhanphong = collect();
        $nhanphong->add(array(
            'chuanhanphong' => 'chuanhanphong',
            'sochuanhanphong' => $chuanhanphong->count(),
            'danhanphong' => 'danhanphong',
            'sodanhanphong' => $danhanphong->count(),
        ));

        return view('index', compact('sophong', 'sokhachhang', 'sonhanvien', 'souser', 'thanhtoan', 'nhanphong'));
    }

    public function profile()
    {
        $user = Auth::user();
        $catrucs = Catruc::get();
        $allNhanvien = Nhanvien::get();
        return view('profiles.profile', compact('user', 'catrucs', 'allNhanvien'));
    }

    public function vieweditprofile()
    {
        $user = Auth::user();
        return view('profiles.edit', compact('user'));
    }

    public function editprofile(Request $request, User $user)
    {
        $request->validate([
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($user->email, 'email')
            ],
            'username' => 'required',
        ]);

        $user->fill($request->post())->save();

        return redirect('/profile')->with('success', 'User Has Been updated successfully');
    }
}
