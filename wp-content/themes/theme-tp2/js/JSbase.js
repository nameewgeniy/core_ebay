(function ($) {
    $(function() {
        $(".rslides").responsiveSlides({speed: 3000});
        function slide_text(e)
        {
            var count = e + 1;
            $('.rslides li:nth-child('+count+') h3').effect('slide', {direction: 'up'});
        }
    });
}(jQuery));