var App = App || {};
$ = jQuery;
App.slider = function() {

    if ($('.supadu-banner-slider').length > 0) {
        var slider = $('.supadu-banner-slider');

        slider.slick({
            prevArrow: '<button type="button" class="slick-prev"><span class="icon-chevron-left"></span></button>',
            nextArrow: '<button type="button" class="slick-next"><span class="icon-chevron-right"></span></button>',
            dots: true,
            customPaging: function(slider, i) {
                return '<button class="tab"></button>';
            }
        });
    }

}