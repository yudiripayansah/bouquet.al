<?php if(fiorello_mikado_core_plugin_installed()) { ?>
    <div class="mkdf-blog-like">
        <?php if( function_exists('fiorello_mikado_get_like') ) fiorello_mikado_get_like(); ?>
    </div>
<?php } ?>