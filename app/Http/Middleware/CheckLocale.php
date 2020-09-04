<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Request;

class CheckLocale
{

    /**
     * @return mixed
     */
    public static function getLocale()
    {
        $uri = Request::path();

        $segmentsURI = explode('/', $uri);

        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], config('app.languages'))) {
            if ($segmentsURI[0] != config('app.locale')) {
                return $segmentsURI[0];
            }
        }
        return null;
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
        $locale = self::getLocale();

        if (isset($locale)) {
            App::setLocale($locale);
        } else {
            App::setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
