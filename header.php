<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="google-site-verification" content="76rbyOXc3VTBfbJSfqPnhbPRpj7BBmjcZRYgWiIbKvc" />
    <link rel="preload" href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/fonts/RedHatDisplay-Bold.woff2" as="font"
      type="font/woff2" crossorigin />
    <link rel="preload" href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/fonts/RedHatDisplay-Medium.woff2" as="font"
      type="font/woff2" crossorigin />
    <link rel="preload" href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/fonts/RedHatDisplay-Regular.woff2" as="font"
      type="font/woff2" crossorigin />

    <?php wp_head(); ?>

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T6LSKQKB');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TTKESQ0SMK"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-TTKESQ0SMK');
    </script>

  </head>

  <body <?php body_class(); ?>>

    <div class="page-wrapper <?= get_classes(get_field('custom_class')); ?>">

      <header class="header preload cursor-header">
        <div class="container">
          <div class="header__wrap">
            <a href="<?= esc_url( home_url( '/' ) ); ?>" class="header__logo sticky-cursor sticky-dot">
              <?php
              $logo_img = '';
              if ($custom_logo_id = get_theme_mod('custom_logo')) {
                $logo_img = wp_get_attachment_image($custom_logo_id, 'full', false, array(
                    'alt' => "dollet logo",
                    'data-no-lazy' => '1',
                    'fetchpriority' => 'high'
                ));
              }
              echo $logo_img;
              ?>
            </a>

            <nav class="header__menu">
              <?php wp_nav_menu( 
                array(
                    'theme_location' => 'menu-main',
                  )
                ); ?>
              <div class="social-buttons">
                <?php
                  if (have_rows('social_list', 'options')) :
                      while (have_rows('social_list', 'options')) : the_row();
                          ?>
                <a target="_blank" href="<?php echo get_sub_field('link_social'); ?>">
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
            </nav>

            <button type="button" data-target="modal-download"
              class="header__button button button-green sticky-cursor sticky-dot btn-modal">
              <span><?php _e('Get App', 'dollet') ?></span>
            </button>

            <div class="burger-menu"></div>
          </div>
        </div>
      </header>

      <div class="cursor cursor--large"></div>
      <div class="cursor cursor--small"></div>