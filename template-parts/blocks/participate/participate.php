<section class="participate <?php echo (get_field('style') == 'crypto-bloom') ? 'crypto-bloom' : ''; ?>">
    <div class="container">
        <div class="participate__wrap">
            <?php if (get_field('title')) : ?>
                <h2><?php echo get_field('title'); ?></h2>
            <?php endif; ?>

            <div class="participate-slider animated">
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('participate_list')) :
                        while (have_rows('participate_list')) : the_row();
                            ?>
                            <div class="swiper-slide participate-slide">
                                <div class="participate-slide__content">
                                    <div class="slide-numb">
                                        <?php echo get_row_index(); ?>
                                    </div>
                                    <?php if (get_sub_field('title')) : ?>
                                        <div class="slide-title">
                                            <?php echo esc_html(get_sub_field('title')); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('text')) : ?>
                                        <div class="slide-text">
                                            <?php echo esc_html(get_sub_field('text')); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="participate-slide__icon">
                                    <div class="participate-slide__icon-wrap">
                                        <?php
                                        $image = get_sub_field('image');
                                        $size = 'large'; // (thumbnail, medium, large, full або своє визначене значення)
                                        if ($image) {
                                            echo wp_get_attachment_image($image, $size);
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>