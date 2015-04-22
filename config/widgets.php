<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Disable Default Widgets
    |--------------------------------------------------------------------------
    |
    | Hide and disable default widgets within WordPress core. Add widgets to
    | the list to leave them out of WordPress admin.
    |
    */

    'widgets' => [
        'WP_Widget_Pages',
        'WP_Widget_Calendar',
        'WP_Widget_Archives',
        'WP_Widget_Meta',
        'WP_Widget_Search',
        'WP_Widget_Categories',
        'WP_Widget_Recent_Posts',
        'WP_Widget_Recent_Comments',
        'WP_Widget_RSS',
        'WP_Widget_Tag_Cloud',
    ],
    
];
