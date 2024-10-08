<?php

/** Template to display 'Formularz kontakt' - form_contact */

$header = $args['header'];
$bgColor = $args['bgColor'];
$email = $args['email'];
$phone = $args['phone'];
$address = $args['address'];

?>


<div class="relative w-full py-10 pb-5 md:pt-[70px] mt-10 mb-20">
    <?php if ($bgColor == 'Różowy') : ?>
        <div class="z-[-1] w-[100%] lg:w-[70%] h-[90%] absolute top-0 left-0 bg-gradient-to-r from-[rgba(129,23,238,0)] to-[rgba(129,23,238,0.102)] rounded-[45px]"></div>
    <?php endif; ?>

    <?php if ($bgColor == 'Niebieski') : ?>
        <div class="z-[-1] w-[100%] lg:w-[70%] h-[80%] absolute top-0 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>
    <?php endif; ?>


    <div class="pt-14 relative z-0 container flex flex-col lg:flex-row basis">

        <div class="basis-[55%] mb-10 xl:mb-20 mx-auto ">
            <div class="max-w-[580px] ">
                <?php if ($header) : ?>
                    <div class="mb-[44px] text-2xl md:text-[46px] font-extrabold lg:leading-[55px]">
                        <?php echo $header; ?>
                    </div>
                <?php endif; ?>

                <?php if ($email) : ?>
                    <div class="mb-2 text-[20px] flex gap-[10px] items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <path d="M22.5209 10.1489C22.4954 10.2011 22.4618 10.2501 22.4171 10.2921C22.2463 10.4539 19.0417 13.4818 17.3545 15.0604L22.4161 19.8228C22.4368 19.8425 22.4544 19.8643 22.4709 19.8862C22.5379 19.7526 22.5763 19.6025 22.5763 19.4433V10.4736C22.5763 10.3597 22.556 10.2511 22.5209 10.1489Z" fill="#8117EE" />
                            <path d="M7.35998 10.2809C7.34774 10.3432 7.34082 10.4076 7.34082 10.473V19.4428C7.34082 19.5088 7.34774 19.5732 7.35998 19.636L12.5173 15.054C10.8275 13.4961 7.68571 10.5827 7.35998 10.2809Z" fill="#8117EE" />
                            <path d="M14.1445 15.1871C14.7406 15.7262 15.1435 15.7273 15.7401 15.1918C16.4145 14.5867 21.6767 9.61403 21.7294 9.564C21.7549 9.54005 21.7826 9.51929 21.8119 9.5012C21.7363 9.48257 21.6565 9.47192 21.575 9.47192H8.3426C8.22976 9.47192 8.12119 9.49162 8.01953 9.52674C8.19251 9.68694 13.3344 14.4563 14.1445 15.1871Z" fill="#8117EE" />
                            <path d="M16.6199 15.7443C16.5305 15.8268 16.4576 15.8938 16.4092 15.9375C15.9227 16.3734 15.4336 16.5916 14.9445 16.5916C14.4521 16.5916 13.9609 16.3713 13.4728 15.9306C13.4191 15.8821 13.3461 15.8156 13.2583 15.7352L8.01953 20.3896C8.12066 20.4247 8.22923 20.4444 8.34206 20.4444H21.575C21.5878 20.4444 21.6006 20.4428 21.6139 20.4428L16.6199 15.7443Z" fill="#8117EE" />
                            <path d="M14.9585 29.9164C6.71044 29.9164 0 23.206 0 14.9579C0 6.71042 6.71044 0 14.9585 0C23.2066 0 29.9164 6.71042 29.9164 14.9579C29.9164 23.206 23.2066 29.9164 14.9585 29.9164ZM14.9585 1.3242C7.44067 1.3242 1.3242 7.44064 1.3242 14.9579C1.3242 22.4757 7.44067 28.5922 14.9585 28.5922C22.4763 28.5922 28.5922 22.4757 28.5922 14.9579C28.5922 7.44064 22.4763 1.3242 14.9585 1.3242Z" fill="#8117EE" />
                        </svg>
                        <a href="mailto:<?php echo $email; ?>" class="hover:text-primary transition duration-200"><?php echo $email; ?></a>
                    </div>
                <?php endif; ?>

                <?php if ($phone) : ?>
                    <div class="mb-[44px] text-[20px] flex gap-[10px] items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <path d="M14.9585 29.9164C6.71044 29.9164 0 23.206 0 14.9579C0 6.71042 6.71044 0 14.9585 0C23.2066 0 29.9164 6.71042 29.9164 14.9579C29.9164 23.206 23.2066 29.9164 14.9585 29.9164ZM14.9585 1.3242C7.44067 1.3242 1.3242 7.44064 1.3242 14.9579C1.3242 22.4757 7.44067 28.5922 14.9585 28.5922C22.4763 28.5922 28.5922 22.4757 28.5922 14.9579C28.5922 7.44064 22.4763 1.3242 14.9585 1.3242Z" fill="#8117EE" />
                            <path d="M21.4056 19.6421L19.0036 17.2279L18.8929 17.1273L18.8705 17.1214C18.7401 17.0256 18.5789 16.9522 18.3894 16.9027C18.0349 16.8106 17.6895 16.8484 17.3627 17.015L16.3903 17.5956L16.3642 17.5834C16.3382 17.5701 16.2344 17.5131 16.005 17.3093C15.8261 17.1496 15.6037 16.9091 15.3445 16.5924C15.0863 16.2778 14.7995 15.8457 14.486 15.298C14.1666 14.7679 13.9309 14.3102 13.785 13.9376C13.6387 13.5629 13.5391 13.2531 13.488 13.0094C13.4455 12.8247 13.4215 12.6613 13.4167 12.5218L14.2055 12.0583C14.4498 11.9151 14.6398 11.7091 14.7697 11.4473C14.9102 11.1657 14.9437 10.8613 14.8692 10.5803L14.0746 7.19631L14.0639 7.15745C14.0054 6.97596 13.9165 6.8099 13.801 6.66514C13.6546 6.48098 13.462 6.35644 13.2288 6.29576C12.926 6.21753 12.6146 6.26436 12.3304 6.43148L9.88375 7.86799C9.71023 7.96059 9.55003 8.09259 9.40738 8.26077C9.26953 8.42311 9.16149 8.59608 9.08751 8.77385L9.06622 8.83506C9.05877 8.8622 9.03002 8.95162 8.98159 9.1033C8.91453 9.31407 8.86503 9.58976 8.83043 9.94689C8.79691 10.2928 8.79372 10.7128 8.8214 11.1955C8.8496 11.6825 8.93582 12.243 9.079 12.8614C9.22164 13.4751 9.44464 14.1686 9.74162 14.9217C10.0402 15.6764 10.4548 16.5008 10.9711 17.3652C11.6199 18.4845 12.2799 19.4164 12.9329 20.1349C13.5833 20.8513 14.1964 21.4288 14.7542 21.8503C15.329 22.2852 15.8219 22.588 16.2599 22.7764C16.6852 22.9595 16.9955 23.075 17.2073 23.1304C17.3047 23.1554 17.3856 23.1729 17.4473 23.1825C17.4782 23.1873 17.4984 23.1905 17.4915 23.1884L17.5591 23.2006C17.6251 23.2086 17.6927 23.2123 17.7608 23.2123C17.8917 23.2123 18.0264 23.1985 18.1627 23.1713C18.3793 23.1288 18.5725 23.0537 18.7369 22.9473L21.1804 21.5251C21.5237 21.3234 21.7313 21.0126 21.7797 20.6257L21.7829 20.5921C21.7962 20.3531 21.7419 19.995 21.4056 19.6421Z" fill="#8117EE" />
                        </svg>
                        <a href="tel:<?php echo str_replace(' ', '', $phone); ?>" class="hover:text-primary transition duration-200"><?php echo $phone; ?></a>
                    </div>
                <?php endif; ?>

                <?php if ($address) : ?>
                    <div class="text-[20px]">
                        <?php echo $address; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-contact-wrapper form-with-confirm-wrapper relative basis-[45%] py-10 lg:py-[60px] px-8 lg:px-10 bg-white rounded-[45px] drop-shadow-2xl text-sm md:text-base lg:-translate-y-[60px]">
            <?php echo do_shortcode('[contact-form-7 id="f3dc97a" title="Kontakt"]'); ?>

            <div class="form-confirmation pointer-events-none opacity-0 absolute inset-0 bg-white rounded-[45px] flex flex-col items-center justify-center px-5 md:px-10 py-14 transition duration-300">
                <svg class="max-w-full mb-4" width="125" height="125" viewBox="0 0 125 125" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="62.5" cy="62.5" r="60.5" stroke="url(#paint1_linear_560_1182)" stroke-width="4"></circle>
                    <path d="M38.5713 62.5L54.2856 77.8571L85.7141 47.1428" stroke="url(#paint1_linear_560_1182)" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"></path>
                    <defs>
                    <linearGradient id="paint1_linear_560_1182" x1="2.357" y1="1.8214" x2="94.357" y2="90.8214" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#8117EE"></stop><stop offset="1" stop-color="#1F97D4"></stop>
                    </linearGradient>
                    </defs>
                </svg>
                <h4 class="text-center text-lg md:text-[20px] max-w-96 font-bold mb-5"><?php esc_html_e( 'Thank you for sending your message', 'smoothh' ); ?></h4>
                <p class="text-center text-base max-w-96 mb-10 md:mb-16"><?php esc_html_e( 'Our experts are already verifying your message, we will get back to you soon with the information you need', 'smoothh' ); ?></p>
                <button data-js-form-reset="form-contact-wrapper" class="w-full shrink-0 border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  transition-all duration-200 !text-white h-[55px] !px-5 xl:!px-12 !rounded-[15px] font-semibold !flex items-center justify-center">
                    <?php esc_html_e( 'Go back to form', 'smoothh' ); ?>
                </button>
            </div>
        </div>
    </div>
</div>
