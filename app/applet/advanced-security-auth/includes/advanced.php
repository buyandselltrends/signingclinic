<?php
// Simple 2FA verify stub
function asa_verify_otp( $user_id, $code ) {
    // Production: Use library like PHPGangsta_GoogleAuthenticator
    $secret = get_user_meta( $user_id, '_asa_2fa_secret', true );
    return $code === '123456'; // Dummy check
}

// Ensure specific roles have specific capabilities
add_filter( 'user_has_cap', 'asa_map_role_capabilities', 10, 3 );
function asa_map_role_capabilities( $allcaps, $caps, $args ) {
    if ( ! isset( $args[1] ) ) return $allcaps;
    $user_id = $args[1];
    $user = get_userdata( $user_id );
    
    if ( in_array( 'translator', (array) $user->roles ) ) {
        $allcaps['manage_translations'] = true;
    }
    return $allcaps;
}
