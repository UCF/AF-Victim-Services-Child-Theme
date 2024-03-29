<?php
//namespace VictimServices\Theme;

define( 'VICTIMSERVICES_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );


// Theme foundation
include_once VICTIMSERVICES_THEME_DIR . 'includes/config.php';
include_once VICTIMSERVICES_THEME_DIR . 'includes/meta.php';

// Add other includes to this file as needed.
// Register custom post type
function custom_post_type() {
	$labels = array(
		'name' => 'Resource Posts',
		'singular_name' => 'Resource Post',
		'menu_name' => 'Resource Posts',
		'add_new_item' => 'Add New Resource Post',
		'edit_item' => 'Edit Resource Post',
		'new_item' => 'New Resource Post',
		'view_item' => 'View Resource Post',
		'search_items' => 'Search Resource Posts',
		'not_found' => 'No Resource Posts found',
		'not_found_in_trash' => 'No Resource Posts found in Trash',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
		'has_archive' => true,
		'rewrite' => array('slug' => 'resource-posts'),
	);
	register_post_type('resource_post', $args);
}
add_action('init', 'custom_post_type');
