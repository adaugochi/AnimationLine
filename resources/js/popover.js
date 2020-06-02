(function ($) {
    $("[data-toggle='popover']").popover();

    $('[data-toggle="popover"]').click(function () {
        setTimeout(function () {
            $('.popover').remove();
        }, 1000);
    });
})(jQuery);