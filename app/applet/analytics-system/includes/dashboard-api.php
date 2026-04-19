<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'as/v1', '/data', array(
        'methods'  => 'GET',
        'callback' => 'as_get_dashboard_data',
        'permission_callback' => 'as_check_permission',
    ) );
} );

function as_check_permission( WP_REST_Request $request ) {
    return current_user_can( 'administrator' ) || current_user_can( 'aits_business' );
}

function as_get_dashboard_data( WP_REST_Request $request ) {
    global $wpdb;
    $table = $wpdb->prefix . 'aits_analytics_events';
    $user_id = get_current_user_id();
    
    // Admin sees all, business sees their own
    $where = current_user_can( 'administrator' ) ? '1=1' : $wpdb->prepare( 'user_id = %d', $user_id );
    
    // Simplified aggregation
    $results = $wpdb->get_results( "SELECT event_type, data_json, created_at FROM $table WHERE $where ORDER BY created_at DESC LIMIT 1000" );
    
    return rest_ensure_response( array( 'success' => true, 'events' => $results ) );
}
