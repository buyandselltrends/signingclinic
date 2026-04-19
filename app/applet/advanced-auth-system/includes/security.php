<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Login Rate Limiting
add_filter( 'authenticate', 'aas_check_login_rate_limit', 10, 3 );
function aas_check_login_rate_limit( $user, $username, $password ) {
    if ( is_wp_error( $user ) ) {
        return $user; // Already failed validation
    }
    
    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'aas_login_attempts_' . md5( $ip );
    $attempts = get_transient( $transient_key ) ?: 0;
    
    if ( $attempts >= 5 ) {
        return new WP_Error( 'too_many_retries', __( 'Too many failed login attempts. Please try again after 15 minutes.' ) );
    }
    
    return $user;
}

add_action( 'wp_login_failed', 'aas_log_failed_login' );
function aas_log_failed_login( $username ) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'aas_login_attempts_' . md5( $ip );
    $attempts = get_transient( $transient_key ) ?: 0;
    set_transient( $transient_key, $attempts + 1, 15 * MINUTE_IN_SECONDS );
}

// Reset attempts on successful login
add_action( 'wp_login', 'aas_reset_login_attempts', 10, 2 );
function aas_reset_login_attempts( $user_login, $user ) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'aas_login_attempts_' . md5( $ip );
    delete_transient( $transient_key );
}

// CAPTCHA Validation Placeholder
// add_action( 'login_form', 'aas_render_captcha' );
// add_filter( 'authenticate', 'aas_verify_captcha', 20, 3 );

// Enforce strong passwords during registration
add_action( 'user_profile_update_errors', 'aas_validate_strong_password', 10, 3 );
function aas_validate_strong_password( $errors, $update, $user ) {
    if ( ! empty( $_POST['pass1'] ) ) {
        $password = $_POST['pass1'];
        if ( strlen( $password ) < 8 || ! preg_match( '#[0-9]#', $password ) || ! preg_match( '#[a-zA-Z]#', $password ) ) {
            $errors->add( 'pass', __( '<strong>ERROR</strong>: Password must be at least 8 characters long and contain letters and numbers.' ) );
        }
    }
}
