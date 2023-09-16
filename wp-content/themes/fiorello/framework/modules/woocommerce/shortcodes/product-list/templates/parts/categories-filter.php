<?php if($show_category_filter == 'yes'){ ?>
<div class="mkdf-pl-categories">
	<h6 class="mkdf-pl-categories-label"><?php esc_html_e('Categories','fiorello'); ?></h6>
	<ul>
        <?php echo fiorello_mikado_get_module_part( $this_object->getProductCategoriesList($params) ); ?>
    </ul>
</div>
<?php } ?>