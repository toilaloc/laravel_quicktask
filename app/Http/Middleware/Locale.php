<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Locale
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
        // get data from session. if not found return default language.
        $language = Session::get('website_language', config('app.locale'));
        
        // change app language to picked language
        config(['app.locale' => $language]);

        return $next($request);
    }
}
