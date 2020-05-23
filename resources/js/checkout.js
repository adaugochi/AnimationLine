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
        paymentMethod = $('input[type=radio][name=payment_method]'),
        backUpSaleAmt = $("#backUpSaleAmt"),
        submitButtonId = $("#validateForm"),
        payNowButton = $('.btn-submit'),
        paystackInput = $("#paystack"),
        paypalInput = $('#paypal'),
        couponCode = 'NEW10',
        metaData = $('#metadata');

    function fetchMetaDataValues() {
        let saleAmt = saleAmountInput.val(),
            discount = discountInput.val(),
            payment = paymentMethod.val(),
            pack = $('#package').val(),
            service = $('#service').val(),
            totalAmt = totalAmountInput.val(),
            currency = $('#currency').val(),
            state = $('#state').val(),
            country = $('#country').val(),
            city = $('#city').val();

        let details = {
            'sales_amount':saleAmt, 'discount_price':discount, 'payment_method':payment, 'currency':currency,
            'service':service, 'city':city, 'state':state, 'country':country, 'amount':totalAmt, 'package':pack
        };
        metaData.val(JSON.stringify(details));
    }

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
        addSelectedAttr($("#artist"));
        addSelectedAttr($("#speed"));
        addSelectedAttr($("#voice"));
        addSelectedAttr($("#gender"))
    });

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

    function convertMoney() {
        discountField.addClass('d-flex');
        discountField.removeClass('d-none');
        discountSuccess.addClass('d-none');
        discountSuccess.removeClass('d-flex');
        discountInput.val(0);
        discountText.text("0.00");
        totalAmountText.text(backUpSaleAmt.val());
        totalAmountInput.val(backUpSaleAmt.val());

        if (paystackInput.is(':checked')) {
            submitButtonId.attr('action', '/pay-with-paystack');
            payNowButton.attr('disabled', false);
        } else if (paypalInput.is(':checked')) {
            submitButtonId.attr('action', '/create-payment');
            payNowButton.attr('disabled', false);
        } else {
            payNowButton.attr('disabled', true)
        }
    }
    convertMoney();
    paymentMethod.on('change', function () {
        convertMoney()
    });

    submitButtonId.on('submit', function (e) {
        if (!paystackInput.is(':checked') && !paypalInput.is(':checked')) {
            e.preventDefault();
            $('#paymentWrap').append('<div class="error">This field is required</div>')
        }
        if (paystackInput.is(':checked')) {
            fetchMetaDataValues();
            totalAmountInput.val(totalAmountInput.val() * 100)
        }
    })
})(jQuery);