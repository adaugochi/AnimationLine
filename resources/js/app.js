require('./bootstrap');
require('./validation');
require('./checkout');
require('./file-upload');

(function ($) {
    let submitButtonId = $("#validateForm");

    $('.nav li a').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active-class');
        }
    });

    submitButtonId.on('submit', function () {
        if ($(this).find('.error')) {
            $(this).find('.btn-submit').prop('disabled', false)
        } else {
            $(this).find('.btn-submit').prop('disabled', true)
        }
    });

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    function smoothScroll($href) {
        $($href).on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                let hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {
                    window.location.hash = hash;
                });
            }
        });
    }

    smoothScroll('a[href^="/#whyUs"]');
    smoothScroll('a[href^="/#service"]');

    $(".btn-scroll").click(function() {
        $("html").animate({ scrollTop: 0 }, 800);
        return false;
    });

    function windowScroll($this) {
        if ($this.scrollTop() > 100) {
            $('.btn-scroll').show().fadeIn();
        } else {
            $('.btn-scroll').fadeOut().hide();
        }
    }

    windowScroll($(window));
    $(window).scroll(function(){
        windowScroll($(this))
    });

})(jQuery);
