<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\DichvuDatphong;

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
        }

        return redirect()->route('datphongs.index')->with('success','Dich vu dat phong has been created successfully.');
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
        return redirect()->route('datphongs.index')->with('success','Loaiphong has been deleted successfully');
    }
}