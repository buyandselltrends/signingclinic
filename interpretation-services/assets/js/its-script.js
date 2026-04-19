jQuery(document).ready(function($) {
    const $setupScreen = $('#its-setup-screen');
    const $connectingScreen = $('#its-connecting-screen');
    const $activeScreen = $('#its-active-screen');
    
    let timerInterval = null;
    let secondsElapsed = 0;
    let currentRatePerMin = 1.50; // Base connection rate

    // Calculate rates live based on service and urgency
    function updateRate() {
        const service = $('#its-service').val();
        const isUrgent = $('#its-urgent').is(':checked');
        
        // Base rates in USD
        let baseRate = 1.50;
        if (service === 'video') {
            baseRate = 0.05; // Specialized VRI pricing
        }
        
        currentRatePerMin = baseRate + (isUrgent ? 1.00 : 0);
        
        const currentRateGHS = currentRatePerMin * 20; // 1 USD = 20 GHS
        $('.its-pricing-note').html('Base Rate: GHS ' + currentRateGHS.toFixed(2) + ' / min ($' + currentRatePerMin.toFixed(2) + '). Specialized VRI rate enabled.');
    }

    $('#its-service, #its-urgent').on('change', updateRate);
    
    // Initial update
    updateRate();

    // Handle UI visibility for Services
    $('#its-btn-start').on('click', function() {
        if ($('#its-mode').val() === 'scheduled') {
            alert('Opening Scheduled Booking Calendar interface...');
            // In a full build, this opens a datepicker modal
            return;
        }

        const service = $('#its-service').val();
        if (service === 'video' || service === 'asl') {
            $('#its-video-area').css('display', 'flex'); // Show WebRTC block
        } else {
            $('#its-video-area').hide(); // Hide WebRTC block for Phone
        }

        // Transition to connecting layout
        $setupScreen.hide();
        $connectingScreen.show();
        
        // Matchmaking simulation (simulating WebSocket connection)
        setTimeout(() => {
            let name = "Interpreter #4082";
            if(service === 'asl') name = "Sarah (ASL Certified)";
            if(service === 'ai') name = "Neural Voice Engine V3";
            $('#its-interpreter-name').text(name);

            $connectingScreen.hide();
            $activeScreen.show();
            startTimer();
        }, 2500);
    });

    function startTimer() {
        secondsElapsed = 0;
        updateTimerDisplay();
        
        // Interval simulates active connected session
        timerInterval = setInterval(() => {
            secondsElapsed++;
            updateTimerDisplay();
        }, 1000);
    }

    function updateTimerDisplay() {
        const mins = Math.floor(secondsElapsed / 60);
        const secs = secondsElapsed % 60;
        $('#its-timer').text(
            (mins < 10 ? '0' : '') + mins + ':' + 
            (secs < 10 ? '0' : '') + secs
        );

        // Fractional calculation over minutes (USD base)
        const currentCostUSD = (secondsElapsed / 60) * currentRatePerMin;
        const currentCostGHS = currentCostUSD * 20; // 1 USD = 20 GHS
        $('#its-current-cost').text('GHS ' + currentCostGHS.toFixed(2) + ' ($' + currentCostUSD.toFixed(2) + ')');
    }

    // End Session and Save
    $('#its-btn-end').on('click', function() {
        clearInterval(timerInterval);
        const finalCostUSD = (secondsElapsed / 60) * currentRatePerMin;
        
        $(this).text('Ending Session...').prop('disabled', true);

        // Store to database via WP AJAX
        $.post(itsAjax.ajaxUrl, {
            action: 'its_save_session',
            security: itsAjax.nonce,
            duration: secondsElapsed,
            cost: finalCostUSD,
            service: $('#its-service').val(),
            mode: $('#its-mode').val()
        }, function(response) {
            const finalCostGHS = finalCostUSD * 20;
            alert('Session has ended. Total cost: GHS ' + finalCostGHS.toFixed(2) + ' ($' + finalCostUSD.toFixed(2) + ')\n\nThe session has been saved to your dashboard history.');
            location.reload(); // Hard reload simulated UI returning to main
        });
    });
});
