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
        discountField = $(".discount-field"),
        Errortext = $(".err-text"),
        discountSuccess = $(".discount-success"),
        couponVal = $('.coupon-code');

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
            discountText.text(discountAmount.toFixed(2));

            let totalAmount = saleAmountInput.val() - discountAmount.toFixed(2);
            totalAmountInput.val(totalAmount.toFixed(2));
            totalAmountText.text(totalAmount.toFixed(2));
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
        onblur: false,
        onkeyup: false,
        rules: {
            city: {
                required: true,
                lettersonly: true
            },
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
                minlength: 6,
            },
            password_confirmation: {
                required: true,
                minlength: 6,
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

})(jQuery);

