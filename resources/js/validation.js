(function ($) {
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
            payment_method: "required",
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
})(jQuery);