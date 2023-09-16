<?php

if(!function_exists('fiorello_mikado_design_styles')) {
    /**
     * Generates general custom styles
     */
    function fiorello_mikado_design_styles() {
	    $font_family = fiorello_mikado_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && fiorello_mikado_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo fiorello_mikado_dynamic_css( $font_family_selector, array( 'font-family' => fiorello_mikado_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = fiorello_mikado_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'a:hover',
                'p a:hover',
                '.mkdf-comment-holder .mkdf-comment-text .comment-edit-link',
                '.mkdf-comment-holder .mkdf-comment-text .comment-reply-link',
                '.mkdf-comment-holder .mkdf-comment-text .replay',
                '.mkdf-comment-holder .mkdf-comment-text #cancel-comment-reply-link',
                'footer .widget ul li a:hover',
                'footer .widget.widget_archive ul li a abbr:hover',
                'footer .widget.widget_categories ul li a abbr:hover',
                'footer .widget.widget_meta ul li a abbr:hover',
                'footer .widget.widget_nav_menu ul li a abbr:hover',
                'footer .widget.widget_pages ul li a abbr:hover',
                'footer .widget.widget_recent_entries ul li a abbr:hover',
                'footer .widget #wp-calendar tfoot a:hover',
                'footer .widget.widget_tag_cloud a:hover',
                'footer .widget.mkdf-recent-post-widget .mkdf-recent-posts .mkdf-rp-item a:hover .mkdf-rp-title',
                '.mkdf-fullscreen-sidebar .widget ul li a:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_archive ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_categories ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_meta ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_nav_menu ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_pages ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_recent_entries ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
                '.mkdf-fullscreen-sidebar .widget.mkdf-recent-post-widget .mkdf-recent-posts .mkdf-rp-item a:hover .mkdf-rp-title',
                '.mkdf-side-menu .widget ul li a:hover',
                '.mkdf-side-menu .widget.widget_archive ul li a abbr:hover',
                '.mkdf-side-menu .widget.widget_categories ul li a abbr:hover',
                '.mkdf-side-menu .widget.widget_meta ul li a abbr:hover',
                '.mkdf-side-menu .widget.widget_nav_menu ul li a abbr:hover',
                '.mkdf-side-menu .widget.widget_pages ul li a abbr:hover',
                '.mkdf-side-menu .widget.widget_recent_entries ul li a abbr:hover',
                '.mkdf-side-menu .widget #wp-calendar tfoot a:hover',
                '.mkdf-side-menu .widget.widget_tag_cloud a:hover',
                '.mkdf-side-menu .widget.mkdf-recent-post-widget .mkdf-recent-posts .mkdf-rp-item a:hover .mkdf-rp-title',
                '.wpb_widgetised_column .widget ul li a:hover',
                'aside.mkdf-sidebar .widget ul li a:hover',
                '.wpb_widgetised_column .widget.widget_archive ul li a abbr:hover',
                '.wpb_widgetised_column .widget.widget_categories ul li a abbr:hover',
                '.wpb_widgetised_column .widget.widget_meta ul li a abbr:hover',
                '.wpb_widgetised_column .widget.widget_nav_menu ul li a abbr:hover',
                '.wpb_widgetised_column .widget.widget_pages ul li a abbr:hover',
                '.wpb_widgetised_column .widget.widget_recent_entries ul li a abbr:hover',
                'aside.mkdf-sidebar .widget.widget_archive ul li a abbr:hover',
                'aside.mkdf-sidebar .widget.widget_categories ul li a abbr:hover',
                'aside.mkdf-sidebar .widget.widget_meta ul li a abbr:hover',
                'aside.mkdf-sidebar .widget.widget_nav_menu ul li a abbr:hover',
                'aside.mkdf-sidebar .widget.widget_pages ul li a abbr:hover',
                'aside.mkdf-sidebar .widget.widget_recent_entries ul li a abbr:hover',
                '.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
                'aside.mkdf-sidebar .widget #wp-calendar tfoot a:hover',
                '.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
                'aside.mkdf-sidebar .widget.widget_tag_cloud a:hover',
                '.wpb_widgetised_column .widget.mkdf-recent-post-widget .mkdf-recent-posts .mkdf-rp-item a:hover .mkdf-rp-title',
                'aside.mkdf-sidebar .widget.mkdf-recent-post-widget .mkdf-recent-posts .mkdf-rp-item a:hover .mkdf-rp-title',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
                '.mkdf-blog-holder article.sticky .mkdf-post-title a',
                '.mkdf-blog-holder article .mkdf-post-mark .mkdf-post-link-image',
                '.mkdf-blog-holder article .mkdf-post-mark .mkdf-post-quote-image',
                '.mkdf-blog-holder article .mkdf-post-info-bottom>div a:hover',
                '.mkdf-blog-holder article .mkdf-post-info-bottom .mkdf-tags-holder .mkdf-tags a:hover',
                '.mkdf-blog-holder article .mkdf-post-info-bottom .mkdf-post-info-bottom-right .mkdf-toggle-share',
                '.mkdf-blog-pagination ul li a:hover',
                '.mkdf-blog-pagination ul li.mkdf-pag-first a:hover',
                '.mkdf-blog-pagination ul li.mkdf-pag-last a:hover',
                '.mkdf-blog-pagination ul li.mkdf-pag-next a:hover',
                '.mkdf-blog-pagination ul li.mkdf-pag-prev a:hover',
                '.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-active a',
                '.mkdf-blog-holder.mkdf-blog-masonry .mkdf-post-content .mkdf-post-heading .mkdf-post-info-date a:hover',
                '.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-mark .mkdf-post-quote-image',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-name a:hover',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-social-icons a:hover',
                '.mkdf-blog-single-navigation .mkdf-blog-single-next:hover',
                '.mkdf-blog-single-navigation .mkdf-blog-single-prev:hover',
                '.mkdf-blog-list-holder .mkdf-bli-image-holder .mkdf-post-info-date a:hover',
                '.mkdf-page-footer .mkdf-footer-top-holder a:hover',
                '.mkdf-page-footer .mkdf-footer-bottom-holder .mkdf-footer-bottom-inner .mkdf-icon-widget-holder:hover',
                '.mkdf-top-bar .widget a:hover',
                '.mkdf-mobile-header .mkdf-mobile-menu-opener.mkdf-mobile-menu-opened a',
                '.mkdf-mobile-header .mkdf-mobile-side-area .mkdf-close-mobile-side-area-holder i',
                '.mkdf-search-page-holder article.sticky .mkdf-post-title a',
                '.mkdf-side-menu-button-opener.opened',
                '.mkdf-side-menu-button-opener:hover',
                '.widget.mkdf-author-info-widget .mkdf-aiw-text',
                '.mkdf-portfolio-single-holder .mkdf-ps-info-holder a.mkdf-ps-info-content:hover',
                '.mkdf-pl-filter-holder ul li.mkdf-pl-current span',
                '.mkdf-pl-filter-holder ul li:hover span',
                '.mkdf-pl-standard-pagination ul li.mkdf-pl-pag-active a',
                '.mkdf-portfolio-list-holder.mkdf-pl-gallery-overlay-zoom article .mkdf-pli-text .mkdf-pli-category-holder a:hover',
                '.mkdf-portfolio-list-holder.mkdf-pl-gallery-overlay article .mkdf-pli-text .mkdf-pli-category-holder a:hover',
                '.mkdf-testimonials-holder .mkdf-testimonial-quote-image',
                '.mkdf-accordion-holder.mkdf-ac-simple .mkdf-accordion-title.ui-state-active span',
                '.mkdf-accordion-holder.mkdf-ac-simple .mkdf-accordion-title:hover',
                '.mkdf-banner-holder .mkdf-banner-title .mkdf-banner-title-highlight',
                '.mkdf-banner-holder .mkdf-banner-link-text .mkdf-banner-link-hover span',
                '.mkdf-btn.mkdf-btn-outline',
                '.mkdf-counter-holder .mkdf-counter',
                '.mkdf-section-title-holder .mkdf-st-title .mkdf-st-title-highlight',
                '.mkdf-social-share-holder.mkdf-list li a:hover',
                '.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener:hover',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-hover a',
                '.mkdf-tabs.mkdf-tabs-simple .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-team-holder .mkdf-team-social-holder .mkdf-team-icon .mkdf-icon-element:hover',
                '.mkdf-video-button-holder .mkdf-video-button-play',
                '.mkdf-twitter-list-holder .mkdf-twitter-icon',
                '.mkdf-twitter-list-holder .mkdf-tweet-text a:hover',
                '.mkdf-twitter-list-holder .mkdf-twitter-profile a:hover',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget li .mkdf-twitter-icon',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget li .mkdf-tweet-text a:hover'
            );

            $woo_color_selector = array();
            if(fiorello_mikado_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.mkdf-woocommerce-page .woocommerce-error>a:hover',
                    '.mkdf-woocommerce-page .woocommerce-info>a:hover',
                    '.mkdf-woocommerce-page .woocommerce-message>a:hover',
                    '.woocommerce-pagination .page-numbers li a:hover',
                    '.woocommerce-pagination .page-numbers li span:hover',
                    '.mkdf-woo-view-all-pagination a:hover',
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    '.mkdf-woocommerce-page .mkdf-content table.group_table td.woocommerce-grouped-product-list-item__label a:hover',
                    '.mkdf-woocommerce-page .mkdf-content table.group_table a:hover',
                    '.mkdf-woo-pl-info-below-image ul.products>.product .added_to_cart:hover',
                    '.mkdf-woo-pl-info-below-image ul.products>.product .button:hover',
                    '.mkdf-woo-single-page .mkdf-single-product-summary .product_meta>span a:hover',
                    '.mkdf-woo-single-page .mkdf-single-product-summary .select2-container--default .select2-selection--single .select2-selection__arrow:hover',
                    '.mkdf-shopping-cart-dropdown .mkdf-item-info-holder .remove',
                    '.widget.woocommerce.widget_layered_nav ul li.chosen a',
                    '.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover',
                    '.widget.woocommerce.widget_products ul li .product-title:hover',
                    '.widget.woocommerce.widget_recently_viewed_products ul li .product-title:hover',
                    '.widget.woocommerce.widget_top_rated_products ul li .product-title:hover',
                    '.mkdf-plc-holder.mkdf-standard-layout .mkdf-plc-item .mkdf-plc-category a:hover',
                    '.mkdf-plc-holder.mkdf-standard-layout .mkdf-plc-item .mkdf-plc-price del',
                    '.mkdf-plc-holder.mkdf-simple-layout .mkdf-plc-text .mkdf-plc-add-to-cart a:hover',
                    '.mkdf-plc-holder.mkdf-simple-layout .mkdf-plc-text-inner .mkdf-plc-add-to-cart a:hover',
                    '.mkdf-plc-holder.mkdf-simple-layout .mkdf-plc-text-outer .mkdf-plc-add-to-cart a:hover',
                    '.mkdf-pl-holder .mkdf-pli-text-wrapper .mkdf-pli-add-to-cart a:hover',
                    '.mkdf-pl-holder .mkdf-pl-categories ul li a.active',
                    '.mkdf-pl-holder .mkdf-pl-categories ul li a:hover'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
                '.mkdf-btn.mkdf-btn-simple:not(.mkdf-btn-custom-hover-color):not(.mkdf-btn-underline):hover'
	        );

            $background_color_selector = array(
            	'.mkdf-fiorello-loader .mkdf-fiorello-main-text:after',
                '.mkdf-st-loader .pulse',
                '.mkdf-st-loader .double_pulse .double-bounce1',
                '.mkdf-st-loader .double_pulse .double-bounce2',
                '.mkdf-st-loader .cube',
                '.mkdf-st-loader .rotating_cubes .cube1',
                '.mkdf-st-loader .rotating_cubes .cube2',
                '.mkdf-st-loader .stripes>div',
                '.mkdf-st-loader .wave>div',
                '.mkdf-st-loader .two_rotating_circles .dot1',
                '.mkdf-st-loader .two_rotating_circles .dot2',
                '.mkdf-st-loader .five_rotating_circles .container1>div',
                '.mkdf-st-loader .five_rotating_circles .container2>div',
                '.mkdf-st-loader .five_rotating_circles .container3>div',
                '.mkdf-st-loader .atom .ball-1:before',
                '.mkdf-st-loader .atom .ball-2:before',
                '.mkdf-st-loader .atom .ball-3:before',
                '.mkdf-st-loader .atom .ball-4:before',
                '.mkdf-st-loader .clock .ball:before',
                '.mkdf-st-loader .mitosis .ball',
                '.mkdf-st-loader .lines .line1',
                '.mkdf-st-loader .lines .line2',
                '.mkdf-st-loader .lines .line3',
                '.mkdf-st-loader .lines .line4',
                '.mkdf-st-loader .fussion .ball',
                '.mkdf-st-loader .fussion .ball-1',
                '.mkdf-st-loader .fussion .ball-2',
                '.mkdf-st-loader .fussion .ball-3',
                '.mkdf-st-loader .fussion .ball-4',
                '.mkdf-st-loader .wave_circles .ball',
                '.mkdf-st-loader .pulse_circles .ball',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '#mkdf-back-to-top>span',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.mkdf-top-bar',
                '.mkdf-search-cover',
                '.mkdf-search-fade .mkdf-fullscreen-with-sidebar-search-holder .mkdf-fullscreen-search-table',
                '.mkdf-search-slide-window-top',
                '.mkdf-social-icons-group-widget.mkdf-square-icons .mkdf-social-icon-widget-holder:hover',
                '.mkdf-social-icons-group-widget.mkdf-square-icons.mkdf-light-skin .mkdf-social-icon-widget-holder:hover',
                '.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-active',
                '.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-hover',
                '.mkdf-btn.mkdf-btn-solid',
                '.mkdf-icon-shortcode.mkdf-circle .mkdf-icon-bckg-holder',
                '.mkdf-icon-shortcode.mkdf-dropcaps.mkdf-circle .mkdf-icon-bckg-holder',
                '.mkdf-icon-shortcode.mkdf-square .mkdf-icon-bckg-holder',
                '.mkdf-price-table .mkdf-pt-inner ul li.mkdf-pt-title-holder',
                '.mkdf-process-holder .mkdf-process-circle',
                '.mkdf-process-holder .mkdf-process-line',
                '.mkdf-progress-bar .mkdf-pb-content-holder .mkdf-pb-content',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-hover a',
                '.mkdf-tabs.mkdf-tabs-vertical .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-vertical .mkdf-tabs-nav li.ui-state-hover a',
            );

            $woo_background_color_selector = array();
            if(fiorello_mikado_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce-page .mkdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    '.woocommerce-page .mkdf-content a.added_to_cart',
                    '.woocommerce-page .mkdf-content a.button',
                    '.woocommerce-page .mkdf-content button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    '.woocommerce-page .mkdf-content input[type=submit]',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    'div.woocommerce a.added_to_cart',
                    'div.woocommerce a.button',
                    'div.woocommerce button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    'div.woocommerce input[type=submit]',
                    '.woocommerce .mkdf-new-product',
                    '.woocommerce .mkdf-onsale',
                    '.woocommerce .mkdf-out-of-stock',
                    '.mkdf-woo-single-page .woocommerce-tabs ul.tabs>li.active',
                    '.mkdf-shopping-cart-holder .mkdf-header-cart .mkdf-cart-number',
                    '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-image-outer .mkdf-plc-image .mkdf-plc-new-product',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-image-outer .mkdf-plc-image .mkdf-plc-onsale',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-image-outer .mkdf-plc-image .mkdf-plc-out-of-stock',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-image-outer .mkdf-plc-image .mkdf-pli-new-product',
                    '.mkdf-plc-holder.mkdf-standard-layout .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .added_to_cart',
                    '.mkdf-plc-holder.mkdf-standard-layout .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .button',
                    '.mkdf-plc-holder.mkdf-standard-layout .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .added_to_cart:hover',
                    '.mkdf-plc-holder.mkdf-standard-layout .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .button:hover',
                    '.mkdf-plc-holder.mkdf-standard-layout .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
                    '.mkdf-plc-holder.mkdf-standard-layout .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .button:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-image .mkdf-pli-new-product',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-image .mkdf-pli-onsale',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-image .mkdf-pli-out-of-stock',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-default-skin .added_to_cart',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-default-skin .button',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .added_to_cart:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .button:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .button:hover'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $background_color_important_selector = array(
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):hover'
            );

            $border_color_selector = array(
                '.mkdf-st-loader .pulse_circles .ball',
                '.mkdf-owl-slider+.mkdf-slider-thumbnail>.mkdf-slider-thumbnail-item.active img',
                '#mkdf-back-to-top>span',
                '.widget.mkdf-author-info-widget',
                '.mkdf-btn.mkdf-btn-outline'
            );

            $woo_border_color_selector = array();
            if(fiorello_mikado_is_woocommerce_installed()) {
                $woo_border_color_selector = array(
                    '.woocommerce .mkdf-onsale',
                    '.woocommerce .mkdf-new-product:before',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-image-outer .mkdf-plc-image .mkdf-plc-onsale',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-image-outer .mkdf-plc-image .mkdf-plc-new-product:before',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-image .mkdf-pli-onsale',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-image .mkdf-pli-new-product:before'
                );
            }

            $border_color_selector = array_merge($border_color_selector, $woo_border_color_selector);

            $border_color_important_selector = array(
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):hover'
            );


            echo fiorello_mikado_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo fiorello_mikado_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo fiorello_mikado_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
            echo fiorello_mikado_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo fiorello_mikado_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
            echo fiorello_mikado_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
        }
	
	    $page_background_color = fiorello_mikado_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.mkdf-content'
		    );
		    echo fiorello_mikado_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = fiorello_mikado_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo fiorello_mikado_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo fiorello_mikado_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( fiorello_mikado_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . fiorello_mikado_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo fiorello_mikado_dynamic_css( '.mkdf-preload-background', $preload_background_styles );
    }

    add_action('fiorello_mikado_action_style_dynamic', 'fiorello_mikado_design_styles');
}

