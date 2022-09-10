<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Loaiphong;
use App\Models\Phong;
use App\Models\Khachhang;
use App\Models\Nhanvien;
use App\Models\User;
use App\Models\Datphong;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
            'ngaytra' => 'required|gt:ngaydat',
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

    public function dashboard(){
        $phong = Phong::get();
        $sophong = $phong->count();

        $khachhang = Khachhang::get();
        $sokhachhang = $khachhang->count();

        $nhanvien = Nhanvien::get();
        $sonhanvien = $nhanvien->count();

        $user = User::get();
        $souser = $user->count();

        //thanh toan
        $datphong = Datphong::get();
        
        $chuathanhtoan = collect();
        $dathanhtoan = collect();
        foreach($datphong as $d){
            $temp = $d->tinhtrangthanhtoan;
            if($temp == 0){
                $chuathanhtoan->add($temp);
            }
            else{
                $dathanhtoan->add($temp);
            }
        }
        
        $thanhtoan = collect();
        $thanhtoan->add(array(
            'chuathanhtoan' => 'chuathanhtoan',
            'sochuathanhtoan' => $chuathanhtoan->count(),
            'dathanhtoan' => 'dathanhtoan',
            'sodathanhtoan' => $dathanhtoan->count(),
        ));
        
        return view('index', compact('sophong','sokhachhang','sonhanvien','souser','thanhtoan'));
    }

    public function profile(){
        $user = Auth::user();
        return view('profiles.profile',compact('user'));
    }

    public function vieweditprofile()
    {
        $user = Auth::user();
        return view('profiles.edit',compact('user'));
    }

    public function editprofile(Request $request, User $user)
    {
        $request->validate([
            'email' => ['required','email',
                    Rule::unique('users')->ignore($user->email, 'email')],
            'username' => 'required',
        ]);
        
        $user->fill($request->post())->save();

        return redirect('/profile')->with('success','User Has Been updated successfully');
    }
}
