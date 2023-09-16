<div class="mkdf-testimonial-content" id="mkdf-testimonials-<?php echo esc_attr( $current_id ) ?>" <?php fiorello_mikado_inline_style( $box_styles ); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="mkdf-testimonial-image">
            <?php echo get_the_post_thumbnail(get_the_ID(), array(150, 150)); ?>
        </div>
    <?php } ?>
    <div class="mkdf-testimonial-text-holder">
        <?php if ( ! empty( $text ) ) { ?>
            <p class="mkdf-testimonial-text"><?php echo esc_html( $text ); ?></p>
        <?php } ?>
        <?php if ( has_post_thumbnail() || ! empty( $author ) ) { ?>
            <div class="mkdf-testimonials-author-holder clearfix">
                <?php if ( ! empty( $author ) ) { ?>
                    <span class="mkdf-testimonial-author">
						<span class="mkdf-testimonials-author-name"><?php echo esc_html( $author ); ?></span>
                        <?php if ( ! empty( $position ) ) { ?>
                            <span class="mkdf-testimonials-author-job"><?php echo esc_html( $position ); ?></span>
                        <?php } ?>
					</span>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>