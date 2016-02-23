<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Enqueue and register scripts the right way.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');

    // wp_enqueue_style('wordplate', get_bloginfo('url').'/assets/styles/wordplate.css');

    // wp_register_script('wordplate', get_bloginfo('url').'/assets/scripts/wordplate.js', '', '', true);
    // wp_enqueue_script('wordplate');
});
