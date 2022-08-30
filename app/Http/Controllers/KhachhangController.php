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
        $khachhangs = Khachhang::orderBy('ma','asc')->paginate(5);
        return view('khachhangs.index', compact('khachhangs'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // return view('khachhangs.create');
        return redirect('client/index');
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
            'ngayvao' => 'required',
            'ngayra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required'
        ]);


        Khachhang::create($request->post());

        // return redirect()->route('khachhangs.index')->with('success','Khachhang has been created successfully.');
        return redirect('client/index');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\loaiphong  $loaiphong
    * @return \Illuminate\Http\Response
    */
    public function show(Khachhang $loaiphong)
    {
        return view('khachhangs.show',compact('loaiphong'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Khachhang  $loaiphong
    * @return \Illuminate\Http\Response
    */
    public function edit(Khachhang $loaiphong)
    {
        return view('khachhangs.edit',compact('loaiphong'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\loaiphong  $loaiphong
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Khachhang $loaiphong)
    {
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required',
            'email' => 'required',
            'ngayvao' => 'required',
            'ngayra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required'
        ]);
        
        $loaiphong->fill($request->post())->save();

        return redirect()->route('khachhangs.index')->with('success','Khachhang Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Khachhang  $loaiphong
    * @return \Illuminate\Http\Response
    */
    public function destroy(Khachhang $loaiphong)
    {
        $loaiphong->delete();
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
                                ->orWhere('ngayvao','LIKE','%'.$request->search."%")
                                ->orWhere('ngayra','LIKE','%'.$request->search."%")
                                ->orWhere('soluong','LIKE','%'.$request->search."%")
                                ->orWhere('phongid','LIKE','%'.$request->search."%")
                                ->get();
        return view('khachhangs.search', compact('khachhangs'));
    }
}
