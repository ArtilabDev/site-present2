<section class="team">
  <div class="container">
    <div class="team__wrap">
      <h2><?php the_field('title'); ?></h2>

      <div class="team-slider">
        <div class="swiper-wrapper">
          <?php
                    $team_member = get_field('team_list');
                    if ($team_member) :
                        foreach ($team_member as $member) :
                            $position = get_field('position', $member->ID);
                            ?>
          <div class="swiper-slide sticky-cursor sticky-dot">
            <div class="swiper-slide_image">
              <?= get_the_post_thumbnail( $member->ID,  'post_size' , array('alt' => esc_attr(get_the_title($member->ID)), 'fetchpriority' => 'low') )?>
            </div>
            <div class="swiper-slide_info">
              <div class="info-title">
                <?= get_the_title($member->ID); ?>
              </div>
              <div class="info-text">
                <?= esc_html($position); ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next sticky-cursor team-next"></div>
        <div class="swiper-button-prev sticky-cursor team-prev"></div>
      </div>
    </div>
  </div>
</section>