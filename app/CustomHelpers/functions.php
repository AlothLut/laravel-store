<?php
if (!function_exists('setElementLang')) {
    function setElementLang(array &$element): bool
    {
        if (empty($element)) {
            return false;
        }
        $locale = app()->getLocale();

        foreach ($element as $key => $val) {
            if (!preg_match("#^([a-zA-Z0-9_-]+)_([a-zA-Z]{2})$#", $key, $matches)) {
                continue;
            }

            $propCode = $matches[1];
            $propLang = mb_strtolower($matches[2]);

            if ($locale == $propLang) {
                $element['locale'][$propCode] = $val;
            }
        }
        return true;
    }
}
