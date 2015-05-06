<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Remove Menu Items
    |--------------------------------------------------------------------------
    |
    | Giving clients and users access to everything within the administrator
    | dashboard is bad practice. Try to give them access to what they actually
    | need and will use.
    |
    | Specified below which menu items should be deleted for which users.
    |
    | Available items: appearance, comments, dashboard, media, plugins, pages,
    | posts, settings, tools, users.
    |
    */

    'items' => [

        // Hidden for user without admin capabilities.
        'default' => [
            'appearance',
            'comments',
            'dashboard',
            'links',
            'media',
            'plugins',
            'settings',
            'tools',
            'users',
        ],

        // Hidden for user with admin capabilities.
        'administrator' => [
            'comments',
            'dashboard',
            'links',
            'media',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Remove Menu Bar Links
    |--------------------------------------------------------------------------
    |
    | The menu bar in WordPress administrator dashboard looks cluttered.
    | Remove unnecessary links, users should only see what the actually need.
    |
    */

    'links' => [
        'comments',
        'wp-logo',
        'edit',
        'appearance',
        'view',
        'new-content',
        'updates',
        'search',
    ],

    /*
    |--------------------------------------------------------------------------
    | Hide Panel Tabs
    |--------------------------------------------------------------------------
    |
    | Remove and hide screen options and help panel tab. This will make the
    | administrator interface more cleaned up for users.
    |
    */

    'tabs' => [
        'help' => false,
        'screen_options' => false,
    ],

];
