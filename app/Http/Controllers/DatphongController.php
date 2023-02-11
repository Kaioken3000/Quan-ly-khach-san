<?php

namespace App\Http\Controllers;

use App\Models\Danhsachdatphong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Datphong;
use App\Models\Phong;
use App\Models\Loaiphong;
use App\Models\Khachhang;
use App\Models\Nhanphong;
use App\Models\Traphong;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DatphongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        foreach (Auth::user()->roles as $role){
            if($role->name == 'Admin'){
                $datphongs = DB::table('datphongs')
                ->join('khachhangs', 'datphongs.id', '=', 'khachhangs.datphongid')
                ->select('*','datphongs.id as datphongid')
                ->orderBy('datphongs.id', 'desc')->paginate(5);
            }
            else{
                $datphongs = DB::table('datphongs')
                ->join('khachhangs', 'datphongs.id', '=', 'khachhangs.datphongid')
                ->where('huydatphong',0)
                ->select('*','datphongs.id as datphongid')
                ->orderBy('datphongs.id', 'desc')->paginate(5);
            }
        }
        return view('datphongs.index', compact('datphongs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $khachhangs = request()->khachhangs;
        return view('datphongs.create', compact('khachhangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->tinhtrangthanhtoan = 0;
        $request->tinhtrangnhanphong = 0;
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required',
        ]);

        Datphong::create($request->post());

        $dat = Datphong::max('id');

        $khachhangs = Khachhang::find($request->khachhangid);
        $khachhangs->datphongid = $dat;
        $khachhangs->save();

        return redirect()->route('datphongs.index')->with('success', 'Datphong has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\datphong  $datphong
     * @return \Illuminate\Http\Response
     */
    public function show(Datphong $datphong)
    {
        return view('datphongs.show', compact('datphong'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datphong  $datphong
     * @return \Illuminate\Http\Response
     */
    public function edit(Datphong $datphong)
    {
        return view('datphongs.edit', compact('datphong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\datphong  $datphong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datphong $datphong)
    {
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'tinhtrangthanhtoan' => 'required',
            'tinhtrangnhanphong' => 'required'
        ]);

        $datphong->fill($request->post())->save();

        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datphong  $datphong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datphong $datphong)
    {
        $datphong->delete();
        return redirect()->route('datphongs.index')->with('success', 'Datphong has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $datphongs = Datphong::where('ngaydat', 'LIKE', '%' . $request->search . "%")
            ->orWhere('ngaytra', 'LIKE', '%' . $request->search . "%")
            ->orWhere('soluong', 'LIKE', '%' . $request->search . "%")
            ->orWhere('khachhangid', 'LIKE', '%' . $request->search . "%")
            ->orderBy('id', 'asc')->paginate(5);
        return view('datphongs.search', compact('datphongs'));
    }

    /**
     * Thanh toán.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanhtoan(Request $request, Datphong $datphong)
    {
        $datphong = Datphong::find($request->id);
        $datphong->tinhtrangthanhtoan = 1;
        $datphong->tinhtrangnhanphong = 1;

        $traphongs = array();
        $traphongs['ten'] = $datphong->khachhangs->ten;
        $traphongs['datphongid'] = $datphong->id;

        Traphong::create($traphongs);

        $datphong->save();
        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }
    /**
     * Chinh thanh toán.
     *
     * @return \Illuminate\Http\Response
     */
    public function chinhthanhtoan(Request $request, Datphong $datphong)
    {
        $datphong = Datphong::find($request->id);
        $datphong->tinhtrangthanhtoan = 0;
        Traphong::where('datphongid',$datphong->id)->delete();
        $datphong->save();
        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }
    /**
     * Nhan phong.
     *
     * @return \Illuminate\Http\Response
     */
    public function nhanphong(Request $request, Datphong $datphong)
    {
        $datphong = Datphong::find($request->id);
        
        $nhanphongs = array();
        $nhanphongs['ten'] = $datphong->khachhangs->ten;
        $nhanphongs['datphongid'] = $datphong->id;
        
        if ($datphong->tinhtrangnhanphong == 1){
            $datphong->tinhtrangnhanphong = 0;
            Nhanphong::where('datphongid',$datphong->id)->delete();
        }
        else{
            $datphong->tinhtrangnhanphong = 1;
            Nhanphong::create($nhanphongs);
        }

        $datphong->save();

        return redirect()->route('datphongs.index')->with('success', 'Datphong Has Been updated successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kiemtra(Request $request)
    {
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required'
        ]);

        $phongslist = Phong::get();
        $phongs = array();
        $datphongs = Datphong::get();

        if ($datphongs->count() > 0) {
            foreach ($phongslist as $phong) {
                $xacnhan = 0;
                foreach ($datphongs as $datphong) {
                    $danhsachdatphong = Danhsachdatphong::where('datphongid', $datphong->id)->orderBy('id', 'desc')->first();
                    if ($danhsachdatphong->phongid == $phong->so_phong && $request->ngaytra >= $request->ngaydat) {
                        if ($request->ngaydat >= $danhsachdatphong->ngaybatdauo && $request->ngaydat <= $danhsachdatphong->ngayketthuco) {
                            $xacnhan++;
                        } else if ($request->ngaytra >= $danhsachdatphong->ngaybatdauo && $request->ngaytra <= $danhsachdatphong->ngayketthuco) {
                            $xacnhan++;
                        }
                    }
                }
                if ($xacnhan == 0) {
                    array_push($phongs, $phong);
                }
            }
            Log::info($phongs);
        } else {
            $phongs = $phongslist;
        }

        $loaiphongs = Loaiphong::get();
        return view('datphongs.kiemtra', compact('request', 'phongs','loaiphongs'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kiemtra_capnhat(Request $request)
    {
        $dat = Datphong::find($request->datphongid);

        $phongslist = Phong::get();
        $phongs = array();
        foreach ($phongslist as $phong) {
            $xacnhan = 0;
            $danhsachdatphong = Danhsachdatphong::where('phongid', $phong->so_phong)->orderBy('id', 'desc')->first();
            Log::info($danhsachdatphong);
            if ($danhsachdatphong) {
                $datphongs = Datphong::where('id', $danhsachdatphong->datphongid)->get();
                if (count($datphongs) != 0) {
                    foreach ($datphongs as $datphong) {
                        if ($dat->ngaytra >= $dat->ngaydat) {
                            if ($dat->ngaydat < $danhsachdatphong->ngaybatdauo && $dat->ngaytra < $danhsachdatphong->ngaybatdauo) {
                                $xacnhan++;
                            } else if ($dat->ngaydat > $danhsachdatphong->ngaybatdauo && $dat->ngaydat > $danhsachdatphong->ngaybatdauo) {
                                $xacnhan++;
                            }
                        }
                    }
                    if ($xacnhan == count($datphongs)) {
                        array_push($phongs, $phong);
                    }
                } else array_push($phongs, $phong);
            } else array_push($phongs, $phong);
        }
        $loaiphongs = Loaiphong::get();
        return view('datphongs.kiemtra-capnhat', compact('phongs', 'dat','loaiphongs'));
    }
}
