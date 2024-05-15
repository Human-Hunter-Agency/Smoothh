<div class="gdpr-framework-privacy-tools prose prose-ul:pl-0 prose-a:no-underline">
    <?php do_action('gdpr/frontend/privacy-tools-page/content/before', $dataSubject); ?>

    <p>
        <?= __('You are identified as', 'gdpr-framework'); ?> <strong><?= esc_html($email); ?></strong>
    </p>

    <hr>

    <?php do_action('gdpr/frontend/privacy-tools-page/content', $dataSubject); ?>

    <?php do_action('gdpr/frontend/privacy-tools-page/content/after', $dataSubject); ?>
</div>
