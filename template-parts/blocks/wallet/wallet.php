<section class="wallet">
  <div class="wallet__inner">
    <h2><?= get_field('title_wallet'); ?></h2>

    <div class="wallet__wrap">
      <?php
            if (have_rows('wallet_list')) :
                while (have_rows('wallet_list')) : the_row();
                    ?>
      <div class="wallet__block">
        <div class="wallet__block-image">
          <div class="wallet__block-image_fon">
            <?php
                                $image = get_sub_field('image');
                                $size = 'large'; // (thumbnail, medium, large, full або своє визначене значення)
                                if ($image) {
                                    echo wp_get_attachment_image($image, $size);
                                }
                                ?>
          </div>
          <div class="wallet__block-image_concept">
            <?php
                                $image_2 = get_sub_field('image_2');
                                $size = 'large'; // (thumbnail, medium, large, full або своє визначене значення)
                                if ($image_2) {
                                    echo wp_get_attachment_image($image_2, $size);
                                }
                                ?>
          </div>
        </div>

        <div class="wallet__block-content">
          <div class="block-icon">
            <?php
                                $icon = get_sub_field('icon');
                                $size = 'large'; // (thumbnail, medium, large, full або своє визначене значення)
                                if ($icon) {
                                    echo wp_get_attachment_image($icon, $size);
                                }
                                ?>
          </div>
          <h3 class="block-title">
            <?= get_sub_field('title'); ?>
          </h3>
          <div class="block-text">
            <?= get_sub_field('description'); ?>
          </div>
          <?php
                            $link = get_sub_field('button');
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
          <a class="button button-simple with-arrow sticky-cursor" href="<?php echo esc_url( $link_url ); ?>"
            target="<?php echo esc_attr( $link_target ); ?>">
            <span><?php echo esc_html( $link_title ); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon">
              <use xlink:href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build//img/_set.svg#icon-arrow"></use>
            </svg>
          </a>
          <?php endif; ?>
        </div>
      </div>
      <?php

                endwhile;
            endif;
            ?>
    </div>
  </div>
</section>