<?php

namespace App\Http\Controllers;

use App\Models\Dichvu;
use App\Models\Khachhang;
use Illuminate\Http\Request;
use App\Models\DichvuDatphong;
use Illuminate\Support\Facades\Log;

class DichvuDatphongController extends Controller
{
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'datphongid' => 'required',
            'dichvuid' => 'required',
        ]);

        foreach($request->dichvuid as $dichvu){
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

        return redirect()->back()->withMessage('success','Dich vu dat phong has been created successfully.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\DichvuDatphong  $dichvu_datphong
    * @return \Illuminate\Http\Response
    */
    public function destroy(DichvuDatphong $dichvu_datphong)
    {
        $dichvu_datphong->delete();
        return redirect()->back()->withMessage('success','Dich vu dat phong has been deleted successfully');
    }
}
