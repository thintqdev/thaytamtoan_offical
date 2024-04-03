<?php

if (!function_exists('changeYoutubeUrl')) {
    function changeYoutubeUrl($youtubeUrl): array|string
    {
        return str_replace('watch?v=', 'embed/', $youtubeUrl);
    }
}

if (!function_exists('active_menu')) {
    function active_menu($routeName = [], $option = null)
    {
        if (in_array(\Route::currentRouteName(), $routeName)) {
            return $option ?? 'active';
        }

        return '';
    }
}