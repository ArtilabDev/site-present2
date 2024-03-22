<section class="benefit">
  <div class="container">
    <div class="benefit__head">
      <div class="benefit-title">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>

    <div class="benefit__body" data-scroll-body>
      <div class="benefit-sidebar" data-scroll-block>
        <ul>
          <?php
                    $select_how_to_use = get_field('select_how_to_use');
                    if ($select_how_to_use) :
                        foreach ($select_how_to_use as $index => $post) :
                            $post_id = $post->ID;
                            $title = get_the_title($post_id);
                            $icon = get_field('icon', $post_id);
                            ?>
          <li class="<?= ($index === 0) ? 'active' : ''; ?>" data-scroll-item="<?= $index + 1 ?>">
            <span class="sticky-cursor sticky-dot">
              <?php if ($icon) : ?>
              <?= wp_get_attachment_image($icon, 'large'); ?>
              <?php endif; ?>
              <?= esc_html($title); ?>
            </span>
          </li>
          <?php
                        endforeach;
                    endif;
                    ?>
        </ul>
      </div>
      <div class="benefit-content" data-scroll-content>
        <?php
                if ($select_how_to_use) :
                    $index = 1;
                    foreach ($select_how_to_use as $post) :
                        $post_id = $post->ID;
                        ?>
        <div class="benefit-content_block" data-scroll-anchor="<?= $index ?>">
          <div class="slide-title">
            <h2><?= esc_html(get_the_title($post_id)); ?></h2>
          </div>
          <div class="benefit-slider" id="benefit-slider-<?= $index ?>" data-id="<?= $index ?>">
            <div class="swiper-wrapper">
              <?php
                                    if (have_rows('steps', $post_id)) :
                                        $step_index = 1;
                                        $all_steps = count(get_field('steps', $post_id));
                                        
                                        while (have_rows('steps', $post_id)) : the_row();
                                        $fetchpriority = $step_index === 1 ? 'hight' : 'low';
                                        $loading = $step_index === 1 ? 'eager' : 'lazy';
                                            ?>
              <div class="swiper-slide">
                <div class="slide-image">
                  <?php
                                                    $image = get_sub_field('image', $post_id);
                                                    if ($image) {
                                                        echo wp_get_attachment_image($image, 'large', false, array('loading' => $loading, 'fetchpriority' => $fetchpriority ));
                                                        
                                                    }
                                                    ?>
                </div>
                <div class="slide-info">
                  <div class="slide-name">
                    Step <?= $step_index; ?> / <?= $all_steps; ?>
                  </div>
                  <div class="slide-text">
                    <?= get_sub_field('text', $post_id); ?>
                  </div>
                </div>
              </div>
              <?php
                                            $step_index++;
                                        endwhile;
                                    endif;
                                    ?>
            </div>
            <div class="swiper-pagination swiper-pagination-<?= $index ?>"></div>
            <div class="swiper-button-prev benefit-prev benefit-prev-<?= $index ?> sticky-cursor"></div>
            <div class="swiper-button-next benefit-next benefit-next-<?= $index ?> sticky-cursor"></div>
          </div>
        </div>
        <?php
                        $index++;
                    endforeach;
                endif;
                ?>
      </div>
    </div>
</section>