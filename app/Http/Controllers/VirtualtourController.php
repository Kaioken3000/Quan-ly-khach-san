<?php

namespace App\Http\Controllers;

use App\Models\Virtualtour;
use Illuminate\Http\Request;

class VirtualtourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $virtualtours = Virtualtour::orderBy('ma','desc')->paginate(5);
        $virtualtours = Virtualtour::get();
        return view('virtualtours.index', compact('virtualtours'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPreview(Request $request)
    {
        $virtualtour = Virtualtour::where("id", $request->virtualtourid)->first();
        return view('virtualtours.preview', compact('virtualtour'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('virtualtours.create');
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
            'hinh' => 'required',
        ]);

        foreach ($request->hinh as $hinh) {
            Virtualtour::create(['hinh' => $hinh]);
        }

        return redirect()->back()->withMessage('success', 'Virtualtour has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\virtualtour  $virtualtour
     * @return \Illuminate\Http\Response
     */
    public function show(Virtualtour $virtualtour)
    {
        return view('virtualtours.show', compact('virtualtour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Virtualtour  $virtualtour
     * @return \Illuminate\Http\Response
     */
    public function edit(Virtualtour $virtualtour)
    {
        return view('virtualtours.edit', compact('virtualtour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\virtualtour  $virtualtour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Virtualtour $virtualtour)
    {
        $request->validate([
            'hinh' => 'required',
        ]);

        $virtualtour->fill($request->post())->save();

        return redirect()->back()->withMessage('success', 'Virtualtour Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Virtualtour  $virtualtour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Virtualtour $virtualtour)
    {
        $virtualtour->delete();
        return redirect()->back()->withMessage('success', 'Virtualtour has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $virtualtours = Virtualtour::where('ma','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('gia','LIKE','%'.$request->search."%")
        //                         ->orWhere('virtualtour','LIKE','%'.$request->search."%")
        //                         ->orWhere('mieuTa','LIKE','%'.$request->search."%")
        //                         ->orderBy('ma','asc')->paginate(5);
        $virtualtours = Virtualtour::where('id', 'LIKE', '%' . $request->search . "%")
            ->orWhere('hinh', 'LIKE', '%' . $request->search . "%")
            ->orWhere('phongid', 'LIKE', '%' . $request->search . "%")
            ->get();
        return view('virtualtours.search', compact('virtualtours'));
    }
}
