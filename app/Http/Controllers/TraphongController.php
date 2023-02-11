<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traphong;

class TraphongController extends Controller
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

        Traphong::create($request->post());    

        return redirect()->route('datphongs.index')->with('success','Trả phòng successfully.');
    }
}
