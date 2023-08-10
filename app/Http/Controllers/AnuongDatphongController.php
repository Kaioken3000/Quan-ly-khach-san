<?php

namespace App\Http\Controllers;

use App\Models\Anuong;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\AnuongDatphong;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class AnuongDatphongController extends Controller
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
            'datphongid' => 'required',
            'anuongid' => 'required',
            'soluong' => 'required',
        ]);

        Log::info($request);
        $temp = 0;
        foreach ($request->anuongid as $anuong) {
            $dich = array();
            $dich['datphongid'] = $request->datphongid;
            $dich['anuongid'] = $anuong;

            // lay so luong trong kho de cap nhat
            $soluongtrongkho = Anuong::where('id', $anuong)->first();
            $soluongconlai = $soluongtrongkho->soluong;

            Log::info($temp . "oldtmep");
            for ($i = $temp; $i < count($request->soluong); $i++) {
                if ($request->soluong[$i] != null) {
                    $dich['soluong'] = $request->soluong[$i];
                    $temp = $i;
                    $temp++;
                    Log::info($temp . "temp");
                    $soluongconlai = $soluongtrongkho->soluong - $request->soluong[$i];
                    break;
                }
            }
            Log::info($dich);

            AnuongDatphong::create($dich);

            //cap nhat so luong trong kho nua

            Anuong::where('id', $anuong)->update(array('soluong' => $soluongconlai));
        }

        $url = "http://khachsan-b1910261.local";
        if (!str_contains(strval(app('url')->current()), $url)) {
            return redirect()->route('datphongs.index')->with('success', 'Dich vu dat phong has been created successfully.');
        } else {
            return redirect()->route('client.danhsachdatphong')->with('success', 'Dich vu dat phong has been created successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnuongDatphong  $anuong_datphong
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnuongDatphong $anuong_datphong)
    {
        $anuong_datphong->delete();
        return redirect()->back()->withMessage('success', 'Dich vu dat phong has been deleted successfully');
    }
}
