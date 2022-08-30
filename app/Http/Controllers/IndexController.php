<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Loaiphong;
use App\Models\Phong;
use App\Models\Khachhang;

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
        $phongslist = Phong::get();
        $phongs = array();
        foreach($phongslist as $phong){
            $xacnhan=0;
            $khachhangs = Khachhang::where('phongid',$phong->so_phong)->get();
            if(count($khachhangs)!=0){
                foreach($khachhangs as $khachhang){
                    if($khachhang->phongid == $phong->so_phong){
                        if($request->ngayra >= $request->ngayvao){
                            if($request->ngayvao < $khachhang->ngayvao){
                                if($request->ngayra < $khachhang->ngayvao){
                                    $xacnhan++;
                                }
                            }
                            else if($request->ngayvao > $khachhang->ngayvao){
                                if($request->ngayvao > $khachhang->ngayra){
                                    $xacnhan++;
                                }
                            }
                        }
                    }
                }
                if($xacnhan == count($khachhangs)){
                    array_push($phongs, $phong);
                }
            }   
            else array_push($phongs, $phong);
        }
        return view('client.check',compact('request','phongs'));
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function reservation(Request $request)
    {
        return view('client.reservation', compact('request'));
    }
}
