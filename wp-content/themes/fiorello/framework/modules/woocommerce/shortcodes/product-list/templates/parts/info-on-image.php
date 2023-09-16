<?php
$item_classes           = $this_object->getItemClasses( $params );
$shader_styles          = $this_object->getShaderStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="mkdf-pli mkdf-item-space <?php echo esc_attr( $item_classes ); ?>">
	<div class="mkdf-pli-inner">
		<div class="mkdf-pli-image">
			<?php fiorello_mikado_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
		</div>
		<div class="mkdf-pli-text <?php echo esc_attr($layout_classes);?>" <?php echo fiorello_mikado_get_inline_style( $shader_styles ); ?>>
			<div class="mkdf-pli-text-outer">
				<div class="mkdf-pli-text-inner">
					<?php fiorello_mikado_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>
					
					<?php fiorello_mikado_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>
					
					<?php fiorello_mikado_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
										
					
					<?php fiorello_mikado_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
					
					<?php fiorello_mikado_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); ?>
				</div>
			</div>
		</div>
		<a class="mkdf-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
</div>