<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBannedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_banned) {
            auth()->logout();

            $message = 'Ваш аккаунт был заблокирован';

            session()->flash('error', $message);
            return redirect()->route('page.login');
        }

        return $next($request);
    }
}
