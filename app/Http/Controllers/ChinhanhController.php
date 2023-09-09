<?php

namespace App\Http\Controllers;

use App\Models\Hinh;
use App\Models\Mieuta;
use App\Models\Chinhanh;
use App\Models\HinhChinhanh;
use Illuminate\Http\Request;
use App\Models\MieutaChinhanh;

use Illuminate\Support\Facades\Http;

class ChinhanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $chinhanhs = Chinhanh::orderBy('ma','desc')->paginate(5);
        $chinhanhs = Chinhanh::get();
        $hinhs = Hinh::get();
        $mieutas = Mieuta::get();
        return view('chinhanhs.index', compact('chinhanhs', 'hinhs', 'mieutas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hinhs = Hinh::get();
        $mieutas = Mieuta::get();

        // Lay thong tin thanh pho va quan
        $response = Http::get('https://provinces.open-api.vn/api/?depth=2')->json();

        return view('chinhanhs.create', compact('hinhs', 'mieutas', 'response'));
    }

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
            'soluong' => 'required',
            'thanhpho' => 'required',
            'quan' => 'required',
            'sdt' => 'required',

            'mieutaid' => 'required',
            'hinhid' => 'required',
        ]);

        $quan = explode("-", $request->quan);

        $chinhanh = Chinhanh::create([
            'ten' => $request->ten,
            'soluong' => $request->soluong,
            'thanhpho' => $request->thanhpho,
            'quan' => $quan[1],
            'sdt' => $request->sdt,
        ]);

        foreach ($request->mieutaid as $mieuta) {
            $dich = array();
            $dich['chinhanhid'] = $chinhanh->id;
            $dich['mieutaid'] = $mieuta;

            MieutaChinhanh::create($dich);
        }

        foreach ($request->hinhid as $hinh) {
            $dich = array();
            $dich['chinhanhid'] = $chinhanh->id;
            $dich['hinhid'] = $hinh;

            HinhChinhanh::create($dich);
        }

        return redirect()->route('chinhanhs.index')->with('success', 'Chinhanh has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\chinhanh  $chinhanh
     * @return \Illuminate\Http\Response
     */
    public function show(Chinhanh $chinhanh)
    {
        return view('chinhanhs.show', compact('chinhanh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chinhanh  $chinhanh
     * @return \Illuminate\Http\Response
     */
    public function edit(Chinhanh $chinhanh)
    {
        $hinhs = Hinh::get();
        $mieutas = Mieuta::get();
        // Lay thong tin thanh pho va quan
        $response = Http::get('https://provinces.open-api.vn/api/?depth=2')->json();
        return view('chinhanhs.edit', compact('chinhanh', 'hinhs', 'mieutas', 'response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\chinhanh  $chinhanh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chinhanh $chinhanh)
    {
        $request->validate([
            'ten' => 'required',
            'soluong' => 'required',
            'thanhpho' => 'required',
            'quan' => 'required',
            'sdt' => 'required',
        ]);

        $quan = explode("-", $request->quan);

        $chinhanh->fill([
            'ten' => $request->ten,
            'soluong' => $request->soluong,
            'thanhpho' => $request->thanhpho,
            'quan' => $quan[1],
            'sdt' => $request->sdt,
        ])->save();

        // updatde mieu ta phong
        $mieutaDel = MieutaChinhanh::where('chinhanhid', $chinhanh->id);
        $mieutaDel->delete();

        foreach ($request->mieutaid as $mieuta) {
            $dich = array();
            $dich['chinhanhid'] = $chinhanh->id;
            $dich['mieutaid'] = $mieuta;

            MieutaChinhanh::create($dich);
        }

        // updatde hinh phong
        $hinhDel = HinhChinhanh::where('chinhanhid', $chinhanh->id);
        $hinhDel->delete();

        foreach ($request->hinhid as $hinh) {
            $dich = array();
            $dich['chinhanhid'] = $chinhanh->id;
            $dich['hinhid'] = $hinh;

            HinhChinhanh::create($dich);
        }

        return redirect()->route('chinhanhs.index')->with('success', 'Chinhanh Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chinhanh  $chinhanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chinhanh $chinhanh)
    {
        $chinhanh->delete();
        return redirect()->route('chinhanhs.index')->with('success', 'Chinhanh has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $chinhanhs = Chinhanh::where('ma','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('gia','LIKE','%'.$request->search."%")
        //                         ->orWhere('hinh','LIKE','%'.$request->search."%")
        //                         ->orWhere('mieuTa','LIKE','%'.$request->search."%")
        //                         ->orderBy('ma','asc')->paginate(5);
        $chinhanhs = Chinhanh::where('id', 'LIKE', '%' . $request->search . "%")
            ->orWhere('ten', 'LIKE', '%' . $request->search . "%")
            ->orWhere('soluong', 'LIKE', '%' . $request->search . "%")
            ->orWhere('thanhpho', 'LIKE', '%' . $request->search . "%")
            ->orWhere('quan', 'LIKE', '%' . $request->search . "%")
            ->orWhere('sdt', 'LIKE', '%' . $request->search . "%")
            ->get();
        $hinhs = Hinh::get();
        $mieutas = Mieuta::get();
        return view('chinhanhs.search', compact('chinhanhs', 'hinhs', 'mieutas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChinhanhChitiet(Request $request)
    {
        // $chinhanhs = Chinhanh::orderBy('ma','desc')->paginate(5);
        $chinhanhs = Chinhanh::where("id", $request->chinhanhid)->get();
        $hinhs = Hinh::get();
        $mieutas = Mieuta::get();
        return view('chinhanhs.chinhanhChitiet', compact('chinhanhs', 'hinhs', 'mieutas'));
    }
}
