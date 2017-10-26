<?php
function ajout_custom_type_init() {
$post_type = "sport";
    $labels = array(
        'name'               => 'Sports',
        'singular_name'      => 'Sport',
        'all_items'          => 'Tous les sports',
        'add_new'            => 'Ajouter un sport',
        'add_new_item'       => 'Ajouter un nouveau sport',
        'edit_item'          => "Editer le sport",
        'new_item'           => 'Nouveau sport',
        'view_item'          => "Voir le sport",
        'search_items'       => 'Chercher un sport',
        'not_found'          => 'Pas de résultat',
        'not_found_in_trash' => 'Pas de résultat',
        'parent_item_colon'  => 'Sport parent :',
        'menu_name'          => 'Sports',
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'supports'            => array( 'title','thumbnail','editor', 'excerpt', 'revisions'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 0,
        'menu_icon'           => 'dashicons-awards',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => false,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => array( 'slug' => $post_type )
    );

register_post_type($post_type, $args );

    $genre="genre";
    $object_type = array("profile");
    $args = array(
        'label' => ( 'Genre' ),
        'rewrite' => array( 'slug' => 'genre' ),
        'hierarchical' => true,
    );
    register_taxonomy( $genre, $object_type, $args );

    $seeking="seeking";
    $object_type = array("profile");
    $args = array(
        'label' => ( 'Recherche' ),
        'rewrite' => array( 'slug' => 'recherche' ),
        'hierarchical' => true,
    );
    register_taxonomy( $seeking, $object_type, $args );

}
add_action( 'init', 'ajout_custom_type_init' );