<?php

namespace App\Http\Controllers;

use App\Models\Xuly;
use App\Models\Phong;
use App\Models\Anuong;
use App\Models\Dichvu;
use App\Models\Chinhanh;
use App\Models\Datphong;
use App\Models\Traphong;
use App\Models\Khachhang;
use App\Models\Loaiphong;
use App\Models\Nhanphong;
use App\Models\Thanhtoan;
use App\Models\Huydatphong;
use Illuminate\Http\Request;
use App\Models\AnuongDatphong;
use App\Models\DichvuDatphong;
use App\Models\Danhsachdatphong;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DatphongController extends Controller
{
    // Method: POST, PUT, GET etc
    // Data: array("param" => "value") ==> index.php?param=value
    function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query(array($data)));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "Ly Nhut Nam:HgyG$24Vu$");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // foreach (Auth::user()->roles as $role) {
        //     $datphongs = Datphong::join('khachhangs', 'datphongs.id', '=', 'khachhangs.datphongid')
        //     ->where('huydatphong', 0)
        //     ->select('*', 'datphongs.id as datphongid')
        //     ->get();
        // }
        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "MainAdmin") {
            $datphongs = Datphong::where('huydatphong', 0)->get();
        }
        if ($roleName == "Admin" || $roleName == "User") {
            $temp = [];
            if (isset(Auth::user()->nhanviens)) {
                $datphongs = Datphong::where('huydatphong', 0)->get();
                foreach ($datphongs as $datphong) {
                    foreach ($datphong->phongs as $phong) {
                        if ($phong->chinhanhid == Auth::user()->nhanviens[0]->chinhanhs->id) {
                            $temp[] = $datphong;
                        }
                    }
                }
            }
            $datphongs = $temp;
        }

        $dichvus = Dichvu::get();
        $anuongs = Anuong::get();
        $phongs = Phong::get();
        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User")
            if (isset(Auth::user()->nhanviens)) {
                $chinhanhs = Chinhanh::where("id", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
            } else $nhanvien = [];
        if ($roleName == "MainAdmin") {
            $chinhanhs = Chinhanh::get();
        }

        return view('datphongs.index', compact('datphongs', 'dichvus', 'anuongs', 'phongs', 'request', 'chinhanhs'));
    }

    public function showHistoryPage(Request $request)
    {
        // $danhsachdatphongs = Danhsachdatphong::where('datphongid', $request->datphongid)->get();
        // $nhanphongs = Nhanphong::where('datphongid', $request->datphongid)->get();
        // $traphongs = Traphong::where('datphongid', $request->datphongid)->get();
        // $huydatphongs = Huydatphong::where('datphongid', $request->datphongid)->get();
        // $dichvudatphongs = DichvuDatphong::where('datphongid', $request->datphongid)->get();
        // $anuongdatphongs = AnuongDatphong::where('datphongid', $request->datphongid)->get();
        // $thanhtoans = Thanhtoan::where('khachhangid', $request->khachhangid)->get();

        // $dichvudatphong = DichvuDatphong::where('datphongid', $request->datphongid)->first();
        // $anuongdatphong = AnuongDatphong::where('datphongid', $request->datphongid)->first();

        // $datphong = new Datphong();
        // $datphong['id'] = $request->datphongid;

        // Hien rieng
        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User") {
            $temp = [];
            if (isset(Auth::user()->nhanviens)) {
                $datphongs = Datphong::where('huydatphong', 0)
                    ->where('id', $request->datphongid)->get();
                foreach ($datphongs as $datphong) {
                    foreach ($datphong->phongs as $phong) {
                        if ($phong->chinhanhid == Auth::user()->nhanviens[0]->chinhanhs->id) {
                            $temp[] = $datphong;
                        }
                    }
                }
            }
            $datphongs = $temp;
        }
        if ($roleName == "MainAdmin") {
            $datphongs = Datphong::where('huydatphong', 0)
                ->where('id', $request->datphongid)->get();
        }

        $dichvus = Dichvu::get();
        $anuongs = Anuong::get();
        $phongs = Phong::get();
        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User")
            if (isset(Auth::user()->nhanviens)) {
                $chinhanhs = Chinhanh::where("id", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
            } else $nhanvien = [];
        if ($roleName == "MainAdmin") {
            $chinhanhs = Chinhanh::get();
        }
        // Hien rieng

        return view('datphongs.historyPage', compact(
            // 'danhsachdatphongs',
            // 'nhanphongs',
            // 'traphongs',
            // 'huydatphongs',
            // 'dichvudatphongs',
            // 'dichvudatphong',
            // 'anuongdatphongs',
            // 'anuongdatphong',
            // 'thanhtoans',
            // 'request',
            // 'datphong',
            'dichvus',
            'anuongs',
            'datphongs',
        ));
    }

    public function showHuydatphong(Request $request)
    {
        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User") {
            $temp = [];
            if (isset(Auth::user()->nhanviens)) {
                $datphongs = Datphong::where('huydatphong', 1)->get();
                foreach ($datphongs as $datphong) {
                    foreach ($datphong->phongs as $phong) {
                        if ($phong->chinhanhid == Auth::user()->nhanviens[0]->chinhanhs->id) {
                            $temp[] = $datphong;
                        }
                    }
                }
            }
            $datphongs = $temp;
        }
        if ($roleName == "MainAdmin") {
            $datphongs = Datphong::where('huydatphong', 1)->get();
        }
        $dichvus = Dichvu::get();
        $anuongs = Anuong::get();
        $phongs = Phong::get();
        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User")
            if (isset(Auth::user()->nhanviens)) {
                $chinhanhs = Chinhanh::where("id", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
            } else $nhanvien = [];
        if ($roleName == "MainAdmin") {
            $chinhanhs = Chinhanh::get();
        }
        return view('datphongs.showHuydatphong', compact('datphongs', 'dichvus', 'anuongs', 'phongs', 'request', 'chinhanhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $khachhangs = request()->khachhangs;
        return view('datphongs.create', compact('khachhangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->tinhtrangthanhtoan = 0;
        $request->tinhtrangnhanphong = 0;
        $request->tinhtrangxuly = 0;
        $request->huydatphong = 0;
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required',
        ]);

        Datphong::create($request->post());

        $dat = Datphong::max('id');

        $khachhangs = Khachhang::find($request->khachhangid);
        $khachhangs->datphongid = $dat;
        $khachhangs->save();

        return redirect()->route('datphongs.index')->with('success', 'Datphong has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\datphong  $datphong
     * @return \Illuminate\Http\Response
     */
    public function show(Datphong $datphong)
    {
        return view('datphongs.show', compact('datphong'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datphong  $datphong
     * @return \Illuminate\Http\Response
     */
    public function edit(Datphong $datphong)
    {
        return view('datphongs.edit', compact('datphong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\datphong  $datphong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datphong $datphong)
    {
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'tinhtrangthanhtoan' => 'required',
            'tinhtrangnhanphong' => 'required'
        ]);

        $datphong->fill($request->post())->save();

        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datphong  $datphong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datphong $datphong)
    {
        $datphong->delete();
        return redirect()->route('datphongs.index')->with('success', 'Datphong has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $datphongs = Datphong::where('ngaydat', 'LIKE', '%' . $request->search . "%")
        //     ->orWhere('ngaytra', 'LIKE', '%' . $request->search . "%")
        //     ->orWhere('soluong', 'LIKE', '%' . $request->search . "%")
        //     ->orWhere('khachhangid', 'LIKE', '%' . $request->search . "%")
        //     ->orderBy('id', 'asc')->paginate(5);
        // foreach (Auth::user()->roles as $role) {
        //     if ($role->name == 'Admin') {
        //         $datphongs = DB::table('datphongs')
        //             ->join('khachhangs', 'datphongs.id', '=', 'khachhangs.datphongid')
        //             ->where('datphongs.id', 'LIKE', '%' . $request->search . "%")
        //             ->orWhere('datphongs.ngaydat', 'LIKE', '%' . $request->search . "%")
        //             ->orWhere('datphongs.ngaytra', 'LIKE', '%' . $request->search . "%")
        //             ->orWhere('datphongs.soluong', 'LIKE', '%' . $request->search . "%")
        //             ->orWhere('datphongs.khachhangid', 'LIKE', '%' . $request->search . "%")
        //             ->select('*', 'datphongs.id as datphongid')
        //             ->orderBy('datphongs.id', 'desc')->paginate(5);
        //     } else {
        //         $datphongs = DB::table('datphongs')
        //             ->join('khachhangs', 'datphongs.id', '=', 'khachhangs.datphongid')
        //             ->where('huydatphong', 0)
        //             ->select('*', 'datphongs.id as datphongid')
        //             ->orderBy('datphongs.id', 'desc')->paginate(5);
        //     }
        // }
        $datphongs = Datphong::where('ngaydat', 'LIKE', '%' . $request->search . "%")
            ->orWhere('ngaytra', 'LIKE', '%' . $request->search . "%")
            ->orWhere('soluong', 'LIKE', '%' . $request->search . "%")
            ->orWhere('khachhangid', 'LIKE', '%' . $request->search . "%")
            ->get();
        foreach (Auth::user()->roles as $role) {
            if ($role->name == 'Admin') {
                $datphongs = DB::table('datphongs')
                    ->join('khachhangs', 'datphongs.id', '=', 'khachhangs.datphongid')
                    ->where('datphongs.id', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('datphongs.ngaydat', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('datphongs.ngaytra', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('datphongs.soluong', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('datphongs.khachhangid', 'LIKE', '%' . $request->search . "%")
                    ->select('*', 'datphongs.id as datphongid')
                    ->get();
            } else {
                $datphongs = DB::table('datphongs')
                    ->join('khachhangs', 'datphongs.id', '=', 'khachhangs.datphongid')
                    ->where('huydatphong', 0)
                    ->select('*', 'datphongs.id as datphongid')
                    ->get();
            }
        }
        $dichvus = Dichvu::get();
        return view('datphongs.search', compact('datphongs', 'dichvus'));
    }

    /**
     * Thanh toán.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanhtoan(Request $request, Datphong $datphong)
    {
        $datphong = Datphong::find($request->id);
        $datphong->tinhtrangthanhtoan = 1;
        $datphong->tinhtrangnhanphong = 1;

        $traphongs = array();
        $traphongs['ten'] = Auth::user()->username;
        $traphongs['userid'] = Auth::user()->id;
        $traphongs['datphongid'] = $datphong->id;

        Traphong::create($traphongs);

        $datphong->save();

        // Cap nhat ngay o ket thuc thuc te
        $ngayhomnay = date("Y-m-d");
        $phongocuoicung = Danhsachdatphong::where("datphongid", $request->id)->latest()->first();
        $phongocuoicung->ngayketthuco = $ngayhomnay;
        $phongocuoicung->save();

        // Luu thong tin chuyen khoan
        Thanhtoan::create(array(
            "hinhthuc" => $request->hinhthucthanhtoan,
            "gia" => $request->sotien,
            "loaitien" => $request->loaitien,
            "chuyenkhoan_token" => $request->stripeToken,
            "khachhangid" => $request->khachhang_id,
            "datphongid" => $datphong->id,
        ));
        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }
    /**
     * Chinh thanh toán.
     *
     * @return \Illuminate\Http\Response
     */
    public function chinhthanhtoan(Request $request, Datphong $datphong)
    {
        $datphong = Datphong::find($request->id);
        $datphong->tinhtrangthanhtoan = 0;
        Traphong::where('datphongid', $datphong->id)->delete();

        Thanhtoan::where('khachhangid', $request->khachhang_id)
            ->where('loaitien', 'traphong')
            ->delete();

        $datphong->save();
        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }
    /**
     * Nhan phong.
     *
     * @return \Illuminate\Http\Response
     */
    public function nhanphong(Request $request, Datphong $datphong)
    {
        $datphong = Datphong::find($request->id);

        $nhanphongs = array();
        $nhanphongs['userid'] = Auth::user()->id;
        $nhanphongs['datphongid'] = $datphong->id;

        if ($datphong->tinhtrangnhanphong == 1) {
            $datphong->tinhtrangnhanphong = 0;
            Nhanphong::where('datphongid', $datphong->id)->delete();
        } else {
            $datphong->tinhtrangnhanphong = 1;
            Nhanphong::create($nhanphongs);
        }

        $datphong->save();

        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kiemtra(Request $request)
    {
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required'
        ]);

        $phongs = array();
        $datphongs = Datphong::get();

        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User") {
            $temp = collect([]);
            if (isset(Auth::user()->nhanviens)) {
                $phongslist = Phong::where("chinhanhid", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
            }
        }
        if ($roleName == "MainAdmin") {
            $phongslist = Phong::get();
        }

        if ($datphongs->count() > 0) {
            foreach ($phongslist as $phong) {
                $xacnhan = 0;
                if ($request->soluong > $phong->loaiphongs->soluong) {
                    $xacnhan++;
                } else {
                    foreach ($datphongs as $datphong) {
                        $danhsachdatphong = Danhsachdatphong::where('datphongid', $datphong->id)->latest()->first();
                        if ($danhsachdatphong->phongid == $phong->so_phong && $datphong->huydatphong == 0) {
                            // if ($request->ngaydat >= $danhsachdatphong->ngaybatdauo && $request->ngaydat <= $danhsachdatphong->ngayketthuco) {
                            //     $xacnhan++;
                            // } else if ($request->ngaytra >= $danhsachdatphong->ngaybatdauo && $request->ngaytra <= $danhsachdatphong->ngayketthuco) {
                            //     $xacnhan++;
                            // }
                            if ($request->ngaydat < $danhsachdatphong->ngaybatdauo && $request->ngaytra < $danhsachdatphong->ngaybatdauo) {
                                // $xacnhan++;
                            } else if ($request->ngaydat > $danhsachdatphong->ngayketthuco && $request->ngaytra > $danhsachdatphong->ngayketthuco) {
                                // $xacnhan++;
                            } else $xacnhan++;
                        }
                    }
                }
                if ($request->ngaytra < $request->ngaydat) {
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
        return view('datphongs.kiemtra', compact('request', 'phongs', 'loaiphongs'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function kiemtra_capnhat(Request $request)
    // {
    //     $dat = Datphong::find($request->datphongid);

    //     $phongslist = Phong::get();
    //     $phongs = array();
    //     foreach ($phongslist as $phong) {
    //         $xacnhan = 0;
    //         $danhsachdatphong = Danhsachdatphong::where('phongid', $phong->so_phong)->latest()->first();
    //         // Log::info($danhsachdatphong);
    //         if ($danhsachdatphong) {
    //             $datphongs = Datphong::where('id', $danhsachdatphong->datphongid)->get();
    //             if (count($datphongs) != 0) {
    //                 foreach ($datphongs as $datphong) {
    //                     if ($dat->ngaytra >= $dat->ngaydat) {
    //                         if ($dat->ngaydat < $danhsachdatphong->ngaybatdauo && $dat->ngaytra < $danhsachdatphong->ngaybatdauo) {
    //                             $xacnhan++;
    //                         } else if ($dat->ngaydat > $danhsachdatphong->ngaybatdauo && $dat->ngaydat > $danhsachdatphong->ngaybatdauo) {
    //                             $xacnhan++;
    //                         }
    //                     }
    //                 }
    //                 if ($xacnhan == count($datphongs)) {
    //                     array_push($phongs, $phong);
    //                 }
    //             } else array_push($phongs, $phong);
    //         } else array_push($phongs, $phong);
    //     }
    //     $loaiphongs = Loaiphong::get();
    //     return view('datphongs.kiemtra-capnhat', compact('phongs', 'dat', 'loaiphongs'));
    // }
    public function kiemtra_capnhat(Request $request)
    {
        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User") {
            $temp = collect([]);
            if (isset(Auth::user()->nhanviens)) {
                $phongslist = Phong::where("chinhanhid", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
            }
        }
        if ($roleName == "MainAdmin") {
            $phongslist = Phong::get();
        }

        $phongs = array();
        $datphongs = Datphong::get();

        $dat = Danhsachdatphong::where('datphongid', $request->datphongid)->latest()->first();
        $phongdat = Datphong::find($dat->datphongid)->first();

        if ($datphongs->count() > 0) {
            foreach ($phongslist as $phong) {
                $xacnhan = 0;
                if ($phongdat->soluong > $phong->loaiphongs->soluong) {
                    $xacnhan++;
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

        return view('datphongs.kiemtra-capnhat', compact('phongdat', 'dat', 'phongs', 'loaiphongs'));
    }
}
