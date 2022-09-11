<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Models\Nhanvien;

class NhanvienController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $nhanviens = Nhanvien::orderBy('ma','asc')->paginate(5);
        return view('nhanviens.index', compact('nhanviens'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('nhanviens.create');
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
            'ma' => 'required|unique:nhanviens',
            'ten' => 'required',
            'luong' => 'required',
        ]);

        Nhanvien::create($request->post());

        return redirect()->route('nhanviens.index')->with('success','Nhanvien has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\nhanvien  $nhanvien
    * @return \Illuminate\Http\Response
    */
    public function show(Nhanvien $nhanvien)
    {
        return view('nhanviens.show',compact('nhanvien'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Nhanvien  $nhanvien
    * @return \Illuminate\Http\Response
    */
    public function edit(Nhanvien $nhanvien)
    {
        return view('nhanviens.edit',compact('nhanvien'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\nhanvien  $nhanvien
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Nhanvien $nhanvien)
    {
        $request->validate([
            'ma' => ['required',
                    Rule::unique('nhanviens')->ignore($nhanvien->ma, 'ma')],
            'ten' => 'required',
            'luong' => 'required',
        ]);
        
        $nhanvien->fill($request->post())->save();

        return redirect()->route('nhanviens.index')->with('success','Nhanvien Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Nhanvien  $nhanvien
    * @return \Illuminate\Http\Response
    */
    public function destroy(Nhanvien $nhanvien)
    {
        $nhanvien->delete();
        return redirect()->route('nhanviens.index')->with('success','Nhanvien has been deleted successfully');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {
        $nhanviens = Nhanvien::where('ma','LIKE','%'.$request->search."%")
                                ->orWhere('ten','LIKE','%'.$request->search."%")
                                ->orWhere('luong','LIKE','%'.$request->search."%")
                                ->orderBy('ma','asc')->paginate(5);
        return view('nhanviens.search', compact('nhanviens'));
    }
}