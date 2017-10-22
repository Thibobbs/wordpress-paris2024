<?php
function ajout_scripts() {
    // main.js
    wp_register_script('main_js', JS_URL.'/script.min.js', array('jquery'),'1.1', true);
    wp_enqueue_script('main_js');

    // Google fonts
    wp_register_style( 'google_font', 'https://fonts.googleapis.com/css?family=Anton|Oxygen' );
    wp_enqueue_style( 'google_font' );

    // main.css
    wp_register_style( 'main_style', CSS_URL.'/style.min.css' );
    wp_enqueue_style( 'main_style' );
}

add_action( 'wp_enqueue_scripts', 'ajout_scripts' );