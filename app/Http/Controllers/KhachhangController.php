<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use App\Models\Anuong;
use App\Models\Dichvu;
use App\Models\Chinhanh;
use App\Models\Datphong;
use App\Models\Khachhang;
use App\Models\Thanhtoan;
use App\Models\Chuyenkhoan;
use Illuminate\Http\Request;
use App\Models\Danhsachdatphong;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $khachhangs = Khachhang::orderBy('id', 'asc')->paginate(5);
        $khachhangs = Khachhang::get();
        return view('khachhangs.index', compact('khachhangs'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChitietKhachhang(Request $request)
    {
        // $roleName = Auth::user()->roles[0]->name;

        // if ($roleName == "MainAdmin") {
        //     $datphongs = Datphong::where('huydatphong', 0)->get();
        // }
        // if ($roleName == "Admin" || $roleName == "User") {
        //     $temp = [];
        //     if (isset(Auth::user()->nhanviens)) {
        //         $datphongs = Datphong::where('huydatphong', 0)->where()->get();
        //         foreach ($datphongs as $datphong) {
        //             foreach ($datphong->phongs as $phong) {
        //                 if ($phong->chinhanhid == Auth::user()->nhanviens[0]->chinhanhs->id) {
        //                     $temp[] = $datphong;
        //                 }
        //             }
        //         }
        //     }
        //     $datphongs = $temp;
        // }

        // $dichvus = Dichvu::get();
        // $anuongs = Anuong::get();
        // $phongs = Phong::get();
        // $roleName = Auth::user()->roles[0]->name;

        // if ($roleName == "Admin" || $roleName == "User")
        //     if (isset(Auth::user()->nhanviens)) {
        //         $chinhanhs = Chinhanh::where("id", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
        //     } else $nhanvien = [];
        // if ($roleName == "MainAdmin") {
        //     $chinhanhs = Chinhanh::get();
        // }

        $khachhangs = Khachhang::where("id", $request->khachhangid)->get();
        return view('khachhangs.showChitietKhachhang', compact('khachhangs'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDatphongCuaKhachhang(Request $request)
    {
        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "MainAdmin") {
            $datphongs = Datphong::where('huydatphong', 0)->where("khachhangid", $request->khachhangid)->get();
        }
        if ($roleName == "Admin" || $roleName == "User") {
            $temp = [];
            if (isset(Auth::user()->nhanviens)) {
                $datphongs = Datphong::where('huydatphong', 0)->where("khachhangid", $request->khachhangid)->get();
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

        return view(
            'khachhangs.showDatphongCuaKhachhang',
            compact('datphongs', 'dichvus', 'anuongs', 'phongs', 'request', 'chinhanhs')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $phongs = Phong::get();
        return view('khachhangs.create', compact('request', 'phongs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required',
            'email' => 'required',
            'diachi' => 'required',
            'vanbang' => 'required',
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required',
        ]);

        // Log::info($request);

        $request->tinhtrangthanhtoan = 0;
        $request->tinhtrangnhanphong = 0;
        $request->tinhtrangxuly = 0;
        $request->huydatphong = 0;

        $khachhangs = null;
        $dat = null;
        if (isset($request->thiskhachhangid)) {

            $dat = Datphong::create([
                'ngaydat' => $request->ngaydat,
                'ngaytra' => $request->ngaytra,
                'soluong' => $request->soluong,
                'tinhtrangthanhtoan' => $request->tinhtrangthanhtoan,
                'tinhtrangnhanphong' => $request->tinhtrangnhanphong,
                'tinhtrangxuly' => $request->tinhtrangxuly,
                'huydatphong' => $request->huydatphong,
                'khachhangid' => $request->thiskhachhangid,
            ]);


            //cap nhat diem cho khachhang
            $khachhang = Khachhang::find($request->thiskhachhangid);
            $khachhang->diem += 1000;
            $khachhang->save();
        } else {

            $khachhangs = Khachhang::create([
                'ten' => $request->ten,
                'sdt' => $request->sdt,
                'email' => $request->email,
                'diachi' => $request->diachi,
                'gioitinh' => $request->gioitinh,
                'vanbang' => $request->vanbang,
            ]);

            $dat = Datphong::create([
                'ngaydat' => $request->ngaydat,
                'ngaytra' => $request->ngaytra,
                'soluong' => $request->soluong,
                'tinhtrangthanhtoan' => $request->tinhtrangthanhtoan,
                'tinhtrangnhanphong' => $request->tinhtrangnhanphong,
                'tinhtrangxuly' => $request->tinhtrangxuly,
                'huydatphong' => $request->huydatphong,
                'khachhangid' => $khachhangs->id,
            ]);

            //cap nhat diem cho khachhang
            $khachhang = Khachhang::find($khachhangs->id);
            $khachhang->diem += 1000;
            $khachhang->save();
        }
        Danhsachdatphong::create([
            'phongid' => $request->phongid,
            'ngaybatdauo' => $request->ngaydat,
            'ngayketthuco' => $request->ngaytra,
            'datphongid' => $dat->id,
        ]);


        // Luu thong tin chuyen khoan
        if ($request->hinhthucthanhtoan == "tructiep") {
            if (isset($request->thiskhachhangid)) {
                Thanhtoan::create(array(
                    "hinhthuc" => $request->hinhthucthanhtoan,
                    "gia" => $request->tiendatcoc,
                    "loaitien" => $request->loaitien,
                    "chuyenkhoan_token" => $request->stripeToken,
                    "khachhangid" => $request->thiskhachhangid,
                    "datphongid" => $dat->id,
                ));
            } else {
                Thanhtoan::create(array(
                    "hinhthuc" => $request->hinhthucthanhtoan,
                    "gia" => $request->tiendatcoc,
                    "loaitien" => $request->loaitien,
                    "chuyenkhoan_token" => $request->stripeToken,
                    "khachhangid" => $khachhangs->id,
                    "datphongid" => $dat->id,
                ));
            }
        }

        return redirect()->route('datphongs.index')->with('success', 'Datphong has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function show(Khachhang $khachhang)
    {
        return view('khachhangs.show', compact('khachhang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function edit(Khachhang $khachhang)
    {
        return view('khachhangs.edit', compact('khachhang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Khachhang $khachhang)
    {
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required',
            'email' => 'required',
            'diachi' => 'required',
            'vanbang' => 'required',
        ]);

        $khachhang->fill($request->post())->save();

        return redirect()->back()->withMessage('success', 'Khachhang Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Khachhang $khachhang)
    {
        $khachhang->delete();
        return redirect()->route('khachhangs.index')->with('success', 'Khachhang has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $khachhangs = Khachhang::where('ten', 'LIKE', '%' . $request->search . "%")
        //     ->orWhere('sdt', 'LIKE', '%' . $request->search . "%")
        //     ->orWhere('email', 'LIKE', '%' . $request->search . "%")
        //     ->orWhere('diachi', 'LIKE', '%' . $request->search . "%")
        //     ->orWhere('vanbang', 'LIKE', '%' . $request->search . "%")
        //     ->orWhere('id', 'LIKE', '%' . $request->search . "%")
        //     ->orderBy('id', 'asc')->paginate(5);
        $khachhangs = Khachhang::where('ten', 'LIKE', '%' . $request->search . "%")
            ->orWhere('sdt', 'LIKE', '%' . $request->search . "%")
            ->orWhere('email', 'LIKE', '%' . $request->search . "%")
            ->orWhere('diachi', 'LIKE', '%' . $request->search . "%")
            ->orWhere('vanbang', 'LIKE', '%' . $request->search . "%")
            ->orWhere('id', 'LIKE', '%' . $request->search . "%")
            ->get();
        $datphong = Datphong::get();
        return view('khachhangs.search', compact('khachhangs', 'datphong'));
    }
}
