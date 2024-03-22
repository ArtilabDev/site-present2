<?php 
  $request_form_id = get_field('request_form_zendesk', 'option');
  $bug_form_id = get_field('bug_form_zendesk', 'option');
  $current_id = get_the_ID();
  $blog_page_id = get_field('blog_page', 'option');
  $turn_off_zendesk_on_this_page = get_field('turn_off_zendesk_on_this_page', $current_id);
  $turn_off_zendesk_on_blog = get_field('turn_off_zendesk_on_this_page', $blog_page_id);
  $turn_off_zendesk = false;
  if($turn_off_zendesk_on_this_page){
    $turn_off_zendesk = true;
  } elseif($turn_off_zendesk_on_blog){
    if(is_singular('post') || is_category()){
      $turn_off_zendesk = true;
    }
  }
  if(!$turn_off_zendesk){
  ?>
<div class="feedback-panel">
  <div class="feedback-panel_rotate">
    <span>Rotate your phone</span>
    <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/icon/icon__rotate.png">
    <span>for better experience</span>
  </div>
  <div class="feedback-panel_modal" id="modal-request">
    <div class="feedback-panel_modal__close modal-close sticky-cursor sticky-link"></div>

    <?php if ( get_field('request_form_title', 'option') ) : ?>
    <div class="title">
      <?= get_field('request_form_title', 'option'); ?>
    </div>
    <?php endif; ?>
    <?php if ( get_field('request_form_title_descr', 'option') ) : ?>
    <div class="text">
      <?= get_field('request_form_title_descr', 'option'); ?>
    </div>
    <?php endif; ?>
    <?= apply_shortcodes( '[contact-form-7 id="'. $request_form_id  .'" title="Send a request"]' ) ?>

  </div>

  <div class="feedback-panel_modal" id="modal-report">
    <div class="feedback-panel_modal__close modal-close sticky-cursor sticky-link"></div>

    <?php if ( get_field('bug_form_title', 'option') ) : ?>
    <div class="title">
      <?= get_field('bug_form_title', 'option'); ?>
    </div>
    <?php endif; ?>
    <?php if ( get_field('bug_form_description', 'option') ) : ?>
    <div class="text">
      <?= get_field('bug_form_description', 'option'); ?>
    </div>
    <?php endif; ?>
    <?= apply_shortcodes( '[contact-form-7 id="'. $bug_form_id .'" title="Report us about a bug"]' ) ?>

  </div>

  <div class="feedback-panel_modal" id="modal-feedback-success">
    <div class="feedback-panel_modal__close modal-close sticky-cursor sticky-link"></div>

    <div class="title"></div>

    <?php if ( get_field('thank_message_title_descr', 'option') ) : ?>
    <div class="text">
      <?= get_field('thank_message_title_descr', 'option'); ?>
    </div>
    <?php endif; ?>
  </div>

  <div class="feedback-panel_btns">
    <div class="feedback-panel_btn sticky-cursor btn--modal"
      data-type="<?= get_field('thank_message_title_request', 'option') ?>" data-target="modal-request">
      <?= get_field('request_form_zendesk_btn_txt', 'option') ?></div>

    <div class="feedback-panel_btn btn-circle sticky-cursor btn--modal"
      data-type="<?= get_field('thank_message_title_request', 'option') ?>" data-target="modal-request">
      <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/icon/icon__mail-2.svg" fetchpriority="low" width="24"
        height="24" alt="<?= esc_attr(get_field('request_form_zendesk_btn_txt', 'option')) ?>">
    </div>

    <div class="feedback-panel_btn sticky-cursor btn--modal"
      data-type="<?= get_field('thank_message_title_bug', 'option') ?>" data-target="modal-report">
      <?= get_field('bug_form_btn_txt', 'option') ?></div>
    <span>
      <div class="feedback-panel_btn btn-circle sticky-cursor btn--modal"
        data-type="<?= get_field('thank_message_title_bug', 'option') ?>" data-target="modal-report">
        <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/icon/icon__bug.svg" fetchpriority="low" width="24"
          height="24" alt="<?= esc_attr(get_field('bug_form_btn_txt', 'option')) ?>">
      </div>
    </span>
  </div>

  <div class="feedback-panel_btn btn-circle feedback-panel_btn--main sticky-cursor">
    <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/icon/icon__chat.svg" width="32" height="32"
      fetchpriority="high" alt="chat" class="icon">
    <img src="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/icon/icon__close.svg" fetchpriority="low" width="32"
      height="32" alt="close-chat" class="close">
  </div>
</div>
<?php } 