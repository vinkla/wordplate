<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <meta name="theme-color" content="#464646">

  <?php wp_head(); ?>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body <?php body_class(); ?>>

    <header id="masthead" class="site-header" role="banner">
        <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
            <?php wp_nav_menu(['theme_location' => 'primary-menu', 'menu_class' => 'nav-menu']); ?>
        </nav>
    </header>
