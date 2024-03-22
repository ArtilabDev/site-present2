<?php
  $fetchpriority = is_front_page() ? 'hight' : 'low';
  $loading = is_front_page() ? 'eager' : 'lazy';

?>
<div class="modal" id="modal-download">
  <div class="modal__wrap">
    <div class="modal__inner">
      <div class="modal-close sticky-cursor sticky-link"></div>

      <div class="modal-header">
        <div class="modal-header_title"><?php echo get_field('title_modal', 'options'); ?></div>
        <div class="modal-header_subtitle">
          <?php echo get_field('text_modal', 'options'); ?>
        </div>
      </div>
      <div class="modal-content">
        <div class="download-buttons">
          <a href="<?= esc_attr(get_field('google_play_link_download_modal', 'options')) ?>" class="sticky-cursor">
            <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/btn_store.png" width="218" height="64"
              data-no-lazy="1" loading="<?= esc_attr($loading) ?>" fetchpriority="<?= esc_attr($fetchpriority) ?>"
              alt="play market icon">
          </a>
          <a href="<?= esc_attr(get_field('app_store_link_download_modal', 'options')) ?>" class="sticky-cursor">
            <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/btn_app.png" width="218" height="64"
              data-no-lazy="1" loading="<?= esc_attr($loading) ?>" fetchpriority="<?= esc_attr($fetchpriority) ?>"
              alt="app store icon">
          </a>
        </div>
      </div>

      <div class="modal-image">
        <?php
                $image_modal = get_field('image_modal', 'options');
                $size = 'large';
                if ($image_modal) {
                    echo wp_get_attachment_image($image_modal, $size);
                }
                ?>
      </div>
    </div>
  </div>
</div>