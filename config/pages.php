<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Pages
    |--------------------------------------------------------------------------
    |
    | Setup default pages when your theme is activated. You can also specify
    | which type of page it is our if the page should use a custom template.
    |
    | Accepted parameters: title, type, template and parent.
    |
    */

    'pages' => [
        [
            'title' => 'Start',
            'type' => 'home',
        ],
        [
            'title' => 'About',
            'template' => 'pages/about.php',
        ],
        [
            'title' => 'Archive',
            'type' => 'blog',
            'parent' => 'About',
        ],
    ],

];
