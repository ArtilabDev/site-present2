<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


function my_admin_enqueue_scripts() {

    wp_enqueue_style(
        'admin',
        DOLLET_TEMPLATE_DIRECTORY_URI . '/build/css/admin-style.css',
        [],
        _S_VERSION
    );

    wp_enqueue_script('ajax-admin-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/ajax/ajax-admin.js', array(), _S_VERSION, false);
    wp_localize_script('ajax-admin-script', 'ajax_admin', array('ajax_url' => DOLLET_AJAX_URL));
}

add_action('admin_enqueue_scripts', 'my_admin_enqueue_scripts');

function enqueue_artilab_assets() {
	global $post;

    // Deregister the default jQuery included with WordPress
    wp_deregister_script('jquery');
    if ( !is_admin() ) {
		wp_dequeue_style( 'wp-block-library' );
	}
    if ( is_admin() ) {
        // Enqueue the updated jQuery in the footer
        wp_enqueue_script( 'jquery', false, array(), false, true );
    }
    
    // Enqueue styles
    wp_enqueue_style('min-style', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/css/libs.min.css', array(), _S_VERSION);
    wp_enqueue_style('main-style', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/css/main.css', array('min-style'), _S_VERSION);

    if (current_user_can('administrator')) {
        wp_enqueue_style('dollet-admin-bar', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/css/admin-bar.css', array(), _S_VERSION);
    }

    // Enqueue scripts
    wp_enqueue_script('libs-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/libs.min.js', array(), _S_VERSION, array( 'strategy'  => 'defer', 'in_footer' => false ) );
    wp_enqueue_script('main-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/main.js', array(), _S_VERSION, array('strategy'  => 'defer', 'in_footer' => false ));
    

    wp_enqueue_script('gsap-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/gsap.min.js', array(), _S_VERSION, array('strategy'  => 'defer', 'in_footer' => false ));
    wp_enqueue_script('cursor-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/cursor.js', array(), _S_VERSION, array('strategy'  => 'defer', 'in_footer' => false ));
    if(is_front_page() || is_404()){
        wp_enqueue_script('lottie_svg-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/lottie_svg.min.js', array(), _S_VERSION, array('strategy'  => 'defer', 'in_footer' => true ));
        wp_enqueue_script('dollet-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/dollet.js', array(), _S_VERSION, array('strategy'  => 'defer', 'in_footer' => true ));
    }

    wp_enqueue_script('cookie-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/cookie.js', array(), _S_VERSION, array('strategy'  => 'defer', 'in_footer' => true ));
    wp_enqueue_script('ajax-cookie-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/ajax/ajax-cookie.js', array(), _S_VERSION, array('strategy'  => 'defer', 'in_footer' => true ));

    // Ajax
    if(is_page_template('templates/tpl-blog.php') || is_category() ){
        wp_enqueue_script('ajax-blog-script', DOLLET_TEMPLATE_DIRECTORY_URI . '/build/js/ajax/ajax-blog.js', array(), _S_VERSION, array('strategy'  => 'defer', 'in_footer' => true ));
        wp_localize_script('ajax-blog-script', 'ajax_blog', array('ajax_url' => DOLLET_AJAX_URL));
    }
    
    wp_localize_script('blockdefi', 'ajax_defi', array('ajax_url' => DOLLET_AJAX_URL));
    wp_localize_script('ajax-cookie-script', 'ajax_cookie', array('ajax_url' => DOLLET_AJAX_URL));
    wp_localize_script('blocksupport', 'ajax_search', array('ajax_url' => DOLLET_AJAX_URL));

}

add_action('wp_enqueue_scripts', 'enqueue_artilab_assets');