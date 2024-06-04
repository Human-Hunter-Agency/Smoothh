<?php
if (!defined('ABSPATH')) {
  exit;
}
/**
 * Template Name: download-ebook
 * */
?>

<div class="form-basic">
  <div class="mb-[18px] flex flex-row gap-[18px] lg:[&_p]:grow">
    [text* your-name placeholder "Imię*"]

    [text* your-lastname placeholder "Nazwisko*"]

    [email* your-email placeholder "Adres e-mail*"]

    [hidden prod-id default:shortcode_attr]

    [hidden prod-name default:shortcode_attr]

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
    <div class="has-tooltip mb-5">
      [acceptance consent_marketing] <?=
                                      __('I consent to the processing of my personal data (name, e-mail address) by the Service Provider (here please provide the name and surname / name and address of the Service Provider) for marketing purposes.', 'smoothh')
                                      ?>
      <div class="tooltip">
        <div class="tooltip-icon">i</div>
        <span class="tooltip-text">
          <p>
            <?php
            $policyPageUrl = get_permalink(wc_privacy_policy_page_id());
            echo sprintf(
              __('Expressing consent is voluntary. I have the right to withdraw consent at any time without affecting the lawfulness of processing based on consent before its withdrawal. I have the right to access my data and rectify it, delete it, limit processing, and the right to transfer data on the terms contained in the %sprivacy policy%s of the website. Personal data on the website are processed in accordance with the %sprivacy policy%s. We encourage you to read the policy before agreeing.', 'smoothh'),
              "<a href='{$policyPageUrl}' target='_blank'>",
              "</a>",
              "<a href='{$policyPageUrl}' target='_blank'>",
              "</a>"
            )
            ?>
          </p>
        </span>
      </div>
      [/acceptance]
    </div>
  </div>

  <div class="btn-color relative text-center max-w-full w-fit mx-auto [&_.wpcf7-spinner]:absolute [&_.wpcf7-spinner]:right-[-7px] [&_.wpcf7-spinner]:top-4 mb-9 ">
    [submit "Pobierz e-booka"]
    <svg class="absolute right-5 top-[18px] -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle class="stroke-white" cx="9.5" cy="9.5" r="9" />
      <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z" />
    </svg>
  </div>
</div>