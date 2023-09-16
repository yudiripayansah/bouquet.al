<?php if(comments_open()) { ?>
	<div class="mkdf-post-info-comments-holder">
		<a itemprop="url" class="mkdf-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<i class="icon_comment_alt"></i> 
			<?php comments_number('0 ', '1 ', '% ' ); ?>
		</a>
	</div>
<?php } ?>