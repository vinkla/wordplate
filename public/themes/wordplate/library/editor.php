<?php

/*
 * Set default permalink structure.
 */
add_action('admin_init', function () {
    global $wp_rewrite;

    $wp_rewrite->set_permalink_structure('/%postname%/');
});

/*
 * Remove meta boxes in post edit.
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

/*
 * Set custom jpeg picture quality.
 */
add_filter('jpeg_quality', function () {
    return 100;
});

/*
 * Remove special characters in file names.
 */
add_filter('sanitize_file_name', function ($name) {
    return remove_accents($name);
}, 10, 2);

/*
 * Remove Microsoft Word formatting for TinyMCE.
 */
add_filter('content_save_pre', function ($content) {
    return preg_replace('/<!--\[if gte mso.*?-->/ms', '', $content);
});
