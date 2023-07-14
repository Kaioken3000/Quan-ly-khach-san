<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Catruc;
use App\Models\Nhanvien;
use Illuminate\Http\Request;
use App\Models\CatrucNhanvien;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class NhanvienController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $nhanviens = Nhanvien::orderBy('ma','asc')->paginate(5);
        $nhanviens = Nhanvien::get();
        $allNhanvien = Nhanvien::get();
        $catrucs = Catruc::get();
        return view('nhanviens.index', compact('nhanviens', 'catrucs', 'allNhanvien'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('nhanviens.create');
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
            'ma' => 'required|unique:nhanviens',
            'ten' => 'required',
            'luong' => 'required',
        ]);

        $newNhanvien = Nhanvien::create($request->post());

        return redirect('nhanviens-taotaikhoan/'.$newNhanvien->ma);
    }
    public function taotaikhoan(Request $request)
    {
        // Tao tai khoan
        $request->validate([
            'email' => 'required|unique:users',
            'username' => 'required',
            'sdt' => 'required|numeric|digits:10',
            'password' => 'required',
        ]);

        $user = User::create($request->post());

        $role = Role::where('name','User')->first();
        
        $user->assignRole($role);

        // cap nhat userid cho nhanvien
        $nhanvien = Nhanvien::find($request->nhanvienid, "ma");
        $nhanvien->userid = $user->id;
        $nhanvien->save();

        return redirect()->route('nhanviens.index')->with('success','Nhanvien Has Been created successfully');
    }
    public function viewtaotaikhoan(Request $request)
    {
        return view('nhanviens.taotaikhoan', compact('request'));
    }

    public function updateUserid(Request $request)
    {
        $nhanvien = Nhanvien::find($request->nhanvienid, "ma");
        $nhanvien->userid = $request->userid;
        $nhanvien->save();
        return redirect()->route('nhanviens.index')->with('success','Nhanvien Has Been updated successfully');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\nhanvien  $nhanvien
    * @return \Illuminate\Http\Response
    */
    public function show(Nhanvien $nhanvien)
    {
        return view('nhanviens.show',compact('nhanvien'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Nhanvien  $nhanvien
    * @return \Illuminate\Http\Response
    */
    public function edit(Nhanvien $nhanvien)
    {
        return view('nhanviens.edit',compact('nhanvien'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\nhanvien  $nhanvien
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Nhanvien $nhanvien)
    {
        $request->validate([
            'ma' => ['required',
                    Rule::unique('nhanviens')->ignore($nhanvien->ma, 'ma')],
            'ten' => 'required',
            'luong' => 'required',
        ]);
        
        $nhanvien->fill($request->post())->save();

        return redirect()->route('nhanviens.index')->with('success','Nhanvien Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Nhanvien  $nhanvien
    * @return \Illuminate\Http\Response
    */
    public function destroy(Nhanvien $nhanvien)
    {
        $nhanvien->delete();
        return redirect()->route('nhanviens.index')->with('success','Nhanvien has been deleted successfully');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {
        // $nhanviens = Nhanvien::where('ma','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('luong','LIKE','%'.$request->search."%")
        //                         ->orderBy('ma','asc')->paginate(5);
        $nhanviens = Nhanvien::where('ma','LIKE','%'.$request->search."%")
                                ->orWhere('ten','LIKE','%'.$request->search."%")
                                ->orWhere('luong','LIKE','%'.$request->search."%")
                                ->get();
        return view('nhanviens.search', compact('nhanviens'));
    }
}
