<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TwoFactorMiddleware
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
        if ($user->two_factor_enabled) {
            if(auth()->check() && $user->two_factor_code)
            {
                if($user->two_factor_expires_at<now()) //expired
                {
                    $user->resetTwoFactorCode();
                    auth()->logout();

                    return redirect()->route('login')
                    ->with('message', 'The two factor code has expired. Please login again.');
                }

                if(!$request->is('verify*')) //prevent enless loop, otherwise send to verify
                {
                    return redirect()->route('verify.index');
                }
            }
        }

        return $next($request);
    }
}
