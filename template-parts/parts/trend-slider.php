<div class="swiper-slide">
  <div class="swiper-slide_image sticky-cursor sticky-dot">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('post_size' , array('alt' => esc_attr(get_the_title())) )?>
    </a>
  </div>

  <div class="swiper-slide_content">
    <div class="swiper-slide_tag">
      <ul>
        <?php
                $categories = get_the_category();
                foreach ($categories as $category) :
                    ?>
        <li class="<?php echo get_term_meta($category->term_id, 'color', true); ?>">
          <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="sticky-cursor">
            <?php echo esc_html($category->name); ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="swiper-slide_date">
      <?php echo get_the_date('F j, Y'); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="swiper-slide_title sticky-cursor sticky-dot">
      <?php the_title(); ?>
    </a>
    <div class="swiper-slide_text">
      <?php the_excerpt(); ?>
    </div>
  </div>
</div>