<?php

namespace App\Http\Controllers;

use App\Models\ThietbiPhong;
use Illuminate\Http\Request;

class ThietbiPhongController extends Controller
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
            'thietbiid' => 'required',
        ]);

        foreach ($request->thietbiid as $thietbi) {
            $dich = array();
            $dich['phongid'] = $request->phongid;
            $dich['thietbiid'] = $thietbi;

            ThietbiPhong::create($dich);
        }

        return redirect()->back()->withMessage('success', 'Thiet bi phong has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ThietbiPhong  $thietbi_phong
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThietbiPhong $thietbi_phong)
    {
        $thietbi_phong->delete();
        return redirect()->back()->withMessage('success', 'Thiet bi phong has been deleted successfully');
    }
}
