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
    	'not_found_in_trash' => 'No Events Found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Events',
    );
	register_post_type( 'event', array(
		'labels' => $event_labels,
        'menu_icon' => 'dashicons-calendar-alt',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'events' ),
		)
	);
	register_event_category();


    // Publications
    $publication_labels = array(
        'name' => 'Publications',
        'singular_name' => 'Publication',
        'add_new' => 'Add New Publication',
        'add_new_item' => 'Add New Publication',
        'edit_item' => 'Edit Publication',
        'new_item' => 'New Publication',
        'all_items' => 'All Publications',
        'view_item' => 'View Publication',
        'search_items' => 'Search Publications',
        'not_found' =>  'No Publications Found',
        'not_found_in_trash' => 'No Publications Found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Publications',
    );
    register_post_type( 'publication', array(
        'labels' => $publication_labels,
        'menu_icon' => 'dashicons-book-alt',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'publications' ),
        )
    );
    register_publication_category();
    
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
    	'not_found_in_trash' => 'No Exhibitions Found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Exhibitions',
    );
	register_post_type( 'exhibition', array(
		'labels' => $exhibition_labels,
        'menu_icon' => 'dashicons-tickets-alt',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'exhibitions' ),
		)
	);
	//register_exhibition_category();

    // Register testimony post type
    $testimony_labels = array(
        'name' => 'Testimonies',
        'singular_name' => 'Testimony',
        'add_new' => 'Add New Testimony',
        'add_new_item' => 'Add New Testimony',
        'edit_item' => 'Edit Testimony',
        'new_item' => 'New Testimony',
        'all_items' => 'All Testimonies',
        'view_item' => 'View Testimony',
        'search_items' => 'Search Testimonies',
        'not_found' =>  'No Testimonies Found',
        'not_found_in_trash' => 'No Testimonies Found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Testimonies',
    );
    register_post_type( 'testimony', array(
        'labels' => $testimony_labels,
        'menu_icon' => 'dashicons-microphone',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'testimonies' ),
        )
    );
    register_testimony_category();

}
add_action( 'init', 'mjh_create_post_types' );

function register_event_category(){
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Event Categories', 'taxonomy general name', 'sage' ),
		'singular_name'     => _x( 'Event Category', 'taxonomy singular name', 'sage' ),
		'search_items'      => __( 'Search Event Categories', 'sage' ),
		'all_items'         => __( 'All Event Categories', 'sage' ),
		'parent_item'       => __( 'Parent Event Category', 'sage' ),
		'parent_item_colon' => __( 'Parent Event Category:', 'sage' ),
		'edit_item'         => __( 'Edit Event Category', 'sage' ),
		'update_item'       => __( 'Update Event Category', 'sage' ),
		'add_new_item'      => __( 'Add New Event Category', 'sage' ),
		'new_item_name'     => __( 'New Event Category Name', 'sage' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event-category' ),
	);

	register_taxonomy( 'event_category', array( 'event' ), $args );
}


function register_publication_category(){
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Publication Categories', 'taxonomy general name', 'sage' ),
        'singular_name'     => _x( 'Publication Category', 'taxonomy singular name', 'sage' ),
        'search_items'      => __( 'Search Publication Categories', 'sage' ),
        'all_items'         => __( 'All Publication Categories', 'sage' ),
        'parent_item'       => __( 'Parent Publication Category', 'sage' ),
        'parent_item_colon' => __( 'Parent Publication Category:', 'sage' ),
        'edit_item'         => __( 'Edit Publication Category', 'sage' ),
        'update_item'       => __( 'Update Publication Category', 'sage' ),
        'add_new_item'      => __( 'Add New Publication Category', 'sage' ),
        'new_item_name'     => __( 'New Publication Category Name', 'sage' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'publication-category' ),
    );

    register_taxonomy( 'publication_category', array( 'publication' ), $args );
}

function register_testimony_category(){
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Testimony Categories', 'taxonomy general name', 'sage' ),
        'singular_name'     => _x( 'Testimony Category', 'taxonomy singular name', 'sage' ),
        'search_items'      => __( 'Search Testimony Categories', 'sage' ),
        'all_items'         => __( 'All Testimony Categories', 'sage' ),
        'parent_item'       => __( 'Parent Testimony Category', 'sage' ),
        'parent_item_colon' => __( 'Parent Testimony Category:', 'sage' ),
        'edit_item'         => __( 'Edit Testimony Category', 'sage' ),
        'update_item'       => __( 'Update Testimony Category', 'sage' ),
        'add_new_item'      => __( 'Add New Testimony Category', 'sage' ),
        'new_item_name'     => __( 'New Testimony Category Name', 'sage' ),
        'menu_name'         => __( 'Categories', 'sage' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'testimony-category' ),
    );

    register_taxonomy( 'testimony_category', array( 'testimony' ), $args );
}

