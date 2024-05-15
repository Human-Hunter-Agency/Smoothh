<?php if ($consentData or $consentInfo): ?>
    <h2><?= __('Consent', 'gdpr-framework'); ?></h2>

    <?php if ($consentData): ?>
        <p>
            <?= __('Here you can withdraw any consents you have given.', 'gdpr-framework'); ?>
        </p>
        <ul class="gdpr-consent flex flex-col gap-5">
            <?php foreach ($consentData as $item): ?>
                <li class="flex justify-between flex-col lg:flex-row gap-3 lg:gap-4">
                    <div class="lg:w-44">
                        <strong>
                            <?= $item['title']; ?>
                        </strong>
                    </div>
                    <div>
                        <p><?= $item['description']; ?></p>
                    </div>
                    <div class="shrink-0">
                        <?php if ('privacy-policy' !== $item['slug']): ?>
                            <a href="<?= esc_url($item['withdraw_url']); ?>" class="whitespace-nowrap border-2 border-[#F2F2F2] hover:border-primary hover:text-primary transition duration-200 text-black min-h-[55px] px-5 rounded-[15px] font-semibold flex items-center justify-center gap-5">
                                <?= __('Withdraw', 'gdpr-framework'); ?>
                                <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle class="stroke-black" cx="9.5" cy="9.5" r="9"></circle>
                                    <path class="fill-black" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($consentInfo): ?>
        <div class="gdpr-consent-disclaimer">
            <?= do_shortcode($consentInfo); ?>
        </div>
    <?php endif; ?>
    <hr>
<?php endif; ?>
