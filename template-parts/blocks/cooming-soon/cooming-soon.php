<section class="comming-soon">
  <div class="container">
    <div class="comming-soon_wrap">
      <h1><?= the_title(); ?></h1>
      <div class="comming-soon_text">
        <?php the_field('description'); ?>
      </div>
      <a href="<?= esc_url(home_url('/')); ?>" class="button button-simple sticky-cursor with-arrow">
        <span><?php _e('Go to Homepage', 'dollet'); ?></span>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon">
          <use xlink:href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/_set.svg#icon-arrow">
          </use>
        </svg>
      </a>
    </div>
  </div>
</section>