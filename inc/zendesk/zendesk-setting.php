<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if (current_user_can('administrator')) {

    if( function_exists('acf_add_options_page') ) {

        $zendesk_settings = acf_add_options_page(array(
            'page_title'    => 'Zendesk Settings',
            'menu_title'    => 'Zendesk Settings',
            'redirect'      => true,
            'update_button' => __('Update', 'acf'),
            'position'      => 9, // Adjust the position in the admin menu
            'icon_url'     => 'dashicons-tickets' // Icon for the "Zendesk Settings" page
        ));

        }
        

}