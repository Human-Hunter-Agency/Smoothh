<?php
if (!defined('ABSPATH')) {
  exit;
}
/**
 * Template Name: negotiate
 * */
?>

<div class="form-basic">
  <div class="mb-[18px] flex flex-col lg:flex-row lg:flex-wrap gap-[18px] lg:[&_p]:grow lg:[&_p]:w-[calc(33%_-_12px)] ">
      [text* your-name placeholder "Imię i Nazwisko*"]

      [email* your-email placeholder "Adres e-mail*"]

      [tel* your-phone placeholder "Numer tel.*"]
      
  </div>

  <div class="w-full mb-5">
    [textarea your-message x3 placeholder "Twoja wiadomość"]
  </div>
  <div class="hidden">
  [textarea calc-data]
  </div>
  <div class="max-w-[540px]">
    <div class="mb-5 has-tooltip">
    [acceptance gdpr_woo_consent] <?php
      $policyPageUrl = get_permalink(wc_privacy_policy_page_id()); 
      echo sprintf(
        __('I accept the %sPrivacy Policy%s', 'gdpr-framework'),
        "<a href='{$policyPageUrl}' target='_blank'>",
        "</a>"
      ); 
      ?> 
      <div class="tooltip">
        <div class="tooltip-icon">i</div>
        <span class="tooltip-text">
          <?php wc_registration_privacy_policy_text() ?>
        </span>
      </div>
      [/acceptance]
    </div>
  </div>

  <div class="btn-color relative text-center max-w-full w-fit mx-auto [&_.wpcf7-spinner]:absolute [&_.wpcf7-spinner]:right-[-7px] [&_.wpcf7-spinner]:top-4 mb-9 ">
    [submit "Wyślij wiadomość"]
    <svg class="absolute right-5 top-[18px] -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle class="stroke-white" cx="9.5" cy="9.5" r="9"/>
      <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"/>
    </svg>
  </div>
</div>