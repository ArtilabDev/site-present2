<section class="ref-banner <?= (get_field('style') == 'crypto-bloom') ? 'crypto-bloom' : ''; ?> animated preload">
  <div class="ref-banner__image">
    <?php
        $image = get_field('image');
        $size = 'full'; // (thumbnail, medium, large, full, або своє визначене значення)
        if ($image) {
            echo wp_get_attachment_image($image, $size);
        }
        ?>
  </div>

  <div class="container">
    <div class="ref-banner__wrap">
      <?php if (get_field('title_banner')) : ?>
      <h1><?= get_field('title_banner'); ?></h1>
      <?php endif; ?>

      <?php if (get_field('subtitle_banner')) : ?>
      <h2><?= get_field('subtitle_banner') ?></h2>
      <?php endif; ?>

      <?php if (get_field('descr_banner')) : ?>
      <?= get_field('descr_banner') ?>
      <?php endif; ?>

      <?php if (get_field('btn_text')) : ?>
      <div class="ref-banner__buttons">
        <button type="button" class="button button-green sticky-cursor">
          <span><?= get_field('btn_text'); ?></span>
        </button>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>