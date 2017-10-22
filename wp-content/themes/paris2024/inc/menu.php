<?php
add_action( 'init', 'menus_du_themes' );

function menus_du_themes() {
  add_theme_support( 'menus' );
  register_nav_menu( 'header', 'Menu en-tête' );
  register_nav_menu( 'footer', 'Menu bas de page' );
}