(function($){


    var Page = (function(self) {

        var construct = function construct(){



            console.log('jo');

        };

        return {
            init: construct
        };

    })(Page || {});


    $(document).ready(Page.init);


})(jQuery);