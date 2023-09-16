<?php ?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="mkdf-search-slide-window-top" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="mkdf-grid">
	<?php } ?>
		<div class="mkdf-search-form-inner">
			<span <?php fiorello_mikado_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo fiorello_mikado_get_icon_sources_html( 'search', false, array( 'search' => 'yes' ) ); ?>
			</span>
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'fiorello' ); ?>" name="s" class="mkdf-swt-search-field" autocomplete="off"/>
			<a <?php fiorello_mikado_class_attribute( $search_close_icon_class ); ?> href="#">
				<?php echo fiorello_mikado_get_icon_sources_html( 'search', true, array( 'search' => 'yes' ) ); ?>
			</a>
		</div>
	<?php if ( $search_in_grid ) { ?>
	</div>
	<?php } ?>
</form>