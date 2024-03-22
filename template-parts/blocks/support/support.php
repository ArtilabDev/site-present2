<section class="question">
  <div class="container">
    <div class="question__wrap">
      <?php if ( get_field('title_support_information') ) : ?>
      <h1 class="question__title">
        <?= get_field('title_support_information'); ?>
      </h1>
      <?php endif; ?>
      <div class="question__search">
        <input type="search" name="search" autocomplete="off" class="question__search_input"
          placeholder="Find the answer">
        <div class="question__search_result"></div>
        <span class="close-search"></span>
      </div>
      <div class="question__info">
        <?php
        if (have_rows('support_information')) :
            while (have_rows('support_information')) : the_row();
                $link = get_sub_field('button');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
        <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"
          class="info-block sticky-cursor sticky-dot">
          <div class="info-block_icon">
            <?php
                $icon = get_sub_field('image');
                $size = 'large';
                if ($icon) {
                    echo wp_get_attachment_image($icon, $size);
                }
                ?>
          </div>
          <div class="info-block_title">
            <?= get_sub_field('title'); ?>
          </div>
          <div class="info-block_text">
            <?= get_sub_field('text'); ?>
          </div>
        </a>
        <?php
            endif;
        endwhile;
    endif;
    ?>
      </div>
    </div>
  </div>
</section>