<!DOCTYPE html>
  <html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header id="header">
    <a href="<?php bloginfo('url')?>">Accueil</a>
    <?php 
      $args = array(
        'theme_location' => 'header',
        'container' => "nav",
        'menu' => 'header_fr',
        'menu_class' => 'menu_header',
        'menu_id' => 'menu_id'
      );
      wp_nav_menu($args);
		?>
    </header>