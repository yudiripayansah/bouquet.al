<?php get_header(); ?>
				<div class="mkdf-page-not-found">
					<?php
					$mkdf_title_image_404 = fiorello_mikado_options()->getOptionValue( '404_page_title_image' );
					$mkdf_title_404       = fiorello_mikado_options()->getOptionValue( '404_title' );
					$mkdf_subtitle_404    = fiorello_mikado_options()->getOptionValue( '404_subtitle' );
					$mkdf_text_404        = fiorello_mikado_options()->getOptionValue( '404_text' );
					$mkdf_search_form_skin= fiorello_mikado_options()->getOptionValue( '404_search_form_skin' );
					$mkdf_button_label = fiorello_mikado_options()->getOptionValue( '404_back_to_home' );
					$mkdf_button_skin = fiorello_mikado_options()->getOptionValue( '404_button_style' ); 
					
					if ( ! empty( $mkdf_title_image_404 ) ) { ?>
						<div class="mkdf-404-title-image">
							<img src="<?php echo esc_url( $mkdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'fiorello' ); ?>" />
						</div>
					<?php } ?>

					
					<h1 class="mkdf-404-title">
						<?php if ( ! empty( $mkdf_title_404 ) ) {
							echo esc_html( $mkdf_title_404 );
						} else {
							esc_html_e( '404', 'fiorello' );
						} ?>
					</h1>
					
					<h3 class="mkdf-404-subtitle">
						<?php if ( ! empty( $mkdf_subtitle_404 ) ) {
							echo esc_html( $mkdf_subtitle_404 );
						} else {
							esc_html_e( 'Page not found', 'fiorello' );
						} ?>
					</h3>
					
					<p class="mkdf-404-text">
						<?php if ( ! empty( $mkdf_text_404 ) ) {
							echo esc_html( $mkdf_text_404 );
						} else {
							esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'fiorello' );
						} ?>
					</p>

					<?php
					$mkdf_form_class = 'mkdf-404-form';

					if ($mkdf_search_form_skin == 'light-style') {
						$mkdf_form_class .= ' mkdf-404-form-light';
					}
					?>

                    <div <?php fiorello_mikado_class_attribute($mkdf_form_class);?>>
                        <?php get_search_form(); ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>