<section class="networks">
    <div class="container">
        <h2><?= get_field('title_networks'); ?></h2>
    </div>

    <div class="swiper networks-slider">
        <div class="swiper-wrapper">
            <?php
            if (have_rows('networks_list')) :
                while (have_rows('networks_list')) : the_row();
                    ?>
                    <div class="swiper-slide">
                        <div class="slide-title">
                            <?php echo get_sub_field('title'); ?>
                        </div>
                        <div class="slide-image">
                            <?php
                            $image = get_sub_field('image');
                            $size = 'large'; // (thumbnail, medium, large, full або своє визначене значення)
                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }
                            ?>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            ?>
        </div>
    </div>
</section>