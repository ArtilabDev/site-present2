<section class="faq-block">
  <div class="container">
    <div class="faq-block__wrap">
      <h2><?= get_field('title_faq'); ?></h2>
      <div class="faq-block__content">
        <?php
                if (have_rows('faq_list')) :
                    $index = 1;
                    while (have_rows('faq_list')) : the_row();
                        ?>
        <div class="spoiler" <?=  $index === 1 ? 'id="faq-info-1"' : '';?>
          data-status="<?= $index === 1 ? 'open' : 'closed'; ?>">
          <div class="spoiler__head sticky-cursor sticky-dot">
            <?= get_sub_field('question'); ?>
          </div>
          <div class="spoiler__content">
            <?= get_sub_field('answer'); ?>
          </div>
        </div>
        <?php
                        $index++;
                    endwhile;
                endif;
                ?>
      </div>
    </div>
  </div>
</section>