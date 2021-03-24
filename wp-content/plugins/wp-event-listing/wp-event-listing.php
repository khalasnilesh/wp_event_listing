<?php
/**
 * Plugin Name: Wordpress Event Listing
 * Plugin URI: 
 * Description: Completed custom post type Event: custom category, custom meta box, custom post column, and custom taxonomy filter.
 * Version: 1.0
 * Author: Nilesh Khalas
 * Author URI: https://github.com/khalasnilesh
 */

/**
 * Key Name
 * cpt = custom post type
 */

require_once( plugin_dir_path( __FILE__ ) . 'form-library.php');
require_once( plugin_dir_path( __FILE__ ) . 'custom-meta-box.php');
require_once( plugin_dir_path( __FILE__ ) . 'custom-post-column.php');
require_once( plugin_dir_path( __FILE__ ) . 'custom-post-filter.php');

add_action('init', 'cpt_register_post_type');
function cpt_register_post_type() 
{
	/**
	 * Register custom post type
	 */
    register_post_type( 'cpt_post_type',
        array(
            'labels' => array(
                'name' => 'Event Post',
                'singular_name' => 'Event Post',
                'add_new' => 'Add Event Post',
                'add_new_item' => 'Add Event Post Item',
                'edit' => 'Edit',
                'edit_item' => 'Edit Event Post',
                'new_item' => 'New Event Post',
                'view' => 'View',
                'view_item' => 'View Event Post',
                'search_items' => 'Search Event Post',
                'not_found' => 'No Event Posts Found',
                'not_found_in_trash' => 'No Event Post found in the trash',
                'parent' => 'Parent Event Post view'
                ),
            'public' => true,            
            'supports' => array( 'editor','title','thumbnail'),            
            'has_archive' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'menu_position' => 5, // places menu item directly below Posts
            'menu_icon' => 'dashicons-format-image', // image icon
            'taxonomies' => array( 'cpt_taxonomy' )
        )
    );

	/**
	 * Register custom taxonomy
	 */
	register_taxonomy('cpt_taxonomy',array('cpt_post_type'), array(
 		'hierarchical' => true,
 		'labels' => array(
	 		'name' => _x( 'Event Taxonomy', 'taxonomy general name' ),
	 		'singular_name' => _x( 'Event Taxonomy', 'taxonomy singular name' ),
	 		'search_items' =>  __( 'Search Event Taxonomy' ),
	 		'all_items' => __( 'All Event Taxonomy' ),
	 		'parent_item' => __( 'Parent Event Taxonomy' ),
	 		'parent_item_colon' => __( 'Parent Event Taxonomy:' ),
	 		'edit_item' => __( 'Edit Event Taxonomy' ), 
	 		'update_item' => __( 'Update Event Taxonomy' ),
	 		'add_new_item' => __( 'Add New Event Taxonomy' ),
	 		'new_item_name' => __( 'New Event Taxonomy Name' ),
	 		'menu_name' => __( 'Event Taxonomy' ),
	 		),
 		'show_ui' => true,
 		'show_admin_column' => true,
 		'query_var' => true,
 		'rewrite' => array( 'slug' => 'cpt_taxonomy' ),
 		));
}

/**
 * Menu icon
 * More icons: http://melchoyce.github.io/dashicons/
 * Click "Copy CSS" after select image
 * After that, fill 'menu_icon' with icon class, for example 'dashicons-format-image'
 */
add_action( 'admin_head', 'add_menu_icons_styles' );
function add_menu_icons_styles()
{
    echo '<style>';
    echo '#adminmenu .menu-icon-events div.wp-menu-image:before {';
    echo 'content: "\f128";'; // replace this with copyed css
    echo '}';
    echo '</style>';
}

/**
 * admin_enqueue_scripts
 */
add_action('admin_enqueue_scripts', 'cpt_admin_enqueue_scripts', 100);

function cpt_admin_enqueue_scripts()
{
	/**
	 * Styling thumbnail column on the post view
	 */
	$admin_css = "<style type='text/css'>";
	$admin_css.= ".manage-column.column-cpt_thumbnail { width: 75px !important; }";
	$admin_css.= "</style>";
	
	echo $admin_css;
}