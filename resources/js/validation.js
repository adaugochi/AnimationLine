(function ($) {
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/.test(value);
    }, "Please enter alphabets only");

    jQuery.validator.addMethod("length", function(value, element) {
        return this.optional(element) || value.length === 6;
    }, "Invalid postal code");

    $.validator.addMethod('filesize', function (value, element) {
        return this.optional(element) || (element.files[0].size <= 2000000)
    }, 'File size is greater 2MB');

    $('.validateForm').validate({
        onsubmit: true,
        onchange: true,
        onblur: true,
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
            contact_email: {
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
            message: "required",
            company_website : {
                url: true
            },
            order_url: {
                required: true,
                url: true
            },
            company_name: "required",
            voice_type: "required",
            video_script: "required",
            artist_gender: "required",
            artist_accent: "required",
            video_speed: "required"
        },
        messages: {
            password_confirmation: {
                equalTo: "Please enter the same password as above"
            }
        }
    });
})(jQuery);