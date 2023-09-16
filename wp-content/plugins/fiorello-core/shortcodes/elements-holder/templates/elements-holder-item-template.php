<div class="mkdf-eh-item <?php echo esc_attr($holder_classes); ?>" <?php echo fiorello_mikado_get_inline_style($holder_styles); ?> <?php echo fiorello_mikado_get_inline_attrs($holder_data); ?>>
	<div class="mkdf-eh-item-background-image" <?php fiorello_mikado_inline_style($background_image_styles);?>></div>
    <?php if ($link !== '') { ?>
        <a class="mkdf-eh-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target);?>"></a>
	<?php } ?>
    <div class="mkdf-eh-item-inner">
		<div class="mkdf-eh-item-content <?php echo esc_attr($holder_rand_class); ?>" <?php echo fiorello_mikado_get_inline_style($content_styles); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
	</div>
</div>