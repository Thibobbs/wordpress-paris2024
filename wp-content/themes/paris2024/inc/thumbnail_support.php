<?php

add_action( 'after_setup_theme', 'thumbnails_theme_support' );
function thumbnails_theme_support(){
    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'create_image_format' );
function create_image_format() {
  add_image_size( "hub_sport_thumbnail", 224, 168 );
}
