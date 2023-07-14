<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dichvu;

class DichvuController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $dichvus = Dichvu::orderBy('id','asc')->paginate(5);
        $dichvus = Dichvu::get();
        return view('dichvus.index', compact('dichvus'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('dichvus.create');
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
            'giatien' => 'required',
            'donvi' => 'required',
        ]);

        Dichvu::create($request->post());

        return redirect()->route('dichvus.index')->with('success','Dichvu has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\dichvu  $dichvu
    * @return \Illuminate\Http\Response
    */
    public function show(Dichvu $dichvu)
    {
        return view('dichvus.show',compact('dichvu'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Dichvu  $dichvu
    * @return \Illuminate\Http\Response
    */
    public function edit(Dichvu $dichvu)
    {
        return view('dichvus.edit',compact('dichvu'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\dichvu  $dichvu
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Dichvu $dichvu)
    {
        $request->validate([
            'ten' => 'required',
            'giatien' => 'required',
            'donvi' => 'required',
        ]);
        
        $dichvu->fill($request->post())->save();

        return redirect()->route('dichvus.index')->with('success','Dichvu Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Dichvu  $dichvu
    * @return \Illuminate\Http\Response
    */
    public function destroy(Dichvu $dichvu)
    {
        $dichvu->delete();
        return redirect()->route('dichvus.index')->with('success','Dichvu has been deleted successfully');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {
        // $dichvus = Dichvu::where('id','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('giatien','LIKE','%'.$request->search."%")
        //                         ->orWhere('donvi','LIKE','%'.$request->search."%")
        //                         ->orderBy('id','asc')->paginate(5);
        $dichvus = Dichvu::where('id','LIKE','%'.$request->search."%")
                                ->orWhere('ten','LIKE','%'.$request->search."%")
                                ->orWhere('giatien','LIKE','%'.$request->search."%")
                                ->orWhere('donvi','LIKE','%'.$request->search."%")
                                ->get();
        return view('dichvus.search', compact('dichvus'));
    }
}
