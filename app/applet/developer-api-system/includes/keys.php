<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Generate API key
function dev_api_generate_key( $user_id ) {
    $key = wp_generate_password( 64, true, true );
    global $wpdb;
    $wpdb->insert(
        $wpdb->prefix . 'aits_api_keys',
        array( 'user_id' => $user_id, 'api_key' => hash('sha256', $key) )
    );
    return $key;
}

// Authenticate API Request
function dev_api_authenticate_request( $request ) {
    $provided_key = $request->get_header( 'X-API-KEY' );
    if ( ! $provided_key ) return false;
    
    global $wpdb;
    $hashed_key = hash('sha256', $provided_key);
    $user_id = $wpdb->get_var( $wpdb->prepare( "SELECT user_id FROM {$wpdb->prefix}aits_api_keys WHERE api_key = %s AND status = 'active'", $hashed_key ) );
    
    return $user_id ?: false;
}
