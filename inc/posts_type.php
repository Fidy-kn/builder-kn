<?php

// --------------------
// CUSTOM POST TYPE
// --------------------
function cptCustom() {
    register_post_type('custom', array(
    'label' => 'Custom',
    'description' => '',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'capabilities' => array(
    	'create_posts' 		 => 'update_core',
    	'edit_post'          => 'edit_post',
	    'read_post'          => 'read_post',
	    'delete_post'        => 'update_core',
	    'edit_posts'         => 'edit_posts',
	    'edit_others_posts'  => 'edit_others_posts',
	    'delete_posts'       => 'update_core',
	    'publish_posts'      => 'update_core',
	    'read_private_posts' => 'update_core'
    ),
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array(
    	'slug' => 'custom',
    	'with_front' => true
    ),
    'query_var' => true,
    'has_archive' => true,
    'exclude_from_search' => true,
    'supports' => array(
    	'title',
        'thumbnail'
    ),
    'labels' => array (
        'name' => 'Custom',
        'singular_name' => 'Custom',
        'menu_name' => 'Custom',
        'add_new' => 'Ajouter',
        'add_new_item' => 'Ajouter',
        'edit' => 'Modifier',
        'edit_item' => "Modifier",
        'new_item' => 'Ajouter',
        'view' => "Voir",
        'view_item' => "Voir",
        'search_items' => 'Chercher',
        'not_found' => 'Aucun',
        'not_found_in_trash' => 'Rien dans la corbeille',
        'parent' => 'Parent',
        )
    ));
}

//rendre le CPT multilangue
function cptCustomMultilangues($types) {
	return array_merge($types, array('custom' => 'custom'));
}
add_action('init', 'cptCustom');
add_filter('pll_get_post_types', 'cptCustomMultilangues');

register_taxonomy( 'categorie', 'custom', array( 'hierarchical' => true, 'label' => 'Catégories', 'query_var' => true, 'rewrite' => true, 'show_admin_column' => true ) );

// --------------------
// CUSTOM POST OFFRES D'EMPLOIS
// --------------------
function cptEmplois() {
    register_post_type('emplois', array(
    'label' => 'Offres d\'emplois',
    'description' => '',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'capabilities' => array(
        'create_post'        => 'update_core',
        'edit_post'          => 'edit_post',
        'read_post'          => 'read_post',
        'delete_post'        => 'update_core',
        'edit_posts'         => 'edit_posts',
        'edit_others_posts'  => 'edit_others_posts',
        'delete_posts'       => 'update_core',
        'publish_posts'      => 'update_core',
        'read_private_posts' => 'update_core'
    ),
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array(
        'slug' => 'emplois',
        'with_front' => true
    ),
    'query_var' => true,
    'has_archive' => true,
    'exclude_from_search' => true,
    'supports' => array(
        'title',
        'thumbnail'
    ),
    'labels' => array (
        'name' => 'Offres d\'emplois',
        'singular_name' => 'Offres d\'emplois',
        'menu_name' => 'Emplois',
        'add_new' => 'Ajouter',
        'add_new_item' => 'Ajouter',
        'edit' => 'Modifier',
        'edit_item' => "Modifier",
        'new_item' => 'Ajouter',
        'view' => "Voir",
        'view_item' => "Voir",
        'search_items' => 'Chercher',
        'not_found' => 'Aucun',
        'not_found_in_trash' => 'Rien dans la corbeille',
        'parent' => 'Parent',
        ),
    'menu_icon' => 'dashicons-clipboard'
    ));
}

//rendre le CPT multilangue
function cptEmploisMultilangues($types) {
    return array_merge($types, array('emplois' => 'emplois'));
}
add_action('init', 'cptEmplois');
add_filter('pll_get_post_types', 'cptEmploisMultilangues');

register_taxonomy( 'type', 'emplois', array( 'hierarchical' => true, 'label' => 'Type de contrat', 'query_var' => true, 'rewrite' => true, 'show_admin_column' => true));
register_taxonomy( 'fonction', 'emplois', array( 'hierarchical' => true, 'label' => 'Fonction', 'query_var' => true, 'rewrite' => true, 'show_admin_column' => true ));
register_taxonomy( 'localisation', 'emplois', array( 'hierarchical' => true, 'label' => 'Localisation', 'query_var' => true,  'rewrite' => true, 'show_admin_column' => true));



// --------------------
// CUSTOM POST AGENDA
// --------------------
function cptEvent() {
    register_post_type('events', array(
    'label' => 'Events',
    'description' => '',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'capabilities' => array(
    	'create_posts' 		 => 'update_core',
    	'edit_post'          => 'edit_post',
	    'read_post'          => 'read_post',
	    'delete_post'        => 'update_core',
	    'edit_posts'         => 'edit_posts',
	    'edit_others_posts'  => 'edit_others_posts',
	    'delete_posts'       => 'update_core',
	    'publish_posts'      => 'update_core',
	    'read_private_posts' => 'update_core'
    ),
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array(
    	'slug' => 'events',
    	'with_front' => true
    ),
    'query_var' => true,
    'has_archive' => true,
    'exclude_from_search' => true,
    'supports' => array(
    	'title',
        'thumbnail'
    ),
    'labels' => array (
        'name' => 'Events',
        'singular_name' => 'Event',
        'menu_name' => 'Events',
        'add_new' => 'Ajouter',
        'add_new_item' => 'Ajouter',
        'edit' => 'Modifier',
        'edit_item' => "Modifier",
        'new_item' => 'Ajouter',
        'view' => "Voir",
        'view_item' => "Voir",
        'search_items' => 'Chercher',
        'not_found' => 'Aucun',
        'not_found_in_trash' => 'Rien dans la corbeille',
        'parent' => 'Parent',
        ),
    'menu_icon' => 'dashicons-calendar-alt'
    ));
}

//rendre le CPT multilangue
function cptEventMultilangues($types) {
	return array_merge($types, array('event' => 'event'));
}
add_action('init', 'cptEvent');
add_filter('pll_get_post_types', 'cptEventMultilangues');

register_taxonomy( 'eventtype', 'events', array( 'hierarchical' => true, 'label' => 'Catégories', 'query_var' => true, 'rewrite' => true, 'show_admin_column' => true ) );

?>