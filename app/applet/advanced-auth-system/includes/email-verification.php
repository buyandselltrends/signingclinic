<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Require email verification on registration
add_action( 'user_register', 'aas_send_verification_email' );
function aas_send_verification_email( $user_id ) {
    $user_info = get_userdata( $user_id );
    $verification_code = wp_generate_password( 20, false );
    update_user_meta( $user_id, 'aas_verification_code', $verification_code );
    update_user_meta( $user_id, 'aas_is_verified', 0 );
    
    $verify_url = add_query_arg( array(
        'action' => 'verify_email',
        'code' => $verification_code,
        'user' => $user_id
    ), home_url( '/verify-email' ) ); // Mapped to the page template generated
    
    $subject = 'Verify Your Email Address';
    $message = "Welcome to AI Translate Pro!\n\nPlease click the link below to verify your email address:\n" . $verify_url;
    
    wp_mail( $user_info->user_email, $subject, $message );
}

// Handle Verification
add_action( 'init', 'aas_handle_email_verification' );
function aas_handle_email_verification() {
    if ( isset( $_GET['action'] ) && $_GET['action'] === 'verify_email' && isset( $_GET['code'], $_GET['user'] ) ) {
        $user_id = intval( $_GET['user'] );
        $code = sanitize_text_field( $_GET['code'] );
        
        $saved_code = get_user_meta( $user_id, 'aas_verification_code', true );
        
        if ( $saved_code && $saved_code === $code ) {
            update_user_meta( $user_id, 'aas_is_verified', 1 );
            delete_user_meta( $user_id, 'aas_verification_code' );
            
            // Redirect to dashboard with success message
            wp_redirect( home_url( '/login?verified=true' ) );
            exit;
        }
    }
}

// Prevent login if not verified
add_filter( 'authenticate', 'aas_check_email_verification', 30, 3 );
function aas_check_email_verification( $user, $username, $password ) {
    if ( is_wp_error( $user ) || empty( $user ) ) {
        return $user;
    }
    
    $is_verified = get_user_meta( $user->ID, 'aas_is_verified', true );
    
    if ( $is_verified !== '' && intval( $is_verified ) === 0 ) {
        return new WP_Error( 'not_verified', __( 'Your email address has not been verified. Please check your inbox.' ) );
    }
    
    return $user;
}
