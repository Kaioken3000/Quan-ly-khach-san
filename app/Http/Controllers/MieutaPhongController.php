<?php

namespace App\Http\Controllers;

use App\Models\MieutaPhong;
use Illuminate\Http\Request;

class MieutaPhongController extends Controller
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
            'mieutaid' => 'required',
        ]);

        foreach ($request->mieutaid as $mieuta) {
            $dich = array();
            $dich['phongid'] = $request->phongid;
            $dich['mieutaid'] = $mieuta;

            MieutaPhong::create($dich);
        }

        return redirect()->route('phongs.index')->with('success', 'Thiet bi phong has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MieutaPhong  $mieuta_phong
     * @return \Illuminate\Http\Response
     */
    public function destroy(MieutaPhong $mieuta_phong)
    {
        $mieuta_phong->delete();
        return redirect()->back()->withMessage('success', 'Thiet bi phong has been deleted successfully');
    }
}
