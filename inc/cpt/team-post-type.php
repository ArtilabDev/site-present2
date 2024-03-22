<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function team_func()
{
    $labels = array(
        'name'                  =>  __('Team', 'dollet'),
        'singular_name'         => 'Team',
        'menu_name'             => 'Team',
        'add_new_item'          => 'Add New Team',
        'add_new'               => 'Add Team',
        'new_item'              => 'New Team',
        'edit_item'             => 'Edit Team',
        'update_item'           => 'Update Team',
        'view_item'             => 'View Team',
        'view_items'            => 'View All Team',
    );
    $rewrite = array(
        'slug'                  => 'team-case',
        'with_front'            => false,
        'pages'                 => true,
        'feeds'                 => false,
    );
    $args = array(
        'label'                 => 'Team',
        'description'           => 'Team Type Description',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
//        'taxonomies'            => array('portfolio_taxonomy'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 9,
        'menu_icon'             => 'dashicons-universal-access',
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => 'team-case',
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );

    register_post_type('team', $args);
}

add_action('init', 'team_func', 0);
