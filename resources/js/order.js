(function ($) {
    let questionWrap = $('.question_wrap');

    $('.btn-copy').on('click', function (e) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('.copy-url').val()).select();
        document.execCommand("copy");
        $temp.remove();
    });

    let negative = '.negative',
        positive = '.positive';

    const posTemplate = $('#positive').html();
    const negTemplate = $('#negative').html();

    function renderTemplate(res, template) {
        if ($(res).length) {
            $(res).remove();
        }
        questionWrap.append(template);
        $('.reviewForm').on('submit', function (e) {
            $('.error').remove();
            if (!$.trim($(this).find('.comment').val())) {
                e.preventDefault();
                $(this).find('.form-group').append('<label class="error">This field is required</label>')
            }
        })
    }

    $('.btn-yes').on('click', function () {
        renderTemplate(negative, posTemplate)
    });

    $('.btn-no').on('click', function () {
        renderTemplate(positive, negTemplate)
    });

    $("[data-toggle='popover']").popover();

    $('[data-toggle="popover"]').click(function () {
        setTimeout(function () {
            $('.popover').remove();
        }, 1000);
    });
})(jQuery);