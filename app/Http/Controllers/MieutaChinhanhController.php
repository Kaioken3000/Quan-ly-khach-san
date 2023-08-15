<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MieutaChinhanh;

class MieutaChinhanhController extends Controller
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
            'mieutaid' => 'required',
        ]);

        foreach ($request->mieutaid as $mieuta) {
            $dich = array();
            $dich['chinhanhid'] = $request->chinhanhid;
            $dich['mieutaid'] = $mieuta;

            MieutaChinhanh::create($dich);
        }

        return redirect()->back()->withMessage('success', 'Mieu ta chinhanh has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MieutaChinhanh  $mieuta_chinhanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(MieutaChinhanh $mieuta_chinhanh)
    {
        $mieuta_chinhanh->delete();
        return redirect()->back()->withMessage('success', 'Mieu ta chinhanh has been deleted successfully');
    }
}
