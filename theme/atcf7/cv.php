<?php
if (!defined('ABSPATH')) {
  exit;
}
/**
 * Template Name: CV
 * */
?>

<div class="form-basic">
  <div class="mb-[18px] lg:mb-[42px] flex flex-col lg:flex-row gap-[18px] lg:[&_p]:w-[calc(25%_-_13.5px)] ">
      [text* your-name placeholder "Imię i nazwisko*"]

      [tel* your-phone placeholder "Telefon*"]
      
      [email* your-email placeholder "Adres e-mail*"]
      
      <label for="your-file" class="flex justify-between items-center pl-4 pr-3 md:pl-6 min-w-0 w-full h-[55px] rounded-2xl border border-primary hover:border-secondary transition duration-200 bg-white placeholder:text-foreground text-foreground text-base cursor-pointer [&_br]:hidden" data-js="cv-file">
        <span class="truncate" data-js="cv-file-name">
          <?php esc_html_e('Include CV', 'smoothh') ?>
        </span>  
        <svg data-js="cv-file-icon" class="shrink-0" width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line y1="5.50293" x2="10" y2="5.50293" stroke="#8117EE"/>
          <line x1="5" y1="0.5" x2="5" y2="10.5" stroke="#8117EE"/>
        </svg>
      </label>[file* your-file id:your-file placeholder "Załącz CV*"]
  </div>

  <div class="message-container w-full mb-[30px]">
    [textarea* your-message x3 placeholder "Wiadomość..."]
  </div>

  <div class="max-w-[520px] mb-5 [&_a]:!text-white hover:[&_a]:!text-white [&_input]:!accent-secondary">
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


  <div class="btn-white relative text-center max-w-full w-fit mx-auto [&_.wpcf7-spinner]:absolute [&_.wpcf7-spinner]:right-[-7px] [&_.wpcf7-spinner]:top-4 [&_svg_path]:hover:fill-secondary [&_svg_circle]:hover:stroke-secondary">
    [submit "Wyślij wiadomość"]
    <svg class="absolute right-5 top-[18px]" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle class="stroke-primary transition duration-200" cx="9.5" cy="9.5" r="9"/>
      <path class="fill-primary transition duration-200" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"/>
    </svg>
  </div>
</div>