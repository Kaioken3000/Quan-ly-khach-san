<?php

namespace App\Http\Controllers;

use App\Models\Giuong;
use Illuminate\Http\Request;

class GiuongController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $giuongs = Giuong::orderBy('ma','desc')->paginate(5);
        $giuongs = Giuong::get();
        return view('giuongs.index', compact('giuongs'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('giuongs.create');
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
            'kichthuoc' => 'required',
            'donvi' => 'required',
            'hinh' => 'required',
            'mieuTa' => 'required',
            'phongid' => 'required',
        ]);

        Giuong::create($request->post());

        return redirect()->route('giuongs.index')->with('success','Giuong has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\giuong  $giuong
    * @return \Illuminate\Http\Response
    */
    public function show(Giuong $giuong)
    {
        return view('giuongs.show',compact('giuong'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Giuong  $giuong
    * @return \Illuminate\Http\Response
    */
    public function edit(Giuong $giuong)
    {
        return view('giuongs.edit',compact('giuong'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\giuong  $giuong
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Giuong $giuong)
    {
        $request->validate([
            'ten' => 'required',
            'kichthuoc' => 'required',
            'donvi' => 'required',
            'hinh' => 'required',
            'mieuTa' => 'required',
            'phongid' => 'required',
        ]);
        
        $giuong->fill($request->post())->save();

        return redirect()->route('giuongs.index')->with('success','Giuong Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Giuong  $giuong
    * @return \Illuminate\Http\Response
    */
    public function destroy(Giuong $giuong)
    {
        $giuong->delete();
        return redirect()->route('giuongs.index')->with('success','Giuong has been deleted successfully');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {
        // $giuongs = Giuong::where('ma','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('gia','LIKE','%'.$request->search."%")
        //                         ->orWhere('hinh','LIKE','%'.$request->search."%")
        //                         ->orWhere('mieuTa','LIKE','%'.$request->search."%")
        //                         ->orderBy('ma','asc')->paginate(5);
        $giuongs = Giuong::where('id','LIKE','%'.$request->search."%")
                                ->orWhere('ten','LIKE','%'.$request->search."%")
                                ->orWhere('kichthuoc','LIKE','%'.$request->search."%")
                                ->orWhere('donvi','LIKE','%'.$request->search."%")
                                ->orWhere('hinh','LIKE','%'.$request->search."%")
                                ->orWhere('mieuTa','LIKE','%'.$request->search."%")
                                ->orWhere('phongid','LIKE','%'.$request->search."%")
                                ->get();
        return view('giuongs.search', compact('giuongs'));
    }
}
