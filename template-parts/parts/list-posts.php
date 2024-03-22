<?php
$post_count = wp_count_posts()->publish;
$current_category_slug = '';    
$args = array(
  'post_type'      => 'post',
  'post_status'    => 'publish',
  'posts_per_page' => 8,
  'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
);
  if (is_category()) {
      $current_category = get_queried_object();
      $args['cat'] = $current_category->term_id;
      $current_category_slug = $current_category->slug;
  }
  $custom_query = new WP_Query($args);
  $max_pages = $custom_query->max_num_pages;
  if ($custom_query->have_posts()) :
                    ?>
<div class="sBlog__articles-wrap" data-all-posts="<?= esc_attr($post_count); ?>"
  data-max-page="<?= esc_attr($max_pages) ?>" data-category-name="<?= esc_attr($current_category_slug); ?>">
  <?php
      while ($custom_query->have_posts()) : $custom_query->the_post();
          get_template_part('template-parts/content', 'post'); 
      endwhile;
      wp_reset_postdata();
  ?>
</div>
<?php
    else :
      echo __('No more posts', 'dollet');
  endif; ?>