<section class="feature animated preload">
  <div class="container">
    <div class="feature__wrap">
      <h2><?= get_field('title_feature'); ?></h2>
      <div class="feature__tabs">
        <div class="feature__tabs-menu">
          <?php
                    if (have_rows('feature_list')) :
                        $index = 1; // Initialize the index variable
                        while (have_rows('feature_list')) : the_row();
                            ?>
          <span class="feature__tabs-menu_item <?= $index === 1 ? 'active' : ''; ?> sticky-cursor"
            data-index="<?= $index; ?>">
            <?= get_sub_field('title'); ?>
          </span>
          <?php
                            $index++;
                        endwhile;
                    endif;
                    ?>
          <span class="glider"></span>
        </div>
        <div class="feature__tabs-content">
          <div class="feature-content-image">
            <?php
            if (have_rows('feature_list')) :
                $image_index = 1;
                while (have_rows('feature_list')) : the_row();
                    ?>
            <div class="feature-icon <?= $image_index === 1 ? 'active' : ''; ?>" data-index="<?= $image_index; ?>">
              <?php
                $image = get_sub_field('image');
                $size = 'large';
                if ($image) {
                    echo wp_get_attachment_image($image, $size);
                }
                ?>
            </div>
            <?php
                    $image_index++;
                endwhile;
            endif;
            ?>
          </div>
          <div class="feature-content-slider">
            <div class="swiper-wrapper">
              <?php
            if (have_rows('feature_list')) :
                $index = 1; // Initialize the index variable
                while (have_rows('feature_list')) : the_row();
                    ?>
              <div class="swiper-slide">
                <div class="swiper-slide_title">
                  <h3><?= get_sub_field('title'); ?></h3>
                </div>
                <div class="swiper-slide_text">
                  <?= get_sub_field('description'); ?>
                </div>
              </div>
              <?php
                    $index++; // Increment the index for the next iteration
                endwhile;
            endif;
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>