jQuery(document).ready(function($) {
    const $file = $('#hts-file');
    const $service = $('#hts-service');
    const $express = $('#hts-express');
    const $words = $('#hts-words');
    const $rate = $('#hts-rate');
    const $total = $('#hts-total');
    
    let currentWords = 0;

    function calculatePrice() {
        if (currentWords === 0) {
            $total.text('$0.00');
            $rate.text('$0.00');
            return;
        }

        const selectedOption = $service.find('option:selected');
        let baseRate = parseFloat(selectedOption.data('rate'));
        
        if ($express.is(':checked')) {
            baseRate *= 1.5;
        }

        let totalAmount = currentWords * baseRate;
        if (totalAmount < 20) totalAmount = 20; // Minimum charge

        $rate.text('$' + baseRate.toFixed(2));
        $total.text('$' + totalAmount.toFixed(2));
    }

    $file.on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Mock estimation: 150 words per 1KB of file size to demonstrate logic
            currentWords = Math.floor((file.size / 1024) * 150);
            if (currentWords > 50000) currentWords = 50000; // Cap mockup
            $words.text(currentWords);
            calculatePrice();
        } else {
            currentWords = 0;
            $words.text('0');
            calculatePrice();
        }
    });

    $service.on('change', calculatePrice);
    $express.on('change', calculatePrice);

    $('#hts-form').on('submit', function(e) {
        e.preventDefault();
        
        if(currentWords === 0) {
            alert("Please upload a document to calculate price.");
            return;
        }

        const formData = new FormData();
        formData.append('action', 'hts_submit_order');
        formData.append('price', $total.text().replace('$', ''));
        formData.append('service', $service.val());
        
        const $btn = $('.hts-submit');
        $btn.text('Processing...').prop('disabled', true);

        $.ajax({
            url: htsAjax.ajaxUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if(res.success) {
                    $('#hts-status').html('<p style="color:green; margin-top:10px;">' + res.data.message + '</p>');
                    $btn.text('Order Placed').hide();
                }
            }
        });
    });
});
