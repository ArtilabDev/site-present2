<footer class="footer">
  <div class="container">
    <div class="footer__inner">
      <div class="footer__block">
        <div class="footer__block-logo">
          <a href="<?= esc_url( home_url( '/' ) ); ?>" class="footer__block-logo sticky-cursor sticky-dot">
            <?php
                        $logo_img = '';
                        if ($custom_logo_id = get_theme_mod('custom_logo')) {
                            $logo_img = wp_get_attachment_image($custom_logo_id, 'large', false, array(
                                'alt' => "dollet logo",
                                'data-no-lazy' => '1'
                            ));
                        }
                        echo $logo_img;
                        ?>
          </a>
        </div>

        <div class="footer__block-social">
          <?php
                    if (have_rows('social_list', 'options')) :
                        while (have_rows('social_list', 'options')) : the_row();
                            ?>
          <a class="sticky-cursor" target="_blank" href="<?php echo get_sub_field('link_social'); ?>">
            <?php
                                $social_icon = get_sub_field('icon_social');
                                $size = 'large';
                                if ($social_icon) {
                                    echo wp_get_attachment_image($social_icon, $size);
                                }
                                ?>
          </a>
          <?php
                        endwhile;
                    endif;
                    ?>
        </div>

        <div class="footer__block-info">
          <div class="footer__block-info-links">
            <?php
                        $privacy_terms = get_field('privacy_terms', 'options');
                        if ($privacy_terms) :
                            ?>
            <a class="sticky-cursor sticky-dot"
              href="<?php echo esc_url(get_permalink($privacy_terms->ID)); ?>"><?php _e('Terms of Service', 'dollet') ?></a>
            <?php endif;
                        ?>

            <?php
                        $privacy_policy = get_field('privacy_policy', 'options');
                        if ($privacy_policy) :
                            ?>
            <a class="sticky-cursor sticky-dot"
              href="<?php echo esc_url(get_permalink($privacy_policy->ID)); ?>"><?php _e('Privacy Policy', 'dollet') ?></a>
            <?php endif;
                        ?>
          </div>
          <span><?php _e('© 2024 DolletApp. All Rights Reserved', 'dollet') ?></span>
        </div>
      </div>

      <div class="footer__block">
        <div class="footer__block-caption">
          <?php echo get_field('title_support', 'options'); ?>
        </div>
        <div class="footer__block-text">
          <?php echo get_field('description_support', 'options'); ?>
        </div>
        <div class="footer__block-link mail">
          <?php
                    $link_email = get_field('email', 'options');
                    if( $link_email ):
                        $link_url = $link_email['url'];
                        $link_title = $link_email['title'];
                        $link_target = $link_email['target'] ? $link_email['target'] : '_self';
                        ?>
          <a class="sticky-cursor sticky-dot" href="<?php echo esc_url( $link_url ); ?>"
            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
        </div>
        <div class="footer__block-link chatBot">
          <?php
                    $link_chat_bot = get_field('chat_bot', 'options');
                    if( $link_chat_bot ):
                        $link_url = $link_chat_bot['url'];
                        $link_title = $link_chat_bot['title'];
                        $link_target = $link_chat_bot['target'] ? $link_email['target'] : '_self';
                        ?>
          <a class="sticky-cursor sticky-dot" href="<?php echo esc_url( $link_url ); ?>"
            target="<?php echo esc_attr( $link_target); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
        </div>
      </div>

      <?php wp_nav_menu(
                array(
                    'theme_location' => 'menu-foot-1',
                )
            ); ?>
      <?php wp_nav_menu(
                array(
                    'theme_location' => 'menu-foot-2',
                )
            ); ?>

    </div>

    <div class="footer__bottom">
      <a href="https://artilab.pro/" class="sticky-cursor sticky-link" target="_blank">
        Developed with love by <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/artilab-logo.svg"
          rel="nofollow noopener noreferrer" width="24" height="12" fetchpriority="low" alt="artilab-logo">
      </a>
    </div>
  </div>
</footer>

</div>
<?php wp_footer(); ?>
<?php get_template_part( 'template-parts/parts/modal-zendesk' ); ?>
<?php get_template_part( 'template-parts/parts/modal-download' ); ?>
<?php get_template_part( 'template-parts/parts/modal-term-services' ); ?>
<?php get_template_part( 'template-parts/parts/modal-cookie' ); ?>
</body>

</html>