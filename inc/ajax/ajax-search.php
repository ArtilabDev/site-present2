<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$faq_page = get_field('faq_link', 'options');

if ($faq_page) {
    global $page_id;
    $page_id = $faq_page->ID;
}

// Get the order of posts
function get_faq_post_order() {
    global $page_id;

    $page_content = get_post_field('post_content', $page_id);

    $blocks = parse_blocks($page_content);

    foreach ($blocks as $block) {
        if ($block['blockName'] === 'acf/blockadvancedfaq') {
            $select_faq_value = $block['attrs']['data']['select_faq'];
            return $select_faq_value;
        }
    }
}

// Function to fill the global array $globalSpoilerIds
function fill_global_spoiler_ids() {
    global $globalSpoilerIds;

    // Get the order of posts
    $faq_post_order = get_faq_post_order();

    // Check if the array is not empty
    if (!empty($faq_post_order)) {
        $globalSpoilerIds = array();
        $index = 1;
        foreach ($faq_post_order as $post_id) {
            // Get post data by its ID
            $post = get_post($post_id);

            if ($post && $post->post_type === 'faq') {
                if (have_rows('faq_content', $post_id)) {
                    while (have_rows('faq_content', $post_id)) {
                        the_row();
                        $globalSpoilerIds[] = array(
                            'id'   => 'search-' . $index,
                            'text' => get_sub_field('question', $post_id),
                        );
                        $index++;
                    }
                }
            }
        }
    }
}

// Function to handle the AJAX request
function load_more_search() {
    global $globalSpoilerIds;
    global $page_id;

    $search_value = sanitize_text_field($_POST['search_value']);
    fill_global_spoiler_ids();

    $faq_page_link = get_permalink($page_id);

    // Filter $globalSpoilerIds based on $search_value
    $filteredSpoilerIds = array_filter($globalSpoilerIds, function($spoiler) use ($search_value) {
        return stripos($spoiler['text'], $search_value) !== false;
    });
    ?>
<?php if (!empty($filteredSpoilerIds)): ?>
<div class="question__search_result-wrap">
  <?php foreach ($filteredSpoilerIds as $spoiler): ?>
  <a href="<?php echo esc_url($faq_page_link . '#' . esc_attr($spoiler['id'])); ?>"
    class="faq-item sticky-cursor sticky-dot">
    <?php
                    // Output the text, highlighting the matching part
                    $highlighted_text = preg_replace('/' . preg_quote($search_value, '/') . '/i', '<span class="highlighted">$0</span>', esc_html($spoiler['text']));

                    echo $highlighted_text;
                    ?>
  </a>
  <?php endforeach; ?>
</div>
<?php else: ?>
<div class="no-result-faq">No results found!</div>
<?php endif; ?>

<?php
    // End the execution of the AJAX request
    wp_die();
}

// Add a hook to handle the AJAX request
add_action('wp_ajax_load_more_search', 'load_more_search');
add_action('wp_ajax_nopriv_load_more_search', 'load_more_search');