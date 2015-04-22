<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Remove Dashboard Widgets
    |--------------------------------------------------------------------------
    |
    | Remove dashboard widgets to cleanup the administrator dashboard. Most
    | clients and user will never even bother using them. Instead, replace the
    | widgets with something more useful like Yahoo weather reports ;).
    |
    */

    'widgets' => [
    
        'side' => [
            'dashboard_primary',
            'dashboard_secondary',
            'dashboard_quick_press',
            'dashboard_recent_drafts',
        ],

        'normal' => [
            'dashboard_plugins',
            'dashboard_recent_comments',
            'dashboard_incoming_links',
            'dashboard_right_now',
            'dashboard_activity',
        ],
        
    ],
    
];
