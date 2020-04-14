<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#6d9aea">
  <link rel="stylesheet" href="<?php echo get_theme_file_uri('assets/styles/app.css'); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav role="navigation">
            <?php wp_nav_menu(['theme_location' => 'navigation']); ?>
        </nav>
    </header>
