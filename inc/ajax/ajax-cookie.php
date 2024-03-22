<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function add_user_id_and_ip_to_database()
{
    $user_id = $_POST['user_id'];
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $cookie_accept = isset($_POST['cookie_accept']) ? sanitize_text_field($_POST['cookie_accept']) : '';
    $terms_of_service = isset($_POST['terms_of_service']) ? sanitize_text_field($_POST['terms_of_service']) : '';

    global $wpdb;
    $table_name = $wpdb->prefix . 'cookie_table';

    $existing_row = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE user_ip = %s",
            $user_ip
        )
    );

    if (!$existing_row) {
        $cookie_accept_value = !empty($cookie_accept) ? $cookie_accept : 'false';
        $terms_of_service_value = !empty($terms_of_service) ? $terms_of_service : 'false';

        $wpdb->insert(
            $table_name,
            array('user_id' => $user_id, 'user_ip' => $user_ip, 'cookie_accept' => $cookie_accept_value, 'terms_of_service' => $terms_of_service_value),
            array('%s', '%s', '%s', '%s')
        );

        wp_send_json_success('User ID and IP address added to the database.');
    } else {
        $cookie_accept_value = !empty($cookie_accept) ? $cookie_accept : $existing_row->cookie_accept;
        $terms_of_service_value = !empty($terms_of_service) ? $terms_of_service : $existing_row->terms_of_service;

        $wpdb->update(
            $table_name,
            array('cookie_accept' => $cookie_accept_value, 'terms_of_service' => $terms_of_service_value),
            array('user_ip' => $user_ip)
        );

        wp_send_json_success('User with this IP address already exists. Updated cookie_accept and terms_of_service.');
    }


    wp_die();
}

add_action('wp_ajax_add_user_id_and_ip_to_database', 'add_user_id_and_ip_to_database');
add_action('wp_ajax_nopriv_add_user_id_and_ip_to_database', 'add_user_id_and_ip_to_database');
