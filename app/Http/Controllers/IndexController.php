<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loaiphong;
use App\Models\Phong;

class IndexController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $loaiphongs = Loaiphong::orderBy('ma','asc')->paginate(3);
        return view('client.index', compact('loaiphongs'));
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function room()
    {
        $loaiphongs = Loaiphong::orderBy('ma','asc')->get();
        return view('client.rooms', compact('loaiphongs'));
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function check(Request $request)
    {
        $phongs = Phong::orderBy('so_phong','asc')->paginate(5);
        return view('client.check', compact('phongs'), compact('request'));
    }
}
