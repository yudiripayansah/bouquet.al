<div class="mkdf-prod-cat <?php echo esc_attr($item_classes)?>">

    <div class="mkdf-prod-cat-inner">

        <?php
            if(isset($img_url) && $img_url!== ''){ ?>

                <div class="mkdf-prod-cat-img-wrapper">
                    <div class="mkdf-pcw-inner">
                        <a href="<?php echo esc_url($link);?>">
                            <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr($term->name);?>">
                        </a>
                    </div>
                </div>

            <?php }
        ?>

        <div class="mkdf-prod-cat-content <?php echo esc_attr($content_position);?>">

            <h6 class="mkdf-category-title">
                <a href="<?php echo esc_url($link);?>">
                    <?php
                    echo esc_attr($term->name);
                    ?>
                </a>
            </h6>
            <?php
            if($min_price && $min_price !== 0){ ?>
                <span class="mkdf-prod-cat-price-holder">
                    <?php esc_html_e('From $', 'fiorello');
                        echo esc_attr($min_price);
                    ?>
            </span>
            <?php } ?>

	        <?php if($enable_button === 'yes'){ ?>
                <div class="mkdf-prod-cat-button-holder">
			        <?php echo fiorello_mikado_get_button_html($button_params);?>
                </div>
	        <?php }?>

        </div>

    </div>

</div>