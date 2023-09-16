<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if( fiorello_mikado_core_plugin_installed() &&  fiorello_mikado_options()->getOptionValue('enable_social_share') === 'yes' && fiorello_mikado_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="mkdf-blog-share">
        <div class="mkdf-share-shifter">
            <i class="mkdf-toggle-share social_share"></i>
            <?php echo fiorello_mikado_get_social_share_html(array('type' => $share_type)); ?>
        </div>
    </div>
<?php } ?>