<?php
$image_proportion       = fiorello_mikado_get_meta_field_intersect( 'blog_list_featured_image_proportion', fiorello_mikado_get_page_id() );
$image_proportion_value = get_post_meta( get_the_ID(), 'mkdf_blog_masonry_gallery_' . $image_proportion . '_dimensions_meta', true );

if ( isset( $image_proportion_value ) && $image_proportion_value !== '' ) {
	$size           = $image_proportion_value !== '' ? $image_proportion_value : 'default';
	$post_classes[] = 'mkdf-masonry-size-' . $size;
} else {
	$size           = 'default';
	$post_classes[] = 'mkdf-masonry-size-small';
}
if ( $image_proportion == 'original' ) {
	$part_params['image_size'] = 'full';
} else {
	switch ( $size ):
		case 'default':
			$part_params['image_size'] = 'fiorello_mikado_square';
			break;
		case 'large-width':
			$part_params['image_size'] = 'fiorello_mikado_landscape';
			break;
		case 'large-height':
			$part_params['image_size'] = 'fiorello_mikado_portrait';
			break;
		case 'large-width-height':
			$part_params['image_size'] = 'fiorello_mikado_huge';
			break;
		default:
			$part_params['image_size'] = 'fiorello_mikado_square';
			break;
	endswitch;
}

$post_classes[] = 'mkdf-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
	<div class="mkdf-post-content">
		<?php fiorello_mikado_get_module_template_part( 'templates/parts/media', 'blog', '', $part_params ); ?>
		
		<div class="mkdf-post-text">
			<div class="mkdf-post-text-inner">
				<div class="mkdf-post-info">
					<?php fiorello_mikado_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $part_params ); ?>
					<?php fiorello_mikado_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $part_params ); ?>
				</div>
				<?php fiorello_mikado_get_module_template_part( 'templates/parts/title', 'blog', '', $part_params ); ?>
				<div class="mkdf-post-info">
					<?php fiorello_mikado_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $part_params ); ?>
				</div>
			</div>
		</div>
		<a itemprop="url" class="mkdf-blog-masonry-gallery-link" href="<?php the_permalink(); ?>"></a>
	</div>
</article>