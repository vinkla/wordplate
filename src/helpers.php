<?php

declare(strict_types=1);

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        $value = $_ENV[$key] ?? false;

        if ($value === false) {
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return null;
        }

        if (preg_match('/\A([\'"])(.*)\1\z/', $value, $matches)) {
            return $matches[2];
        }

        return $value;
    }
}

if (!function_exists('get_asset_file_uri')) {
    function get_asset_file_uri(string $file = ''): string
    {
        $path = get_theme_file_path('assets/' . $file);
        $url = get_theme_file_uri('assets/' . $file);

        if (file_exists($path)) {
            return $url . '?v=' . hash('fnv1a32', (string) filemtime($path));
        }

        return $url;
    }
}
