<?php

/*
 * Plugin Name: Headache
 * Plugin URI: https://github.com/vinkla/wordplate
 * Description: An easy-to-swallow painkiller plugin for WordPress.
 * Version: 1.0.0
 * Author: Vincent Klaiber
 * Author URI: https://github.com/vinkla
 * License: MIT
 */

// Redirects all feeds to home page.
function headache_disable_feeds(): void
{
    wp_redirect(site_url());
}

// Disables feeds.
add_action('do_feed', 'headache_disable_feeds', 1);
add_action('do_feed_rdf',  'headache_disable_feeds', 1);
add_action('do_feed_rss',  'headache_disable_feeds', 1);
add_action('do_feed_rss2', 'headache_disable_feeds', 1);
add_action('do_feed_atom', 'headache_disable_feeds', 1);

// Disables comments feeds.
add_action('do_feed_rss2_comments', 'headache_disable_feeds', 1);
add_action('do_feed_atom_comments', 'hHeadache_disable_feeds', 1);

// Disable comments.
add_filter('comments_open', '__return_false');

// Remove language dropdown on login screen.
add_filter('login_display_language_dropdown', '__return_false');

// Disable XML RPC for security.
add_filter('xmlrpc_enabled', '__return_false');
add_filter('xmlrpc_methods', '__return_false');

// Removes WordPress version.
remove_action('wp_head', 'wp_generator');

// Removes generated icons.
remove_action('wp_head', 'wp_site_icon', 99);

// Removes shortlink tag from <head>.
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Removes shortlink tag from HTML headers.
remove_action('template_redirect', 'wp_shortlink_header', 11, 0);

// Removes Really Simple Discovery link.
remove_action('wp_head', 'rsd_link');

// Removes RSS feed links.
remove_action('wp_head', 'feed_links', 2);

// Removes all extra RSS feed links.
remove_action('wp_head', 'feed_links_extra', 3);

// Removes wlwmanifest.xml.
remove_action('wp_head', 'wlwmanifest_link');

// Removes meta rel=dns-prefetch href=//s.w.org
remove_action('wp_head', 'wp_resource_hints', 2);

// Removes relational links for the posts.
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Removes REST API link tag from <head>.
remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);

// Removes REST API link tag from HTML headers.
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Removes emojis.
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

// Removes oEmbeds.
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_oembed_add_host_js');

// Disable default users API endpoints for security.
// https://www.wp-tweaks.com/hackers-can-find-your-wordpress-username/
function headache_disable_rest_endpoints($endpoints): array
{
    if (!is_user_logged_in()) {
        if (isset($endpoints['/wp/v2/users'])) {
            unset($endpoints['/wp/v2/users']);
        }

        if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
            unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
        }
    }

    return $endpoints;
}

add_filter('rest_endpoints', 'headache_disable_rest_endpoints');

// Removes JPEG compression.
function headache_remove_jpeg_compression(): int
{
    return 100;
}

add_filter('jpeg_quality', 'headache_remove_jpeg_compression', 10, 2);

// Update login page image link URL.
function headache_login_url(): string
{
    return home_url();
}

add_filter('login_headerurl', 'headache_login_url');

// Update login page link title.
function headache_login_title(): string
{
    return get_bloginfo('name');
}

add_filter('login_headertext', 'headache_login_title');

// Remove Gutenberg's front-end block styles.
function headache_remove_block_styles(): void
{
    wp_deregister_style('wp-block-library');
}

add_action('wp_enqueue_scripts', 'headache_remove_block_styles');

// Remove Gutenberg's global styles.
// https://github.com/WordPress/gutenberg/pull/34334#issuecomment-911531705
function headache_remove_global_styles()
{
    wp_dequeue_style('global-styles');
}

add_action('wp_enqueue_scripts', 'headache_remove_global_styles');

// Removes the SVG Filters that are mostly if not only used in Full Site Editing/Gutenberg
// Detailed discussion at: https://github.com/WordPress/gutenberg/issues/36834
function headache_remove_svg_filters()
{
    remove_action('wp_body_open', 'gutenberg_global_styles_render_svg_filters');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
}

add_action('init', 'headache_remove_svg_filters');

// Removes ?ver= query from styles and scripts.
function headache_remove_script_version(string $src): string
{
    return $src ? esc_url(remove_query_arg('ver', $src)) : $src;
}

add_filter('script_loader_src', 'headache_remove_script_version', 15, 1);
add_filter('style_loader_src', 'headache_remove_script_version', 15, 1);

// Remove contributor, subscriber and author roles.
function headache_remove_roles(): void
{
    remove_role('author');
    remove_role('contributor');
    remove_role('subscriber');
}

add_action('init', 'headache_remove_roles');

// Disabled attachment media pages.
function headache_disable_media_pages()
{
    if (is_attachment()) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
    }
}

add_filter('template_redirect', 'headache_disable_media_pages');
add_filter('redirect_canonical', 'headache_disable_media_pages', 0);

// Disabled attachment media page links.
function headache_attachment_link($url, $id)
{
    if ($attachment_url = wp_get_attachment_url($id)) {
        return $attachment_url;
    }

    return $url;
}

add_filter('attachment_link', 'headache_attachment_link', 10, 2);
