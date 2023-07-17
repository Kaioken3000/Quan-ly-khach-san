<?php

namespace App\Http\Controllers;

use App\Models\Xuly;
use App\Models\Datphong;
use Illuminate\Http\Request;

class XulyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datphong = Datphong::find($request->id);

        $xulys = array();
        $xulys['ten'] = $datphong->khachhangs->ten;
        $xulys['datphongid'] = $datphong->id;

        if ($datphong->tinhtrangxuly == 1) {
            $datphong->tinhtrangxuly = 0;
            Xuly::where('datphongid', $datphong->id)->delete();
        } else {
            $datphong->tinhtrangxuly = 1;
            Xuly::create($xulys);
        }

        $datphong->save();

        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }
}
