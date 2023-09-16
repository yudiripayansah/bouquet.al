<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-heading">
            <?php fiorello_mikado_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                
                <?php fiorello_mikado_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                
                <div class="mkdf-post-text-main">
                    <?php fiorello_mikado_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('fiorello_mikado_action_single_link_pages'); ?>
                </div>                
                
                <div class="mkdf-post-info-bottom">                    
                    <?php fiorello_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php fiorello_mikado_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php fiorello_mikado_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    <?php fiorello_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
                
            </div>
        </div>
    </div>
</article>