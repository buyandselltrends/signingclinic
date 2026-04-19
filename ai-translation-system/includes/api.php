<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_ajax_aits_process_translation', 'aits_process_translation' );
add_action( 'wp_ajax_nopriv_aits_process_translation', 'aits_process_translation' );

add_action( 'wp_ajax_aits_check_queue', 'aits_check_queue_status' );
add_action( 'wp_ajax_nopriv_aits_check_queue', 'aits_check_queue_status' );

function aits_enforce_rate_limit($ip, $limit = 5, $window_seconds = 60) {
    $transient_name = 'aits_rate_' . md5($ip);
    $current_requests = get_transient($transient_name);

    if ($current_requests === false) {
        set_transient($transient_name, 1, $window_seconds);
        return true;
    }

    if ($current_requests >= $limit) {
        return false;
    }

    set_transient($transient_name, $current_requests + 1, $window_seconds);
    return true;
}

function aits_process_translation() {
    check_ajax_referer( 'aits_secure_nonce', 'security' );

    $user_ip = $_SERVER['REMOTE_ADDR'];
    if (!aits_enforce_rate_limit($user_ip, 10, 60)) { // 10 requests per minute
        wp_send_json_error( array( 'message' => 'Rate limit exceeded. Please wait a moment before trying again.' ) );
    }

    $text = isset( $_POST['text'] ) ? sanitize_textarea_field( wp_unslash( $_POST['text'] ) ) : '';
    $lang = isset( $_POST['target_lang'] ) ? sanitize_text_field( wp_unslash( $_POST['target_lang'] ) ) : 'es';
    $source_lang = isset( $_POST['source_lang'] ) ? sanitize_text_field( wp_unslash( $_POST['source_lang'] ) ) : 'auto';
    
    $user_id = get_current_user_id();
    $provider = get_option('aits_api_provider', 'openai');

    // Check credits
    $credits = (int) get_user_meta( $user_id, 'aits_credits', true );
    if ( $user_id && $credits <= 0 && $credits !== -1 ) {
        wp_send_json_error( array( 'message' => 'Insufficient credits. Please purchase more or wait for your monthly allowance.' ) );
    }

    $detected_lang = '';
    if ($source_lang === 'auto') {
        // AI-powered language detection mock
        $len = strlen($text);
        if ($len > 0) {
            $detected_lang = 'English (Detected with 98% confidence)';
        } else {
            $detected_lang = 'Unknown';
        }
    } else {
        $detected_lang = $source_lang;
    }

    // Handle File Upload if present - Queue System
    if ( !empty( $_FILES['file'] ) ) {
        $file = $_FILES['file'];
        $allowed_mimes = array('application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain');
        if ( !in_array( $file['type'], $allowed_mimes ) ) {
            wp_send_json_error( array( 'message' => 'Invalid file type. Only PDF, DOCX, and TXT allowed.' ) );
        }
        $text = "Extracted text from " . sanitize_file_name($file['name']) . " ... \n" . $text;
        
        // Return queued state for asynchronous processing of files
        $job_id = uniqid('job_');
        set_transient( 'aits_job_' . $job_id, array(
            'status' => 'processing',
            'text' => $text,
            'target_lang' => $lang,
            'provider' => $provider,
            'user_id' => $user_id,
            'credits_at_start' => $credits,
            'detected_lang' => $detected_lang,
            'progress' => 0, // Track progress
            'total_steps' => 5, // Simulation steps
            'created' => time()
        ), HOUR_IN_SECONDS );

        wp_send_json_success( array(
            'status' => 'queued',
            'job_id' => $job_id,
            'message' => 'Large file uploaded. Placed in translation queue...'
        ) );
    }

    if ( empty( $text ) ) {
        wp_send_json_error( array( 'message' => 'No text to translate.' ) );
    }

    // Deduct Credit (immediate for text)
    if ( $user_id && function_exists('cws_deduct_credits')) {
        cws_deduct_credits($user_id, 1, 'Translation usage: ' . $provider);
    } elseif ($user_id) {
        update_user_meta( $user_id, 'aits_credits', $credits - 1 );
    }

    // Mock API Call specific to Provider
    sleep(1); // simulate delay for progress bar
    if ($provider === 'google') {
        $translated_text = "✨ [Google Neural Translate API] " . $text;
    } else {
        $translated_text = "🧠 [OpenAI GPT-4 Translation] " . $text;
    }

    // Save to History using Database Table
    if ( $user_id ) {
        global $wpdb;
        $table = $wpdb->prefix . 'aits_history';
        $wpdb->insert($table, array(
            'user_id' => $user_id,
            'source_text' => $text,
            'translated_text' => $translated_text,
            'target_lang' => $lang,
            'provider' => $provider
        ));
    }

    wp_send_json_success( array(
        'status' => 'completed',
        'detected_lang' => $detected_lang,
        'translated' => $translated_text,
        'credits'    => $user_id ? $credits - 1 : 'Guest'
    ) );
}

function aits_check_queue_status() {
    check_ajax_referer( 'aits_secure_nonce', 'security' );
    
    $user_ip = $_SERVER['REMOTE_ADDR'];
    if (!aits_enforce_rate_limit($user_ip, 30, 60)) { // 30 polling requests per minute max limit
        wp_send_json_error( array( 'message' => 'Rate limit exceeded. Too many requests.' ) );
    }
    
    $job_id = isset( $_POST['job_id'] ) ? sanitize_text_field( wp_unslash( $_POST['job_id'] ) ) : '';
    if (!$job_id) wp_send_json_error(array('message' => 'Invalid Job ID'));

    $job_data = get_transient('aits_job_' . $job_id);
    if (!$job_data) {
        wp_send_json_error(array('message' => 'Job expired or not found.'));
    }

    // Simulate async processing taking a few seconds
    $job_data['progress'] += 1;
    if ($job_data['progress'] < $job_data['total_steps']) {
        set_transient( 'aits_job_' . $job_id, $job_data, HOUR_IN_SECONDS );
        $percent = round(($job_data['progress'] / $job_data['total_steps']) * 100);
        wp_send_json_success(array(
            'status' => 'processing',
            'message' => "Translating... {$percent}% complete"
        ));
    }

    // Job is complete
    $provider = $job_data['provider'];
    $text = $job_data['text'];
    $user_id = $job_data['user_id'];
    $credits = $job_data['credits_at_start'];

    if ($provider === 'google') {
        $translated_text = "✨ [Google Neural Translate API - Asynchronous Queue] " . $text;
    } else {
        $translated_text = "🧠 [OpenAI GPT-4 - Asynchronous Queue] " . $text;
    }

    // Deduct Credit upon queue completion
    if ( $user_id && function_exists('cws_deduct_credits')) {
        cws_deduct_credits($user_id, 1, 'Asynchronous translation usage: ' . $provider);
    } elseif ( $user_id ) {
        update_user_meta( $user_id, 'aits_credits', max(0, $credits - 1) );
    }

    // Save history
    if ( $user_id ) {
        global $wpdb;
        $table = $wpdb->prefix . 'aits_history';
        $wpdb->insert($table, array(
            'user_id' => $user_id,
            'source_text' => $text,
            'translated_text' => $translated_text,
            'target_lang' => $job_data['target_lang'],
            'provider' => $provider
        ));
    }

    delete_transient('aits_job_' . $job_id);

    wp_send_json_success( array(
        'status' => 'completed',
        'detected_lang' => $job_data['detected_lang'],
        'translated' => $translated_text,
        'credits'    => $user_id ? max(0, $credits - 1) : 'Guest'
    ) );
}
