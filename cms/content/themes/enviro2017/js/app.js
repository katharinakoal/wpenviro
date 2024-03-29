(function($){


    var Page = (function(self) {

        var construct = function construct(){

            particlesJS.load('cover-image', ParticlesConfigURL , function() {
                console.log('callback - particles.js config loaded');
            });

            $('article.event, article.front-page, article.news, article.publication').matchHeight();

        };

        $('#main').waypoint({
            handler: function(direction) {
                var $siteNavigationBar = $('#site-navigation-bar');
                switch (direction){
                    case 'down':
                        $siteNavigationBar.addClass('fixed');
                        break;
                    case 'up':
                        $siteNavigationBar.addClass('fixed-out').removeClass('fixed');
                        break;
                }
            },
            offset: 100
        });

        $('#main').waypoint({
            handler: function(direction) {
                var $siteNavigationBar = $('#site-navigation-bar');
                switch (direction){
                    case 'down':
                        $siteNavigationBar.addClass('prepare-fixed');
                        break;
                    case 'up':
                        $siteNavigationBar.removeClass('prepare-fixed').removeClass('fixed-out');
                        break;
                }
            },
            offset: 200
        });


        return {
            init: construct
        };

    })(Page || {});


    $(document).ready(Page.init);


})(jQuery);