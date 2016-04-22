<?php

/*
 * Register plugin helpers.
 */
require __DIR__.'/library/plate.php';
require __DIR__.'/library/soil.php';

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

    // wp_enqueue_style('wordplate', elixir('styles/app.css'));

    // wp_register_script('wordplate', elixir('scripts/app.js'), '', '', true);
    // wp_enqueue_script('wordplate');
});

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
 * Set SMTP credentials.
 */
add_action('phpmailer_init', function (PHPMailer $mail) {
    if (empty(env('MAIL_USERNAME', false))) {
        return;
    }

    $mail->IsSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = env('MAIL_HOST');
    $mail->Port = env('MAIL_PORT', 587);
    $mail->Username = env('MAIL_USERNAME');
    $mail->Password = env('MAIL_PASSWORD');

    return $mail;
});

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
