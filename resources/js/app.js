require('./bootstrap');

(function ($) {
    let steps = $(".steps-to"),
        applyCoupon = $(".apply-coupon"),
        couponCode = 'NEW10',
        saleAmountInput = $('#saleAmt'),
        totalAmountInput = $('#totalAmt'),
        discountInput = $('#discount'),
        totalAmountText = $('.total-amount'),
        discountText = $('.discount'),
        couponVal = $('.coupon-code');

    steps.mouseenter(function () {
        $(this).addClass('card');
        $(this).addClass('bg-brand-primary');
        $(this).css('transition', 'all 0.5s')
    });

    steps.mouseleave(function () {
        $(this).removeClass('card');
        $(this).removeClass('bg-brand-primary');
    });

    applyCoupon.click(function (e) {
        e.preventDefault();

        if (couponVal.val() === couponCode) {
            let discountAmount = saleAmountInput.val() * 0.10;
            discountInput.val(discountAmount.toFixed(2));
            discountText.text(discountAmount.toFixed(2));

            let totalAmount = saleAmountInput.val() - discountAmount.toFixed(2);
            totalAmountInput.val(totalAmount.toFixed(2));
            totalAmountText.text(totalAmount.toFixed(2));
        } else {
            console.log('incorrect coupon code')
        }
    })

})(jQuery);

