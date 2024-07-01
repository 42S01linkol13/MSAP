<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class RequestAuth
{
    public function handle($request, Closure $next)
    {
        if (Cookie::has('role')) {
            $userData = Session::get('user');

            if ($userData['role'] === 'admin' && $userData['is_registered']) {
                return $next($request);
            } else {
                abort(403, 'Unauthorized access.');
            }
        } else {
            abort(403, 'Error');
        }
    }


}
