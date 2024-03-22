<?php
if (!defined('ABSPATH')) {
  exit;
}
/**
 * Template Name: CV
 * */
?>

<div class="cv-form-container">
  <div class="row-1 mb-[42px] flex gap-[18px]">
    <div class="cv-name-input">
      [name* your-name id:your-name placeholder "Imię i nazwisko"]
    </div>
    <div class="cv-phone-input">
      [phone* your-phone id:your-phone placeholder "Telefon"]
    </div>
    <div class="cv-email-input">
      [email* your-email id:your-email placeholder "Adres e-mail"]
    </div>
    <div class="cv-file-input">
      [file* your-file id:your-file placeholder "Załącz CV"]
    </div>
  </div>

  <div class="row-2">
    <div class="cv-message-input">
      [textarea* your-message id:your-message placeholder "Wiadomość..."]
    </div>
  </div>

  <div class="submit-container">
    [submit "Wyślij wiadomość"]
  </div>
</div>