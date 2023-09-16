<?php

if ( class_exists( 'FiorelloMikadoWidget' ) ) {
	class FiorelloMikadoWooCommerceDropdownCart extends FiorelloMikadoWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_woocommerce_dropdown_cart',
				esc_html__( 'Mikado WooCommerce Dropdown Cart', 'fiorello-core' ),
				array( 'description' => esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'fiorello-core' ), )
			);

			$this->setParams();
		}

		protected function setParams() {

			$this->params = array(
				array(
					'type'        => 'textfield',
					'name'        => 'woocommerce_dropdown_cart_margin',
					'title'       => esc_html__( 'Icon Margin', 'fiorello-core' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'fiorello-core' )
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'woocommerce_enable_cart_info',
					'title'       => esc_html__( 'Enable Cart Info', 'fiorello-core' ),
					'options'     => fiorello_mikado_get_yes_no_select_array( false ),
					'description' => esc_html__( 'Enabling this option will show cart info (products number and price) at the right side of dropdown cart icon', 'fiorello-core' )
				),
			);
		}

		/**
		 * Generate widget form based on $params attribute
		 *
		 * @param array $instance
		 *
		 * @return null
		 */
		public function form( $instance ) {
			if ( is_array( $this->params ) && count( $this->params ) ) {
				foreach ( $this->params as $param_array ) {
					$param_name    = $param_array['name'];
					${$param_name} = isset( $instance[ $param_name ] ) ? esc_attr( $instance[ $param_name ] ) : '';
				}

				foreach ( $this->params as $param ) {
					switch ( $param['type'] ) {
						case 'textfield':
							?>
                            <p>
                                <label for="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>"><?php echo
									esc_html( $param['title'] ); ?>:</label>
                                <input class="widefat"
                                       id="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>"
                                       name="<?php echo esc_attr( $this->get_field_name( $param['name'] ) ); ?>"
                                       type="text" value="<?php echo esc_attr( ${$param['name']} ); ?>"/>
								<?php if ( ! empty( $param['description'] ) ) : ?>
                                    <span class="mkdf-field-description"><?php echo esc_html( $param['description'] ); ?></span>
								<?php endif; ?>
                            </p>
							<?php
							break;
						case 'dropdown':
							?>
                            <p>
                                <label for="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>"><?php echo
									esc_html( $param['title'] ); ?>:</label>
								<?php if ( isset( $param['options'] ) && is_array( $param['options'] ) && count( $param['options'] ) ) { ?>
                                    <select class="widefat"
                                            name="<?php echo esc_attr( $this->get_field_name( $param['name'] ) ); ?>"
                                            id="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>">
										<?php foreach ( $param['options'] as $param_option_key => $param_option_val ) {
											$option_selected = '';
											if ( ${$param['name']} == $param_option_key ) {
												$option_selected = 'selected';
											}
											?>
                                            <option <?php echo esc_attr( $option_selected ); ?>
                                                    value="<?php echo esc_attr( $param_option_key ); ?>"><?php echo esc_attr( $param_option_val ); ?></option>
										<?php } ?>
                                    </select>
								<?php } ?>
								<?php if ( ! empty( $param['description'] ) ) : ?>
                                    <span class="mkdf-field-description"><?php echo esc_html( $param['description'] ); ?></span>
								<?php endif; ?>
                            </p>

							<?php
							break;
					}
				}
			} else { ?>
                <p><?php esc_html_e( 'There are no options for this widget.', 'fiorello-core' ); ?></p>
			<?php }
		}

		/**
		 * @param array $new_instance
		 * @param array $old_instance
		 *
		 * @return array
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			foreach ( $this->params as $param ) {
				$param_name = $param['name'];

				$instance[ $param_name ] = sanitize_text_field( $new_instance[ $param_name ] );
			}

			return $instance;
		}

		public function widget( $args, $instance ) {
			extract( $args );

			global $woocommerce;

			$icon_styles = array();

			if ( $instance['woocommerce_dropdown_cart_margin'] !== '' ) {
				$icon_styles[] = 'padding: ' . $instance['woocommerce_dropdown_cart_margin'];
			}

			$icon_class = 'mkdf-cart-info-is-disabled';

			if ( ! empty( $instance['woocommerce_enable_cart_info'] ) && $instance['woocommerce_enable_cart_info'] === 'yes' ) {
				$icon_class = 'mkdf-cart-info-is-active';
			}

			$cart_description = fiorello_mikado_options()->getOptionValue( 'mkdf_woo_dropdown_cart_description' );
			?>
            <div class="mkdf-shopping-cart-holder <?php echo esc_attr( $icon_class ); ?>" <?php fiorello_mikado_inline_style( $icon_styles ) ?>>
                <div class="mkdf-shopping-cart-inner">
					<?php $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
                    <a itemprop="url" class="mkdf-header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                    <span class="mkdf-cart-icon-number-holder">
                        <span class="mkdf-cart-icon"><?php echo fiorello_mikado_get_icon_sources_html( 'dropdown_cart', false, array( 'dropdown_cart' => 'yes' ) ); ?></span>
                        <span class="mkdf-cart-number"><?php echo sprintf( _n( '%d', '%d', WC()->cart->cart_contents_count, 'fiorello-core' ), WC()->cart->cart_contents_count ); ?></span>
                    </span>
                        <span class="mkdf-cart-icon-text"><?php esc_html_e( 'CART', 'fiorello-core' ); ?></span>
                        <span class="mkdf-cart-info">
                        <span class="mkdf-cart-info-total"><?php echo '(' . wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
			                        'span' => array(
				                        'class' => true,
				                        'id'    => true
			                        )
		                        ) ) . ')'; ?></span>
                    </span>
                    </a>
					<?php if ( ! $cart_is_empty ) : ?>
                        <div class="mkdf-shopping-cart-dropdown">
                            <ul>
								<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
									$_product = $cart_item['data'];
									// Only display if allowed
									if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
										continue;
									}
									// Get price
									$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
									?>
                                    <li>
                                        <div class="mkdf-item-image-holder">
                                            <a itemprop="url"
                                               href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
												<?php echo wp_kses( $_product->get_image(), array(
													'img' => array(
														'src'    => true,
														'width'  => true,
														'height' => true,
														'class'  => true,
														'alt'    => true,
														'title'  => true,
														'id'     => true
													)
												) ); ?>
                                            </a>
                                        </div>
                                        <div class="mkdf-item-info-holder">
                                            <h6 itemprop="name" class="mkdf-product-title"><a itemprop="url"
                                                                                              href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>"><?php echo apply_filters( 'fiorello_mikado_woo_widget_cart_product_title', $_product->get_title(), $_product ); ?></a>
                                            </h6>
                                            <span class="mkdf-quantity"><?php echo esc_html( $cart_item['quantity'] ); ?></span>
											<?php echo apply_filters( 'fiorello_mikado_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
											<?php echo apply_filters( 'fiorello_mikado_woo_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'fiorello-core' ) ), $cart_item_key ); ?>
                                        </div>
                                    </li>
								<?php endforeach; ?>
                                <div class="mkdf-cart-bottom">
                                    <div class="mkdf-subtotal-holder clearfix">
                                        <span class="mkdf-total"><?php esc_html_e( 'TOTAL:', 'fiorello-core' ); ?></span>
                                        <span class="mkdf-total-amount">
                                        <?php echo wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
	                                        'span' => array(
		                                        'class' => true,
		                                        'id'    => true
	                                        )
                                        ) ); ?>
                                    </span>
                                    </div>
									<?php if ( ! empty( $cart_description ) ) { ?>
                                        <div class="mkdf-cart-description">
                                            <div class="mkdf-cart-description-inner">
                                                <span><?php echo esc_html( $cart_description ); ?></span>
                                            </div>
                                        </div>
									<?php } ?>
                                    <div class="mkdf-btn-holder clearfix">
                                        <a itemprop="url" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
                                           class="mkdf-view-cart"
                                           data-title="<?php esc_attr_e( 'VIEW CART', 'fiorello-core' ); ?>"><span><?php esc_html_e( 'VIEW CART', 'fiorello-core' ); ?></span></a>
                                    </div>
                                    <div class="mkdf-btn-holder clearfix">
                                        <a itemprop="url" href="<?php echo esc_url( wc_get_checkout_url() ); ?>"
                                           class="mkdf-view-cart"
                                           data-title="<?php esc_attr_e( 'CHECKOUT', 'fiorello-core' ); ?>"><span><?php esc_html_e( 'CHECKOUT', 'fiorello-core' ); ?></span></a>
                                    </div>
                                </div>
                            </ul>
                        </div>
					<?php else : ?>
                        <div class="mkdf-shopping-cart-dropdown">
                            <ul>
                                <li class="mkdf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'fiorello-core' ); ?></li>
                            </ul>
                        </div>
					<?php endif; ?>
                </div>
            </div>
			<?php
		}
	}


	if ( version_compare( WOOCOMMERCE_VERSION, '3.0' ) >= 0 ) {
		add_filter( 'woocommerce_add_to_cart_fragments', 'fiorello_mikado_woocommerce_header_add_to_cart_fragment' );
	} else {
		add_filter( 'add_to_cart_fragments', 'fiorello_mikado_woocommerce_header_add_to_cart_fragment' );
	}

	function fiorello_mikado_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;

		$cart_description = fiorello_mikado_options()->getOptionValue( 'mkdf_woo_dropdown_cart_description' );

		ob_start();

		?>

        <div class="mkdf-shopping-cart-inner">
			<?php $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
            <a itemprop="url" class="mkdf-header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
            <span class="mkdf-cart-icon-number-holder">
                <span class="mkdf-cart-icon"><?php echo fiorello_mikado_get_icon_sources_html( 'dropdown_cart', false, array( 'dropdown_cart' => 'yes' ) ); ?></span>
                <span class="mkdf-cart-number"><?php echo sprintf( _n( '%d', '%d', WC()->cart->cart_contents_count, 'fiorello-core' ), WC()->cart->cart_contents_count ); ?></span>
            </span>
                <span class="mkdf-cart-icon-text"><?php esc_html_e( 'CART', 'fiorello-core' ); ?></span>
                <span class="mkdf-cart-info">
                <span class="mkdf-cart-info-total"><?php echo '(' . wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
			                'span' => array(
				                'class' => true,
				                'id'    => true
			                )
		                ) ) . ')'; ?></span>
            </span>
            </a>
			<?php if ( ! $cart_is_empty ) : ?>
                <div class="mkdf-shopping-cart-dropdown">
                    <ul>
						<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
							$_product = $cart_item['data'];
							// Only display if allowed
							if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
								continue;
							}
							// Get price
							$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
							?>
                            <li>
                                <div class="mkdf-item-image-holder">
                                    <a itemprop="url"
                                       href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
										<?php echo wp_kses( $_product->get_image(), array(
											'img' => array(
												'src'    => true,
												'width'  => true,
												'height' => true,
												'class'  => true,
												'alt'    => true,
												'title'  => true,
												'id'     => true
											)
										) ); ?>
                                    </a>
                                </div>
                                <div class="mkdf-item-info-holder">
                                    <h6 itemprop="name" class="mkdf-product-title"><a itemprop="url"
                                                                                      href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>"><?php echo apply_filters( 'fiorello_mikado_woo_widget_cart_product_title', $_product->get_title(), $_product ); ?></a>
                                    </h6>
                                    <span class="mkdf-quantity"><?php echo esc_html( $cart_item['quantity'] ); ?></span>
									<?php echo apply_filters( 'fiorello_mikado_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
									<?php echo apply_filters( 'fiorello_mikado_woo_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'fiorello-core' ) ), $cart_item_key ); ?>
                                </div>
                            </li>
						<?php endforeach; ?>
                        <div class="mkdf-cart-bottom">
                            <div class="mkdf-subtotal-holder clearfix">
                                <span class="mkdf-total"><?php esc_html_e( 'TOTAL:', 'fiorello-core' ); ?></span>
                                <span class="mkdf-total-amount">
                                <?php echo wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
	                                'span' => array(
		                                'class' => true,
		                                'id'    => true
	                                )
                                ) ); ?>
                            </span>
                            </div>
							<?php if ( ! empty( $cart_description ) ) { ?>
                                <div class="mkdf-cart-description">
                                    <div class="mkdf-cart-description-inner">
                                        <span><?php echo esc_html( $cart_description ); ?></span>
                                    </div>
                                </div>
							<?php } ?>
                            <div class="mkdf-btn-holder clearfix">
                                <a itemprop="url" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
                                   class="mkdf-view-cart"
                                   data-title="<?php esc_attr_e( 'VIEW CART', 'fiorello-core' ); ?>"><span><?php esc_html_e( 'VIEW CART', 'fiorello-core' ); ?></span></a>
                            </div>
                            <div class="mkdf-btn-holder clearfix">
                                <a itemprop="url" href="<?php echo esc_url( wc_get_checkout_url() ); ?>"
                                   class="mkdf-view-cart"
                                   data-title="<?php esc_attr_e( 'CHECKOUT', 'fiorello-core' ); ?>"><span><?php esc_html_e( 'CHECKOUT', 'fiorello-core' ); ?></span></a>
                            </div>
                        </div>
                    </ul>
                </div>
			<?php else : ?>
                <div class="mkdf-shopping-cart-dropdown">
                    <ul>
                        <li class="mkdf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'fiorello-core' ); ?></li>
                    </ul>
                </div>
			<?php endif; ?>
        </div>

		<?php
		$fragments['div.mkdf-shopping-cart-inner'] = ob_get_clean();

		return $fragments;
	}
}
?>