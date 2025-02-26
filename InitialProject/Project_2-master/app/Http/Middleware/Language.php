<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('applocale');
        $languages = config('languages', []);

        if ($locale && is_array($languages) && array_key_exists($locale, $languages)) {
            App::setLocale($locale);
        } else {
            App::setLocale(config('app.fallback_locale'));
        }

        return $next($request);
    }

}
