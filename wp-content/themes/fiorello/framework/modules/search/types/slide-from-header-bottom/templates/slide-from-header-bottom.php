<div class="mkdf-slide-from-header-bottom-holder">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<div class="mkdf-form-holder">
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'fiorello' ); ?>" name="s" class="mkdf-search-field" autocomplete="off" />
			<button type="submit" <?php fiorello_mikado_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo fiorello_mikado_get_icon_sources_html( 'search', false, array( 'search' => 'yes' ) ); ?>
			</button>
		</div>
	</form>
</div>