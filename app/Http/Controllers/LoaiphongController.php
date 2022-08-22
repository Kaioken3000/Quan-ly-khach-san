<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Loaiphong;

class LoaiphongController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $loaiphongs = Loaiphong::orderBy('ma','asc')->paginate(5);
        return view('loaiphongs.index', compact('loaiphongs'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('loaiphongs.create');
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
            'ma' => 'required|unique:loaiphongs',
            'ten' => 'required',
            'gia' => 'required',
            'mieuTa' => 'required',
        ]);

        Loaiphong::create($request->post());

        return redirect()->route('loaiphongs.index')->with('success','Loaiphong has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\loaiphong  $loaiphong
    * @return \Illuminate\Http\Response
    */
    public function show(Loaiphong $loaiphong)
    {
        return view('loaiphongs.show',compact('loaiphong'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Loaiphong  $loaiphong
    * @return \Illuminate\Http\Response
    */
    public function edit(Loaiphong $loaiphong)
    {
        return view('loaiphongs.edit',compact('loaiphong'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\loaiphong  $loaiphong
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Loaiphong $loaiphong)
    {
        $request->validate([
            'ma' => 'required|unique:loaiphongs',
            'ten' => 'required',
            'gia' => 'required',
            'mieuTa' => 'required',
        ]);
        
        $loaiphong->fill($request->post())->save();

        return redirect()->route('loaiphongs.index')->with('success','Loaiphong Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Loaiphong  $loaiphong
    * @return \Illuminate\Http\Response
    */
    public function destroy(Loaiphong $loaiphong)
    {
        $loaiphong->delete();
        return redirect()->route('loaiphongs.index')->with('success','Loaiphong has been deleted successfully');
    }
}
