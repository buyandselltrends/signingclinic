jQuery(document).ready(function($) {
    // Navigation
    $('.tm-tab').on('click', function() {
        $('.tm-tab').removeClass('active');
        $(this).addClass('active');

        const target = $(this).data('view');
        $('.tm-view').removeClass('active');
        $('#tm-view-' + target).addClass('active');
    });

    // Post Job
    $('#tm-submit-job').on('click', function() {
        const title = $('#tm-title').val();
        const desc = $('#tm-desc').val();
        const budget = $('#tm-budget').val();
        const lang = $('#tm-lang').val();
        const $btn = $(this);
        const $msg = $('#tm-post-msg');

        if(!title || !budget) return alert('Title and Budget required');

        $btn.text('Posting...').prop('disabled', true);
        
        $.post(tmAjax.url, {
            action: 'tm_post_job',
            security: tmAjax.nonce,
            title: title, desc: desc, budget: budget, language: lang
        }, function(res) {
            if(res.success) {
                $msg.html('<span style="color:#10b981;">' + res.data.message + '</span>');
                setTimeout(() => location.reload(), 1500);
            }
        });
    });

    // Accept Job
    $(document).on('click', '.tm-accept-btn', function() {
        const jobId = $(this).data('id');
        const $btn = $(this);
        
        $btn.text('Accepting...').prop('disabled', true);
        
        $.post(tmAjax.url, {
            action: 'tm_accept_job',
            security: tmAjax.nonce,
            job_id: jobId
        }, function(res) {
            if(res.success) {
                alert(res.data.message);
                location.reload();
            }
        });
    });

    // Rating Modal Logistics
    let selectedRating = 0;
    
    $(document).on('click', '.tm-complete-btn', function() {
        const jobId = $(this).data('id');
        $('#tm-active-review-id').val(jobId);
        $('#tm-rating-modal').addClass('active');
    });

    $('.tm-star').on('click', function() {
        selectedRating = $(this).data('val');
        $('.tm-star').removeClass('active');
        $(this).prevAll().addBack().addClass('active');
        $('#tm-submit-review').prop('disabled', false);
    });

    // Submit Review
    $('#tm-submit-review').on('click', function() {
        const jobId = $('#tm-active-review-id').val();
        const $btn = $(this);
        $btn.text('Processing Payout...').prop('disabled', true);

        $.post(tmAjax.url, {
            action: 'tm_submit_review',
            security: tmAjax.nonce,
            job_id: jobId,
            rating: selectedRating
        }, function(res) {
            if(res.success) {
                alert(res.data.message + '\nPlatform transferred Net Earnings: $' + res.data.freelancer_net);
                location.reload();
            }
        });
    });
});
