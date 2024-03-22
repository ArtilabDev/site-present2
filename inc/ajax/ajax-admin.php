<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


function load_more_users() {
    $page = $_POST['page'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'cookie_table';

    $per_page = 55;
    $offset = ($page - 1) * $per_page;

    $user_data = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC LIMIT $per_page OFFSET $offset", ARRAY_A);

    foreach ($user_data as $index => $user) {
        echo '<tr>';
        echo '<td>' . esc_html($index + 1 + $offset) . '</td>';
        echo '<td>' . esc_html($user['user_id']) . '</td>';
        echo '<td>' . esc_html($user['user_ip']) . '</td>';
        echo '<td>' . esc_html($user['cookie_accept']) . '</td>';
        echo '<td>' . esc_html($user['terms_of_service']) . '</td>';
        echo '<td>' . esc_html($user['created_at']) . '</td>';
        echo '</tr>';
    }

    wp_die();
}

add_action('wp_ajax_load_more_users', 'load_more_users');
add_action('wp_ajax_nopriv_load_more_users', 'load_more_users');