<div class="mkdf-pl-holder <?php echo esc_attr( $holder_classes ) ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
    <?php if ( $query_result->have_posts() ) {
		if($show_category_filter == 'yes' || $show_ordering_filter == 'yes') { ?>
            <div class="mkdf-pl-cat-order-holder clearfix">
                <?php echo fiorello_mikado_get_woo_shortcode_module_template_part('templates/parts/categories-filter', 'product-list', '', $params); ?>
                <?php echo fiorello_mikado_get_woo_shortcode_module_template_part('templates/parts/ordering-filter', 'product-list', '', $params); ?>
            </div>
        <?php } ?>
        <div class="mkdf-prl-loading">
            <span class="mkdf-prl-loading-msg"><?php esc_html_e('Loading...', 'fiorello') ?></span>
        </div>
        <div class="mkdf-pl-outer mkdf-outer-space">
            <?php if ( $query_result->have_posts() ): while ( $query_result->have_posts() ) : $query_result->the_post();
                echo fiorello_mikado_get_woo_shortcode_module_template_part( 'templates/parts/' . $info_position, 'product-list', '', $params );
            endwhile;
            else:
                fiorello_mikado_get_module_template_part( 'templates/parts/no-posts', 'woocommerce', '', $params );
            endif;
            wp_reset_postdata();
            ?>
        </div>
    <?php } ?>
</div>