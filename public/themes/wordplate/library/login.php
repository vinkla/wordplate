<?php

 /*
  * Set custom login logo url.
  */
add_filter('login_headerurl', function () {
    return get_bloginfo('url');
});

/*
 * Set custom login error message.
 */
add_filter('login_errors', function () {
    return '<strong>Whoops!</strong> Looks like you missed something there. Have another go.';
});

/*
 * Set custom login logo.
 */
add_action('login_head', function () {
    $path = sprintf('%s/%s', get_template_directory_uri(), '/assets/images/logo.svg');

    echo "<style> .login h1 a { background-image: url($path); } </style>";
});
