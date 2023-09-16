<li class="mkdf-uss-item <?php echo esc_attr($holder_classes); ?>" <?php echo fiorello_mikado_get_inline_attrs($holder_data); ?>>
    <div class="mkdf-uss-image-holder" <?php echo fiorello_mikado_get_inline_attrs($image_data); ?> <?php fiorello_mikado_inline_style($holder_styles); ?>></div>
    <div class="mkdf-uss-item-outer">
        <div class="mkdf-uss-item-inner" <?php fiorello_mikado_inline_style($item_inner_styles); ?>>
            <?php echo do_shortcode($content); ?>
        </div>
	</div>
	<?php if(!empty($link)) { ?>
		<a itemprop="url" class="mkdf-uss-item-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>"></a>
	<?php } ?>
</li>