<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_filter('wpcf7_autop_or_not', '__return_false');

function dollet_body_classes( $classes ) {
    $classes[] = 'hideAll';
  return $classes;
}
add_filter( 'body_class', 'dollet_body_classes' );

function add_custom_body_classes($classes) {
    $custom_field_values = get_field('custom_class');

    if ($custom_field_values) {
        foreach ($custom_field_values as $value) {
            if ($value !== 'no-banner') {
                $classes[] = sanitize_html_class($value);
            }
        }
    } elseif (is_singular('defi')) {
        $classes[] = 'page-strategy';
    }

    return $classes;
}
add_filter('body_class', 'add_custom_body_classes');



function get_classes($custom_field_value) {

    if ($custom_field_value !== null && in_array('no-banner', $custom_field_value)) {
        return 'no-banner';
    }

    if (is_singular('defi') || is_category() || is_single() || is_404()) {
        return 'no-banner';
    }

    return '';
}

function my_custom_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cookie_table';

    $total_users = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $per_page = 55;
    $total_pages = ceil($total_users / $per_page);

    ?>
<div class="wrap custom-page">
  <h1><?php _e('Users who have accepted the Terms of Service', 'dollet') ?></h1>
  <p class="admin-p">
    <?php _e('This is a list of users who have accepted the Terms of Service and accepted cookie, you can see the total number of users and their IP addresses.', 'dollet') ?>
  </p>

  <table class="widefat custom-admin-table">
    <thead>
      <tr>
        <th>№</th>
        <th><?php _e('User ID', 'dollet') ?></th>
        <th><?php _e('User IP', 'dollet') ?></th>
        <th><?php _e('Cookie Accept', 'dollet') ?></th>
        <th><?php _e('Terms of Service', 'dollet') ?></th>
        <th><?php _e('Date', 'dollet') ?></th>
      </tr>
    </thead>
    <tbody id="admin-custom-table">

    </tbody>
  </table>

  <div id="pagination">
    <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                $class = ($i === 1) ? ' class="page-number active"' : ' class="page-number"';
                echo '<button' . $class . ' data-page="' . $i . '">' . $i . '</button>';
            }
            ?>

  </div>
</div>

<?php
}


function redirect_search_page_to_home() {
  if( is_search() && !empty( $_GET['s'] ) ) {
      wp_redirect( home_url() );
      exit();
  }
}
add_action( 'template_redirect', 'redirect_search_page_to_home' );