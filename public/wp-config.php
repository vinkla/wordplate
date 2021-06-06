<?php

require __DIR__ . '/../vendor/autoload.php';

$table_prefix = env('WP_PREFIX', 'wp_');

$application = new WordPlate\Application(realpath(__DIR__ . '/../'));
$application->run();

require_once ABSPATH . 'wp-settings.php';
