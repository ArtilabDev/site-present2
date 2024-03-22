<section class="campaign <?php echo (get_field('style') == 'crypto-bloom') ? 'crypto-bloom' : ''; ?>">
    <div class="container">
        <div class="campaign__wrap">
            <div class="campaign__image">
                <?php
                $image = get_field('image');
                $size = 'large'; // (thumbnail, medium, large, full, або своє визначене значення)
                if ($image) {
                    echo wp_get_attachment_image($image, $size);
                }
                ?>
            </div>
            <div class="campaign__info">
                <?php if (get_field('title')) : ?>
                    <h2 class="campaign__info_title"><?php echo get_field('title'); ?></h2>
                <?php endif; ?>

                <?php if (get_field('descr')) : ?>
                    <div class="campaign__info_text">
                        <?php echo get_field('descr'); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field('btn_text')) : ?>
                    <div class="campaign__info_button">
                        <?php
                        $link = get_field('btn_text');
                        if ($link) :
                            ?>
                            <a href="<?php echo esc_url(get_permalink($link->ID)); ?>" class="button button-simple with-arrow sticky-cursor">
                                <span> <?php echo get_field('btn_name'); ?></span>
                                <svg class="icon">
                                    <use xlink:href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/_set.svg#icon-arrow"></use>
                                </svg>
                            </a>
                        <?php endif;
                        ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>