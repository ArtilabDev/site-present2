<div class="blog-card" data-post-id="<?= esc_attr(get_the_ID()) ?>">
  <a href="<?php the_permalink(); ?>" class="blog-card_image sticky-cursor sticky-dot">
    <?php the_post_thumbnail( 'post_size', array( 'alt'=> esc_attr(get_the_title()) ) ) ?>
  </a>
  <div class="blog-card_content">
    <div class="card-tag tags">
      <ul>
        <?php
                $categories = get_the_category();
                foreach ($categories as $category) :
                    ?>
        <li class="<?php echo get_term_meta($category->term_id, 'color', true); ?>">
          <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="sticky-cursor">
            <?= esc_html($category->name); ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="card-date">
      <?= get_the_date('F j, Y'); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="card-text sticky-cursor sticky-dot">
      <?php the_title(); ?>
    </a>
  </div>
</div>