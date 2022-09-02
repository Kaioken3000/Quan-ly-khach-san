<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Datphong;
use App\Models\Phong;
use App\Models\Khachhang;

class DatphongController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $datphongs = Datphong::orderBy('ngaydat','asc')->paginate(5);
        return view('datphongs.index', compact('datphongs'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        return view('datphongs.create', compact('request'));
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
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required',
            'khachhangid' => 'required',
        ]);

        Datphong::create($request->post());

        return redirect()->route('datphongs.index')->with('success','Datphong has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\datphong  $datphong
    * @return \Illuminate\Http\Response
    */
    public function show(Datphong $datphong)
    {
        return view('datphongs.show',compact('datphong'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Datphong  $datphong
    * @return \Illuminate\Http\Response
    */
    public function edit(Datphong $datphong)
    {
        return view('datphongs.edit',compact('datphong'));
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
            'phongid' => 'required',
            'khachhangid' => 'required',
        ]);
        
        $datphong->fill($request->post())->save();

        return redirect()->route('datphongs.index')->with('success','Datphong Has Been updated successfully');
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
        return redirect()->route('datphongs.index')->with('success','Datphong has been deleted successfully');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {
        $datphongs = Datphong::where('ngaydat','LIKE','%'.$request->search."%")
                                ->orWhere('ngaytra','LIKE','%'.$request->search."%")
                                ->orWhere('soluong','LIKE','%'.$request->search."%")
                                ->orWhere('phongid','LIKE','%'.$request->search."%")
                                ->orWhere('khachhangid','LIKE','%'.$request->search."%")
                                ->orderBy('id','asc')->paginate(5);
        return view('datphongs.search', compact('datphongs'));
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
        foreach($phongslist as $phong){
            $xacnhan=0;
            $datphongs = Datphong::where('phongid',$phong->so_phong)->get();
            Log::info($datphongs);
            if(count($datphongs)!=0){
                foreach($datphongs as $datphong){
                    if($datphong->phongid == $phong->so_phong){
                        if($request->ngaytra >= $request->ngaydat){
                            if($request->ngaydat < $datphong->ngaydat){
                                if($request->ngaytra < $datphong->ngaydat){
                                    $xacnhan++;
                                }
                            }
                            else if($request->ngaydat > $datphong->ngaydat){
                                if($request->ngaydat > $datphong->ngaytra){
                                    $xacnhan++;
                                }
                            }
                        }
                    }
                }
                if($xacnhan == count($datphongs)){
                    array_push($phongs, $phong);
                }
            }   
            else array_push($phongs, $phong);
        }
        return view('datphongs.kiemtra',compact('request','phongs'));
    }
    /**
     * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function kiemtra_capnhat(Request $request)
    {
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required'
        ]);

        $phongslist = Phong::get();
        $phongs = array();
        foreach($phongslist as $phong){
            $xacnhan=0;
            $datphongs = Datphong::where('phongid',$phong->so_phong)->get();
            Log::info($datphongs);
            if(count($datphongs)!=0){
                foreach($datphongs as $datphong){
                    if($datphong->phongid == $phong->so_phong){
                        if($request->ngaytra >= $request->ngaydat){
                            if($request->ngaydat < $datphong->ngaydat){
                                if($request->ngaytra < $datphong->ngaydat){
                                    $xacnhan++;
                                }
                            }
                            else if($request->ngaydat > $datphong->ngaydat){
                                if($request->ngaydat > $datphong->ngaytra){
                                    $xacnhan++;
                                }
                            }
                        }
                    }
                }
                if($xacnhan == count($datphongs)){
                    array_push($phongs, $phong);
                }
            }   
            else array_push($phongs, $phong);
        }
        return view('datphongs.kiemtra-capnhat',compact('request','phongs'));
    }
}
