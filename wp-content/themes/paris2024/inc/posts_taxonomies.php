<?php
function create_posts_taxonomies() {

    $taxonomy="category";
    $object_type = array("post");
    $args = array(
        'label' => ( 'Catégorie' ),
        'rewrite' => array( 'slug' => 'category' ),
        'hierarchical' => true,
    );
    register_taxonomy( $taxonomy, $object_type, $args );

}
add_action( 'init', 'create_posts_taxonomies' );