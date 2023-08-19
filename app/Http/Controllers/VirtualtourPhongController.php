<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VirtualtourPhong;

class VirtualtourPhongController extends Controller
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
            'virtualtourid' => 'required',
        ]);

        foreach ($request->virtualtourid as $virtualtour) {
            $dich = array();
            $dich['phongid'] = $request->phongid;
            $dich['virtualtourid'] = $virtualtour;

            VirtualtourPhong::create($dich);
        }

        return redirect()->back()->withMessage('success', 'Virtualtour phong has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VirtualtourPhong  $virtualtour_phong
     * @return \Illuminate\Http\Response
     */
    public function destroy(VirtualtourPhong $virtualtour_phong)
    {
        $virtualtour_phong->delete();
        return redirect()->back()->withMessage('success', 'Virtualtour phong has been deleted successfully');
    }
}
