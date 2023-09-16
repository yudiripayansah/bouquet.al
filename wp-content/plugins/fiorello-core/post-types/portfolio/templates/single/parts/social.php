<?php if(fiorello_mikado_options()->getOptionValue('enable_social_share') == 'yes' && fiorello_mikado_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="mkdf-ps-info-item mkdf-ps-social-share">
        <span class="mkdf-ps-info-title"><?php esc_html_e('Share:', 'dotwork-core'); ?></span>
        <?php echo fiorello_mikado_get_social_share_html() ?>
    </div>
<?php endif; ?>