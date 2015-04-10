<?php

/*
 * This file is part of WordPress Boilerplate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) { return true; }
    return (substr($haystack, -$length) === $needle);
}

 /**
 * Fix home URL on theme activation
 *
 * @return void
 */
add_action('after_setup_theme', function () {
	$url = get_option('home');
	if (endsWith($url, '/wordpress')) {
		update_option('home', str_replace('/wordpress', '', $url));
	}
});
