<?php
// IP based login rate limiting
add_action( 'wp_login_failed', 'asa_record_failed_login' );
function asa_record_failed_login( $username ) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'asa_login_fail_' . md5($ip);
    $fails = get_transient( $transient_key ) ?: 0;
    set_transient( $transient_key, $fails + 1, 15 * MINUTE_IN_SECONDS );
}

add_filter( 'authenticate', 'asa_check_rate_limit', 1, 3 );
function asa_check_rate_limit( $user, $username, $password ) {
    $ip = $_SERVER['REMOTE_ADDR'];
    if ( get_transient( 'asa_login_fail_' . md5($ip) ) > 5 ) {
        return new WP_Error( 'too_many_attempts', 'Too many failed attempts.' );
    }
    return $user;
}
