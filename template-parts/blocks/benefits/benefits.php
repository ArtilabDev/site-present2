<section class="info">
    <div class="container">
        <h2><?= get_field('title_benefit'); ?></h2>
        <div class="info__wrap">
            <?php
            if (have_rows('benefits')) :
                while (have_rows('benefits')) : the_row();
                    ?>
                    <div class="info__block">
                        <div class="info__block--icon">
                            <?php
                            $image = get_sub_field('image');
                            $size = 'large'; // (thumbnail, medium, large, full або своє визначене значення)
                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }
                            ?>
                        </div>
                        <div class="info__block--title">
                            <?php echo get_sub_field('title'); ?>
                        </div>
                        <div class="info__block--text">
                            <?php echo get_sub_field('description'); ?>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            ?>
        </div>
        <div class="show-more-info button button-simple" data-text="Show more"></div>
    </div>
</section>