<?php
// Hook login to verify 2FA
add_filter( 'authenticate', 'asa_two_factor_auth_check', 100, 3 );
function asa_two_factor_auth_check( $user, $username, $password ) {
    if ( is_wp_error( $user ) || ! $user instanceof WP_User ) return $user;
    
    // Check if 2FA enabled
    if ( get_user_meta( $user->ID, '_asa_2fa_enabled', true ) ) {
        // Here you would check for a submitted OTP from request
        if ( ! isset( $_POST['otp_code'] ) || ! asa_verify_otp( $user->ID, $_POST['otp_code'] ) ) {
            return new WP_Error( '2fa_required', '2FA code required.' );
        }
    }
    return $user;
}
