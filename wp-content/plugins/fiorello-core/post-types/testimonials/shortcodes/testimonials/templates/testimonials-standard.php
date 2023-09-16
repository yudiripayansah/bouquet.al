<div class="mkdf-testimonial-content" id="mkdf-testimonials-<?php echo esc_attr( $current_id ) ?>">
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="mkdf-testimonial-image">
			<?php echo get_the_post_thumbnail( get_the_ID(), array( 87, 87 ) ); ?>
		</div>
	<?php } ?>
	<div class="mkdf-testimonial-text-holder">
		<?php if ( ! empty( $title ) ) { ?>
			<h4 itemprop="name" class="mkdf-testimonial-title entry-title"><?php echo esc_html( $title ); ?></h4>
		<?php } ?>
		<?php if ( ! empty( $text ) ) { ?>
			<p class="mkdf-testimonial-text"><?php echo esc_html( $text ); ?></p>
		<?php } ?>
		<?php if ( ! empty( $author ) ) { ?>
			<span class="mkdf-testimonial-author">
				<span class="mkdf-testimonials-author-name"><?php echo esc_html( $author ); ?></span>
				<?php if ( ! empty( $position ) ) { ?>
					<span class="mkdf-testimonials-author-job"><?php echo esc_html( $position ); ?></span>
				<?php } ?>
			</span>
		<?php } ?>
	</div>
	
</div>