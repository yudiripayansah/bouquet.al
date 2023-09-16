<section class="mkdf-side-menu">
	<div class="mkdf-close-side-menu-holder">
        <a <?php fiorello_mikado_class_attribute( $close_icon_classes ); ?> href="#">
			<?php echo fiorello_mikado_get_icon_sources_html( 'side_area', true ); ?>
        </a>
	</div>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>