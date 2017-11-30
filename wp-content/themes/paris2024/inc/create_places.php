<?php
function ajout_places_init() {
$post_type = "lieu";
    $labels = array(
        'name'               => 'Lieux',
        'singular_name'      => 'Lieu',
        'all_items'          => 'Tous les lieux',
        'add_new'            => 'Ajouter un lieu',
        'add_new_item'       => 'Ajouter un nouveau lieu',
        'edit_item'          => "Editer le lieu",
        'new_item'           => 'Nouveau lieu',
        'view_item'          => "Voir le lieu",
        'search_items'       => 'Chercher un lieu',
        'not_found'          => 'Pas de résultat',
        'not_found_in_trash' => 'Pas de résultat',
        'parent_item_colon'  => 'Lieu parent :',
        'menu_name'          => 'Lieux',
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'supports'            => array( 'title','thumbnail','editor', 'excerpt', 'revisions'),
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 0,
        'menu_icon'           => 'dashicons-awards',
        'show_in_nav_menus'   => false,
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        'has_archive'         => false,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => false
    );

register_post_type($post_type, $args );

}
add_action( 'init', 'ajout_places_init' );