if ( ! function_exists( 'fiorello_mikado_content_styles' ) ) {
	function fiorello_mikado_content_styles() {
		$content_style = array();

		$padding = fiorello_mikado_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		echo fiorello_mikado_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();

		$padding_in_grid = fiorello_mikado_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
		);
		
		echo fiorello_mikado_dynamic_css( $content_selector_in_grid, $content_style_in_grid );

		$background_style = array();
		$background_image = fiorello_mikado_options()->getOptionValue('content_background_image');
		if ($background_image !== ''){
			$background_style['background-image'] = 'url('.esc_url($background_image).')';
		}

		echo fiorello_mikado_dynamic_css( '.mkdf-content', $background_style );
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_content_styles' );
}

if ( ! function_exists( 'fiorello_mikado_h1_styles' ) ) {
	function fiorello_mikado_h1_styles() {
		$margin_top    = fiorello_mikado_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = fiorello_mikado_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = fiorello_mikado_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = fiorello_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = fiorello_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo fiorello_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_h1_styles' );
}

if ( ! function_exists( 'fiorello_mikado_h2_styles' ) ) {
	function fiorello_mikado_h2_styles() {
		$margin_top    = fiorello_mikado_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = fiorello_mikado_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = fiorello_mikado_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = fiorello_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = fiorello_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo fiorello_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_h2_styles' );
}

if ( ! function_exists( 'fiorello_mikado_h3_styles' ) ) {
	function fiorello_mikado_h3_styles() {
		$margin_top    = fiorello_mikado_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = fiorello_mikado_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = fiorello_mikado_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = fiorello_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = fiorello_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo fiorello_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_h3_styles' );
}

if ( ! function_exists( 'fiorello_mikado_h4_styles' ) ) {
	function fiorello_mikado_h4_styles() {
		$margin_top    = fiorello_mikado_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = fiorello_mikado_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = fiorello_mikado_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = fiorello_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = fiorello_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo fiorello_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_h4_styles' );
}

if ( ! function_exists( 'fiorello_mikado_h5_styles' ) ) {
	function fiorello_mikado_h5_styles() {
		$margin_top    = fiorello_mikado_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = fiorello_mikado_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = fiorello_mikado_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = fiorello_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = fiorello_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo fiorello_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_h5_styles' );
}

if ( ! function_exists( 'fiorello_mikado_h6_styles' ) ) {
	function fiorello_mikado_h6_styles() {
		$margin_top    = fiorello_mikado_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = fiorello_mikado_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = fiorello_mikado_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = fiorello_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = fiorello_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6',
			'.mkdf-woo-single-page .related.products>h2',
			'.mkdf-woo-single-page .upsells.products>h2',
            '.mkdf-pl-filter-holder ul li span',
            '.mkdf-testimonials-holder .mkdf-testimonials .mkdf-testimonial-author .mkdf-testimonials-author-name',
            '.mkdf-tabs .mkdf-tabs-nav li a',
            '.mkdf-blog-holder article.format-quote .mkdf-quote-author',
            '.mkdf-blog-single-navigation .mkdf-blog-single-prev',
            '.mkdf-blog-single-navigation .mkdf-blog-single-next',
            '.mkdf-page-header .widget.widget_search .input-holder input.search-field',
            '.mkdf-top-bar .widget.widget_search .input-holder input.search-field',
            '.mkdf-sticky-header .widget.widget_search .input-holder input.search-field',
            '.mkdf-mobile-header .widget.widget_search .input-holder input.search-field',
            '.mkdf-woo-single-page .woocommerce-tabs ul.tabs>li a'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo fiorello_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_h6_styles' );
}

if ( ! function_exists( 'fiorello_mikado_text_styles' ) ) {
	function fiorello_mikado_text_styles() {
		$item_styles = fiorello_mikado_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo fiorello_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_text_styles' );
}

if ( ! function_exists( 'fiorello_mikado_link_styles' ) ) {
	function fiorello_mikado_link_styles() {
		$link_styles      = array();
		$link_color       = fiorello_mikado_options()->getOptionValue( 'link_color' );
		$link_font_style  = fiorello_mikado_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = fiorello_mikado_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = fiorello_mikado_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo fiorello_mikado_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_link_styles' );
}

if ( ! function_exists( 'fiorello_mikado_link_hover_styles' ) ) {
	function fiorello_mikado_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = fiorello_mikado_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = fiorello_mikado_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo fiorello_mikado_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo fiorello_mikado_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_link_hover_styles' );
}

if ( ! function_exists( 'fiorello_mikado_smooth_page_transition_styles' ) ) {
	function fiorello_mikado_smooth_page_transition_styles( $style ) {
		$id            = fiorello_mikado_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = fiorello_mikado_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.mkdf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= fiorello_mikado_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = fiorello_mikado_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.mkdf-fiorello-loader .mkdf-fiorello-main-text:after',
			'.mkdf-st-loader .mkdf-rotate-circles > div',
			'.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes > div',
			'.mkdf-st-loader .wave > div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1 > div',
			'.mkdf-st-loader .five_rotating_circles .container2 > div',
			'.mkdf-st-loader .five_rotating_circles .container3 > div',
			'.mkdf-st-loader .atom .ball-1:before',
			'.mkdf-st-loader .atom .ball-2:before',
			'.mkdf-st-loader .atom .ball-3:before',
			'.mkdf-st-loader .atom .ball-4:before',
			'.mkdf-st-loader .clock .ball:before',
			'.mkdf-st-loader .mitosis .ball',
			'.mkdf-st-loader .lines .line1',
			'.mkdf-st-loader .lines .line2',
			'.mkdf-st-loader .lines .line3',
			'.mkdf-st-loader .lines .line4',
			'.mkdf-st-loader .fussion .ball',
			'.mkdf-st-loader .fussion .ball-1',
			'.mkdf-st-loader .fussion .ball-2',
			'.mkdf-st-loader .fussion .ball-3',
			'.mkdf-st-loader .fussion .ball-4',
			'.mkdf-st-loader .wave_circles .ball',
			'.mkdf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= fiorello_mikado_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'fiorello_mikado_filter_add_page_custom_style', 'fiorello_mikado_smooth_page_transition_styles' );
}