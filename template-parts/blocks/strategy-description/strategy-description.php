<section class="strategy">
    <div class="container">
        <?php get_template_part( 'template-parts/parts/strategy-inf-post' ); ?>

        <div class="strategy__description">

            <div class="strategy__description-caption">
                <?= get_field('title_description'); ?>
            </div>

            <?= get_field('strategy_description'); ?>

            <?php
            $defi_page_link = get_field('defi_page_link', 'options');
            if ($defi_page_link) :
                ?>
                <a class="button button-simple with-arrow sticky-cursor" href="<?php echo esc_url(get_permalink($defi_page_link->ID)); ?>">
                    <span><?php _e('See another strategies', 'dollet') ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon">
                        <use xlink:href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/_set.svg#icon-arrow"></use>
                    </svg>
                </a>
            <?php endif;
            ?>

        </div>
    </div>
</section>