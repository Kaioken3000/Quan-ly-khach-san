<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();

            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([
                    'email' => $user->email,
                    'username' => $user->name,
                    'sdt' => 0,
                    'password' => encrypt('123456dummy'),
                    'facebook_id' => $user->id,
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
