/* Custom JS */
var App = App || {};
var Roots = {};

(function($) {

    document.addEventListener('touchmove', function(event) {
        if (event.scale !== 1) { event.preventDefault(); }
    }, false);

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Roots = {
        // All pages
        common: function() {
            $('.open-mobile-nav').on('click', function() {
                $('.mobile').addClass('show');
            });
            $('.close').on('click', function() {
                $('.is-drilldown-submenu').removeClass('is-active');
                $('.mobile').removeClass('show');
            });
        },

        supadu_banner_slider: {
            init: function(el) {
                App.slider();
            }
        },
    };

    // The routing fires all common scripts, followed by the module specific scripts.

    var UTIL = {
        fire: function(func, funcname, args) {
            var namespace = Roots;
            funcname = (funcname === undefined) ? 'init' : funcname;
            if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function() {
            Roots.common();

            for (var m in Roots) {
                el = m.replace(/_/g, '-');
                $el = $('.' + el);
                if ($el.length) {
                    UTIL.fire(m, 'init', $el);
                }
            }
            $('body').addClass('loaded');

            $('.row').each(function() {
                var _this = this;
                var inview = new Waypoint({
                    element: _this,
                    handler: function(direction) {
                        $(this.element).animate({ 'opacity': 1 })
                    },
                    offset: '75%'
                });

            });
        }
    };

    $(document).ready(UTIL.loadEvents);

})(jQuery, window); // Fully reference jQuery after this point.
