<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | TinyMCE editor
    |--------------------------------------------------------------------------
    |
    | All tool bar options in WordPress default WYSIWYG editor that doesn't
    | have any custom styling should be removed.
    |
    | Full list of formats http://www.tinymce.com/wiki.php/Controls
    |
    */
    
    'tinymce' => [
    
        'blockformats' => [
            'Paragraph=p',
            'Heading 2=h2',
            'Heading 3=h3',
        ],

        'disabled' => [
            'strikethrough',
            'underline',
            'forecolor',
            'justifyfull',
        ],
        
    ],

    /*
    |--------------------------------------------------------------------------
    | Remove Meta Boxes
    |--------------------------------------------------------------------------
    |
    | Remove unnecessary custom fields and meta boxes to cleanup the edit posts
    | view. Lets be honest, how often do you even use some of these boxes?
    |
    */

    'meta_boxes' => [
    
        'link' => [
            'linktargetdiv',
            'linkxfndiv',
            'linkadvanceddiv',
        ],

        'post' => [
            'postexcerpt',
            'trackbacksdiv',
            'postcustom',
            'commentstatusdiv',
            'commentsdiv',
            'revisionsdiv',
            'authordiv',
            'sqpt-meta-tags',
            'slugdiv',
            //'categorydiv',
            //'tagsdiv-post_tag',
        ],
        
    ],
    
    /*
    |--------------------------------------------------------------------------
    | JPEG Quality
    |--------------------------------------------------------------------------
    |
    | WordPress does automatically compress JPEG images at 90% quality. Setting
    | it to 100 would mean that WordPress would compress the image at its
    | highest quality.
    |
    */

    'jpeg_quality' => 100,
    
];
