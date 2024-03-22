<div class="popup-cookies" id="popup-cookies" style="display: none">
    <div class="popup-content">
        <div class="popup-content_info">
            <?php echo get_field('content_cookie', 'options'); ?>
        </div>
        <div class="popup-content_buttons">
            <button type="button" class="button button-green sticky-cursor" id="cookie_accept">
                <span><?php _e('I accept', 'dollet') ?></span>
            </button>
            <button type="button" class="button button-simple sticky-cursor"  id="cookie_deny">
                <span><?php _e('Deny', 'dollet') ?></span>
            </button>
        </div>
    </div>

</div>