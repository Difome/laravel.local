<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            return $next($request);
        }
        else
        {
            if (Auth::check() && Auth::user()->banned_until && now()->lessThan(Auth::user()->banned_until)) {
                $banned_days = now()->diffInDays(Auth::user()->banned_until);
                Auth::logout();

                if ($banned_days > 14) {
                    $message = __('Ваш аккаунт приостановлен').' '.__('Пожалуйста, свяжитесь с администратором');
                } else {
                    $message = __('Ваш аккаунт приостановлен на').' '.$banned_days.' '.Lang::choice('days', ['day' => $banned_days]).' '.__('Пожалуйста, свяжитесь с администратором');
                }

                return redirect()->route('login')->withMessage($message);
            }
            else
            {
                return $next($request);
            }
        }
    }
}
