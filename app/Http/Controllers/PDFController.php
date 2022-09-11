<?php

namespace App\Http\Controllers;

use App\Models\Danhsachdatphong;
use Illuminate\Http\Request;
use App\Models\Datphong;
use App\Models\Phong;
use App\Models\Loaiphong;
use App\Models\Khachhang;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Log;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateInvoicePDF(Request $request)
    {
        $datphong = Datphong::find($request->id);
        
        $khachhang = Khachhang::find($datphong->khachhangid);
        
        $danhsachdatphongs = Danhsachdatphong::where('datphongid',$datphong->id)->get();
        
        $phongs = collect();
        $loaiphongs = collect();
        $tonggia=0;
        foreach($danhsachdatphongs as $danhsachdatphong){
            $phong = Phong::find($danhsachdatphong->phongid);

            //tim phong va loai phong
            $phongs->add($phong);
            $loaiphong = Loaiphong::find($phong->loaiphongid);
            
            //tinh gia tien
            $songay = strtotime($danhsachdatphong->ngayketthuco) - strtotime($danhsachdatphong->ngaybatdauo);
            $songay = abs(round($songay / 86400));
            $tonggia += $songay*$loaiphong->gia*$datphong->soluong;
        }
        

        $pdf = PDF::loadView('Hoadon', compact('datphong','khachhang', 'tonggia','danhsachdatphongs'));

        return $pdf->stream('nicesnippets.pdf');
    }
}
