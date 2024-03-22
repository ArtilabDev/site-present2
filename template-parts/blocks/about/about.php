<section class="about animated">
  <div class="container">
    <div class="about__wrap">
      <div class="about__content">
        <?php if ( get_field('title_about') ) : ?>
        <h2><?php the_field('title_about'); ?></h2>
        <?php endif; ?>
        <?php if ( get_field('descr_about') ) : ?>
        <div class="about__content-text">
          <?php the_field('descr_about'); ?>
        </div>
        <?php endif; ?>

        <div class="about__content-button">
          <?php 
            $link = get_field('link_about');
            
            if($link){
              $link_url = $link['url'];
              $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
          <a href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>" class=" button button-simple
            with-arrow sticky-cursor">
            <span><?php _e('Read more', 'dollet') ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon">
              <use xlink:href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/_set.svg#icon-arrow"></use>
            </svg>
          </a>
          <?php } ?>
        </div>
      </div>

      <div class="about__video">
        <?php if (get_field('style') !== 'style-2') : ?>
        <?php $video = get_field('video_about'); ?>
        <div id="about-dollet"
          data-path="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/models/07_Active_thinking_crop-mob.json">
        </div>
        <?php else : ?>
        <?php
              $image = get_field('image');
              $size = 'post_size';
              if ($image) {
                  echo wp_get_attachment_image($image, $size);
              }
              ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>