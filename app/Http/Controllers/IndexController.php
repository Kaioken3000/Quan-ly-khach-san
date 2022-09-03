<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Loaiphong;
use App\Models\Phong;
use App\Models\Khachhang;
use App\Models\Datphong;

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
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required'
        ]);

        $phongslist = Phong::get();
        $phongs = array();
        foreach($phongslist as $phong){
            $xacnhan=0;
            $datphongs = Datphong::where('phongid',$phong->so_phong)->get();
            Log::info($datphongs);
            if(count($datphongs)!=0){
                foreach($datphongs as $datphong){
                    if($datphong->phongid == $phong->so_phong){
                        if($request->ngaytra >= $request->ngaydat){
                            if($request->ngaydat < $datphong->ngaydat){
                                if($request->ngaytra < $datphong->ngaydat){
                                    $xacnhan++;
                                }
                            }
                            else if($request->ngaydat > $datphong->ngaydat){
                                if($request->ngaydat > $datphong->ngaytra){
                                    $xacnhan++;
                                }
                            }
                        }
                    }
                }
                if($xacnhan == count($datphongs)){
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
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index_store(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required',
            'email' => 'required',
        ]);

        Khachhang::create($request->post());

        $khachhangs = Khachhang::max('id');
        
        
        $request->validate([
            'ngaydat' => 'required',
            'ngaytra' => 'required',
            'soluong' => 'required',
            'phongid' => 'required',
            'khachhangid' => 'required'
        ]);

        $request["khachhangid"] = $khachhangs;

        Log::info($request);

        Datphong::create($request->post());        

        return redirect('client/index');
    }

}
