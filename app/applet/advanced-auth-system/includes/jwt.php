<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Simple REST endpoint to acquire JWT auth token
add_action( 'rest_api_init', function () {
    register_rest_route( 'aas/v1', '/auth/token', array(
        'methods'  => 'POST',
        'callback' => 'aas_generate_jwt_token',
        'permission_callback' => '__return_true',
    ) );
} );

function aas_generate_jwt_token( WP_REST_Request $request ) {
    $username = $request->get_param( 'username' );
    $password = $request->get_param( 'password' );
    
    // Check credentials
    $user = wp_authenticate( $username, $password );
    
    if ( is_wp_error( $user ) ) {
        return new WP_Error( 'invalid_credentials', $user->get_error_message(), array( 'status' => 403 ) );
    }
    
    $secret = get_option( 'aas_jwt_secret' );
    $issuedAt   = time();
    $expire     = $issuedAt + ( DAY_IN_SECONDS * 7 ); // Token valid for 7 days
    
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $payload = json_encode([
        'iat'  => $issuedAt,
        'iss'  => home_url(),
        'exp'  => $expire,
        'data' => [
            'user_id' => $user->ID,
            'email'   => $user->user_email
        ]
    ]);
    
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    
    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    
    return rest_ensure_response( array(
        'token' => $jwt,
        'user_id' => $user->ID,
        'roles' => $user->roles
    ) );
}

// Middleware to decode JWT if provided in Bearer token (Simulated auth injection)
add_filter( 'determine_current_user', 'aas_jwt_determine_current_user', 10 );
function aas_jwt_determine_current_user( $user_id ) {
    if ( ! empty( $_SERVER['HTTP_AUTHORIZATION'] ) ) {
        if ( preg_match( '/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches ) ) {
            $token = $matches[1];
            $parts = explode( '.', $token );
            if ( count( $parts ) === 3 ) {
                $secret = get_option( 'aas_jwt_secret' );
                $signature = hash_hmac( 'sha256', $parts[0] . "." . $parts[1], $secret, true );
                $base64UrlSignature = str_replace( ['+', '/', '='], ['-', '_', ''], base64_encode( $signature ) );
                
                if ( hash_equals( $base64UrlSignature, $parts[2] ) ) {
                    $payload = json_decode( base64_decode( $parts[1] ) );
                    if ( isset( $payload->exp ) && $payload->exp > time() ) {
                        return intval( $payload->data->user_id );
                    }
                }
            }
        }
    }
    return $user_id;
}
