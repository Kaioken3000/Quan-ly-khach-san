<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catruc;

class CatrucController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $catrucs = Catruc::orderBy('id','asc')->paginate(5);
        $catrucs = Catruc::get();
        return view('catrucs.index', compact('catrucs'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('catrucs.create');
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
            'giobatdau' => 'required',
            'gioketthuc' => 'required',
        ]);

        Catruc::create($request->post());

        return redirect()->route('catrucs.index')->with('success','Catruc has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\catruc  $catruc
    * @return \Illuminate\Http\Response
    */
    public function show(Catruc $catruc)
    {
        return view('catrucs.show',compact('catruc'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Catruc  $catruc
    * @return \Illuminate\Http\Response
    */
    public function edit(Catruc $catruc)
    {
        return view('catrucs.edit',compact('catruc'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\catruc  $catruc
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Catruc $catruc)
    {
        $request->validate([
            'ten' => 'required',
            'giobatdau' => 'required',
            'gioketthuc' => 'required',
        ]);
        
        $catruc->fill($request->post())->save();

        return redirect()->route('catrucs.index')->with('success','Catruc Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Catruc  $catruc
    * @return \Illuminate\Http\Response
    */
    public function destroy(Catruc $catruc)
    {
        $catruc->delete();
        return redirect()->route('catrucs.index')->with('success','Catruc has been deleted successfully');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {
        // $catrucs = Catruc::where('id','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('giobatdau','LIKE','%'.$request->search."%")
        //                         ->orWhere('gioketthuc','LIKE','%'.$request->search."%")
        //                         ->orderBy('id','asc')->paginate(5);
        $catrucs = Catruc::where('id','LIKE','%'.$request->search."%")
                                ->orWhere('ten','LIKE','%'.$request->search."%")
                                ->orWhere('giobatdau','LIKE','%'.$request->search."%")
                                ->orWhere('gioketthuc','LIKE','%'.$request->search."%")
                                ->get();
        return view('catrucs.search', compact('catrucs'));
    }
}
