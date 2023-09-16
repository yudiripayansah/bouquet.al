<?php
$tags = get_the_tags();
?>
<?php if($tags) { ?>
<div class="mkdf-tags-holder">
    <div class="mkdf-tags">
		<i class="icon dripicons-tags"></i> 
        <?php the_tags('', ', ', ''); ?>
    </div>
</div>
<?php } ?>