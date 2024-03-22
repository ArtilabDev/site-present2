<?php
/*
    Template Name: Blog
    */
get_header();
$post_count = wp_count_posts()->publish;
?>

<?php the_content() ?>
<section class="sBlog">
  <div class="container">
    <div class="sBlog__wrap" data-scroll-body>

      <div class="sBlog__sidebar" data-scroll-block>
        <ul>
          <li class="active">
            <?php
                $blog_page = get_field('blog_page', 'options');
                if ($blog_page) :
                    ?>
            <a href="<?php echo esc_url(get_permalink($blog_page->ID)); ?>" class="sticky-cursor sticky-dot">
              <?php _e('All articles', 'dollet') ?>
            </a>
            <?php endif;
                            ?>
          </li>
          <?php
                        $categories = get_categories();
                        foreach ($categories as $category) :
                            ?>
          <li>
            <a href="<?php echo get_category_link($category->term_id); ?>" class="sticky-cursor sticky-dot">
              <?php echo $category->name; ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="sBlog__articles" data-scroll-content>
        <div class="sBlog__articles-title">
          <h2><?php _e('Dollet Blog', 'dollet') ?></h2>
        </div>

        <?php get_template_part( 'template-parts/parts/list-posts' ); ?>

        <?php if ($post_count > 8) : ?>
        <div class="sBlog__articles-more">
          <button type="button" class="button button-simple sticky-cursor" id="load-more-posts">
            <span><?php _e('Show more', 'dollet') ?></span>
          </button>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();