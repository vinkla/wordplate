<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
  <meta name="application-name" content="<?php bloginfo('name'); ?>">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="#6d9aea">

  <link rel="apple-touch-icon" href="<?php echo asset('assets/images/icon-192.png'); ?>">
  <link rel="icon" sizes="192x192" href="<?php echo asset('assets/images/favicon.png'); ?>">
  <link rel="shortcut icon" href="<?php echo asset('assets/images/favicon.png'); ?>">
  <link rel="manifest" href="<?php echo asset('manifest.json'); ?>">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header>
        <nav role="navigation">
            <?php wp_nav_menu(['theme_location' => 'primary-menu']); ?>
        </nav>
    </header>
