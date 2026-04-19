<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Global logger
function as_log_event( $type, $user_id, $data ) {
    global $wpdb;
    $wpdb->insert(
        $wpdb->prefix . 'aits_analytics_events',
        array(
            'event_type' => $type,
            'user_id' => $user_id,
            'data_json' => wp_json_encode( $data )
        )
    );
}

// Revenue Tracking
add_action( 'cws_transaction', function( $user_id, $amount, $type ) {
    as_log_event( 'revenue', $user_id, array( 'amount' => $amount, 'type' => $type ) );
}, 10, 3 );

// Usage & Language Tracking
add_action( 'hwe_process_ai_translation', function( $job_data ) {
    as_log_event( 'usage', $job_data['user_id'], array( 
        'source_lang' => $job_data['source_lang'], 
        'target_lang' => $job_data['target_lang'],
        'has_human_review' => false
    ) );
}, 10, 1 );

// Conversion Tracking
add_action( 'hwe_request_human_upgrade', function( $user_id, $job_id ) {
    as_log_event( 'conversion', $user_id, array( 'type' => 'human_upgrade', 'job_id' => $job_id ) );
}, 10, 2 );

// Session Tracking
add_action( 'aits_live_session_started', function( $session_id, $customer_id, $provider_id ) {
    as_log_event( 'session', $customer_id, array( 'session_id' => $session_id, 'provider_id' => $provider_id ) );
}, 10, 3 );
