<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Khachhang;

class KhachhangController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $khachhangs = Khachhang::orderBy('id','asc')->paginate(5);
        return view('khachhangs.index', compact('khachhangs'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('khachhangs.create');
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
            'sdt' => 'required',
            'email' => 'required',
        ]);

        Khachhang::create($request->post());

        $khachhangs = Khachhang::max('id');

        // return redirect()->route('khachhangs.index')->with('success','Khachhang has been created successfully.');
        return view('datphongs.create', compact('khachhangs'));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\khachhang  $khachhang
    * @return \Illuminate\Http\Response
    */
    public function show(Khachhang $khachhang)
    {
        return view('khachhangs.show',compact('khachhang'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Khachhang  $khachhang
    * @return \Illuminate\Http\Response
    */
    public function edit(Khachhang $khachhang)
    {
        return view('khachhangs.edit',compact('khachhang'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\khachhang  $khachhang
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Khachhang $khachhang)
    {
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required',
            'email' => 'required',
        ]);
        
        $khachhang->fill($request->post())->save();

        return redirect()->route('khachhangs.index')->with('success','Khachhang Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Khachhang  $khachhang
    * @return \Illuminate\Http\Response
    */
    public function destroy(Khachhang $khachhang)
    {
        $khachhang->delete();
        return redirect()->route('khachhangs.index')->with('success','Khachhang has been deleted successfully');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {
        $khachhangs = Khachhang::where('ten','LIKE','%'.$request->search."%")
                                ->orWhere('sdt','LIKE','%'.$request->search."%")
                                ->orWhere('email','LIKE','%'.$request->search."%")
                                ->orWhere('id','LIKE','%'.$request->search."%")
                                ->orderBy('id','asc')->paginate(5);
        return view('khachhangs.search', compact('khachhangs'));
    }
}
