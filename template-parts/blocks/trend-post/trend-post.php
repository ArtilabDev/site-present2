<?php
$post_count = wp_count_posts()->publish;

if ($post_count >= 5) :
    ?>
<section class="trending-articles">
  <div class="container">
    <h2><img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/icon/icon__fire.svg" width="24" height="32"
        alt="icon__fire">
      <?php _e('Trending articles', 'dollet') ?></h2>

    <div class="swiper trending-slider">
      <div class="swiper-wrapper">
        <?php
                    $number_of_posts = get_field('number_of_posts');

                    $args = array(
                        'post_type'      => 'post',
                        'post_status'    => 'publish',
                        'posts_per_page' => esc_html($number_of_posts),
                    );

                    $style = get_field('style');

                    if ($style == 'custom') :
                        $custom_posts = get_field('custom_posts');

                        if ($custom_posts) :
                            foreach ($custom_posts as $custom_post) :
                                ?>
        <div class="swiper-slide">
          <div class="swiper-slide_image sticky-cursor sticky-dot">
            <a href="<?= esc_url(get_permalink($custom_post->ID)); ?>">
              <?= get_the_post_thumbnail( $custom_post->ID,  'post_size' , array('alt' => esc_attr(get_the_title($custom_post->ID))) )?>
            </a>
          </div>

          <div class="swiper-slide_content">
            <div class="swiper-slide_tag">
              <ul>
                <?php
                                                $categories = get_the_category($custom_post->ID);
                                                foreach ($categories as $category) :
                                                    ?>
                <li class="<?= esc_attr(get_term_meta($category->term_id, 'color', true)); ?>">
                  <a href="<?= esc_url(get_category_link($category->term_id)); ?>" class="sticky-cursor">
                    <?= esc_html($category->name); ?>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="swiper-slide_date">
              <?php echo esc_html(get_the_date('F j, Y', $custom_post->ID)); ?>
            </div>
            <a href="<?php echo esc_url(get_permalink($custom_post->ID)); ?>"
              class="swiper-slide_title sticky-cursor sticky-dot">
              <?php echo esc_html(get_the_title($custom_post->ID)); ?>
            </a>
            <div class="swiper-slide_text">
              <?php echo esc_html(get_the_excerpt($custom_post->ID)); ?>
            </div>
          </div>
        </div>
        <?php
                            endforeach;
                        endif;

                    else :
                        // Standard query if 'style' is not 'custom'
                        $custom_query = new WP_Query($args);

                        if ($custom_query->have_posts()) :
                            while ($custom_query->have_posts()) : $custom_query->the_post();
                                ?>
        <?= get_template_part('template-parts/parts/trend-slider');?>
        <?php
            endwhile;

            wp_reset_postdata();
        else :
            echo __('No more posts', 'dollet');
        endif;
    endif;
    ?>
      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev trending-prev sticky-cursor"></div>
      <div class="swiper-button-next trending-next sticky-cursor"></div>
    </div>
  </div>
</section>
<?php
endif;