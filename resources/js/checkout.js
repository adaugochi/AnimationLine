(function ($) {
    let totalAmountInput = $('#totalAmt'),
        paymentMethod = $('input[type=radio][name=payment_method]'),
        submitButtonId = $("#validateForm"),
        payNowButton = $('.btn-submit'),
        paystackInput = $("#paystack"),
        paypalInput = $('#paypal'),
        metaData = $('#metadata');

    function fetchMetaDataValues() {
        let billingId = $('#billingId').val(),
            service = $('#service').val(),
            pack = $('#package').val(),
            transactionRef = $('#txRef').val();

        let details = {
            'reference': transactionRef, 'billing_id': billingId, 'service': service, 'package': pack
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

    function convertMoney() {
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