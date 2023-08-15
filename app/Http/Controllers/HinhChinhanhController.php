<?php

namespace App\Http\Controllers;

use App\Models\HinhChinhanh;
use Illuminate\Http\Request;

class HinhChinhanhController extends Controller
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
            'chinhanhid' => 'required',
            'hinhid' => 'required',
        ]);

        foreach ($request->hinhid as $hinh) {
            $dich = array();
            $dich['chinhanhid'] = $request->chinhanhid;
            $dich['hinhid'] = $hinh;

            HinhChinhanh::create($dich);
        }

        return redirect()->back()->withMessage('success', 'Hinh chinhanh has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HinhChinhanh  $hinh_chinhanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(HinhChinhanh $hinh_chinhanh)
    {
        $hinh_chinhanh->delete();
        return redirect()->back()->withMessage('success', 'Hinh chinhanh has been deleted successfully');
    }
}
