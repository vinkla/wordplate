<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('WP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Theme Slug
    |--------------------------------------------------------------------------
    |
    | Themes must provide a unique slug for anything in the public namespace,
    | including translation textdomain, all custom function names, classes,
    | hooks, public/global variables, database entries (Theme options, post
    | custom metadata, etc.)
    |
    */

    'slug' => env('WP_THEME', 'wordplate'),

    /*
    |--------------------------------------------------------------------------
    | Blog description
    |--------------------------------------------------------------------------
    |
    | Set the blog description, instead of 'Just another WordPress site', you
    | can now change to something that suits your project better.
    |
    */

    'description' => '',

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Disallow File Edit
    |--------------------------------------------------------------------------
    |
    | Occasionally you may wish to disable the plugin or theme editor to
    | prevent overzealous users from being able to edit sensitive files and
    | potentially crash the site.
    |
    */

    'disallow_file_edit' => true,

];