/*function register_exhibition_category(){
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Exhibition Categories', 'taxonomy general name', 'sage' ),
		'singular_name'     => _x( 'Exhibition Category', 'taxonomy singular name', 'sage' ),
		'search_items'      => __( 'Search Exhibition Categories', 'sage' ),
		'all_items'         => __( 'All Exhibition Categories', 'sage' ),
		'parent_item'       => __( 'Parent Exhibition Category', 'sage' ),
		'parent_item_colon' => __( 'Parent Exhibition Category:', 'sage' ),
		'edit_item'         => __( 'Edit Exhibition Category', 'sage' ),
		'update_item'       => __( 'Update Exhibition Category', 'sage' ),
		'add_new_item'      => __( 'Add New Exhibition Category', 'sage' ),
		'new_item_name'     => __( 'New Exhibition Category Name', 'sage' ),
		'menu_name'         => __( 'Exhibition Category', 'sage' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'exhibition-category' ),
	);

	register_taxonomy( 'exhibition_category', array( 'exhibition' ), $args );
}*/

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
    $labels->not_found_in_trash = 'No Blog &amp; Press Found in Trash';
    $labels->all_items = 'All Blog &amp; Press';
    $labels->menu_name = 'Blog &amp; Press';
    $labels->name_admin_bar = 'Blog &amp; Press';
}
add_action( 'init', 'mjh_change_post_object' );

// wp-content/app example
add_filter('acf/settings/save_json', function($path) {
    return WPMU_PLUGIN_DIR . '/mjh-custom-configurations/acf-json';
});
// wp-content/app example
add_filter('acf/settings/load_json', function($paths) {
	unset($paths[0]);
	$paths[] = WPMU_PLUGIN_DIR . '/mjh-custom-configurations/acf-json';
    return $paths;
});
//***************************************************************//
// FORMIDDABLE CALL FRONT END CSS WHEN FORM IS SET AND IF FORM HAS ERRORS ////////////////////////////////
// Remove form style
function mjh_dequeue_formiddable_frontend_css() {
	wp_dequeue_style( 'formidable' );
	wp_dequeue_style( 'frm_fonts' );
}
add_action( 'wp_print_styles', 'mjh_dequeue_formiddable_frontend_css', 100 );

function mjh_enqueue_formiddable_display_form_action($params, $fields, $form){
	mjh_enqueue_formiddable_scripts();
}
add_action('frm_display_form_action', 'mjh_enqueue_formiddable_display_form_action', 100, 3);

function mjh_enqueue_formiddable_invalid_error_message( $invalid_msg, $args ) {
	mjh_enqueue_formiddable_scripts();
	return $invalid_msg;
}
add_filter('frm_invalid_error_message', 'mjh_enqueue_formiddable_invalid_error_message', 10, 2);

function mjh_enqueue_formiddable_scripts(){
	$upload_dir = wp_upload_dir();
	wp_enqueue_style( 'mjh_formidable', $upload_dir['baseurl'] .  '/formidable/css/formidablepro.css' );
	wp_enqueue_style( 'mjh_frm_fonts', plugins_url() .  '/formidable-pro/css/frm_fonts.css' );
}

// Set title to form for screen reader
function mjh_custom_form_attributes( $attributes, $form ){
	$attributes .= "title=".str_replace(" ","_",$form->name);
    return $attributes;
}
add_filter( 'frm_form_attributes', 'mjh_custom_form_attributes', 10, 2 );

//END FORMIDDABLE CALL FRONT END CSS WHEN FORM IS SET
//***************************************************************//
//***************************************************************//
// FLOWPAPER REMOVE LITLY ////////////////////////////////
function mjh_dequeue_flowpaper_frontend_css() {
	wp_dequeue_style( 'lity-css' );
	wp_dequeue_script( 'lity-js' );
}
add_action( 'wp_print_styles', 'mjh_dequeue_flowpaper_frontend_css', 100 );
//END FLOWPAPER REMOVE LITLY
//***************************************************************//
?>