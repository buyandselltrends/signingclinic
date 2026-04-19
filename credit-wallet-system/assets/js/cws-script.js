jQuery(document).ready(function($) {
    let selectedPackage = 'medium';

    $('.cws-pkg').on('click', function() {
        $('.cws-pkg').removeClass('active');
        $(this).addClass('active');
        selectedPackage = $(this).data('pkg');
    });

    $('#cws-checkout-btn').on('click', function() {
        const gateway = $('input[name="cws_gateway"]:checked').val();
        const $btn = $(this);
        const $msg = $('#cws-checkout-msg');

        $btn.text('Processing Payment...').prop('disabled', true);
        $msg.html('');

        $.post(cwsAjax.url, {
            action: 'cws_process_payment',
            security: cwsAjax.nonce,
            package: selectedPackage,
            gateway: gateway
        }, function(response) {
            if (response.success) {
                $msg.html('<span style="color:#10b981;">' + response.data.message + '</span>');
                // Dynamically update UI block
                $('#cws-bal-display').text(response.data.new_balance);
                $btn.text('Checkout Complete');
                setTimeout(() => {
                    location.reload(); // Refresh to update history list
                }, 2000);
            } else {
                $msg.html('<span style="color:#ef4444;">' + response.data.message + '</span>');
                $btn.text('Complete Secure Checkout').prop('disabled', false);
            }
        }).fail(function() {
            $msg.html('<span style="color:#ef4444;">Connection error. Please try again.</span>');
            $btn.text('Complete Secure Checkout').prop('disabled', false);
        });
    });
});
