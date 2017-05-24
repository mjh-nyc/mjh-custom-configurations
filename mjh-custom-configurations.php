<?php 
/*
Plugin Name: Musuem of Jewish Heritage Custom Configurations
Description: This plugin registers Musuem of Jewish Heritage custom configurations.
Version: 1.0.0
License: GPLv2
*/

// Register custom post types
function mjh_create_post_types() {
    // Register events
	$event_labels = array(
 		'name' => 'Events',
    	'singular_name' => 'Event',
    	'add_new' => 'Add New Event',
    	'add_new_item' => 'Add New Event',
    	'edit_item' => 'Edit Event',
    	'new_item' => 'New Event',
    	'all_items' => 'All Events',
    	'view_item' => 'View Event',
    	'search_items' => 'Search Events',
    	'not_found' =>  'No Events Found',
    	'not_found_in_trash' => 'No Events found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Events',
    );
	register_post_type( 'event', array(
		'labels' => $event_labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
		'taxonomies' => array( 'post_tag', 'category' ),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'events' ),
		)
	);
	
    // Register exhibition
	$exhibition_labels = array(
 		'name' => 'Exhibitions',
    	'singular_name' => 'Exhibition',
    	'add_new' => 'Add New Exhibition',
    	'add_new_item' => 'Add New Exhibition',
    	'edit_item' => 'Edit Exhibition',
    	'new_item' => 'New Exhibition',
    	'all_items' => 'All Exhibitions',
    	'view_item' => 'View Exhibition',
    	'search_items' => 'Search Exhibitions',
    	'not_found' =>  'No Exhibitions Found',
    	'not_found_in_trash' => 'No Exhibitions found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Exhibitions',
    );
	register_post_type( 'exhibition', array(
		'labels' => $exhibition_labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
		'taxonomies' => array( 'post_tag', 'category' ),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'exhibitions' ),
		)
	);
}
add_action( 'init', 'mjh_create_post_types' );

// Change label of post to Blog & Press
function mjh_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog &amp; Press';
    $submenu['edit.php'][5][0] = 'Blog &amp; Press';
    $submenu['edit.php'][10][0] = 'Add Blog &amp; Press';
    $submenu['edit.php'][16][0] = 'Blog &amp; Press Tags';
}
add_action( 'admin_menu', 'mjh_change_post_label' );
function mjh_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog &amp; Press';
    $labels->singular_name = 'Blog &amp; Press';
    $labels->add_new = 'Add Blog &amp; Press';
    $labels->add_new_item = 'Add Blog &amp; Press';
    $labels->edit_item = 'Edit Blog &amp; Press';
    $labels->new_item = 'Blog &amp; Press';
    $labels->view_item = 'View Blog &amp; Press';
    $labels->search_items = 'Search Blog &amp; Press';
    $labels->not_found = 'No Blog &amp; Press found';
    $labels->not_found_in_trash = 'No Blog &amp; Press found in Trash';
    $labels->all_items = 'All Blog &amp; Press';
    $labels->menu_name = 'Blog &amp; Press';
    $labels->name_admin_bar = 'Blog &amp; Press';
}
add_action( 'init', 'mjh_change_post_object' );
?>