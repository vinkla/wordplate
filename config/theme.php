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
    | Theme Description
    |--------------------------------------------------------------------------
    |
    | This defines the blog description to use.
    |
    */

    'description' => '',

    /*
    |--------------------------------------------------------------------------
    | WordPress Updates
    |--------------------------------------------------------------------------
    |
    | Enable or disable WordPress core, plugins and themes updates. Please note
    | that if your account has administrative privileges you'll still be able
    | to update.
    |
    */

    'updates' => env('WP_ENV', 'production') !== 'production',

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
    | GZIP
    |--------------------------------------------------------------------------
    |
    | Enable Gzip if available. Set this to false if you want to remove GZIP
    | support from your theme.
    |
    */

    'gzip' => true,

    /*
    |--------------------------------------------------------------------------
    | Require SSL for Admin and Logins
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, you want to secure logins and the admin
    | area so that both passwords and cookies are never sent in the clear.
    |
    */

    'secure' => false,

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
