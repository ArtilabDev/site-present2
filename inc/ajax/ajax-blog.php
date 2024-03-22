<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


function load_more_posts() {
    $page = $_POST['page'];
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        'paged'          => $page,
    );

    if (isset($_POST['category_name']) && $_POST['category_name']) {
        $current_category = get_category_by_slug($_POST['category_name']);
        $args['cat'] = $current_category->term_id;
    }

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post();
            get_template_part('template-parts/content-post'); 
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No more posts'; 
    endif;

    wp_die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');