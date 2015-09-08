<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <meta name="theme-color" content="#464646">

  <meta name="author" content="">
  <meta name="description" content="">

  <?php wp_head(); ?>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>

    <header id="masthead" class="site-header" role="banner">
        <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
            <?php wp_nav_menu(['theme_location' => 'primary-menu', 'menu_class' => 'nav-menu']); ?>
        </nav>
    </header>
