<?php

namespace App\Http\Controllers;

use App\Models\HinhPhong;
use Illuminate\Http\Request;

class HinhPhongController extends Controller
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
            'phongid' => 'required',
            'hinhid' => 'required',
        ]);

        foreach ($request->hinhid as $hinh) {
            $dich = array();
            $dich['phongid'] = $request->phongid;
            $dich['hinhid'] = $hinh;

            HinhPhong::create($dich);
        }

        return redirect()->back()->withMessage('success', 'Hinh phong has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HinhPhong  $hinh_phong
     * @return \Illuminate\Http\Response
     */
    public function destroy(HinhPhong $hinh_phong)
    {
        $hinh_phong->delete();
        return redirect()->back()->withMessage('success', 'Hinh phong has been deleted successfully');
    }
}
