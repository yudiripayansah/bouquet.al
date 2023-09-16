<?php do_action('fiorello_mikado_action_before_page_header'); ?>

<header class="mkdf-page-header">
	<?php do_action('fiorello_mikado_action_after_page_header_html_open'); ?>
	
    <?php if($show_fixed_wrapper) : ?>
        <div class="mkdf-fixed-wrapper">
    <?php endif; ?>
	        
    <div class="mkdf-menu-area">
	    <?php do_action('fiorello_mikado_action_after_header_menu_area_html_open'); ?>
	    
        <?php if($menu_area_in_grid) : ?>
            <div class="mkdf-grid">
        <?php endif; ?>
	            
        <div class="mkdf-vertical-align-containers">
            <div class="mkdf-position-left"><!--
             --><div class="mkdf-divided-left-widget-area">
                    <div class="mkdf-divided-left-widget-area-inner">
						<?php fiorello_mikado_get_divided_left_widget_area(); ?>
                    </div>
                </div>
                <div class="mkdf-position-left-inner">
                    <?php fiorello_mikado_get_divided_left_main_menu(); ?>
                </div>
            </div>
            <div class="mkdf-position-center"><!--
             --><div class="mkdf-position-center-inner">
                    <?php if(!$hide_logo) {
                        fiorello_mikado_get_logo();
                    } ?>
                </div>
            </div>
            <div class="mkdf-position-right"><!--
             --><div class="mkdf-position-right-inner">
                    <?php fiorello_mikado_get_divided_right_main_menu(); ?>
                </div>
                <div class="mkdf-divided-right-widget-area">
                    <div class="mkdf-divided-right-widget-area-inner">
                        <div class="mkdf-position-right-inner-wrap">
							<?php fiorello_mikado_get_divided_right_widget_area(); ?>
                        </div>
                    </div>
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
		fiorello_mikado_get_sticky_header('divided', 'header/types/header-divided');
	} ?>
	
	<?php do_action('fiorello_mikado_action_before_page_header_html_close'); ?>
</header>

<?php do_action('fiorello_mikado_action_after_page_header'); ?>