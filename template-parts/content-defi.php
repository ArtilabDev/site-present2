<?php 
  $defi_id = get_the_ID();
  $dvl_defi = get_field('dvl_defi', $defi_id);
  $formatted_dvl_defi = $dvl_defi ? number_format($dvl_defi, 2, '.', ',') : '';
  $gallery_logo = get_field('gallery_defi', $defi_id);

  $network_terms = get_the_terms($defi_id, 'network_taxonomy'); 
  $network_terms_arr = array();
  if ($network_terms && !is_wp_error($network_terms)) {
      foreach ($network_terms as $term) {
        $network_terms_arr[0] = $term->name;
        $network_terms_arr[1] = $term->term_id;
      }
  }
  ?>
<div class="defi__content-block">
  <div class="block-part">
    <div class="block-name">
      <div class="block-name_logo">
        <?php if($gallery_logo){ ?>
        <?php foreach($gallery_logo as $image_id){ 
          echo wp_get_attachment_image( $image_id, 'thumbnail' );
        } ?>
        <?php } ?>
      </div>
      <span><?php the_title() ?></span>
    </div>
  </div>
  <div class="block-part">
    <div class="block-type">
      <?= wp_get_attachment_image( get_field('network_icon', 'network_taxonomy_' . $network_terms_arr[1]) , 'thumbnail' ) ?>
      <span><?= esc_html($network_terms_arr[0]) ?></span>
    </div>
  </div>
  <div class="block-part">
    <div class="block-info">
      <span><?php _e('APY (per year)', 'dollet') ?></span>
      <?php if(get_field('apy_defi', $defi_id)){ ?>
      <strong><?php the_field('apy_defi', $defi_id) ?>%</strong>
      <?php } ?>
    </div>
  </div>
  <div class="block-part">
    <div class="block-info">
      <span><?php _e('TVL', 'dollet') ?></span>
      <?php if($formatted_dvl_defi){ ?>
      <strong>$ <?= $formatted_dvl_defi ?> </strong>
      <?php } ?>
    </div>
  </div>
  <div class="block-part">
    <a class="button button-simple with-arrow sticky-cursor" href="<?php the_permalink() ?>">
      <span><?php _e('Details', 'dollet') ?></span>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon">
        <use xlink:href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/_set.svg#icon-arrow"></use>
      </svg>
    </a>
  </div>
</div>