<?php

namespace App\Http\Controllers;

use App\Models\Datphong;
use App\Models\Nhanphong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NhanphongController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Datphong $datphong)
    {
        $datphong = Datphong::find($request->id);

        $nhanphongs = array();

        $nhanphongs['ten'] = Auth::user()->username;
        $nhanphongs['userid'] = Auth::user()->id;
        $nhanphongs['datphongid'] = $datphong->id;

        if ($datphong->tinhtrangnhanphong == 1) {
            $datphong->tinhtrangnhanphong = 0;
            Nhanphong::where('datphongid', $datphong->id)->delete();
        } else {
            $datphong->tinhtrangnhanphong = 1;
            Nhanphong::create($nhanphongs);
        }

        $datphong->save();

        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }
}
