<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Check;
use App\Models\Phong;
use App\Models\Anuong;
use App\Models\Catruc;
use App\Models\Chinhanh;
use App\Models\Dichvu;
use App\Models\Datphong;
use App\Models\Nhanvien;
use App\Models\Khachhang;
use App\Models\Loaiphong;
use Illuminate\Http\Request;
use App\Models\DichvuDatphong;
use Illuminate\Validation\Rule;
use App\Models\Danhsachdatphong;
use App\Models\Virtualtour;
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
        $phongs = Phong::get();
        $chinhanhs = Chinhanh::get();
        $anuongs = Anuong::get();
        return view('client.index', compact('phongs', 'chinhanhs', 'anuongs'));
    }

    /**
     * Hien trang index cua client
     *
     * @return \Illuminate\Http\Response
     */
    public function previewVirtualTour(Request $request)
    {
        $virtualtour = Virtualtour::where("id", $request->virtualtourid)->first();
        return view('client.previewVirtualTour', compact('virtualtour'));
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
        $chinhanhs = Chinhanh::all();
        return view('client.roomSearch', compact('phongs', 'loaiphongs', 'chinhanhs'));
    }
    public function searchPhongWithManySearch(Request $request)
    {
        // $phongs = Phong::where('so_phong', 'LIKE', '%' . $request->search . "%")
        //                 ->orderBy('so_phong','asc')->paginate(5);
        if ($request->songuoiphong == null || $request->songuoiphong == "") {
            $request->songuoiphong = "1";
        }
        if ($request->chinhanhid) {
            $phongs = Phong
                ::where('loaiphongs.ma', 'LIKE', '%' . $request->tenphong . "%")
                ->where('loaiphongs.gia', $request->tuychonggia, $request->giaphong)
                ->where('loaiphongs.soluong', '>=', $request->songuoiphong)
                ->where('phongs.chinhanhid', '=', $request->chinhanhid)
                ->join('loaiphongs', 'phongs.loaiphongid', '=', 'loaiphongs.ma')
                ->get();
        } else {
            $phongs = Phong
                ::where('loaiphongs.ma', 'LIKE', '%' . $request->tenphong . "%")
                ->where('loaiphongs.gia', $request->tuychonggia, $request->giaphong)
                ->where('loaiphongs.soluong', '>=', $request->songuoiphong)
                ->join('loaiphongs', 'phongs.loaiphongid', '=', 'loaiphongs.ma')
                ->get();
        }
        $loaiphongs = Loaiphong::all();
        $chinhanhs = Chinhanh::get();
        return view('client.roomSearch', compact('phongs', 'loaiphongs', 'chinhanhs'));
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
        $chinhanhs = Chinhanh::get();
        return view('client.phong', compact('phongs', 'loaiphongs', 'chinhanhs'));
    }

    // Hien cac chi nhánh
    public function showChinhanhs()
    {
        $chinhanhs = Chinhanh::get();
        return view('client.chinhanhs.chinhanhList', compact('chinhanhs'));
    }
    // Hien chi tiet chi nhánh
    public function showChinhanhChitiet(Request $request)
    {
        $chinhanh = Chinhanh::where("id", $request->chinhanhid)->first();
        $chinhanhs = Chinhanh::get();
        $loaiphongs = Loaiphong::get();
        return view('client.chinhanhs.chinhanhChitiet', compact('chinhanh', 'chinhanhs', 'loaiphongs'));
    }

    /**
     * Hien trang chi tiet phong cua client
     *
     * @return \Illuminate\Http\Response
     */
    public function hientrangchitietphong(Request $request)
    {
        $phong = Phong::where('so_phong', $request->phongid)->first();
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
        if ($request->diachi || $request->gioitinh || $request->vanbang) {
            $user->fill([
                'email' => $request->email,
                'username' => $request->username,
                'sdt' => $request->sdt,
                'diachi' => $request->diachi,
                'gioitinh' => $request->gioitinh,
                'vanbang' => $request->vanbang,
            ])->save();
        } else
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
        // $datphongs = Datphong::
        //     join('khachhangs', 'datphongs.id', '=', 'khachhangs.datphongid')
        //     ->select('*', 'datphongs.id as datphongid')
        //     ->where('khachhangs.userid', $userid)
        //     ->where('huydatphong', 0)
        //     ->orderBy('datphongs.id', 'desc')->get();
        $datphongalls = Datphong::where("huydatphong", 0)->get();

        $dichvus = Dichvu::get();
        $anuongs = Anuong::get();
        return view('client.danhsachdatphong', compact('dichvus', 'anuongs', 'datphongalls'));
    }
    // Hien thi danh sach datphong cua client
    public function datphongChitiet(Request $request)
    {
        $userid = Auth::user()->id;
        $datphongalls = Datphong::where("huydatphong", 0)->where("id", $request->datphongid)->get();

        $dichvus = Dichvu::get();
        $anuongs = Anuong::get();
        return view('client.datphongChitiet',  compact('dichvus', 'anuongs', 'datphongalls', "request"));
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
                                // $xacnhan++;
                            } else if ($request->ngaytra >= $danhsachdatphong->ngaybatdauo && $request->ngaytra <= $danhsachdatphong->ngayketthuco) {
                                // $xacnhan++;
                            } else $xacnhan++;
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
        $roleName = Auth::user()->roles[0]->name;
        $phongslist = Phong::get();

        $phongs = array();
        $datphongs = Datphong::get();

        $dat = Danhsachdatphong::where('datphongid', $request->datphongid)->latest()->first();
        $phongdat = Datphong::find($dat->datphongid)->first();

        if ($datphongs->count() > 0) {
            foreach ($phongslist as $phong) {
                $xacnhan = 0;
                if ($phongdat->soluong > $phong->loaiphongs->soluong) {
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
                        $danhsachdatphong = Danhsachdatphong::where('datphongid', $datphong->id)->latest()->first();
                        if ($danhsachdatphong->phongid == $phong->so_phong && $datphong->huydatphong == 0) {
                            if ($dat->ngaybatdauo < $danhsachdatphong->ngaybatdauo && $dat->ngayketthuco < $danhsachdatphong->ngaybatdauo) {
                                // $xacnhan++;
                            } else if ($dat->ngaybatdauo > $danhsachdatphong->ngayketthuco && $dat->ngayketthuco > $danhsachdatphong->ngayketthuco) {
                                // $xacnhan++;
                            } else $xacnhan++;
                        }
                    }
                }
                if ($dat->ngayketthuco < $dat->ngaybatdauo) {
                    $xacnhan++;
                }
                if ($xacnhan == 0) {
                    array_push($phongs, $phong);
                }
            }
            // Log::info($phongs);
        } else {
            $phongs = $phongslist;
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

            //cap nhat diem cho khachhang
            $diem = Dichvu::find($dichvu);
            $diem = $diem->diem;
            $khachhang = Khachhang::find($request->khachhangid);
            $khachhang->diem +=  $diem;
            $khachhang->save();
        }

        // return redirect('/client/index');
        return redirect()->back()->withMessage('success', 'Dich vu dat phong has been created successfully.');
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

        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User")
            if (isset(Auth::user()->nhanviens)) {
                $allNhanvien = Nhanvien::where("chinhanhid", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
            } else $nhanvien = [];
        if ($roleName == "MainAdmin") {
            $allNhanvien = Nhanvien::get();
        }
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
