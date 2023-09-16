<?php do_action('fiorello_mikado_action_before_page_header'); ?>

<header class="mkdf-page-header">
	<?php do_action('fiorello_mikado_action_after_page_header_html_open'); ?>
	
    <div class="mkdf-logo-area">
	    <?php do_action( 'fiorello_mikado_action_after_header_logo_area_html_open' ); ?>
	    
        <?php if($logo_area_in_grid) : ?>
            <div class="mkdf-grid">
        <?php endif; ?>
			
            <div class="mkdf-vertical-align-containers">
                <div class="mkdf-position-center"><!--
                 --><div class="mkdf-position-center-inner">
                        <?php if(!$hide_logo) {
                            fiorello_mikado_get_logo();
                        } ?>
                    </div>
                </div>
            </div>
	            
        <?php if($logo_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) : ?>
        <div class="mkdf-fixed-wrapper">
    <?php endif; ?>
	        
    <div class="mkdf-menu-area">
	    <?php do_action( 'fiorello_mikado_action_after_header_menu_area_html_open' ); ?>
	    
        <?php if($menu_area_in_grid) : ?>
            <div class="mkdf-grid">
        <?php endif; ?>
	            
            <div class="mkdf-vertical-align-containers">
                <div class="mkdf-position-left"><!--
                 --><div class="mkdf-position-left-inner">
						<?php if ($widget_position == 'apart') {
							fiorello_mikado_get_header_centered_left_widget_areas();
						} ?>
		            </div>
		        </div>
                <div class="mkdf-position-center"><!--
                 --><div class="mkdf-position-center-inner">
                        <?php if ($widget_position == 'beside') {
							fiorello_mikado_get_header_centered_left_widget_areas();
                        } ?>
                        <?php fiorello_mikado_get_main_menu(); ?>
						<?php if ($widget_position == 'beside') {
							fiorello_mikado_get_header_centered_right_widget_areas();
						} ?>
                    </div>
                </div>
                <div class="mkdf-position-right"><!--
                 --><div class="mkdf-position-right-inner">
						<?php if ($widget_position == 'apart') {
							fiorello_mikado_get_header_centered_right_widget_areas();
						} ?>
		            </div>
		        </div>
            </div>
	            
        <?php if($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) { ?>
        </div>
	<?php } ?>
	
	<?php if($show_sticky) {
		fiorello_mikado_get_sticky_header('centered', 'header/types/header-centered');
	} ?>
	
	<?php do_action('fiorello_mikado_action_before_page_header_html_close'); ?>
</header>

<?php do_action('fiorello_mikado_action_after_page_header'); ?>