<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if (current_user_can('administrator')) {

    if( function_exists('acf_add_options_page') ) {
        $parent = acf_add_options_page(array(
            'page_title' 	=> 'Theme settings',
            'menu_title' 	=> 'Theme settings',
            'redirect' 		=> true,
            'update_button'		=> __('Update', 'acf'),
            'position' => 9,
            'icon_url'     => 'dashicons-admin-generic' // Icon for the "Theme settings" page

        ));

        }
        
        function my_custom_menu_page() {
            add_menu_page(
                'Confirmed Users',
                'Confirmed Users',
                'manage_options',
                'confirmed_users-page', // Slug
                'my_custom_page_content',
                'dashicons-admin-network',
                20
            );
        }
        add_action('admin_menu', 'my_custom_menu_page');

}