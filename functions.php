<?php
/**
 * dollet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dollet
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$theme = wp_get_theme();
	$theme_version = $theme->get('Version');
	define( '_S_VERSION', $theme_version  );
}


define('DOLLET_TEMPLATE_DIRECTORY_URI', get_template_directory_uri());
define('DOLLET_TEMPLATE_DIRECTORY', get_template_directory());
define('DOLLET_AJAX_URL', admin_url('admin-ajax.php'));


if ( ! function_exists( 'dollet_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dollet_wp_setup() {

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */

		load_theme_textdomain( 'dollet', get_template_directory() . '/languages' );
		
		add_theme_support( 'title-tag' );
		
		add_theme_support('post-thumbnails');
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'caption',
				'style',
				'script',
			)
		);
		add_image_size('post_size', 600, 600, false); // width, height, crop

		add_theme_support(
			'custom-logo',
			array(
				'height' => 94,
				'width' => 20,
				'flex-width' => true,
				'flex-height' => true,
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'dollet_wp_setup' );

/**
 * acf-setting.
 */

require DOLLET_TEMPLATE_DIRECTORY . '/inc/acf-setting.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/blocks.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/enqueue-script-style.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/menu.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/custom-function.php';

require DOLLET_TEMPLATE_DIRECTORY . '/inc/cpt/network-taxonomy.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/cpt/defi-post-type.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/cpt/faq-post-type.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/cpt/team-post-type.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/cpt/how-to-use-post-type.php';

require DOLLET_TEMPLATE_DIRECTORY . '/inc/custom-db.php';

// ajax 
require DOLLET_TEMPLATE_DIRECTORY . '/inc/ajax/ajax-defi.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/ajax/ajax-blog.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/ajax/ajax-cookie.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/ajax/ajax-admin.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/ajax/ajax-search.php';

//zendesk
require DOLLET_TEMPLATE_DIRECTORY . '/inc/zendesk/submit_ticket.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/zendesk/cf7-custom-tags.php';
require DOLLET_TEMPLATE_DIRECTORY . '/inc/zendesk/zendesk-setting.php';