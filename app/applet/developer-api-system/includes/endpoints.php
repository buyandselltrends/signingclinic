<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'rest_api_init', function () {
    // Translation Endpoint
    register_rest_route( 'dev-api/v1', '/translate', array(
        'methods'  => 'POST',
        'callback' => 'dev_api_translate',
        'permission_callback' => function($request) {
            $user_id = dev_api_authenticate_request($request);
            if (!$user_id) return new WP_Error( 'unauthorized', 'Invalid API Key.', array('status' => 401) );
            // Rate Limit Check
            if ( ! sfs_check_rate_limit( 'api_' . $user_id, 1000, 3600 ) ) {
                return new WP_Error( 'rate_limit', 'Rate limit exceeded.', array('status' => 429) );
            }
            return true;
        }
    ) );
} );

function dev_api_translate( WP_REST_Request $request ) {
    // Reuse existing hwe_process_ai_translation logic
    // Add billing event after call
    $response = hwe_process_ai_translation($request);
    
    if ( ! is_wp_error( $response ) ) {
        // Log API Usage for billing
        dev_api_log_usage( get_current_user_id() ?: 0, 'translation', 1 );
    }
    
    return $response;
}

function dev_api_log_usage($user_id, $service, $cost) {
    // Charge user wallet for API usage
    apply_filters( 'cws_charge_wallet', true, $user_id, $cost, 'api_usage_' . $service );
}
