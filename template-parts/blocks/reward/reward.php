<section class="reward <?php echo (get_field('style') == 'crypto-bloom') ? 'crypto-bloom' : ''; ?>">
  <div class="container">
    <div class="reward__wrap">
      <div class="reward__head">
        <?php if (get_field('title')) : ?>
        <h2><?php echo get_field('title'); ?></h2>
        <?php endif; ?>

        <?php if (get_field('description')) : ?>
        <?php echo get_field('description'); ?>
        <?php endif; ?>
      </div>
      <div class="reward__content animated">
        <?php
                if (have_rows('reward_system_list')) :
                    while (have_rows('reward_system_list')) : the_row();
                        $rewardClasses = ['gold', 'silver', 'bronze', 'grey'];
                        $rewardClass = '';
                        if (get_row_index() <= count($rewardClasses)) {
                            $rewardClass = $rewardClasses[get_row_index() - 1];
                        }
                        ?>
        <div class="reward-block <?php echo esc_attr($rewardClass); ?>">
          <div class="reward-block_icon">
            <?php
                                $image = get_sub_field('image');
                                $size = 'large'; // (thumbnail, medium, large, full або своє визначене значення)
                                if ($image) {
                                    echo wp_get_attachment_image($image, $size, false, array('loading' => 'lazy', 'fetchpriority' => 'low', 'alt' => esc_attr(get_sub_field('title'))));
                                }
                                ?>
          </div>

          <?php if (get_sub_field('title')) : ?>
          <div class="reward-block_title">
            <?php echo esc_html(get_sub_field('title')); ?>
          </div>
          <?php endif; ?>

          <?php if (get_sub_field('text')) : ?>
          <div class="reward-block_info">
            <?php echo esc_html(get_sub_field('text')); ?>
          </div>
          <?php endif; ?>
        </div>
        <?php endwhile;
                endif;
                ?>
      </div>

    </div>
  </div>
</section>