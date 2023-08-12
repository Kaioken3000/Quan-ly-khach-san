<?php

namespace App\Http\Controllers;

use App\Models\Hinh;
use Illuminate\Http\Request;

class HinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $hinhs = Hinh::orderBy('ma','desc')->paginate(5);
        $hinhs = Hinh::get();
        return view('hinhs.index', compact('hinhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hinhs.create');
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
            'vitri' => 'required',
        ]);

        Hinh::create($request->post());

        return redirect()->back()->withMessage('success', 'Hinh has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hinh  $hinh
     * @return \Illuminate\Http\Response
     */
    public function show(Hinh $hinh)
    {
        return view('hinhs.show', compact('hinh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hinh  $hinh
     * @return \Illuminate\Http\Response
     */
    public function edit(Hinh $hinh)
    {
        return view('hinhs.edit', compact('hinh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hinh  $hinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hinh $hinh)
    {
        $request->validate([
            'vitri' => 'required',
        ]);

        $hinh->fill($request->post())->save();

        return redirect()->back()->withMessage('success', 'Hinh Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hinh  $hinh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hinh $hinh)
    {
        $hinh->delete();
        return redirect()->back()->withMessage('success', 'Hinh has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $hinhs = Hinh::where('ma','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('gia','LIKE','%'.$request->search."%")
        //                         ->orWhere('hinh','LIKE','%'.$request->search."%")
        //                         ->orWhere('mieuTa','LIKE','%'.$request->search."%")
        //                         ->orderBy('ma','asc')->paginate(5);
        $hinhs = Hinh::where('id', 'LIKE', '%' . $request->search . "%")
            ->orWhere('vitri', 'LIKE', '%' . $request->search . "%")
            ->orWhere('phongid', 'LIKE', '%' . $request->search . "%")
            ->get();
        return view('hinhs.search', compact('hinhs'));
    }
}
