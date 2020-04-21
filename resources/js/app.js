require('./bootstrap');
require('./validation');
require('./checkout');

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

})(jQuery);
