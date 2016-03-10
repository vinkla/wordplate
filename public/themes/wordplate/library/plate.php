<?php

/*
 * Cleanup and enhance WordPress defaults.
 */
add_theme_support('plate-cleanup');

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
    'trackbacksdiv',
    //'categorydiv',
    //'tagsdiv-post_tag',
]);

/*
 * Remove dashboard widgets.
 */
add_theme_support('plate-clean-dashboard', [
    'dashboard_activity',
    'dashboard_incoming_links',
    'dashboard_plugins',
    'dashboard_recent_comments',
    'dashboard_primary',
    'dashboard_quick_press',
    'dashboard_recent_drafts',
    'dashboard_secondary',
    //'dashboard_right_now',
]);

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
 * Remove dashboard tabs.
 */
add_theme_support('plate-clean-tabs', ['help', 'screen-options']);

/*
 * Set custom login logo.
 */
add_theme_support('plate-login', sprintf('%s/%s', get_template_directory_uri(), '/assets/images/logo.png'));

/*
 * Set custom footer text.
 */
add_theme_support('plate-footer', 'Thank you for creating with <a href="https://wordplate.github.io" target="_blank">WordPlate</a>.');
