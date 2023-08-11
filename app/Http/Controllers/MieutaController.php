<?php

namespace App\Http\Controllers;

use App\Models\Mieuta;
use Illuminate\Http\Request;

class MieutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mieutas = Mieuta::orderBy('ma','desc')->paginate(5);
        $mieutas = Mieuta::get();
        return view('mieutas.index', compact('mieutas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mieutas.create');
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
            'noidung' => 'required',
        ]);

        Mieuta::create($request->post());

        return redirect()->route('mieutas.index')->with('success', 'Mieuta has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mieuta  $mieuta
     * @return \Illuminate\Http\Response
     */
    public function show(Mieuta $mieuta)
    {
        return view('mieutas.show', compact('mieuta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mieuta  $mieuta
     * @return \Illuminate\Http\Response
     */
    public function edit(Mieuta $mieuta)
    {
        return view('mieutas.edit', compact('mieuta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mieuta  $mieuta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mieuta $mieuta)
    {
        $request->validate([
            'noidung' => 'required',
        ]);

        $mieuta->fill($request->post())->save();

        return redirect()->route('mieutas.index')->with('success', 'Mieuta Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mieuta  $mieuta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mieuta $mieuta)
    {
        $mieuta->delete();
        return redirect()->route('mieutas.index')->with('success', 'Mieuta has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $mieutas = Mieuta::where('ma','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('gia','LIKE','%'.$request->search."%")
        //                         ->orWhere('hinh','LIKE','%'.$request->search."%")
        //                         ->orWhere('mieuTa','LIKE','%'.$request->search."%")
        //                         ->orderBy('ma','asc')->paginate(5);
        $mieutas = Mieuta::where('id', 'LIKE', '%' . $request->search . "%")
            ->orWhere('noidung', 'LIKE', '%' . $request->search . "%")
            ->orWhere('hinh', 'LIKE', '%' . $request->search . "%")
            ->get();
        return view('mieutas.search', compact('mieutas'));
    }
}
