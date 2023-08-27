<?php

namespace App\Http\Controllers;

use App\Models\Anuong;
use App\Models\Chinhanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnuongController extends Controller
{
    public function index()
    {
        // $anuongs = Anuong::orderBy('id','asc')->paginate(5);
        $roleName = Auth::user()->roles[0]->name;

        if ($roleName == "Admin" || $roleName == "User")
            if (isset(Auth::user()->nhanviens)) {
                $anuongs = Anuong::where("chinhanhid", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
                $chinhanhs = Chinhanh::where("id", Auth::user()->nhanviens[0]->chinhanhs->id)->get();
            } else $nhanvien = [];
        if ($roleName == "MainAdmin") {
            $anuongs = Anuong::get();
            $chinhanhs = Chinhanh::get();
        }
        return view('anuongs.index', compact('anuongs', 'chinhanhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anuongs.create');
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
            'soluong' => 'required',
            'mieuTa' => 'required',
            'chinhanhid' => 'required',
        ]);

        Anuong::create($request->post());

        return redirect()->route('anuongs.index')->with('success', 'Anuong has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\anuong  $anuong
     * @return \Illuminate\Http\Response
     */
    public function show(Anuong $anuong)
    {
        return view('anuongs.show', compact('anuong'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anuong  $anuong
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuong $anuong)
    {
        return view('anuongs.edit', compact('anuong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\anuong  $anuong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anuong $anuong)
    {
        $request->validate([
            'ten' => 'required',
            'gia' => 'required',
            'soluong' => 'required',
            'mieuTa' => 'required',
            'chinhanhid' => 'required',
        ]);

        if ($request->hinh) {
            $anuong->fill($request->post())->save();
        } else {
            $anuong->fill([
                'ten' => $request->ten,
                'gia' => $request->gia,
                'soluong' => $request->soluong,
                'mieuTa' => $request->mieuTa,
                'chinhanhid' => $request->chinhanhid,
            ])->save();
        }

        return redirect()->route('anuongs.index')->with('success', 'Anuong Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anuong  $anuong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuong $anuong)
    {
        $anuong->delete();
        return redirect()->route('anuongs.index')->with('success', 'Anuong has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $anuongs = Anuong::where('id','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('giatien','LIKE','%'.$request->search."%")
        //                         ->orWhere('donvi','LIKE','%'.$request->search."%")
        //                         ->orderBy('id','asc')->paginate(5);
        $anuongs = Anuong::where('id', 'LIKE', '%' . $request->search . "%")
            ->orWhere('ten', 'LIKE', '%' . $request->search . "%")
            ->orWhere('hinh', 'LIKE', '%' . $request->search . "%")
            ->orWhere('gia', 'LIKE', '%' . $request->search . "%")
            ->orWhere('mieuTa', 'LIKE', '%' . $request->search . "%")
            ->get();
        return view('anuongs.search', compact('anuongs'));
    }
}
