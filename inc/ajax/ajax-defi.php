<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


function load_defi_content() {
  $page = isset($_POST['page']) ? $_POST['page'] : 1;
  $selected_network = isset($_POST['selected_network']) ? $_POST['selected_network'] : '';
  $sort_by = isset($_POST['sort_by']) ? $_POST['sort_by'] : '';
  $defi_per_page = isset($_POST['defi_per_page']) ? $_POST['defi_per_page'] : 3;
  
  $args = array(
    'post_type' => 'defi',
    'post_status' => 'publish',
    'posts_per_page' => $defi_per_page,
    'paged' => $page,
  );

    if ($sort_by === 'date') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    } elseif ($sort_by !== 'Sort by' && $sort_by !== '') {
        $args['orderby'] = 'meta_value_num';
        $args['meta_key'] = $sort_by;
    }


  if ($selected_network !== 'Network' && $selected_network !== '' && $selected_network !== 'network') {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'network_taxonomy',
        'field' => 'slug',
        'terms' => $selected_network,
      ),
    );
  }


  $query = new WP_Query($args);

  ob_start();
  $json_data['out'] = '';

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('template-parts/content', 'defi');
    }
    wp_reset_postdata();
  } else {
    echo __('No more posts', 'dollet');
  }
  $json_data['out'] .= ob_get_clean();

  $max_page = $query->max_num_pages;

  $max_page = max(1, intval($max_page));
  
  $json_data['loadmore'] = '';
  ob_start();

  if ($max_page > 1 && $max_page !=  $page ) {
    ?>

<div class="button button-simple sticky-cursor" data-current_page="<?= $page ?>" data-max_page="<?= $max_page ?>">
  <span><?php _e('Show more strategies', 'dollet') ?></span>
</div>

<?php
  }
  $json_data['loadmore'] .= ob_get_clean();

  $json_data['pagination'] = '';
  ob_start();
  if ($max_page > 1) { ?>
<ul >

  <?php for ($i = 1; $i <= $max_page; $i++) {
            $active_class = $i == $page ? 'active' : '';
            echo '<li class="' . $active_class . ' sticky-cursor">';
            if($active_class != ''){
              echo '<span class="active-span">' . $i . '</span>';
            } else {
              echo '<span>' . $i . '</span>';
            }
            echo '</li>';
          } ?>

</ul>
<?php } 
  $json_data['pagination'] .= ob_get_clean();

  wp_send_json_success(array('result' => $json_data));
  wp_die();
}

add_action('wp_ajax_load_defi_content', 'load_defi_content');
add_action('wp_ajax_nopriv_load_defi_content', 'load_defi_content');