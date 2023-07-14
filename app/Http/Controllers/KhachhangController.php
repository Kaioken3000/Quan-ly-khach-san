<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Khachhang;
use App\Models\Datphong;
use App\Models\Danhsachdatphong;
use App\Models\Phong;
use App\Models\Chuyenkhoan;
use App\Models\Thanhtoan;

class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datphong = Datphong::get();
        // $khachhangs = Khachhang::orderBy('id', 'asc')->paginate(5);
        $khachhangs = Khachhang::get();
        return view('khachhangs.index', compact('khachhangs', 'datphong'));
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

        Khachhang::create([
            'ten' => $request->ten,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'diachi' => $request->diachi,
            'gioitinh' => $request->gioitinh,
            'vanbang' => $request->vanbang,
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

        // Luu thong tin chuyen khoan
        if ($request->hinhthucthanhtoan == "tructiep") {
            Thanhtoan::create(array(
                "hinhthuc" => $request->hinhthucthanhtoan,
                "gia" => $request->tiendatcoc,
                "loaitien" => $request->loaitien,
                "chuyenkhoan_token" => $request->stripeToken,
                "khachhangid" => $khachhangs->id,
            ));
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

        return redirect()->route('khachhangs.index')->with('success', 'Khachhang Has Been updated successfully');
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
