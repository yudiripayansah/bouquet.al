<?php if(fiorello_mikado_options()->getOptionValue('portfolio_single_enable_categories') === 'yes') : ?>
    <?php
    $categories   = wp_get_post_terms(get_the_ID(), 'portfolio-category');
    if(is_array($categories) && count($categories)) : ?>
        <div class="mkdf-ps-info-item mkdf-ps-categories">
            <span class="mkdf-ps-info-title"><?php esc_html_e('Category:', 'fiorello-core'); ?></span>
            <?php foreach($categories as $cat) { ?>
                <a itemprop="url" class="mkdf-ps-info-content mkdf-ps-info-category" href="<?php echo esc_url(get_term_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
            <?php } ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
