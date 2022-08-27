<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loaiphong;

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
}
