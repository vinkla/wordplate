<?php

/* Register the application. */
app()->register();

/*
 * Theme set up settings.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    // Configure WP 2.9+ Thumbnails.
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(50, 50, true);
    // add_image_size('thumbnail-large', 500, '', false);

    // Add support for post formats.
    // $formats = ['aside', 'gallery', 'image', 'link', 'quote', 'video', 'audio'];
    // add_theme_support('post-formats', $formats);

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Show the admin bar.
    show_admin_bar(false);

    // Add HTML5 support.
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'widgets',
    ]);
});

/*
 * Register soil modules.
 */
add_theme_support('soil-clean-up');
add_theme_support('soil-disable-asset-versioning');
add_theme_support('soil-disable-trackbacks');
add_theme_support('soil-js-to-footer');
add_theme_support('soil-nice-search');
add_theme_support('soil-relative-urls');

/*
 * Enqueue and register scripts the right way.
 *
 * @return  void
 */
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');

    // wp_enqueue_style('wordplate', get_template_directory_uri().'/assets/styles/wordplate.css');
    // wp_register_script('wordplate', get_template_directory_uri().'/assets/scripts/wordplate.js', '', '', true);

    // wp_enqueue_script('wordplate');
});

/*
 * Configure default title.
 *
 * @return string
 */
add_filter('wp_title', function ($title) {
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

/*
 * Add a primary WordPress menu.
 */
add_action('after_setup_theme', function () {
    register_nav_menu('primary-menu', __('Primary Menu', 'wordplate'));
});

/*
 * Configure excerpt string.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return '…';
});

/*
 * Change default excerpt length (default: 55).
 *
 * @return int
 */
add_filter('excerpt_length', function () {
    return 101;
});
