require('./bootstrap');

(function ($) {
    let steps = $(".steps-to");

    steps.mouseenter(function () {
        $(this).addClass('card');
        $(this).addClass('bg-brand-primary');
        $(this).css('transition', 'all 0.5s')
    });

    steps.mouseleave(function () {
        $(this).removeClass('card');
        $(this).removeClass('bg-brand-primary');
    })
})(jQuery);

