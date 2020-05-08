(function ($) {
    let applyCoupon = $(".apply-coupon"),
        errorText = $(".err-text"),
        couponVal = $('.coupon-code'),
        saleAmountInput = $('#saleAmt'),
        totalAmountInput = $('#totalAmt'),
        discountInput = $('#discount'),
        totalAmountText = $('.total-amount'),
        discountText = $('.discount'),
        discountField = $(".discount-field"),
        discountSuccess = $(".discount-success"),
        paymentMethod = $("#paymentMethod"),
        backUpSaleAmt = $("#backUpSaleAmt"),
        submitButtonId = $("#validateForm"),
        couponCode = 'NEW10';

    function addSelectedAttr($this) {
        let value = $this.data('value');
        if (value !== '') {
            $this.find("option[value='" + value + "']").attr('selected', true);
        }
    }

    function commaSeparated(money) {
        return money.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    }

    $(document).ready(function () {
        addSelectedAttr($("#accent"));
        addSelectedAttr($("#artist"))
    });
    
    // $.get(`https://ipinfo.io?token=${IPToken}`, function (response) {
    //     country.val(response.country);
    //     convertMoney(response.country)
    // }, "jsonp");

    applyCoupon.click(function (e) {
        e.preventDefault();

        if (couponVal.val() === couponCode) {
            let discountAmount = saleAmountInput.val() * 0.10;
            discountInput.val(discountAmount.toFixed(2));
            discountText.text(commaSeparated(discountAmount.toFixed(2)));

            let totalAmount = saleAmountInput.val() - discountAmount.toFixed(2);
            totalAmountInput.val(totalAmount);
            totalAmountText.text(commaSeparated(totalAmount.toFixed(2)));

            discountField.removeClass('d-flex');
            discountField.addClass('d-none');
            discountSuccess.removeClass('d-none');
            discountSuccess.addClass('d-flex');
        } else {
            errorText.removeClass('d-none')
        }
    });

    function convertMoney(value) {
        discountField.addClass('d-flex');
        discountField.removeClass('d-none');
        discountSuccess.addClass('d-none');
        discountSuccess.removeClass('d-flex');
        discountInput.val(0);
        discountText.text("0.00");
        totalAmountText.text(backUpSaleAmt.val());
        totalAmountInput.val(backUpSaleAmt.val());

        if (value === 'paystack') {
            submitButtonId.attr('action', `${BaseURL}/pay`);
            $('.btn-submit').attr('disabled', false)
        } else if (value === 'paypal') {
            submitButtonId.attr('action', `${BaseURL}/create-payment`);
            $('.btn-submit').attr('disabled', false)
        } else {
            $('.btn-submit').attr('disabled', true)
        }
    }
    convertMoney(paymentMethod.val());

    paymentMethod.on('change', function () {
        convertMoney($(this).val())
    });

    submitButtonId.on('submit', function (e) {
        if (paymentMethod.val() === 'paystack') {
            totalAmountInput.val(totalAmountInput.val() * 100)
        }
    })

})(jQuery);