<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nhanphong;

class NhanphongController extends Controller
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
            'ten' => 'required',
            'datphongid' => 'required',
        ]);

        Nhanphong::create($request->post());    

        return redirect()->route('datphongs.index')->with('success','Nhận phòng successfully.');
    }
}
