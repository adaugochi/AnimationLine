(function ($) {
    $('.validateForm').on('submit', function (e) {
        let rcResponse = grecaptcha.getResponse();
        if(!rcResponse.length){
            e.preventDefault();
            $(this).find('.g-recaptcha').parent().append('<label class="error">Please verify reCAPTCHA</label>');
        }
    });

    let reCaptcha = $('.g-recaptcha');
    function rescaleCaptcha() {
        let width = reCaptcha.parent().width();
        if (width < 302) {
            let scale = width / 302;
            reCaptcha.css('transform', 'scale(' + scale + ')');
            reCaptcha.css('-webkit-transform', 'scale(' + scale + ')');
            reCaptcha.css('transform-origin', '0 0');
            reCaptcha.css('-webkit-transform-origin', '0 0');
        }
    }

    rescaleCaptcha();
    $( window ).resize(function() { rescaleCaptcha(); });
})(jQuery);