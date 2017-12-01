<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <?php wp_head(); ?>
  <title>Paris 2024<?php wp_title('|'); ?></title>
</head>

<body <?php body_class(); ?>>
 <div id="wptime-plugin-preloader"></div>
  <header class="header">
    <div class="header__burger">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>  
    <div class="header__container container">
      <a class="header__logo" href="<?php bloginfo('url')?>">
        <img src="<?= IMAGES_URL.'/logo_paris2024_header.png' ?>" alt="logo">
      </a>
      <?php 
        $args = array(
          'theme_location' => 'header',
          'container'      => "nav",
          'menu'           => 'header_fr',
          'menu_class'     => 'header__menu'
        );
        wp_nav_menu($args);
      ?>
    </div>
    <div class="header__burger-content">
        <?php 
        $args = array(
          'theme_location' => 'header',
          'container'      => "nav",
          'menu'           => 'header_fr',
          'menu_class'     => 'burger__menu'
        );
        wp_nav_menu($args);
      ?>
    </div>
  </header>

