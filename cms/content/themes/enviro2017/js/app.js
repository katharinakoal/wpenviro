(function($){


    var Page = (function(self) {

        var construct = function construct(){

            particlesJS.load('cover-image', ParticlesConfigURL , function() {
                console.log('callback - particles.js config loaded');
            });

            $('article.event').matchHeight();

        };

        return {
            init: construct
        };

    })(Page || {});


    $(document).ready(Page.init);


})(jQuery);