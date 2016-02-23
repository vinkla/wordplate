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
 * Set default permalink structure.
 *
 * @return string|null
 */
add_action('admin_init', function() {
    global $wp_rewrite;

    $wp_rewrite->set_permalink_structure('/%postname%/');
});

/**
 * Remove special characters in file names.
 *
 * @param string $name
 *
 * @return string
 */
add_filter('sanitize_file_name', function ($name) {
    return remove_accents($name);
}, 10, 2);

/**
 * Use the best jpeg picture quality.
 *
 * @return int
 */
add_filter('jpeg_quality', function () {
    return 100;
});

/**
 * Remove Microsoft Word formatting on save for TinyMCE.
 *
 * @param string $content
 *
 * @return string
 */
add_filter('content_save_pre', function ($content) {
    return preg_replace('/<!--\[if gte mso.*?-->/ms', '', $content);
});

/**
 * Remove meta boxes in post edit.
 *
 * @return void
 */
add_action('admin_menu', function () {
    remove_meta_box('authordiv', 'post', 'normal');
    // remove_meta_box('categorydiv', 'post', 'normal');
    remove_meta_box('commentsdiv', 'post', 'normal');
    remove_meta_box('commentstatusdiv', 'post', 'normal');
    remove_meta_box('linkadvanceddiv', 'link', 'normal');
    remove_meta_box('linktargetdiv', 'link', 'normal');
    remove_meta_box('linkxfndiv', 'link', 'normal');
    remove_meta_box('postcustom', 'post', 'normal');
    remove_meta_box('postexcerpt', 'post', 'normal');
    remove_meta_box('revisionsdiv', 'post', 'normal');
    remove_meta_box('slugdiv', 'post', 'normal');
    remove_meta_box('sqpt-meta-tags', 'post', 'normal');
    // remove_meta_box('tagsdiv-post_tag', 'post', 'normal');
    remove_meta_box('trackbacksdiv', 'post', 'normal');
});
