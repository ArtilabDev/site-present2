<section class="audit">
    <div class="container">
        <div class="audit__wrap">
            <div class="audit__content">
                <h2><?= get_field('title_audit'); ?></h2>

                <div class="audit__content_items">
                    <?php if (have_rows('audit_list')) : while (have_rows('audit_list')) : the_row(); ?>

                        <?php
                        $link = (get_sub_field('style_url') === 'style-2') ? get_sub_field('link_file') : get_sub_field('link');
                        ?>

                        <a href="<?= esc_attr($link) ?>" target="_blank" class="audit-item sticky-cursor">
                            <?php $image = get_sub_field('image'); ?>
                            <?php $size = 'large'; ?>
                            <?php if ($image) : ?>
                                <?= wp_get_attachment_image($image, $size); ?>
                            <?php endif; ?>
                        </a>

                    <?php endwhile; endif; ?>

                </div>
            </div>
            <div class="audit__shield">
                <?php $image_main = get_field('image_logo'); ?>
                <?php $size = 'full'; ?>
                <?php if ($image_main) : ?>
                    <?= wp_get_attachment_image($image_main, $size); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
