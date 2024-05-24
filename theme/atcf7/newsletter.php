<?php
if (!defined('ABSPATH')) {
  exit;
}
/**
 * Template Name: newsletter
 * */
?>
<div>
  <div class="newsletter-input">
  [email* your-email id:your-email placeholder "Adres e-mail"]
      <div class="submit-container">
          [submit "Zapisz mnie"]
      </div>
  </div>
  <div class="max-w-[505px] has-tooltip mt-3">
      [acceptance consent_marketing] <?=
      __('I consent to the processing of my personal data (name, e-mail address) by the Service Provider (here please provide the name and surname / name and address of the Service Provider) for marketing purposes.', 'smoothh' )
      ?> 
      <div class="tooltip">
        <div class="tooltip-icon">i</div>
        <span class="tooltip-text">
          <p>
            <?php
              $policyPageUrl = get_permalink(wc_privacy_policy_page_id());  
              echo sprintf(__('Expressing consent is voluntary. I have the right to withdraw consent at any time without affecting the lawfulness of processing based on consent before its withdrawal. I have the right to access my data and rectify it, delete it, limit processing, and the right to transfer data on the terms contained in the %sprivacy policy%s of the website. Personal data on the website are processed in accordance with the %sprivacy policy%s. We encourage you to read the policy before agreeing.', 'smoothh'),
              "<a href='{$policyPageUrl}' target='_blank'>","</a>","<a href='{$policyPageUrl}' target='_blank'>","</a>") 
            ?>
          </p>
        </span>
      </div>
      [/acceptance]
    </div>
</div>
