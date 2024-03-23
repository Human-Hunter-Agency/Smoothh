<?php
if (!defined('ABSPATH')) {
  exit;
}
/**
 * Template Name: CV
 * */
?>

<div class="form-cv">
  <div class="mb-[18px] lg:mb-[42px] flex flex-col lg:flex-row gap-[18px]">
      [text* your-name placeholder "Imię i nazwisko"]

      [tel* your-phone placeholder "Telefon"]
      
      [email* your-email placeholder "Adres e-mail"]
      
      [file* your-file placeholder "Załącz CV"]
  </div>

  <div class="w-full mb-[30px]">
    [textarea* your-message x3 placeholder "Wiadomość..."]
  </div>

  <div class="text-center">
    [submit "Wyślij wiadomość"]
  </div>
</div>