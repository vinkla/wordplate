<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#6d9aea">

  <?php wp_head(); ?>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body <?php body_class(); ?>>

    <header>
        <nav role="navigation">
            <?php wp_nav_menu(['theme_location' => 'primary-menu']); ?>
        </nav>
    </header>
