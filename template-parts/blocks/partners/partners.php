<section class="partners">
  <div class="container">
    <?php if ( get_field('title_partners') ) : ?>
    <h2><?= get_field('title_partners'); ?></h2>
    <?php endif; ?>
  </div>
  <?php if ( have_rows('list_partners') ) : ?>
  <div class="partners-slider">
    <div class="swiper-wrapper">

      <?php while( have_rows('list_partners') ) : the_row(); ?>

      <div class="swiper-slide">

        <?php
        if ( get_sub_field('logo') ) {
          $attachment_id = get_sub_field('logo');
          $size = "medium"; // (thumbnail, medium, large, full or custom size)
          echo wp_get_attachment_image( $attachment_id, $size );
        }
        ?>

      </div>

      <?php endwhile; ?>

    </div>
  </div>
  <?php endif; ?>
</section>