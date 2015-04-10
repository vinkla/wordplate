<?php

/*
 * This file is part of WordPress Boilerplate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!function_exists('config')) {

    /**
     * Get the specified configuration value.
     *
     * @param array|string $key
     * @param mixed $default
     *
     * @return mixed
     */
    function config($key = null, $default = null)
    {
        $config = [
            'app' => require get_template_directory().'/config/app.php',
            'dashboard' => require get_template_directory().'/config/dashboard.php',
            'editor' => require get_template_directory().'/config/editor.php',
            'footer' => require get_template_directory().'/config/footer.php',
            'login' => require get_template_directory().'/config/login.php',
            'menus' => require get_template_directory().'/config/menus.php',
            'theme' => require get_template_directory().'/config/theme.php',
            'plugins' => require get_template_directory().'/config/plugins.php',
            'widgets' => require get_template_directory().'/config/widgets.php',
        ];

        if (is_null($key)) {
            return $config;
        }

        if (isset($config[$key])) {
            return $config[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (!is_array($config) || !array_key_exists($segment, $config)) {
                return $default;
            }

            $config = $config[$segment];
        }

        return $config;
    }
}
