<?php
namespace VictimServices\Theme;

define( 'VICTIMSERVICES_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );


// Theme foundation
include_once VICTIMSERVICES_THEME_DIR . 'includes/config.php';
include_once VICTIMSERVICES_THEME_DIR . 'includes/meta.php';

// Add other includes to this file as needed.
function resource_post_type() {
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
add_action('init', 'resource_post_type');

function resource_post_type_sidebar() {
	add_menu_page(
		'Resource Post Type', // Page title
		'Resource Post Type', // Menu title
		'manage_options', // Capability required to access the page
		'edit.php?post_type=custom_post_type', // URL slug
		'', // Function to display the page content (we're not using this)
		'dashicons-format-aside', // Icon for the menu item
		20 // Position of the menu item
	);
}
add_action('admin_menu', 'resource_post_type_sidebar');
