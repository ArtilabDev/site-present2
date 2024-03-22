<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function faq_func()
{
    $labels = array(
        'name'                  =>  __('Faq', 'dollet'),
        'singular_name'         => 'Faq',
        'menu_name'             => 'Faq',
        'add_new_item'          => 'Add New Faq',
        'add_new'               => 'Add New',
        'new_item'              => 'New Faq',
        'edit_item'             => 'Edit Faq',
        'update_item'           => 'Update Faq',
        'view_item'             => 'View Faq',
        'view_items'            => 'View All Faq',
    );
    $rewrite = array(
        'slug'                  => 'faq-case',
        'with_front'            => false,
        'pages'                 => true,
        'feeds'                 => false,
    );
    $args = array(
        'label'                 => 'Faq',
        'description'           => 'Faq Type Description',
        'labels'                => $labels,
        'supports'              => array('title'),
//        'taxonomies'            => array('portfolio_taxonomy'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => 'faq-case',
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );

    register_post_type('faq', $args);
}

add_action('init', 'faq_func', 0);