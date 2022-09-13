<?php

namespace App\Http\Controllers;

use App\Models\Danhsachdatphong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Datphong;
use App\Models\Phong;
use App\Models\Loaiphong;

class BaocaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datphongs = Datphong::where('tinhtrangthanhtoan',1)->get();
        $tonggiatatca=0;
        foreach($datphongs as $datphong){
            $danhsachdatphongs = Danhsachdatphong::where('datphongid',$datphong->id)->get();
            foreach($danhsachdatphongs as $danhsachdatphong){
                //tim phong va loai phong
                $phong = Phong::find($danhsachdatphong->phongid);
                $loaiphong = Loaiphong::find($phong->loaiphongid);
    
                //tinh gia tien
                $songay = strtotime($danhsachdatphong->ngayketthuco) - strtotime($danhsachdatphong->ngaybatdauo);
                $songay = abs(round($songay / 86400));
                $tonggiatatca += $songay*$loaiphong->gia*$datphong->soluong;
            }
        }
        Log::info($datphongs);
        Log::info($tonggiatatca);
        return view('baocaos.index', compact('datphongs','tonggiatatca'));
    }
}
