<?php

namespace App;

/**
 * For URL modification
 */

class Url
{
    /**
     * Return url for current locale
     * @param string $url
     * @return string
     */
    public static function get(string $url): string
    {
        $locale = app()->getLocale();
        if ($locale != config('app.main_locale')) {
            $url = '/' . $locale . $url;
        }
        return url($url);
    }

    /**
     * Return url without prefix for all locales
     * @return string
     */
    public static function getBase(): string
    {
        $path = request()->path();
        if (app()->getLocale() == config('app.main_locale')) {
            return '/' . $path;
        }

        $segments = request()->segments();
        if (in_array($segments[0], config('app.languages'))) {
            unset($segments[0]);
            $path = implode('/', $segments);
        }
        return '/' . $path;
    }

    /**
     * Return url for require lang
     * @param string $requireLang
     * @return string
     */
    public static function getForLang(string $requireLang = ''): string
    {
        if ($requireLang == config('app.main_locale')) {
            return self::getBase();
        }

        return '/' . $requireLang . self::getBase();
    }

}
