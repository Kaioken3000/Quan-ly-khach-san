<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Khachhang;
use App\Models\Datphong;

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
        $khachhangs = Khachhang::orderBy('id', 'asc')->paginate(5);
        return view('khachhangs.index', compact('khachhangs', 'datphong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('khachhangs.create', compact('request'));
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
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required',
            'email' => 'required',
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required',
        ]);

        Khachhang::create([
            'ten' => $request->ten,
            'sdt' => $request->ten,
            'email' => $request->ten,
        ]);

        $khachhangs = Khachhang::max('id');

        Log::info($request->tinhtrangthanhtoan);

        Datphong::create([
            'ngaydat' => $request->ngaydat,
            'ngaytra' => $request->ngaytra,
            'soluong' => $request->soluong,
            'phongid' => $request->phongid,
            'tinhtrangthanhtoan' => $request->tinhtrangthanhtoan,
            'tinhtrangnhanphong' => $request->tinhtrangnhanphong,
            'khachhangid' => $khachhangs,
        ]);

        $dat = Datphong::max('id');

        $khachhangs = Khachhang::find($khachhangs);
        $khachhangs->datphongid = $dat;
        $khachhangs->save();

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
        $khachhangs = Khachhang::where('ten', 'LIKE', '%' . $request->search . "%")
            ->orWhere('sdt', 'LIKE', '%' . $request->search . "%")
            ->orWhere('email', 'LIKE', '%' . $request->search . "%")
            ->orWhere('id', 'LIKE', '%' . $request->search . "%")
            ->orderBy('id', 'asc')->paginate(5);
        return view('khachhangs.search', compact('khachhangs'));
    }
}
