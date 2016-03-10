<?php

/*
 * Set theme defaults.
 */
add_action('after_setup_theme', function () {
    // Show the admin bar.
    show_admin_bar(false);

    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add support for post formats.
    //add_theme_support('post-formats', ['aside', 'audio', 'gallery', 'image', 'link', 'quote', 'video']);

    // Add primary WordPress menu.
    register_nav_menu('primary-menu', __('Primary Menu', 'wordplate'));
});

/*
 * Enqueue and register scripts the right way.
 */
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');

    // wp_enqueue_style('wordplate', elixir('styles/wordplate.css'));

    // wp_register_script('wordplate', elixir('scripts/wordplate.js'), '', '', true);
    // wp_enqueue_script('wordplate');
});

/*
 * Cleanup and enhance WordPress defaults.
 */
add_theme_support('plate-cleanup');

/*
 * Set custom footer text.
 */
add_theme_support('plate-footer', 'Thank you for creating with <a href="https://wordplate.github.io" target="_blank">WordPlate</a>.');

/*
 * Remove menu items.
 */
add_theme_support('plate-clean-menu', [
   'comments',
   'dashboard',
   'links',
   'media',
]);

/*
 * Remove meta boxes in post editor.
 */
add_theme_support('plate-clean-editor', [
    //'categorydiv',
    'commentsdiv',
    'commentstatusdiv',
    'linkadvanceddiv',
    'linktargetdiv',
    'linkxfndiv',
    'postcustom',
    'postexcerpt',
    'revisionsdiv',
    'slugdiv',
    'sqpt-meta-tags',
    //'tagsdiv-post_tag',
    'trackbacksdiv',
]);

/*
 * Remove dashboard widgets.
 */
add_theme_support('plate-clean-dashboard', [
    'dashboard_activity',
    'dashboard_incoming_links',
    'dashboard_plugins',
    'dashboard_recent_comments',
    //'dashboard_right_now',
    'dashboard_primary',
    'dashboard_quick_press',
    'dashboard_recent_drafts',
    'dashboard_secondary',
]);

/*
 * Remove dashboard tabs.
 */
add_theme_support('plate-clean-tabs', ['help', 'screen-options']);

/*
 * Remove links from admin toolbar.
 */
add_theme_support('plate-clean-toolbar', [
    'comments',
    'wp-logo',
    'edit',
    'appearance',
    'view',
    'new-content',
    'updates',
    'search',
]);

/*
 * Set custom login logo.
 */
add_theme_support('plate-login', sprintf('%s/%s', get_template_directory_uri(), '/assets/images/logo.svg'));

/*
 * Set custom title.
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

/*
 * Register Soil modules.
 */
add_theme_support('soil-clean-up');
add_theme_support('soil-disable-asset-versioning');
add_theme_support('soil-disable-trackbacks');
add_theme_support('soil-js-to-footer');
add_theme_support('soil-nice-search');
add_theme_support('soil-relative-urls');

/*
 * Set custom excerpt more.
 */
add_filter('excerpt_more', function () {
    return '...';
});

/*
 * Set custom excerpt length.
 */
add_filter('excerpt_length', function () {
    return 101;
});
