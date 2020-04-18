require('./bootstrap');

(function ($) {
    let currency = $(".currency"),
        currencyId = $("#currency"),
        applyCoupon = $(".apply-coupon"),
        couponCode = 'NEW10',
        saleAmountInput = $('#saleAmt'),
        totalAmountInput = $('#totalAmt'),
        discountInput = $('#discount'),
        totalAmountText = $('.total-amount'),
        saleAmountText = $('.sale-amount'),
        discountText = $('.discount'),
        discountField = $(".discount-field"),
        Errortext = $(".err-text"),
        discountSuccess = $(".discount-success"),
        paymentMethod = $("#paymentMethod"),
        backUpSaleAmt = $("#backUpSaleAmt"),
        payment = $(".payment"),
        couponVal = $('.coupon-code'),
        submitButtonId = $("#validateForm");

    function addSelectedAttr($this)
    {
        let value = $this.data('value');
        if (value !== '') {
            $this.find("option[value='" + value + "']").attr('selected', true);
        }
    }

    $(document).ready(function () {
        addSelectedAttr($("#accent"));
        addSelectedAttr($("#artist"))
    });

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
            Errortext.removeClass('d-none')
        }
    });

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/.test(value);
    }, "Please enter alphabets only");

    jQuery.validator.addMethod("length", function(value, element) {
        return this.optional(element) || value.length === 6;
    }, "Invalid postal code");

    $('.validateForm').validate({
        onsubmit: true,
        onchange: true,
        onblur: false,
        onkeyup: false,
        rules: {
            city: "required",
            country_accent: "required",
            country: "required",
            voiceover_artist: "required",
            state: {
                required: true,
                lettersonly: true
            },
            first_name: {
                required: true,
                lettersonly: true
            },
            last_name: {
                required: true,
                lettersonly: true
            },
            email: {
                required: true,
                email: true
            },
            postal_code: {
                digits: true,
                length: true
            },
            password: {
                required: true,
                minlength: 8,
            },
            password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            },
            app_full_name: "required",
            description: "required",
            website : {
                url: true
            }
        },
        messages: {
            password_confirmation: {
                equalTo: "Please enter the same password as above"
            }
        }
    });

    $('.nav li a').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active-class');
        }
    });

    function commaSeparated(money) {
        return money.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    }

    $("#country").on('change', function () {
        discountField.addClass('d-flex');
        discountField.removeClass('d-none');
        discountSuccess.addClass('d-none');
        discountSuccess.removeClass('d-flex');

        discountInput.val(0);
        discountText.text("0.00");
        if ($(this).val() === 'Nigeria') {
            $.ajax({
                url: 'data.fixer.io/api/latest?access_key=4e85812a1ae88537761694fe399c8229&format=1',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let convertToDollar = data.rates.USD;
                    let convertToNaira = data.rates.NGN;

                    function conversion(money) {
                        return (convertToNaira * money)/convertToDollar;
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
                }
            })
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
    });

    submitButtonId.on('submit', function () {
        if ($(this).find('.error')) {
            $(this).find('.btn-submit').prop('disabled', false)
        } else {
            $(this).find('.btn-submit').prop('disabled', true)
        }
    });

})(jQuery);

