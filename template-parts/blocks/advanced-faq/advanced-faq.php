<section class="faq">
  <div class="container">
    <div class="faq__head">
      <div class="faq-title">
        <h1><?php the_title() ?></h1>
      </div>
      <div class="faq-search">
        <input type="search" class="sticky-cursor sticky-dot" placeholder="Find the answer">
       <div class="faq-search_result">
                  <div class="faq-search_result-wrap"></div>
                </div>
      </div>
    </div>

    <div  id="questions_list" class="faq__body" data-scroll-body>
      <div class="faq-sidebar" data-scroll-block>
        <ul>
          <?php
            $select_faq = get_field('select_faq');
            if ($select_faq) :
                $index = 1;
                foreach ($select_faq as $post) :
                    $post_id = $post->ID;
                    $title = get_the_title($post_id);
                    ?>
          <li class="<?= ($index === 1) ? 'active' : ''; ?>" data-scroll-item="<?= $index ?>">
            <span class="sticky-cursor sticky-dot">
              <?php
                $icon = get_field('icon', $post_id);
                $size = 'large';
                if ($icon) {
                    echo wp_get_attachment_image($icon, $size);
                }
                ?>
              <?= esc_html($title) ?>
            </span>
          </li>
          <?php
                $index++;
            endforeach;
        endif;
        ?>
        </ul>
      </div>

      <div class="faq-content" data-scroll-content>
          <?php
          $select_faq = get_field('select_faq');
          if ($select_faq) :
              $i = 1;
              $index = 1;
              foreach ($select_faq as $post) :
                  $post_id = $post->ID;
                  $title = get_the_title($post_id);
                  ?>
                  <div class="faq-content_block" data-scroll-anchor="<?= $i ?>">
                      <h3><?= esc_html($title) ?></h3>
                      <?php
                      if (have_rows('faq_content', $post_id)) :
                          while (have_rows('faq_content', $post_id)) : the_row();
                              ?>

                              <div class="spoiler" data-status="closed">
                                  <div class="spoiler__head sticky-cursor sticky-dot" id="search-<?php echo $index; ?>">
                                      <?= get_sub_field('question', $post_id); ?>
                                  </div>
                                  <div class="spoiler__content">
                                      <?= get_sub_field('answer', $post_id); ?>
                                  </div>
                              </div>
                              <?php
                              $index++;
                          endwhile;
                      endif;
                      ?>
                  </div>
                  <?php
                  $i++;
              endforeach;
          endif;
          ?>

      </div>
    </div>
  </div>
</section>