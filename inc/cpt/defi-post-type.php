<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function defi_post_type_func() {
    $labels = array(
        'name'                  =>  __('DeFi', 'dollet'),
        'singular_name'         => 'DeFi',
        'menu_name'             => 'DeFi',
        'add_new_item'          => 'Add New DeFi',
        'add_new'               => 'Add New',
        'new_item'              => 'New DeFi',
        'edit_item'             => 'Edit DeFi',
        'update_item'           => 'Update DeFi',
        'view_item'             => 'View DeFi',
        'view_items'            => 'View All DeFi',
    );
    $rewrite = array(
        'slug'                  => 'defi',
        'with_front'            => false,
        'pages'                 => true,
        'feeds'                 => false,
    );
    $args = array(
        'label'                 => 'DeFi',
        'description'           => 'DeFi Type Description',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'page-attributes'), //, 'thumbnail', 'excerpt'
        'taxonomies'            => array('network'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-portfolio',
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => 'defi',
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );

    register_post_type('defi', $args);
}

add_action('init', 'defi_post_type_func', 0);