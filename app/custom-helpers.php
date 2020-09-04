<?php

if (!function_exists('getUrl')) {
    function getUrl(string $url): string
    {
        $locale = App::getLocale();
        if ($locale != config('app.main_locale')) {
            $url = '/' . $locale . $url;
        }
        return url($url);
    }
}