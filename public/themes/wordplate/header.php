<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= get_theme_file_uri('assets/app.css') ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav role="navigation">
            <?php wp_nav_menu(['theme_location' => 'navigation']); ?>
        </nav>
    </header>
