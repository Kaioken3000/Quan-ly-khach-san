<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $url = "http://khachsan-b1910261.local";
        if (! $request->expectsJson()) {
            // return route('login.perform');
            if(!str_contains(strval(app('url')->current()), $url))
                return route('login.perform');
            else return route('client.loginclient');
        }
    }
}
