<?php

function caption_shortcode( $atts, $content = null ) {
  $attributes = shortcode_atts( array(
    'title' => ''
  ), $atts );

  return 
  '<div class="story__caption ">
    <div class="container">
      <h3>'. $attributes['title'] . '</h3> 
      <blockquote>' . $content .  '</blockquote>
    </div>
  </div>';
}
add_shortcode( 'caption', 'caption_shortcode' );

function image_shortcode( $atts, $content = null ) {
  return '<div class="story__img">' . $content . '</div>';
}
add_shortcode( 'img', 'image_shortcode' );