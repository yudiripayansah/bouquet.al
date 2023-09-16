<li class="mkdf-bl-item mkdf-item-space clearfix">
	<div class="mkdf-bli-inner">
        <div class="mkdf-bli-image-holder">
            <?php if ( $post_info_image == 'yes' ) {
                fiorello_mikado_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
            } ?>
			<?php if ( $post_info_date_position == 'on-image' && $post_info_date == 'yes' && has_post_thumbnail() ) {
				fiorello_mikado_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
			} ?>
        </div>
        <div class="mkdf-bli-content">          
            
	
	        <?php fiorello_mikado_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
            
            <?php if ($post_info_section == 'yes') { ?>
                <div class="mkdf-bli-info">
	                <?php
		                if ( $post_info_date == 'yes' && ($post_info_date_position !== 'on-image' || !has_post_thumbnail() )) {
			                fiorello_mikado_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
		                }
		                if ( $post_info_author == 'yes' ) {
			                fiorello_mikado_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
		                }
		                if ( $post_info_category == 'yes' ) {
			                fiorello_mikado_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
		                }
		                if ( $post_info_comments == 'yes' ) {
			                fiorello_mikado_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		                }
		                if ( $post_info_like == 'yes' ) {
			                fiorello_mikado_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
		                }
	                ?>
                </div>
            <?php } ?>
	
	        <div class="mkdf-bli-excerpt">
		        <?php fiorello_mikado_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
                <?php if ( $post_info_share == 'yes' ) {
                    fiorello_mikado_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
                }
                ?>
	        </div>
        </div>
	</div>
</li>