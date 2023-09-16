<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes);?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text" >
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <?php fiorello_mikado_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
        <div class="mkdf-quote-icon">
            <i class="icon_quotations"></i>
        </div>
    </div>
</article>