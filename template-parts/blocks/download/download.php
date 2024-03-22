<section class="banner animated">
  <div class="container">
    <div class="banner__wrap">
      <div class="banner__content">
        <div class="banner__content-title">
          <?= get_field('title_download'); ?>
        </div>
        <div class="banner__content-text">
          <?php $descr = get_field('descr_download'); ?>
          <?php echo $descr; ?>
        </div>
        <?php if (get_field('style_download') !== 'style-2') : ?>
        <div class="banner__content-buttons">
          <a href="<?= esc_attr(get_field('google_play_link_download_modal', 'options')) ?>" class="sticky-cursor">
            <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/btn_store.png" width="218" height="64"
              alt="play market icon">
          </a>
          <a href="<?= esc_attr(get_field('app_store_link_download_modal', 'options')) ?>" class="sticky-cursor">
            <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/btn_app.png" width="218" height="64"
              alt="app store icon">
          </a>
        </div>
        <?php endif; ?>
      </div>

      <div class="banner__app">
        <picture>
          <source media="(max-width: 768px)" srcset="<?= esc_url(get_field('image_small')); ?>">
          <img src="<?= esc_url(get_field('image_big')); ?>" loading="lazy" fetchpriority="low" width="577" height="417"
            alt="pic application">
        </picture>
      </div>
    </div>
  </div>
</section>