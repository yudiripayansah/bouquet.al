(function($) {
	"use strict";

	var blogMasonryGallery = {};
	mkdf.modules.blogMasonryGallery = blogMasonryGallery;

	blogMasonryGallery.mkdfOnDocumentReady = mkdfOnDocumentReady;
	blogMasonryGallery.mkdfOnWindowLoad = mkdfOnWindowLoad;

	$(document).ready(mkdfOnDocumentReady);
	$(window).on('load', mkdfOnWindowLoad);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function mkdfOnDocumentReady() {
		mkdfInitBlogMasonryGalleryAppearLoadMore();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function mkdfOnWindowLoad() {
		mkdfInitBlogMasonryGalleryAppear();
	}

	/**
	 *  Animate blog masonry gallery type
	 */
	function mkdfInitBlogMasonryGalleryAppear() {
		var blogList = $('.mkdf-blog-holder.mkdf-blog-masonry-gallery');

		if(blogList.length){
			blogList.each(function(){
				var thisBlogList = $(this),
					article = thisBlogList.find('article'),
					pagination = thisBlogList.find('.mkdf-blog-pagination-holder'),
					animateCycle = 7, // rewind delay
					animateCycleCounter = 0;

				article.each(function(){
					var thisArticle = $(this);

					setTimeout(function(){
						thisArticle.appear(function(){
							animateCycleCounter ++;

							if(animateCycleCounter === animateCycle) {
								animateCycleCounter = 0;
							}

							setTimeout(function(){
								thisArticle.addClass('mkdf-appeared');
							},animateCycleCounter * 200);
						},{accX: 0, accY: 0});
					},150);
				});

				pagination.appear(function(){
					pagination.addClass('mkdf-appeared');
				},{accX: 0, accY: mkdfGlobalVars.vars.mkdfElementAppearAmount});
			});
		}
	}

	function mkdfInitBlogMasonryGalleryAppearLoadMore() {
		$( document.body ).on( 'blog_list_load_more_trigger', function() {
			mkdfInitBlogMasonryGalleryAppear();
		});
	}

})(jQuery);