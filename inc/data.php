<?php
/**
 * Custom taxonomies and post types
 *
 *
 * 
 *
 * @package state_poisonings
 */


//poisoning custom post type

// Register Custom Post Type poisoning
// Post Type Key: poisoning

function create_poisoning_cpt() {

  $labels = array(
    'name' => __( 'Poisonings', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Poisoning', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Poisoning', 'textdomain' ),
    'name_admin_bar' => __( 'Poisoning', 'textdomain' ),
    'archives' => __( 'Poisoning Archives', 'textdomain' ),
    'attributes' => __( 'Poisoning Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Poisoning:', 'textdomain' ),
    'all_items' => __( 'All Poisonings', 'textdomain' ),
    'add_new_item' => __( 'Add New Poisoning', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Poisoning', 'textdomain' ),
    'edit_item' => __( 'Edit Poisoning', 'textdomain' ),
    'update_item' => __( 'Update Poisoning', 'textdomain' ),
    'view_item' => __( 'View Poisoning', 'textdomain' ),
    'view_items' => __( 'View Poisonings', 'textdomain' ),
    'search_items' => __( 'Search Poisonings', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into poisoning', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this poisoning', 'textdomain' ),
    'items_list' => __( 'Poisoning list', 'textdomain' ),
    'items_list_navigation' => __( 'Poisoning list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Poisoning list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'poisoning', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-warning',
  );
  register_post_type( 'poisoning', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_poisoning_cpt', 0 );


add_action( 'init', 'create_nationality_taxonomies', 0 );
function create_nationality_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Nationalities', 'taxonomy general name' ),
    'singular_name' => _x( 'nationality', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Nationalities' ),
    'popular_items' => __( 'Popular Nationalities' ),
    'all_items' => __( 'All Nationalities' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Nationalities' ),
    'update_item' => __( 'Update nationality' ),
    'add_new_item' => __( 'Add New nationality' ),
    'new_item_name' => __( 'New nationality' ),
    'add_or_remove_items' => __( 'Add or remove Nationalities' ),
    'choose_from_most_used' => __( 'Choose from the most used Nationalities' ),
    'menu_name' => __( 'Nationality' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('nationalities', array('poisoning'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'nationality' ),
    'show_in_rest'          => true,
    'rest_base'             => 'nationality',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => true,    
  ));
}

add_action( 'init', 'create_occupation_taxonomies', 0 );
function create_occupation_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Occupations', 'taxonomy general name' ),
    'singular_name' => _x( 'occupation', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Occupations' ),
    'popular_items' => __( 'Popular Occupations' ),
    'all_items' => __( 'All Occupations' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Occupations' ),
    'update_item' => __( 'Update occupation' ),
    'add_new_item' => __( 'Add New occupation' ),
    'new_item_name' => __( 'New occupation' ),
    'add_or_remove_items' => __( 'Add or remove Occupations' ),
    'choose_from_most_used' => __( 'Choose from the most used Occupations' ),
    'menu_name' => __( 'Occupation' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('occupations', array('poisoning'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'occupation' ),
    'show_in_rest'          => true,
    'rest_base'             => 'occupation',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => true,    
  ));
}

add_action( 'init', 'create_agent_taxonomies', 0 );
function create_agent_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Agents', 'taxonomy general name' ),
    'singular_name' => _x( 'Agent', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Agents' ),
    'popular_items' => __( 'Popular Agents' ),
    'all_items' => __( 'All Agents' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Agents' ),
    'update_item' => __( 'Update agent' ),
    'add_new_item' => __( 'Add New agent' ),
    'new_item_name' => __( 'New agent' ),
    'add_or_remove_items' => __( 'Add or remove Agents' ),
    'choose_from_most_used' => __( 'Choose from the most used Agents' ),
    'menu_name' => __( 'Agent' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('agents', array('poisoning'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'agent' ),
    'show_in_rest'          => true,
    'rest_base'             => 'agent',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => true,    
  ));
}

add_action( 'init', 'create_perpetrator_taxonomies', 0 );
function create_perpetrator_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Perpetrators', 'taxonomy general name' ),
    'singular_name' => _x( 'perpetrator', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Perpetrators' ),
    'popular_items' => __( 'Popular Perpetrators' ),
    'all_items' => __( 'All Perpetrators' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Perpetrators' ),
    'update_item' => __( 'Update perpetrator' ),
    'add_new_item' => __( 'Add New perpetrator' ),
    'new_item_name' => __( 'New perpetrator' ),
    'add_or_remove_items' => __( 'Add or remove Perpetrators' ),
    'choose_from_most_used' => __( 'Choose from the most used Perpetrators' ),
    'menu_name' => __( 'Perpetrator' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('perpetrators', array('poisoning'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'perpetrator' ),
    'show_in_rest'          => true,
    'rest_base'             => 'perpetrator',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => true,    
  ));
}


add_action( 'init', 'create_rating_taxonomies', 0 );
function create_rating_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Ratings', 'taxonomy general name' ),
    'singular_name' => _x( 'rating', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Ratings' ),
    'popular_items' => __( 'Popular Ratings' ),
    'all_items' => __( 'All Ratings' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Ratings' ),
    'update_item' => __( 'Update rating' ),
    'add_new_item' => __( 'Add New rating' ),
    'new_item_name' => __( 'New rating' ),
    'add_or_remove_items' => __( 'Add or remove Ratings' ),
    'choose_from_most_used' => __( 'Choose from the most used Ratings' ),
    'menu_name' => __( 'Rating' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('ratings', array('poisoning'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'rating' ),
    'show_in_rest'          => true,
    'rest_base'             => 'rating',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => true,    
  ));
}

