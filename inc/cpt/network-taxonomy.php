<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function network_taxonomy() {
    $labels = array(
        'name'                       => 'Network',
        'singular_name'              => 'Network',
        'search_items'               => 'Search Network',
        'popular_items'              => 'Popular Network',
        'all_items'                  => 'All Network',
        'edit_item'                  => 'Edit Network',
        'update_item'                => 'Update Network',
        'add_new_item'               => 'Add New Network',
        'new_item_name'              => 'New Network',
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'          	 => true,
        'rewrite'                    => array( 'slug' => 'network' ),
    );

    register_taxonomy( 'network_taxonomy', array( 'defi' ), $args );
}
add_action( 'init', 'network_taxonomy', 0 );