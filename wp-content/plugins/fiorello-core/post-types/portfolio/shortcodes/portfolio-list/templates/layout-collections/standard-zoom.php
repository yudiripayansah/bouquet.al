<?php echo fiorello_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/image', $item_style, $params); ?>

<div class="mkdf-pli-text-holder" <?php fiorello_mikado_inline_style($this_object->getStandardContentStyles($params)); ?>>
	<div class="mkdf-pli-text-wrapper">
		<div class="mkdf-pli-text">
			<?php echo fiorello_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/title', $item_style, $params); ?>

			<?php echo fiorello_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/category', $item_style, $params); ?>

			<?php echo fiorello_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/images-count', $item_style, $params); ?>

			<?php echo fiorello_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/excerpt', $item_style, $params); ?>
		</div>
	</div>
</div>