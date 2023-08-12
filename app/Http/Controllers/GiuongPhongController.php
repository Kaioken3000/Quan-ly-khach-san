<?php

namespace App\Http\Controllers;

use App\Models\GiuongPhong;
use Illuminate\Http\Request;

class GiuongPhongController extends Controller
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
            'giuongid' => 'required',
        ]);

        foreach ($request->giuongid as $giuong) {
            $dich = array();
            $dich['phongid'] = $request->phongid;
            $dich['giuongid'] = $giuong;

            GiuongPhong::create($dich);
        }

        return redirect()->route('phongs.index')->with('success', 'Thiet bi phong has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GiuongPhong  $giuong_phong
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiuongPhong $giuong_phong)
    {
        $giuong_phong->delete();
        return redirect()->back()->withMessage('success', 'Thiet bi phong has been deleted successfully');
    }
}
