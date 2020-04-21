(function ($) {
    let applyCoupon = $(".apply-coupon"),
        errorText = $(".err-text"),
        currency = $(".currency"),
        couponVal = $('.coupon-code'),
        currencyId = $("#currency"),
        country = $("#country"),
        saleAmountInput = $('#saleAmt'),
        saleAmountText = $('.sale-amount'),
        totalAmountInput = $('#totalAmt'),
        discountInput = $('#discount'),
        totalAmountText = $('.total-amount'),
        discountText = $('.discount'),
        discountField = $(".discount-field"),
        discountSuccess = $(".discount-success"),
        paymentMethod = $("#paymentMethod"),
        backUpSaleAmt = $("#backUpSaleAmt"),
        payment = $(".payment"),
        submitButtonId = $("#validateForm"),
        couponCode = 'NEW10';

    let settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://community-neutrino-currency-conversion.p.rapidapi.com/convert",
        "method": "POST",
        "headers": {
            "x-rapidapi-host": "community-neutrino-currency-conversion.p.rapidapi.com",
            "x-rapidapi-key": rapidApiKey,
            "content-type": "application/x-www-form-urlencoded"
        },
        "data": {
            "from-type": "USD",
            "to-type": "NGN",
            "from-value": "1"
        }
    };

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

    $.get(`https://ipinfo.io?token=${IPToken}`, function (response) {
        country.val(response.country);
        convertMoney(response.country)
    }, "jsonp");

    applyCoupon.click(function (e) {
        e.preventDefault();

        if (couponVal.val() === couponCode) {
            let discountAmount = saleAmountInput.val() * 0.10;
            discountInput.val(discountAmount.toFixed(2));
            discountText.text(commaSeparated(discountAmount.toFixed(2)));

            let totalAmount = saleAmountInput.val() - discountAmount.toFixed(2);
            totalAmountInput.val(totalAmount.toFixed(2));
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

        if (value === 'NG') {
            $.ajax(settings).done(function (response) {
                console.log(response.result);
                function conversion(money) {
                    return (response.result * money);
                }
                let amountInNairaSaleInput = conversion(saleAmountInput.val());
                totalAmountInput.val(amountInNairaSaleInput.toFixed() * 100);
                totalAmountText.text(commaSeparated(amountInNairaSaleInput.toFixed()));
                saleAmountInput.val(amountInNairaSaleInput.toFixed());
                saleAmountText.text(commaSeparated(amountInNairaSaleInput.toFixed()));

                currency.text('NGN');
                currencyId.val('NGN');
                paymentMethod.val('paystack');
                payment.text("PayStack");
                submitButtonId.attr('action', 'pay')
            });
        } else {
            currency.text('USD');
            currencyId.val('USD');
            paymentMethod.val('paypal');

            totalAmountInput.val(backUpSaleAmt.val());
            totalAmountText.text(backUpSaleAmt.val());
            saleAmountInput.val(backUpSaleAmt.val());
            saleAmountText.text(backUpSaleAmt.val());
            payment.text("PayPal");
            submitButtonId.attr('action', 'create-payment')
        }
    }

    country.on('change', function () {
        convertMoney($(this).val())
    });

})(jQuery);