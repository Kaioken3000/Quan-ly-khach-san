<?php

namespace App\Http\Controllers;

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
        $songay = strtotime($datphong->ngaydat) - strtotime($datphong->ngaytra);
        $songay = abs(round($songay / 86400));
        
        $phong = Phong::find($datphong->phongid);
        $loaiphong = Loaiphong::find($phong->loaiphongid);
        $khachhang = Khachhang::find($datphong->khachhangid);

        $tonggia = $songay*$loaiphong->gia*$loaiphong->soluong;

        $pdf = PDF::loadView('Hoadon', compact('datphong', 'phong', 'loaiphong', 'khachhang', 'songay', 'tonggia'));

        return $pdf->stream('nicesnippets.pdf');
    }
}
