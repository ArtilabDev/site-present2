<?php
  $request_form_id = get_field('request_form_zendesk', 'option');
  $bug_form_id = get_field('bug_form_zendesk', 'option');
  ?>
<section class="issue">
  <div class="container">
    <div class="issue__wrap">
      <div class="issue__head">
        <?php if ( get_field('title_issue') ) : ?>
        <h1 class="issue__head_title">
          <?= get_field('title_issue'); ?>
        </h1>
        <?php endif; ?>
        <div class="issue__head_buttons">
          <button type="button" class="button button-simple issue-btn sticky-cursor"
            data-title="<?= get_field('thank_message_title_request', 'option') ?>" data-target="form-request">
            <span><?= get_field('request_form_zendesk_btn_txt', 'option') ?></span>
          </button>
          <button type="button" class="button button-simple issue-btn sticky-cursor"
            data-title="<?= get_field('thank_message_title_bug', 'option') ?>" data-target="form-report">
            <span><?= get_field('bug_form_btn_txt', 'option') ?></span>
          </button>
        </div>
      </div>

      <div class="issue__forms">

        <div class="feedback-panel_form" style="display: none" id="form-request">
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

        <div class="feedback-panel_form" style="display: none" id="form-report">
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

        <div class="feedback-panel_form" style="display: none" id="form-feedback-success">

          <div class="title"></div>
          <?php if ( get_field('thank_message_title_descr', 'option') ) : ?>
          <div class="text">
            <?= get_field('thank_message_title_descr', 'option'); ?>
          </div>
          <div class="success-form-timer">this window will close after <span></span> s</div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
</section>