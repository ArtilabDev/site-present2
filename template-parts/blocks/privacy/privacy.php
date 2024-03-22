<section class="content-block">
    <div class="container">
        <div class="content-block__inner">
            <div class="content-block__head">
                <h1><?= the_title(); ?></h1>
                <span><?php _e('Last updated:', 'dollet') ?> <?php echo get_the_date(); ?></span>
            </div>


            <div class="content-block__core">
                <?= get_field('description'); ?>
            </div>

            <?php if (get_field('style') !== 'style-2') : ?>
                <div class="content-block__core anchor-links">
                    <div class="content-block__core-title">
                        <?php _e('Contents', 'dollet'); ?>
                    </div>

                    <ul>
                        <?php
                        if (have_rows('content_list')) :
                            $counter = 1;
                            while (have_rows('content_list')) : the_row();
                                ?>
                                <li><a class="sticky-cursor sticky-link" href="#anchor-<?php echo $counter; ?>"><?= get_sub_field('title'); ?></a></li>
                                <?php
                                $counter++;
                            endwhile;
                        endif;
                        ?>
                    </ul>
                </div>

                <?php
                if (have_rows('content_list')) :
                    $counter = 1;
                    while (have_rows('content_list')) : the_row();
                        ?>
                        <div class="content-block__core">
                            <div class="content-block__core-anchor" id="anchor-<?php echo $counter; ?>">
                                <?= get_sub_field('title'); ?>
                            </div>
                            <?= get_sub_field('content_item'); ?>
                        </div>
                        <?php
                        $counter++;
                    endwhile;
                endif;
            endif;
            ?>
        </div>
    </div>
</section>