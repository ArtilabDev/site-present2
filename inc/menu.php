<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

register_nav_menus( array(
  'menu-main' => __('Main menu', 'dollet'),
  'menu-foot-1' => __('Footer menu 1', 'dollet'),
  'menu-foot-2' => __('Footer menu 2', 'dollet'),
) );

add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args' );
function filter_wp_menu_args( $args ) {

  if ( 'menu-foot-1' === $args['theme_location'] ) {
    $args['container']  = false;
    $args['items_wrap'] = '<div class="footer__block">
    <div class="footer__block-caption">
    ' . __('Dollet', 'dollet') . '
    </div>
    <div class="footer__block-menu"><ul class="site-footer_menu %2$s">%3$s</ul></div></div>';
    $args['menu_class'] = '';
  }
  if ( 'menu-foot-2' === $args['theme_location'] ) {
    $args['container']  = false;
    $args['items_wrap'] = '<div class="footer__block">
    <div class="footer__block-caption">
    ' . __('DeFi', 'dollet') . '
    </div>
    <div class="footer__block-menu"><ul class="site-footer_menu %2$s">%3$s</ul></div></div>';
    $args['menu_class'] = '';
  }
  
  return $args;
}

function add_sticky_classes_to_nav_menu_links($atts, $item, $args) {
  if ('menu-main' === $args->theme_location || 'menu-foot-1' === $args->theme_location || 'menu-foot-2' === $args->theme_location ) {
      $atts['class'] = 'sticky-cursor sticky-dot ' . (isset($atts['class']) ? $atts['class'] : '');
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'add_sticky_classes_to_nav_menu_links', 10, 3);