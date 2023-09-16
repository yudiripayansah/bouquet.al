(function($) {
    'use strict';

    var portfolioSlider = {};
    mkdf.modules.portfolioSlider = portfolioSlider;

    portfolioSlider.mkdfOnDocumentReady = mkdfOnDocumentReady;
    portfolioSlider.mkdfOnWindowLoad = mkdfOnWindowLoad;
    portfolioSlider.mkdfOnWindowResize = mkdfOnWindowResize;
    portfolioSlider.mkdfOnWindowScroll = mkdfOnWindowScroll;

    $(document).ready(mkdfOnDocumentReady);
    $(window).on('load', mkdfOnWindowLoad);
    $(window).resize(mkdfOnWindowResize);
    $(window).scroll(mkdfOnWindowScroll);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
        mkdfScrollSlider();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function mkdfOnWindowLoad() {
        mkdfInitPortfolioSliderHeight();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function mkdfOnWindowResize() {
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function mkdfOnWindowScroll() {
    }

    function mkdfInitPortfolioSliderHeight(){
        var sliders = $('.mkdf-portfolio-slider-holder.mkdf-ps-fullscreen');

        if (sliders.length) {
            sliders.each(function(){
                var slider = $(this);
                var fromTop = 0;
                var fromBottom = slider.find('.owl-dots').outerHeight(true);
                var finalHeight;

                var calcHeight = function () {
                    if(slider.hasClass('mkdf-ps-minus-header')) {
                        if( mkdf.windowWidth > 1024 ) {
                            fromTop = $('.mkdf-page-header').outerHeight();
                        } else {
                            fromTop = $('.mkdf-mobile-header').outerHeight();
                        }
                    }

                    if(mkdf.body.hasClass('admin-bar')) {
                        fromTop =  fromTop + $('#wpadminbar').outerHeight();
                    }

                    finalHeight = mkdf.windowHeight - fromTop - fromBottom;


                    slider.find('.owl-item').each(function(){
                        var thisItem = $(this);

                        thisItem.css({'height': finalHeight});
                    });

                    slider.find('.owl-nav').css({'height': finalHeight});
                }

                calcHeight();

                $(window).on('resize', function() {
                    calcHeight();
                });
            });
        }
	}

    //Move carousel on scroll (only if has class mkdf-ps-scrollable!)
	function mkdfScrollSlider() {
        var sliders = $('.mkdf-portfolio-slider-holder.mkdf-ps-fullscreen');

        if (sliders.length) {
            sliders.each(function() {
                var slider = $(this);
                var isScrolling = false;

                if (slider.hasClass('mkdf-ps-scrollable')) {
                    slider.on('translate.owl.carousel', function() {
                        isScrolling = true;
                    });

                    slider.on('translated.owl.carousel', function() {
                        isScrolling = false;
                    });

                    var isScrollingFn = function () {
                        var owl = slider.find('.mkdf-owl-slider');

                        owl.on('mousewheel', '.owl-stage', function(e) {
                            if (!isScrolling) {
                                if (e.deltaY > 0) {
                                    owl.trigger('prev.owl');
                                } else {
                                    owl.trigger('next.owl');
                                }
                                e.preventDefault();
                            }
                        });
                    }

                    isScrollingFn();
                }
            });
        }
    }



})(jQuery);