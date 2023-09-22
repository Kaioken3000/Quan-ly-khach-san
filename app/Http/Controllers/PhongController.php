<?php

namespace App\Http\Controllers;

use App\Models\Hinh;
use App\Models\Phong;
use App\Models\Giuong;
use App\Models\Mieuta;
use App\Models\Thietbi;
use App\Models\Chinhanh;
use App\Models\HinhPhong;
use App\Models\Loaiphong;
use App\Models\GiuongPhong;
use App\Models\MieutaPhong;
use App\Models\Virtualtour;
use App\Models\ThietbiPhong;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\VirtualtourPhong;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $phongs = DB::table('phongs')
        // ->join('loaiphongs', 'phongs.loaiphongid', '=', 'loaiphongs.ma')->select('*')
        // ->orderBy('phongs.so_phong', 'desc')->paginate(5);
        // $phongs = Phong::orderBy('so_phong','desc')->paginate(5);
        $phongs = Phong::get();
        $loaiphongs = Loaiphong::all();
        $hinhs = Hinh::all();
        $thietbis = Thietbi::all();
        $giuongs = Giuong::all();
        $mieutas = Mieuta::all();
        $chinhanhs = Chinhanh::all();
        $virtualtours = Virtualtour::all();
        return view('phongs.index', compact('phongs', 'loaiphongs', 'hinhs', 'thietbis', 'giuongs', 'mieutas', 'chinhanhs', 'virtualtours'));
    }

    /**
     * Show the form for creating a new resource.09ok
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaiphongs = Loaiphong::all();
        $thietbis = Thietbi::all();
        $giuongs = Giuong::all();
        $mieutas = Mieuta::all();
        $hinhs = Hinh::all();
        $virtualtours = Virtualtour::all();

        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User")
            if (isset(Auth::user()->nhanviens)) {
                $chinhanhs = Chinhanh::where("id", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
            } else $nhanvien = [];
        if ($roleName == "MainAdmin") {
            $chinhanhs = Chinhanh::get();
        }
        return view('phongs.create', compact('loaiphongs', 'thietbis', 'giuongs', 'mieutas', 'hinhs', 'chinhanhs', 'virtualtours'));
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
            'so_phong' => 'required|unique:phongs',
            'loaiphongid' => 'required',
            'chinhanhid' => 'required',

            'thietbiid' => 'required',
            'giuongid' => 'required',
            'mieutaid' => 'required',
            'hinhid' => 'required',
            'virtualtourid' => 'required',
        ]);

        $phong = Phong::create($request->post());

        foreach ($request->thietbiid as $thietbi) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['thietbiid'] = $thietbi;

            ThietbiPhong::create($dich);
        }

        foreach ($request->giuongid as $giuong) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['giuongid'] = $giuong;

            GiuongPhong::create($dich);
        }

        foreach ($request->mieutaid as $mieuta) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['mieutaid'] = $mieuta;

            MieutaPhong::create($dich);
        }

        foreach ($request->hinhid as $hinh) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['hinhid'] = $hinh;

            HinhPhong::create($dich);
        }
        foreach ($request->virtualtourid as $virtualtour) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['virtualtourid'] = $virtualtour;

            VirtualtourPhong::create($dich);
        }

        return redirect()->route('phongs.index')->with('success', 'Phong has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\phong  $phong
     * @return \Illuminate\Http\Response
     */
    public function show(Phong $phong)
    {
        return view('phongs.show', compact('phong'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phong  $phong
     * @return \Illuminate\Http\Response
     */
    public function edit(Phong $phong)
    {
        $loaiphongs = Loaiphong::all();
        $thietbis = Thietbi::all();
        $giuongs = Giuong::all();
        $mieutas = Mieuta::all();
        $hinhs = Hinh::all();
        $virtualtours = Virtualtour::all();

        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User")
            if (isset(Auth::user()->nhanviens)) {
                $chinhanhs = Chinhanh::where("id", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
            } else $nhanvien = [];
        if ($roleName == "MainAdmin") {
            $chinhanhs = Chinhanh::get();
        }
        return view('phongs.edit', compact('phong', 'loaiphongs', 'thietbis', 'giuongs', 'mieutas', 'hinhs', 'chinhanhs', 'virtualtours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\phong  $phong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phong $phong)
    {
        $request->validate([
            'so_phong' => [
                'required',
                Rule::unique('phongs')->ignore($phong->so_phong, 'so_phong')
            ],
            'loaiphongid' => 'required',
            'chinhanhid' => 'required',

            'thietbiid' => 'required',
            'giuongid' => 'required',
            'mieutaid' => 'required',
            'hinhid' => 'required',
            'virtualtourid' => 'required',
        ]);

        $phong->fill($request->post())->save();

        // updatde thiet bi phong
        $thietbiDel = ThietbiPhong::where('phongid', $phong->so_phong);
        $thietbiDel->delete();

        foreach ($request->thietbiid as $thietbi) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['thietbiid'] = $thietbi;

            ThietbiPhong::create($dich);
        }

        // updatde giuong phong
        $giuongDel = GiuongPhong::where('phongid', $phong->so_phong);
        $giuongDel->delete();

        foreach ($request->giuongid as $giuong) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['giuongid'] = $giuong;

            GiuongPhong::create($dich);
        }

        // updatde mieu ta phong
        $mieutaDel = MieutaPhong::where('phongid', $phong->so_phong);
        $mieutaDel->delete();

        foreach ($request->mieutaid as $mieuta) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['mieutaid'] = $mieuta;

            MieutaPhong::create($dich);
        }

        // updatde hinh phong
        $hinhDel = HinhPhong::where('phongid', $phong->so_phong);
        $hinhDel->delete();

        foreach ($request->hinhid as $hinh) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['hinhid'] = $hinh;

            HinhPhong::create($dich);
        }

        // updatde virtualtour phong
        $virtualtourDel = VirtualtourPhong::where('phongid', $phong->so_phong);
        $virtualtourDel->delete();

        foreach ($request->virtualtourid as $virtualtour) {
            $dich = array();
            $dich['phongid'] = $phong->so_phong;
            $dich['virtualtourid'] = $virtualtour;

            VirtualtourPhong::create($dich);
        }

        return redirect()->route('phongs.index')->with('success', 'Phong Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phong  $phong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phong $phong)
    {
        $phong->delete();
        return redirect()->route('phongs.index')->with('success', 'Phong has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $phongs = Phong::where('so_phong', 'LIKE', '%' . $request->search . "%")
        //                 ->orderBy('so_phong','asc')->paginate(5);
        $phongs = Phong::where('so_phong', 'LIKE', '%' . $request->search . "%")
            ->get();
        $loaiphongs = Loaiphong::all();
        return view('phongs.search', compact('phongs', 'loaiphongs'));
    }

    public function roomDetail(Request $request)
    {
        // $phong = Phong::where("so_phong", $request->phongid)->first();

        $phongs = Phong::where("so_phong", $request->phongid)->get();
        $loaiphongs = Loaiphong::all();
        $hinhs = Hinh::all();
        $thietbis = Thietbi::all();
        $giuongs = Giuong::all();
        $mieutas = Mieuta::all();
        $chinhanhs = Chinhanh::all();
        $virtualtours = Virtualtour::all();

        return view('phongs.roomDetail', compact('phongs', 'loaiphongs', 'hinhs', 'thietbis', 'giuongs', 'mieutas', 'chinhanhs', 'virtualtours'));
    }
}
