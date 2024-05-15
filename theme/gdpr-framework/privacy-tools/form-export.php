<h2><?= __('Download your data', 'gdpr-framework') ?></h2>

<p class="description">
    <?= __('You can download all your data formatted as a table for viewing.', 'gdpr-framework') ?> <br>
    <?= __('Alternatively, you can export it in machine-readable JSON format.', 'gdpr-framework') ?>
</p>

<div class="flex justify-end">
    <div class="gdpr-download-button">
        <form method="POST">
            <input type="hidden" name="gdpr_nonce" value="<?= $nonce; ?>" />
            <input type="hidden" name="gdpr_action" value="export" />
            <input type="hidden" name="gdpr_format" value="html" />
            <label class="whitespace-nowrap border-2 border-[#F2F2F2] hover:border-primary hover:text-primary transition duration-200 text-black min-h-[55px] px-5 rounded-[15px] font-semibold flex items-center justify-center gap-5">
                <input type="submit" class="hidden" value="<?= __('Download as table', 'gdpr-framework') ?>" />
                <?php esc_html__('Download as table', 'gdpr-framework') ?>
                <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle class="stroke-black" cx="9.5" cy="9.5" r="9"></circle>
                    <path class="fill-black" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
                </svg>
            </label>
        </form>
    </div>
    
    <div class="gdpr-export-button">
        <form method="POST">
            <input type="hidden" name="gdpr_nonce" value="<?= $nonce; ?>" />
            <input type="hidden" name="gdpr_action" value="export" />
            <input type="hidden" name="gdpr_format" value="json" />
            <label class="whitespace-nowrap border-2 border-[#F2F2F2] hover:border-primary hover:text-primary transition duration-200 text-black min-h-[55px] px-5 rounded-[15px] font-semibold flex items-center justify-center gap-5">
                <input type="submit" class="hidden" value="<?= __('Export as JSON', 'gdpr-framework') ?>" />
                <?php esc_html__('Export as JSON', 'gdpr-framework') ?>
                <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle class="stroke-black" cx="9.5" cy="9.5" r="9"></circle>
                    <path class="fill-black" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
                </svg>
            </label>
        </form>
    </div>
</div>

<hr>
