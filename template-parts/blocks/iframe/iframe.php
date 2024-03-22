<?php if (get_field('iframe_id') && get_field('iframe_script')) : ?>
    <section id="<?php echo get_field('iframe_id'); ?>">

    </section>
    <?php echo get_field('iframe_script')?>
<?php endif; ?>
