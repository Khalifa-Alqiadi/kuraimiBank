<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language
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
        $locales = config('locales.languages');
        if(!array_key_exists($request->segment(1), $locales)){
            $segments = $request->segments();
            $segments = Arr::prepend($segments, config('locales.fallback_locale'));
            return redirect()->to(implode('/', $segments));
        }
        return $next($request);
    }
}
