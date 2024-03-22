<section class="article-slider">
  <div class="container">
    <h2><?php _e('More from Dollet blogs', 'dollet') ?></h2>

    <div class="article-swiper">
      <div class="swiper-wrapper">
        <?php
                $current_post_id = get_the_ID();
                $current_post_categories = get_the_category($current_post_id);

                $args = array(
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => 6,
                    'category__in'   => wp_list_pluck($current_post_categories, 'term_id'), // Включити категорії поточного поста
                );

                $custom_posts = new WP_Query($args);

                if ($custom_posts->have_posts()) :
                    while ($custom_posts->have_posts()) : $custom_posts->the_post();
                        $post_id = get_the_ID();
                        if ($post_id === $current_post_id) {
                            continue; // Пропустити поточний пост
                        }
                        ?>
        <div class="swiper-slide">
          <div class="blog-card">
            <a href="<?php the_permalink(); ?>" class="blog-card_image sticky-cursor sticky-dot">
              <?php the_post_thumbnail( 'post_size', array( 'alt'=> esc_attr(get_the_title()), 'loading' => 'lazy', 'fetchpriority' => 'low' ) ) ?>
            </a>
            <div class="blog-card_content">
              <div class="card-tag tags">
                <ul>
                  <?php
                      $categories = get_the_category();
                      foreach ($categories as $category) :
                          ?>
                  <li class="<?php echo get_term_meta($category->term_id, 'color', true); ?>">
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="sticky-cursor">
                      <?php echo esc_html($category->name); ?>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <div class="card-date">
                <?php echo get_the_date('F j, Y'); ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="card-text sticky-cursor sticky-dot">
                <?php the_title(); ?>
              </a>
            </div>
          </div>
        </div>
        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo __('No posts', 'dollet');
                endif;
                ?>
      </div>
    </div>
  </div>
</section>