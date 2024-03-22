<section class="apex preload <?php echo (get_field('style') == 'style-2') ? 'animated' : ''; ?>">
  <?php
    if (get_field('style') == 'style-2') {

        ?>
  <div class="apex__image">
    <picture>
      <source media="(max-width: 768px)" srcset="<?= esc_url(get_field('image_small')); ?>">
      <?php if (get_field('image_big')) : ?>
      <img fetchpriority="high" data-no-lazy="1" src="<?= esc_url(get_field('image_big')); ?>" alt="pic application" />
      <?php endif; ?>
    </picture>
  </div>
  <?php
    } else {
        ?>

  <div class="loading-dollet">
    <span>Loading...</span>
    <div class="spinner">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <div id="dollet-desk" data-path="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/models/SITE_1920x1080_V4_start.json"
    data-path-second="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/models/SITE_1920x1080_V4_part_3.json">
  </div>
  <div id="dollet-mob" data-path="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/models/SITE_425x756_V4-mob.json">
  </div>
  <?php
    }
    ?>
  <div class="container">
    <div class="apex__wrap">

      <?php if ( get_field('title_banner') ) : ?>
      <h1><?php the_field('title_banner'); ?></h1>
      <?php endif; ?>
      <?php if ( get_field('descr_banner') ) : ?>
      <span><?php the_field('descr_banner'); ?></span>
      <?php endif; ?>

      <div class="apex__buttons">
        <a href="<?= esc_attr(get_field('google_play_link_download_modal', 'options')) ?>" class="sticky-cursor">
          <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/btn_store.png" width="218" height="64"
            fetchpriority="high" data-no-lazy="1" alt="play market icon">
        </a>
        <a href="<?= esc_attr(get_field('app_store_link_download_modal', 'options')) ?>" class="sticky-cursor">
          <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/btn_app.png" width="218" height="64"
            fetchpriority="high" data-no-lazy="1" alt="app store icon">
        </a>
      </div>

    </div>
  </div>

</section>