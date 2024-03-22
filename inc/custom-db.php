<?php
function cg_create_cookie_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cookie_table';

    if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table_name)) !== $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
            cookie_id bigint(20) NOT NULL AUTO_INCREMENT,
            user_id varchar(255) NOT NULL,
            user_ip varchar(45) NOT NULL,
            cookie_accept TEXT,
            terms_of_service TEXT,
            created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (cookie_id),
            UNIQUE KEY user_id (user_id),
            KEY user_ip (user_ip)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

add_action('init', 'cg_create_cookie_table');