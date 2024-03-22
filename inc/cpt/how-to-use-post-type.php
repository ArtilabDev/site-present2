<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function how_to_use_func()
{
    $labels = array(
        'name'                  =>  __('How to use', 'dollet'),
        'singular_name'         => 'How to use',
        'menu_name'             => 'How to use',
        'add_new_item'          => 'Add How to use',
        'add_new'               => 'Add New',
        'new_item'              => 'New How to use',
        'edit_item'             => 'Edit How to use',
        'update_item'           => 'Update How to use',
        'view_item'             => 'View How to use',
        'view_items'            => 'View How to use',
    );
    $rewrite = array(
        'slug'                  => 'how-to-use',
        'with_front'            => false,
        'pages'                 => true,
        'feeds'                 => false,
    );
    $args = array(
        'label'                 => 'How to use',
        'description'           => 'How to use Type Description',
        'labels'                => $labels,
        'supports'              => array('title'),
//        'taxonomies'            => array('portfolio_taxonomy'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-clipboard',
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => 'how-to-use-case',
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );

    register_post_type('How to use', $args);
}

add_action('init', 'how_to_use_func', 0);