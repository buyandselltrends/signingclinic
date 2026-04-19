let ibsData = { service: '', language: '', date: '', time: '' };

function ibsSelect(type, val, currentStep) {
    ibsData[type] = val;
    if(type === 'service') {
        $('.ibs-card').removeClass('selected');
        $(`.ibs-card[data-val="${val}"]`).addClass('selected');
        setTimeout(() => ibsNext(currentStep), 300);
    }
}

function ibsNext(fromStep) {
    if(fromStep === 2) {
        ibsData.language = $('#ibs-language').val();
        if(!ibsData.language) return alert('Please select a language');
    }
    if(fromStep === 3) {
        if(!ibsData.date || !ibsData.time) return alert('Please select a date and time');
        // Populate summary
        $('#summ-service').text(ibsData.service.toUpperCase());
        $('#summ-language').text(ibsData.language.toUpperCase());
        $('#summ-datetime').text(`${ibsData.date} at ${ibsData.time}`);
    }

    $(`#ibs-panel-${fromStep}`).removeClass('active');
    $(`#ibs-panel-${fromStep + 1}`).addClass('active');
    
    $('.ibs-step').removeClass('active');
    $(`.ibs-step[data-step="${fromStep + 1}"]`).addClass('active');
}

function ibsPrev(fromStep) {
    $(`#ibs-panel-${fromStep}`).removeClass('active');
    $(`#ibs-panel-${fromStep - 1}`).addClass('active');
    
    $('.ibs-step').removeClass('active');
    $(`.ibs-step[data-step="${fromStep - 1}"]`).addClass('active');
}

jQuery(document).ready(function($) {
    // Generate mock calendar days
    const $grid = $('#ibs-cal-grid');
    for(let i=1; i<=31; i++) {
        let disabled = (i < 10) ? 'disabled' : '';
        $grid.append(`<div class="ibs-cal-cell ${disabled}" data-date="2026-10-${i.toString().padStart(2, '0')}">${i}</div>`);
    }

    $(document).on('click', '.ibs-cal-cell:not(.disabled)', function() {
        $('.ibs-cal-cell').removeClass('selected');
        $(this).addClass('selected');
        ibsData.date = $(this).data('date');
        
        // Mock time slots
        const slots = ['09:00 AM', '10:30 AM', '01:00 PM', '03:00 PM', '04:30 PM'];
        $('#ibs-slots').html('');
        slots.forEach(slot => {
            $('#ibs-slots').append(`<div class="ibs-slot" data-time="${slot}">${slot}</div>`);
        });
        ibsData.time = ''; // Reset time on new date
    });

    $(document).on('click', '.ibs-slot', function() {
        $('.ibs-slot').removeClass('selected');
        $(this).addClass('selected');
        ibsData.time = $(this).data('time');
    });

    // Handle AJAX Submission
    $('#ibs-submit-btn').on('click', function() {
        const $btn = $(this);
        const $msg = $('#ibs-response-msg');
        
        $btn.text('Booking...').prop('disabled', true);
        
        $.post(ibsAjax.url, {
            action: 'ibs_submit_booking',
            security: ibsAjax.nonce,
            service: ibsData.service,
            language: ibsData.language,
            date: ibsData.date,
            time: ibsData.time
        }, function(res) {
            if(res.success) {
                $msg.html(`<span style="color:#10b981;">✓ ${res.data.message}<br>Assigned Interpreter: <strong>${res.data.assigned}</strong><br><em>${res.data.email_status}</em></span>`);
                $btn.hide();
            } else {
                $msg.html(`<span style="color:#ef4444;">Error: ${res.data.message}</span>`);
                $btn.text('Confirm & Book').prop('disabled', false);
            }
        });
    });
});
