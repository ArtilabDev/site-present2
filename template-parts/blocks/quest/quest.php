<section class="quest <?php echo (get_field('style') == 'crypto-bloom') ? 'crypto-bloom' : ''; ?> animated">
  <div class="container">
    <div class="quest__wrap">
      <?php if (get_field('title')) : ?>
      <h2><?php echo get_field('title'); ?></h2>
      <?php endif; ?>


      <div class="quest-slider">
        <div class="swiper-wrapper">
          <?php
                    if (have_rows('quest_list')) :
                        while (have_rows('quest_list')) : the_row();
                            ?>
          <div class="swiper-slide quest-slide">
            <div class="quest-slide_icon">
              <?php
                                    $image = get_sub_field('image');
                                    $size = 'large'; // (thumbnail, medium, large, full або своє визначене значення)
                                    if ($image) {
                                        echo wp_get_attachment_image($image, $size), false, array('loading' => 'lazy', 'fetchpriority' => 'low', 'alt' => esc_attr(get_sub_field('title')));
                                    }
                                    ?>
            </div>

            <?php if (get_sub_field('title')) : ?>
            <div class="quest-slide_title">
              <?= get_sub_field('title'); ?>
            </div>
            <?php endif; ?>

            <?php if (get_sub_field('text')) : ?>
            <div class="quest-slide_text">
              <?php echo get_sub_field('text'); ?>
            </div>
            <?php endif; ?>
          </div>
          <?php endwhile;
                    endif;
                    ?>
        </div>
      </div>
    </div>
  </div>
</section>