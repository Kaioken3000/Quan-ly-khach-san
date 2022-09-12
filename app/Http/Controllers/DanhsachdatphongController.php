<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Danhsachdatphong;
use App\Models\Datphong;

class DanhsachdatphongController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        $datphong = Datphong::find($request->datphongid);

        
        //get current date
        $today = date('y-m-d h:i:s');
        $todaysub = date('Y-m-d', strtotime('-1 day', strtotime($today)));

        //cap nhap ngay ket thuc cho phong truoc do
        $danhsachdatphong = Danhsachdatphong::orderBy('id','desc')->first();
        $danhsachdatphong->ngayketthuco = $todaysub;
        $danhsachdatphong->save();

        $phongid = $request->phongid;
        $datphongid = $datphong->id;
        $ngaybatdauo = $today;
        $ngayketthuco = $datphong->ngaytra;

        Danhsachdatphong::create([
            'phongid' => $phongid,
            'datphongid' => $datphongid,
            'ngaybatdauo' => $ngaybatdauo,
            'ngayketthuco' => $ngayketthuco,
        ]);

        return redirect()->route('datphongs.index')->with('success', 'Datphong has been created successfully.');
    }

    public function index(Request $request){
        $danhsachdatphongs = Danhsachdatphong::where("datphongid",$request->datphongid)->get();
        return view('danhsachdatphongs.index', compact('danhsachdatphongs'));
    }
}