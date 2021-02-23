<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLocale
{

    /**
     * @return mixed
     */
    public static function getLocale(Request $request)
    {
        $uri = $request->path();

        $segmentsURI = explode('/', $uri);

        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], config('app.languages'))) {
            if ($segmentsURI[0] != config('app.locale')) {
                return $segmentsURI[0];
            }
        }
        return null;
    }

    /**
     * @return mixed
     */
    public static function getLocalePrefix()
    {
        $prefix = request()->segment(1);
        $prefix = (in_array($prefix, config('app.languages')))? $prefix : null;
        return $prefix;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale($request);

        if (isset($locale)) {
            app()->setLocale($locale);
        } else {
            app()->setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
