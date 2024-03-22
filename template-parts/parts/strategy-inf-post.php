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
<div class="strategy__head">
  <div class="strategy__head_title">
    <div class="strategy-icons">
      <?php if($gallery_logo){ ?>
      <?php foreach($gallery_logo as $image_id){
                    echo wp_get_attachment_image( $image_id, 'thumbnail' );
                } ?>
      <?php } ?>
    </div>
    <h1><?php the_title() ?></h1>
  </div>

  <div class="strategy__head_info">
    <?php the_field('download_inf', $defi_id) ?>
  </div>
</div>

<div class="strategy__info">
  <div class="strategy__info-block">
    <div class="info-caption">
      <?php _e('Network', 'dollet') ?>
      <?php
            $faq = get_field('faq_link', 'options');
            if ($faq) :
                ?>
      <a href="#faq-info-1" class="info-link sticky-cursor sticky-dot"></a>
      <?php endif;
            ?>
    </div>
    <div class="info-text">
      <?= wp_get_attachment_image( get_field('network_icon', 'network_taxonomy_' . $network_terms_arr[1]) , 'thumbnail' ) ?>
      <?= esc_html($network_terms_arr[0]) ?>
    </div>
  </div>

  <div class="strategy__info-block">
    <div class="info-caption">
      <?php _e('APY (per year)', 'dollet') ?>
      <?php
            $faq = get_field('faq_link', 'options');
            if ($faq) :
                ?>
      <a href="#faq-info-1" class="info-link sticky-cursor sticky-dot"></a>
      <?php endif;
            ?>
    </div>
    <div class="info-text">
      <?php if(get_field('apy_defi', $defi_id)){ ?>
      <?php the_field('apy_defi', $defi_id) ?>%
      <?php } ?>
    </div>
  </div>

  <div class="strategy__info-block">
    <div class="info-caption">
      <?php _e('TVL', 'dollet') ?>
      <?php
            $faq = get_field('faq_link', 'options');
            if ($faq) :
                ?>
      <a href="#faq-info-1" class="info-link sticky-cursor sticky-dot"></a>
      <?php endif;
            ?>
    </div>
    <div class="info-text">
      <?php if($formatted_dvl_defi){ ?>
      $ <?= $formatted_dvl_defi ?>
      <?php } ?>
    </div>
  </div>
</div>