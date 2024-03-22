<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


add_filter('block_categories', 'dollet_block_categories', 10, 2);

function dollet_block_categories($categories, $post) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'dollet',
                'title' => __('Home Blocks', 'dollet-wp'),
                'icon'  => 'wordpress'
            ]
        ]
    );
}

function load_blocks() {
    if (function_exists('register_block_type')) {
        $blocks = get_blocks();

        foreach ($blocks as $block) {
            $block_directory = '';

            if (file_exists( DOLLET_TEMPLATE_DIRECTORY . '/template-parts/blocks/' . $block . '/block.json')) {
                $block_directory = 'blocks';
            }

            if (!empty($block_directory)) {
                $block_json_path = DOLLET_TEMPLATE_DIRECTORY . '/template-parts/' . $block_directory . '/' . $block . '/block.json';

                register_block_type($block_json_path, [
                    'category' => 'dollet',
                ]);

                // Отримати вміст файлу block.json
                $block_json_content = file_get_contents($block_json_path);
                $block_name = '';
                if ($block_json_content !== false) {
                    // Розпарсити JSON та отримати поле "name"
                    $block_data = json_decode($block_json_content, true);

                    if (isset($block_data['name'])) {
                        $block_name = strtolower(str_replace(['acf\\', ' '], '',$block_data['name']));
                    }
                }
                
                if (file_exists( DOLLET_TEMPLATE_DIRECTORY . '/template-parts/blocks/' . $block . '/script.js')) {
                    // print_r('dollet-acf-' . strtolower($block));
                    wp_register_script($block_name, DOLLET_TEMPLATE_DIRECTORY_URI . '/template-parts/blocks/' . $block . '/script.js', array(),  _S_VERSION, array('strategy'  => 'async', 'in_footer' => true ));
                    // wp_enqueue_script('dollet-' . $block);
                }
            }
        }
    }
}
add_action('init', 'load_blocks', 6);




function get_blocks() {
    $theme    = wp_get_theme();
    $blocks   = get_option('cwp_blocks');
    $version  = get_option('cwp_blocks_version');

				
    if (empty($blocks) || version_compare($theme->get('Version'), $version) || (function_exists('wp_get_environment_type') && 'production' !== wp_get_environment_type())) {
        $blocks = scandir( DOLLET_TEMPLATE_DIRECTORY . '/template-parts/blocks/');
        $blocks = array_values(array_diff($blocks, array('..', '.', '.DS_Store', '_base-block')));

        update_option('cwp_blocks', $blocks);
        update_option('cwp_blocks_version', $theme->get('Version'));
    }

    return $blocks;
}


function enqueue_artilab_blocks_assets(){
    if(is_404()){
        return;
    }
    global $post;
    $page_id = $post->ID;
    $used_blocks = get_used_blocks_on_page($page_id);
    foreach ($used_blocks as $block) {
      
        $style_id = str_replace(['acf-', '-'], '', $block);
        // wp_enqueue_style( $style_id );
        wp_enqueue_script( $style_id );

    }

}
add_action('wp_enqueue_scripts', 'enqueue_artilab_blocks_assets');


function get_used_blocks_on_page($page_id) {
    $used_blocks = array();

    $page_content = get_post_field('post_content', $page_id);

    // Аналізувати блоки у контенті сторінки
    $blocks = parse_blocks($page_content);

    foreach ($blocks as $block) {
        // print_r($block['blockName']);
        if (isset($block['blockName'])) { // simple block
            $block_name = str_replace('/', '-', $block['blockName']); 
            $used_blocks[] = strtolower($block_name);
        }
        if (isset($block['attrs']['ref'])) { //reusable block
            $block_id = $block['attrs']['ref'];
            $block_content = get_post_field('post_content', $block_id);
            $block_content_parse = parse_blocks($block_content);
            $block_name = str_replace('/', '-', $block_content_parse[0]['blockName']); 
            $used_blocks[] = strtolower($block_name);
            // print_r($block_content_parse);
            // print_r($block_name);
        }
    }

    return $used_blocks;
}