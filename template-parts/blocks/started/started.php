<section class="started">
  <div class="container">
    <div class="started__wrap">
      <div class="started__img">
        <?php
                $image = get_field('image');
                $size = 'large';
                if ($image) {
                    echo wp_get_attachment_image($image, $size);
                }
                ?>
      </div>

      <div class="started__content">
        <h2><?php the_field('title'); ?></h2>
        <div class="started__content-text">
          <?php the_field('description'); ?>
        </div>
      </div>

    </div>
  </div>
</section>