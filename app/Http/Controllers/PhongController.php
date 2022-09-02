<?php

namespace App\Http\Controllers;

use App\Models\Loaiphong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Models\Phong;

class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phongs = Phong::orderBy('so_phong', 'asc')->paginate(4);
        $loaiphongs = Loaiphong::all();
        return view('phongs.index', compact('phongs'), compact('loaiphongs'));
    }

    /**
     * Show the form for creating a new resource.09ok
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaiphongs = Loaiphong::all();
        return view('phongs.create', compact('loaiphongs'));
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
            'so_phong' => 'required|unique:phongs',
            'loaiphongid' => 'required'
        ]);

        Phong::create($request->post());

        return redirect()->route('phongs.index')->with('success', 'Phong has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\phong  $phong
     * @return \Illuminate\Http\Response
     */
    public function show(Phong $phong)
    {
        return view('phongs.show', compact('phong'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phong  $phong
     * @return \Illuminate\Http\Response
     */
    public function edit(Phong $phong)
    {
        $loaiphongs = Loaiphong::all();
        return view('phongs.edit', compact('phong'), compact('loaiphongs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\phong  $phong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phong $phong)
    {
        $request->validate([
            'so_phong' => ['required',
                            Rule::unique('phongs')->ignore($phong->so_phong, 'so_phong')],
            'loaiphongid' => 'required'
        ]);

        $phong->fill($request->post())->save();

        return redirect()->route('phongs.index')->with('success', 'Phong Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phong  $phong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phong $phong)
    {
        $phong->loaiphongs()->delete();
        $phong->delete();
        return redirect()->route('phongs.index')->with('success', 'Phong has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $phongs = Phong::where('so_phong', 'LIKE', '%' . $request->search . "%")
            ->orWhere('loaiphongid', 'LIKE', '%' . $request->search . "%")
            ->orderBy('so_phong','asc')->paginate(5);
        return view('phongs.search', compact('phongs'));
    }
}
