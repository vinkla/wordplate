<?php

/**
 * Register plate dependencies.
 */
require __DIR__.'/library/plate.php';

/**
 * Theme setup defaults.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    // Show the admin bar.
    show_admin_bar(false);

    // Add primary WordPress menu.
    register_nav_menu('primary-menu', __('Primary Menu', 'wordplate'));
});

/**
 * Enqueue and register scripts the right way.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');

    // wp_enqueue_style('wordplate', get_template_directory_uri().'/assets/styles/wordplate.css');

    // wp_register_script('wordplate', get_template_directory_uri().'/assets/scripts/wordplate.js', '', '', true);
    // wp_enqueue_script('wordplate');
});

/**
 * Configure default title.
 *
 * @return string
 */
add_filter('wp_title', function () {
    global $post;

    $name = get_bloginfo('name');
    $description = get_bloginfo('description');

    if (is_front_page() || is_home()) {
        if ($description) {
            return sprintf('%s - %s', $name, $description);
        }

        return $name;
    }

    if (is_category()) {
        return sprintf('%s - %s', trim(single_cat_title('', false)), $name);
    }

    return sprintf('%s - %s', trim($post->post_title), $name);
});
