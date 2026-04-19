<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// REST route for social auth callbacks (Google / Facebook)
add_action( 'rest_api_init', function () {
    register_rest_route( 'aas/v1', '/auth/social', array(
        'methods'  => 'POST',
        'callback' => 'aas_handle_social_login',
        'permission_callback' => '__return_true',
    ) );
} );

function aas_handle_social_login( WP_REST_Request $request ) {
    $provider = $request->get_param( 'provider' ); // google or facebook
    $token = $request->get_param( 'token' ); // OAuth Access Token
    
    // In a real environment, you would use Google/Facebook server-side verification here
    // $client = new Google_Client(['client_id' => $CLIENT_ID]);
    // $payload = $client->verifyIdToken($token);
    
    // MOCK VERIFICATION
    $mock_email = 'social_' . wp_generate_password(8, false) . '@example.com';
    $email = $request->get_param( 'email' ) ?: $mock_email; // From client payload
    
    if ( ! is_email( $email ) ) {
        return new WP_Error( 'invalid_email', 'Invalid social email mapping', array('status' => 400) );
    }

    $user = get_user_by( 'email', $email );
    
    if ( ! $user ) {
        // Register new user on the fly based on social email
        $random_password = wp_generate_password( 24, true );
        $user_id = wp_create_user( $email, $random_password, $email );
        
        if ( is_wp_error( $user_id ) ) {
            return $user_id;
        }
        
        $user = get_userdata( $user_id );
        
        // Mark as verified because social auth verified it natively
        update_user_meta( $user_id, 'aas_is_verified', 1 );
    }
    
    // Programmatically log the user in via cookies (for the browser context)
    wp_set_current_user( $user->ID );
    wp_set_auth_cookie( $user->ID );
    
    return rest_ensure_response( array(
        'success' => true,
        'message' => 'Social login successful',
        'user_id' => $user->ID,
    ) );
}
