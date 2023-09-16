(function ($) {
    'use strict';

    $(window).on('load', mkdfOnWindowLoad);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
    function mkdfOnWindowLoad() {
        mkdfChangeOwlWidth();
    }

    function mkdfChangeOwlWidth() {
        var instagramCarousel = $('.mkdf-instagram-carousel');

        if (instagramCarousel.length) {
            instagramCarousel.each(function(){
                var thisCarousel = $(this),
                    carouselStage = thisCarousel.find('.owl-stage'),
                    newCarouselWidth = carouselStage.outerWidth() + 1;

                carouselStage.css('width',newCarouselWidth);
            });
        }
    }
})(jQuery);