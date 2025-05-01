<?php
/**
 * Plugin Name: Space Custom Post Types
 * Description: Registers the custom post types for the Space theme (e.g. Destinations, Crew, etc.)
 * Version: 1.0
 * Author: L
 */

// Register Destinations CPT
function register_destination_cpt() {
  register_post_type('destination', [
    'labels' => [
      'name' => 'Destinations',
      'singular_name' => 'Destination',
    ],
    'public' => true,
    'has_archive' => false,
    'rewrite' => ['slug' => 'destination'],
    'show_in_rest' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_icon' => 'dashicons-admin-site-alt3'
  ]);
}
add_action('init', 'register_destination_cpt');


// Register Crew CPT
function register_crew_cpt() {
  register_post_type('crew', [
    'labels' => [
      'name' => 'Crew',
      'singular_name' => 'Crew Member',
    ],
    'public' => true,
    'has_archive' => false,
    'rewrite' => ['slug' => 'crew'],
    'show_in_rest' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_icon' => 'dashicons-groups'
  ]);
}
add_action('init', 'register_crew_cpt');


// Register Technology CPT
function register_technology_cpt() {
  register_post_type('technology', [
    'labels' => [
      'name' => 'Technology',
      'singular_name' => 'Technology Item',
    ],
    'public' => true,
    'has_archive' => false,
    'rewrite' => ['slug' => 'technology'],
    'show_in_rest' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_icon' => 'dashicons-hammer'
  ]);
}
add_action('init', 'register_technology_cpt');

