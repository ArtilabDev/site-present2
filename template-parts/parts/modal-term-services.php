<div class="modal" id="modal-terms">
  <div class="modal__wrap">
    <div class="modal__inner">

      <div class="modal-header">
        <div class="modal-header_title"><?php the_field('title_term', 'options'); ?></div>
        <div class="modal-header_subtitle">
          <?php the_field('last_updated', 'options'); ?>
        </div>

        <div class="modal-content">
          <div class="modal-content_wrap">
            <?php the_field('content_term', 'options'); ?>
          </div>
        </div>

        <div class="modal-confirm">
          <label class="d-checkbox">
            <input type="checkbox" class="d-checkbox_input" name="confirm-checkbox">
            <span class="d-checkbox_text">
              I accept the <?php
                            $privacy_terms = get_field('privacy_terms', 'options');
                            if ($privacy_terms) :
                                ?>
              <a class="sticky-cursor sticky-dot" target="_blank"
                href="<?php echo esc_url(get_permalink($privacy_terms->ID)); ?>"><?php _e('Terms of Service', 'dollet') ?></a>
              <?php endif;
                            ?> and confirm
              that i have read the
              <?php
                            $privacy_policy = get_field('privacy_policy', 'options');
                            if ($privacy_policy) :
                                ?>
              <a class="sticky-cursor sticky-dot" target="_blank"
                href="<?php echo esc_url(get_permalink($privacy_policy->ID)); ?>"><?php _e('Privacy Policy', 'dollet') ?></a>
              <?php endif;
                            ?>
            </span>
            <span class="d-checkbox_check sticky-cursor"></span>
          </label>
          <button type="button" class="confirm-terms button button-green sticky-cursor" id="term_button_confirm">
            <span><?php _e('Confirm', 'dollet') ?></span>
          </button>
        </div>

      </div>

    </div>
  </div>
</div>