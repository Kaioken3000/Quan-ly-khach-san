<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    public function showclient(){
        return view('client.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $role = Role::where('name','User')->first();

        $user->assignRole($role);

        auth()->login($user);

        return redirect('/dashboard')->with('success', "Account successfully registered.");
    }

    // Register for client
    public function registerclient(RegisterRequest $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'username' => 'required',
            'sdt' => 'required|numeric|digits:10',
            'password' => 'required',
        ]);

        $user = User::create([
            'email'=>$request->email,
            'username'=>$request->username,
            'sdt'=>$request->sdt,
            'password'=>$request->password,
        ]);

        $role = Role::where('name','Khachhang')->first();

        $user->assignRole($role);

        auth()->login($user);

        return redirect('/client/index')->with('success', "Account successfully registered.");
    }


}
