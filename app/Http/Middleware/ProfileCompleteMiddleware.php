<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfileCompleteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if (!($user['first_name'] && $user['last_name'] && $user['email']
            && $user['phone'] && $user['state'] && $user['country']
            && $user['city'] && $user['address'] && $user['nk_name']
            && $user['nk_phone'] && $user['nk_address']))
            return redirect()->route('profile')->with('info', 'Kindly complete your profile to proceed');
        return $next($request);
    }
}
