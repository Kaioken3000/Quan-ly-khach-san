<?php

namespace App\Http\Controllers;

use App\Models\Datphong;
use App\Models\Huydatphong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HuydatphongController extends Controller
{
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Datphong $datphong)
    {
        $datphong = Datphong::find($datphong->id);

        $huydatphongs = array();
        $huydatphongs['ten'] = Auth::user()->username;
        $huydatphongs['userid'] = Auth::user()->id;
        $huydatphongs['datphongid'] = $datphong->id;
        
        if($datphong->huydatphong == 0){
            $datphong->huydatphong = 1;
            Huydatphong::create($huydatphongs);
        }
        
        else {
            $datphong->huydatphong = 0;
            Huydatphong::where('datphongid',$datphong->id)->delete();
        }
        $datphong->save();

        return redirect()->route('datphongs.index')->with('success','Huỷ đặt phòng successfully.');
    }
}
