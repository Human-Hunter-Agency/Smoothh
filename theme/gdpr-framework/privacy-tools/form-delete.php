<?php global $gdpr; ?>

<h2><?= ($gdpr->Options->get('gdpr_delete_text') != '') ? $gdpr->Options->get('gdpr_delete_text') : __('Delete my user and data', 'gdpr-framework') ?></h2>
<p class="description">
    <?= __('Delete all data we have gathered about you.', 'gdpr-framework') ?> <br/>
    <?= __('If you have a user account on our site, it will also be deleted.', 'gdpr-framework') ?> <br/>
    <?= __('Be careful - this action is permanent and CANNOT be undone.', 'gdpr-framework') ?>
    <?php if ($gdpr->Options->get('enable_woo_compatibility') && class_exists('Woocommerce')){?>
        <br/><strong class="gdpr_woo_note mt-5"><?= __("Note Regarding Order:", 'gdpr-framework') ?></strong><br/>
        <?= __("Your order with status Processing will not get deleted until status change.", 'gdpr-framework') ?><br/>
        <?= __("Your order with status Completed will get anonymize.", 'gdpr-framework') ?><br/>
        <?= __("If you delete Completed order you can't apply for refund.", 'gdpr-framework') ?><br/>
    <?php } ?>
</p>
<br/>
<div class="gdpr-delete-button !mx-0 w-full !flex justify-end">
<?php add_thickbox(); ?>

<a href="#TB_inline?width=600&height=239&inlineId=gdprmodal-window-id" class="thickbox button-primary whitespace-nowrap border-2 border-[#F2F2F2] hover:border-primary hover:text-primary transition duration-200 text-black min-h-[55px] px-5 rounded-[15px] font-semibold flex items-center justify-center gap-5">
    <?= __('Delete my data', 'gdpr-framework') ?>
    <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle class="stroke-black" cx="9.5" cy="9.5" r="9"></circle>
        <path class="fill-black" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
    </svg>
</a>

<div id="gdprmodal-window-id" style="display:none;">
    <center>
    <form method="GET">
        <p class="description prose">
            <?= __('Delete all data we have gathered about you.', 'gdpr-framework') ?> <br/>
            <?= __('If you have a user account on our site, it will also be deleted.', 'gdpr-framework') ?> <br/>
            <?= __('Be careful - this action is permanent and CANNOT be undone.', 'gdpr-framework') ?>
        </p>
            <input type="hidden" name="gdpr_nonce" value="<?= $nonce; ?>"/>
            <input type="hidden" name="gdpr_action" value="<?= $action; ?>"/>
            <input type="submit" class="button button-primary mt-10 cursor-pointer shrink-0 rounded-[14px] py-1.5 px-7 bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white text-center shadow-sm shadow-black/15" value="<?= __('Delete my data', 'gdpr-framework') ?>"/>
    </form>
    <center>
</div>

   
</div>