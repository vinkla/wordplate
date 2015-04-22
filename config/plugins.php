<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Activate Plugins By Default
    |--------------------------------------------------------------------------
    |
    | Active installed plugins by default. Set this to false if you don't want
    | to activate the installed plugins by default.
    |
    */

    'activate' => true,

    /*
    |--------------------------------------------------------------------------
    | Roots Soil
    |--------------------------------------------------------------------------
    |
    | Clean up WordPress markup, use relative URLs, nicer search URLs, and
    | disable trackbacks.
    |
    | Read more about the features at https://roots.io/plugins/soil/.
    |
    */

    'soil' => [
        'features' => [
            'soil-clean-up',
            'soil-disable-asset-versioning',
            'soil-disable-trackbacks',
            'soil-js-to-footer',
            'soil-nice-search',
            'soil-relative-urls',
        ]
    ],

];
