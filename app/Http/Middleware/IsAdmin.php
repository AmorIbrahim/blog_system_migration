<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type === 'admin') {
            return $next($request);
        }

        // return redirect('/home')->with('error', 'غير مسموح لك بالدخول هنا ');
         abort(403, 'غير مسموح بالدخول');
    }
}
