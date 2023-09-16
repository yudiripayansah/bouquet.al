(function($) {
	'use strict';
	
	$(document).ready(function(){
		mkdfInitProductCategoriesPosition();
		mkdfParallaxPtfText();
	});


	function mkdfInitProductCategoriesPosition(){
	    var lists = $('.mkdf-prod-cats-holder');
	    if (lists.length) {
	    	lists.each(function(){
	    		var list = $(this),
	    			items = list.find('.mkdf-prod-cat.mkdf-cat-with-image');

	    		list.waitForImages(function(){

		    		items.each(function(i){
		    			var thisItem = $(this),
		    				siblingItem,
		    				itemHeight,
		    				siblingHeight,
		    				margins;

		    			if (list.hasClass('mkdf-two-columns')){
							if ((i+1)%4 === 1) {
								siblingItem = thisItem.next();
							} else if ((i+1)%4 === 0) {
								siblingItem = thisItem.prev();
							}
						} else {
							if ((i+1)%6 === 1) {
								siblingItem = thisItem.next();
							} else if ((i+1)%2 === 1) {
								siblingItem = thisItem.prev();
							}						
						}

		    			
		    		});
		    	});

	    	});
	    }

	}
	
	/**
	 * Parallax Pft text
	 * @type {Function}
	 */

	function mkdfParallaxPtfText() {
	    var parallaxLists = $('.mkdf-prod-cats-holder.mkdf-parallax-items');

	    if (parallaxLists.length && !mkdf.htmlEl.hasClass('touch')) {
	        parallaxLists.each(function(){
	            var parallaxList = $(this),
	                categories = parallaxList.find('.mkdf-prod-cat'),
	                yOffset = parallaxList.attr('data-y-axis-translation');

	            categories.each(function(){
	                var category = $(this),
	                    categoryHeight = category.outerHeight(),
	                    categoryInner = category.find('.mkdf-prod-cat-inner'),
	                    categoryInnerHeight = categoryInner.height(),
	                    delta = Math.floor(Math.random()*(yOffset-yOffset/2+1)+yOffset/2);

	                var dataParallax = '{"y":'+delta+', "smoothness":20}';
	                categoryInner.attr('data-parallax', dataParallax);
	            });
	        });

	        setTimeout(function(){
	            ParallaxScroll.init(); //initialzation removed from plugin js file to have it run only on non-touch devices
	        }, 100); //wait for calcs
	    }
	}
	
})(jQuery);