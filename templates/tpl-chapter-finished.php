<?php
/*
    Template Name: Chapter finished
    */
get_header();

?>
<section class="chapter-head">
  <div class="container">
    <?php if ( get_field('title_chapter_head_1') ) : ?>
    <h1 class="chapter-head_title">
      <?= get_field('title_chapter_head_1'); ?>
    </h1>
    <?php endif; ?>
    <?php if ( get_field('subtitle_chapter_head_1') ) : ?>
    <div class="chapter-head_text">
      <?= get_field('subtitle_chapter_head_1'); ?>
    </div>
    <?php endif; ?>

    <div class="chapter-head_timer timer">
      <div class="timer_numbs timer_numbs__days">
        <span>0</span>
        <span>0</span>
      </div>
      <div class="timer_numbs timer_numbs__hours">
        <span>0</span>
        <span>0</span>
      </div>
      <div class="timer_numbs timer_numbs__minutes">
        <span>0</span>
        <span>0</span>
      </div>
    </div>

    <?php if ( get_field('title_chapter_head_2') ) : ?>
    <div class="chapter-head_title">
      <?= get_field('title_chapter_head_2'); ?>
    </div>
    <?php endif; ?>

    <?php 
    $link = get_field('link_chapter_head_1');
    if( $link ): 
      $link_url = $link['url'];
      $link_title = $link['title'];
      $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="button sticky-cursor" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
      <?= esc_html( $link_title ); ?>
    </a>
    <?php endif; ?>

    <?php if ( get_field('gradient_text_chapter_head_1') ) : ?>
    <div class="chapter-head_gradient-text">
      <?= get_field('gradient_text_chapter_head_1'); ?>
    </div>
    <?php endif; ?>

    <?php if ( get_field('descr_chapter_head') ) : ?>
    <div class="chapter-head_descript">
      <?= get_field('descr_chapter_head'); ?>
    </div>
    <?php endif; ?>

    <?php 
    $link = get_field('link_chapter_head_2');
    if( $link ): 
      $link_url = $link['url'];
      $link_title = $link['title'];
      $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="button sticky-cursor" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
      <?= esc_html( $link_title ); ?>
    </a>
    <?php endif; ?>
  </div>
</section>
<?php if ( get_field('description_chaper_foot') ) : ?>
<section class="chapter-foot">
  <div class="container">
    <?= get_field('description_chaper_foot'); ?>
  </div>
</section>
<?php endif; ?>
<?php
get_footer();