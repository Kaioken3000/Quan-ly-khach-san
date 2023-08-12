<?php

namespace App\Http\Controllers;

use App\Models\Thietbi;
use Illuminate\Http\Request;

class ThietbiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $thietbis = Thietbi::orderBy('ma','desc')->paginate(5);
        $thietbis = Thietbi::get();
        return view('thietbis.index', compact('thietbis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thietbis.create');
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
            'hinh' => 'required',
            'gia' => 'required',
            'mieuTa' => 'required',
        ]);

        Thietbi::create($request->post());

        return redirect()->back()->withMessage('success', 'Thietbi has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\thietbi  $thietbi
     * @return \Illuminate\Http\Response
     */
    public function show(Thietbi $thietbi)
    {
        return view('thietbis.show', compact('thietbi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thietbi  $thietbi
     * @return \Illuminate\Http\Response
     */
    public function edit(Thietbi $thietbi)
    {
        return view('thietbis.edit', compact('thietbi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\thietbi  $thietbi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thietbi $thietbi)
    {
        $request->validate([
            'ten' => 'required',
            'gia' => 'required',
            'mieuTa' => 'required',
        ]);

        if ($request->hinh) {
            $thietbi->fill($request->post())->save();
        } else {
            $thietbi->fill([
                'ten' => $request->ten,
                'gia' => $request->gia,
                'mieuTa' => $request->mieuTa,
            ])->save();
        }

        return redirect()->back()->withMessage('success', 'Thietbi Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thietbi  $thietbi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thietbi $thietbi)
    {
        $thietbi->delete();
        return redirect()->back()->withMessage('success', 'Thietbi has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $thietbis = Thietbi::where('ma','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('gia','LIKE','%'.$request->search."%")
        //                         ->orWhere('hinh','LIKE','%'.$request->search."%")
        //                         ->orWhere('mieuTa','LIKE','%'.$request->search."%")
        //                         ->orderBy('ma','asc')->paginate(5);
        $thietbis = Thietbi::where('id', 'LIKE', '%' . $request->search . "%")
            ->orWhere('ten', 'LIKE', '%' . $request->search . "%")
            ->orWhere('hinh', 'LIKE', '%' . $request->search . "%")
            ->orWhere('mieuTa', 'LIKE', '%' . $request->search . "%")
            ->orWhere('phongid', 'LIKE', '%' . $request->search . "%")
            ->get();
        return view('thietbis.search', compact('thietbis'));
    }
}
