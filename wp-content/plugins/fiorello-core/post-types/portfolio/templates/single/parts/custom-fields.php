<?php
$custom_fields = get_post_meta(get_the_ID(), 'mkdf_portfolio_properties', true);

if(is_array($custom_fields) && count($custom_fields)) :
    foreach($custom_fields as $custom_field) : ?>
        <div class="mkdf-ps-info-item mkdf-ps-custom-field">
            <?php if(!empty($custom_field['item_title'])) : ?>
                <span class="mkdf-ps-info-title"><?php echo esc_html($custom_field['item_title'].':'); ?></span>
            <?php endif; ?>
            <span class="mkdf-ps-info-content">
                <?php if(!empty($custom_field['item_url'])) : ?><a itemprop="url" href="<?php echo esc_url($custom_field['item_url']); ?>"><?php endif; ?>
                    <?php echo esc_html($custom_field['item_text']); ?>
                <?php if(!empty($custom_field['item_url'])) : ?></a><?php endif; ?>
            </span>
        </div>
    <?php endforeach; ?>
<?php endif; ?>