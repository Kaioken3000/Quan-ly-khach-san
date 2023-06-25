<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([
                    'email' => $user->email,
                    'username' => $user->name,
                    'sdt' => 0,
                    'password' => encrypt('123456dummy'),
                    'google_id' => $user->id,
                ]);

                $role = Role::where('name', 'User')->first();

                $newUser->assignRole($role);

                auth()->login($newUser);

                return redirect('/dashboard')->with('success', "Account successfully registered.");
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
