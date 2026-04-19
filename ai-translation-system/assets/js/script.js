jQuery(document).ready(function($) {
    const dropZone = $('#aits-dragdrop');
    const fileInput = $('#aits-file-input');
    const translateBtn = $('#aits-translate-btn');
    const progressBar = $('#aits-progress-bar');
    const progressContainer = $('#aits-progress');
    const progressText = $('#aits-progress-dyn-text');
    let selectedFile = null;

    dropZone.on('dragover', function(e) {
        e.preventDefault(); e.stopPropagation();
        dropZone.addClass('dragover');
    });

    dropZone.on('dragleave', function(e) {
        e.preventDefault(); e.stopPropagation();
        dropZone.removeClass('dragover');
    });

    dropZone.on('drop', function(e) {
        e.preventDefault(); e.stopPropagation();
        dropZone.removeClass('dragover');
        handleFiles(e.originalEvent.dataTransfer.files);
    });

    dropZone.on('click', function(e) {
        if (e.target.tagName !== 'BUTTON') {
             fileInput.click();
        }
    });

    fileInput.on('change', function(e) {
        handleFiles(e.target.files);
    });

    function handleFiles(files) {
        if (files.length > 0) {
            const file = files[0];
            const validTypes = ['text/plain', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            if(validTypes.includes(file.type)) {
                selectedFile = file;
                $('#aits-file-name').text('✓ ' + selectedFile.name);
                $('#aits-message').html('<span class="aits-msg-success">File loaded successfully. Ready to translate.</span>');
                dropZone.addClass('file-accepted').removeClass('file-error');
            } else {
                $('#aits-message').html('<span class="aits-msg-error">Error: Invalid file format. Please upload TXT, PDF, or DOCX.</span>');
                dropZone.removeClass('file-accepted').addClass('file-error');
                selectedFile = null;
                $('#aits-file-name').text('');
            }
        }
    }

    translateBtn.on('click', function(e) {
        e.preventDefault();
        const text = $('#aits-source-text').val().trim();
        const targetLang = $('#aits-lang-selector').val();
        const sourceLang = $('#aits-source-lang').val();

        if (!text && !selectedFile) {
            alert('Please enter text or upload a file.');
            return;
        }

        translateBtn.text('Translating...').prop('disabled', true);
        $('#aits-message').html('');
        $('#aits-target-text').val('');
        $('#aits-detected-note').hide().text('');
        
        // Progress Logic
        progressContainer.show();
        progressBar.css('width', '5%');
        progressText.text('Analyzing neural weights and translating...');
        let progressVal = 5;
        let progressInterval = setInterval(() => {
            if(progressVal < 90) {
                progressVal += Math.random() * 8;
                progressBar.css('width', progressVal + '%');
            }
        }, 500);

        let formData = new FormData();
        formData.append('action', 'aits_process_translation');
        formData.append('security', aitsSettings.nonce);
        formData.append('text', text);
        formData.append('source_lang', sourceLang);
        formData.append('target_lang', targetLang);
        if (selectedFile) formData.append('file', selectedFile);

        $.ajax({
            url: aitsSettings.ajaxUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    if (response.data.status === 'queued') {
                        // Handle Asynchronous Queue
                        progressText.text(response.data.message);
                        pollQueueStatus(response.data.job_id, progressInterval);
                    } else if (response.data.status === 'completed') {
                        completeTranslation(response.data, progressInterval);
                    }
                } else {
                    clearInterval(progressInterval);
                    progressContainer.hide();
                    $('#aits-message').html('<span class="aits-msg-error">' + response.data.message + '</span>');
                    translateBtn.text('Translate Now (1 Credit)').prop('disabled', false);
                }
            },
            error: function() {
                clearInterval(progressInterval);
                progressContainer.hide();
                $('#aits-message').html('<span class="aits-msg-error">Connection error occurred.</span>');
                translateBtn.text('Translate Now (1 Credit)').prop('disabled', false);
            }
        });
    });

    function pollQueueStatus(jobId, progressInterval) {
        let pollTimer = setInterval(function() {
            $.post(aitsSettings.ajaxUrl, {
                action: 'aits_check_queue',
                security: aitsSettings.nonce,
                job_id: jobId
            }, function(resp) {
                if(resp.success) {
                    if (resp.data.status === 'completed') {
                        clearInterval(pollTimer);
                        completeTranslation(resp.data, progressInterval);
                    } else if (resp.data.status === 'processing') {
                        progressText.text('Processing large file in background queue...');
                    }
                } else {
                    clearInterval(pollTimer);
                    clearInterval(progressInterval);
                    progressContainer.hide();
                    $('#aits-message').html('<span class="aits-msg-error">' + resp.data.message + '</span>');
                    translateBtn.text('Translate Now (1 Credit)').prop('disabled', false);
                }
            });
        }, 2000);
    }

    function completeTranslation(data, progressInterval) {
        clearInterval(progressInterval);
        progressBar.css('width', '100%');
        
        setTimeout(() => {
            progressContainer.hide();
            $('#aits-target-text').val(data.translated);
            $('#aits-credit-count').text(data.credits);
            
            if (data.detected_lang) {
                $('#aits-detected-note').text('AI Detected: ' + data.detected_lang).fadeIn();
            }

            selectedFile = null;
            $('#aits-file-name').text('');
            dropZone.removeClass('file-accepted');
            fileInput.val('');
            $('#aits-message').html('<span class="aits-msg-success">Translation complete!</span>');
            
            translateBtn.text('Translate Now (1 Credit)').prop('disabled', false);
        }, 500);
    }
});
