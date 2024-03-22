<?php
get_header();
$current_post_id = get_the_ID();
$current_post_categories = get_the_category($current_post_id);
$category_post_count = !empty($current_post_categories) ? get_term($current_post_categories[0]->term_id)->count : 0;
?>
    <section class="sArticle">
        <div class="container">
            <div class="sArticle__top">
                <div class="sArticle__tag tags">
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
                <div class="sArticle__date">
                    <?php echo get_the_date('F j, Y'); ?>
                </div>

            </div>

            <div class="sArticle__content">

                <h1>
                    <?php the_title(); ?>
                </h1>

                <?php the_content() ?>

            </div>

            <div class="sArticle__social">
                <ul>
                    <?php
                    if (have_rows('social_list', 'options')) :
                        while (have_rows('social_list', 'options')) : the_row();
                            ?>
                            <li>
                                <a target="_blank" href="<?php echo get_sub_field('link_social'); ?>">
                                    <?php echo get_sub_field('icon_social_name'); ?>
                                </a>
                            </li>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </section>


<?php if ($category_post_count >= 5) : ?>
    <?php get_template_part('template-parts/parts/more-posts'); ?>
<?php endif; ?>

<?php
get_footer();
