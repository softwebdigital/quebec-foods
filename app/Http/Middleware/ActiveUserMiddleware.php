<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ActiveUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
//        if (auth()->user()['active'] == 0){
//            Auth::guard()->logout();
//            return redirect('/login')->with('error', 'Your account has been deactivated, contact admin on '.env('SUPPORT_EMAIL'));
//        }
        if (auth()->user()['status'] == 'inactive'){
            Auth::guard()->logout();
            return redirect('/login')->with('error', 'Your account is currently restricted, contact admin on '.env('SUPPORT_EMAIL'));
        }
        elseif (auth()->user()['status'] == 'deactivated'){
            Auth::guard()->logout();
            return redirect('/login')->with('error', 'Your account is deactivated, contact admin on '.env('SUPPORT_EMAIL'));
        }
        return $next($request);
    }
}
