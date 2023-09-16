<?php if(fiorello_mikado_options()->getOptionValue('portfolio_single_hide_date') === 'yes') : ?>
    <div class="mkdf-ps-info-item mkdf-ps-date">
        <span class="mkdf-ps-info-title"><?php esc_html_e('Date:', 'fiorello-core'); ?></span>
        <span itemprop="dateCreated" class="mkdf-ps-info-content mkdf-ps-info-date entry-date updated"><?php the_time(get_option('date_format')); ?></span>
        <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(fiorello_mikado_get_page_id()); ?>"/>
    </div>
<?php endif; ?>