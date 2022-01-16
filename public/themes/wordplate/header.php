<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if (
        wp_get_environment_type() === 'local' &&
        is_array(wp_remote_get('http://localhost:3000'))
    ) : ?>
        <script type="module" src="http://localhost:3000/@vite/client"></script>
        <script type="module" src="http://localhost:3000/resources/scripts/index.js"></script>
    <?php else : ?>
        <?php $manifest = json_decode(file_get_contents(get_theme_file_path('assets/manifest.json')), true); ?>
        <script type="module" src="<?= get_theme_file_uri('assets/' . $manifest['resources/scripts/index.js']['file']) ?>" defer></script>
        <link rel="stylesheet" href="<?= get_theme_file_uri('assets/' . $manifest['resources/scripts/index.js']['css'][0]) ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <nav role="navigation">
            <?php wp_nav_menu(['theme_location' => 'navigation']); ?>
        </nav>
    </header>
