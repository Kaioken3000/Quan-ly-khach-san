<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\CatrucNhanvien;

class CatrucNhanvienController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request);
        $request->validate([
            'catrucid' => 'required',
            'nhanvienid' => 'required',
            'ngaybatdau' => 'required',
            'ngayketthuc' => 'required',
        ]);

        foreach ($request->catrucid as $catruc) {
            $dich = array();
            $dich['nhanvienid'] = $request->nhanvienid;
            $dich['catrucid'] = $catruc;
            $dich['ngaybatdau'] = $request->ngaybatdau;
            $dich['ngayketthuc'] = $request->ngayketthuc;

            CatrucNhanvien::create($dich);
        }

        return redirect()->route('nhanviens.index')->with('success', 'Ca truc nhan vien has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CatrucNhanvien  $catruc_nhanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy(CatrucNhanvien $catruc_nhanvien)
    {
        $catruc_nhanvien->delete();
        return redirect()->route('nhanviens.index')->with('success', 'Ca truc nhan vien has been deleted successfully');
    }
}
