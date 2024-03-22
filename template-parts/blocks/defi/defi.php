<?php 
  global $wp_query;
  $defi_per_page = get_field('post_per_page_defi') ? get_field('post_per_page_defi') : 3;
  ?>
<section class="defi">
  <div class="container">
    <div class="defi__head">
      <h1><?php the_title() ?></h1>
      <?php if ( get_field('description_defi') ) : ?>
      <?= get_field('description_defi'); ?>
      <?php endif; ?>
    </div>

    <div class="defi__body">
      <div class="defi__sort">
        <?php
      
      $network_tax = get_terms( 
      
        array(
        'taxonomy' => 'network_taxonomy')
      );

      if ($network_tax) {
          echo '<select class="converted-select network-select" data-index="select-1">';
          echo '<option>Network</option>';
          echo '<option value="network">All</option>';
          foreach ($network_tax as $taxonomy) {
            $icon_id = get_field('network_icon', 'network_taxonomy_' . $taxonomy->term_id);
            echo '<option data-img="'. wp_get_attachment_image_url( $icon_id, 'thumbnail', false ) .'" value="' . esc_attr($taxonomy->slug) . '">' . esc_html($taxonomy->name) . '</option>';
          }
          echo '</select>';
      }
      ?>

        <select class="converted-select" data-index="select-2">
          <option>Sort by</option>
          <option value="apy_defi">APY</option>
          <option value="dvl_defi">Liquidity</option>
          <option value="date">Newest</option>
        </select>

      </div>

      <div class="defi__content" data-per_page=<?= esc_attr($defi_per_page) ?>>

        <?php
        
          $args = array(
              'post_type' => 'defi',
              'post_status' => 'publish',
              'posts_per_page' => $defi_per_page,
              'paged' => get_query_var( 'paged' ),
              'orderby' => 'date',
              'order' => 'DESC', 
          );
          
          query_posts($args);

          if (have_posts()) :

              while (have_posts()) : the_post();

                get_template_part('template-parts/content', 'defi');

              endwhile;
  
              
          else :
              echo __('No more posts', 'dollet');
          endif;
              ?>
      </div>

      <?php 
        $current_page = $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1;
        if( $current_page < $wp_query->max_num_pages ) { 
      ?>
      <div class="defi__content-load-more">
        <div class="button button-simple sticky-cursor" data-current_page="<?= $current_page ?>"
          data-max_page="<?= $wp_query->max_num_pages ?>">
          <span><?php _e('Show more strategies', 'dollet') ?></span>
        </div>
      </div>
      <?php } ?>

      <div class="defi__pagination">
        <?php if ($wp_query->max_num_pages > 1) { ?>
        <ul>

          <?php for ($i = 1; $i <= $wp_query->max_num_pages; $i++) {
                $active_class = ($i === $current_page) ? 'active' : '';
                echo '<li class="' . $active_class . ' sticky-cursor">';
                if(!$active_class){
                  echo '<span>' . $i . '</span>';
                } else {
                  echo '<span class="active-span">' . $i . '</span>';
                }
                echo '</li>';
              } ?>

        </ul>
        <?php } ?>
      </div>

    </div>
  </div>
</section>