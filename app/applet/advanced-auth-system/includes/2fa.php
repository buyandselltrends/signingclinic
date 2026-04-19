<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Intercept successful login for 2FA verification
add_filter( 'authenticate', 'aas_enforce_2fa', 40, 3 );
function aas_enforce_2fa( $user, $username, $password ) {
    if ( is_wp_error( $user ) || empty( $user ) ) {
        return $user;
    }
    
    // Check if user has 2FA enabled
    $is_2fa_enabled = get_user_meta( $user->ID, 'aas_2fa_enabled', true );
    
    if ( $is_2fa_enabled ) {
        // Generate a 6-digit code
        $code = rand( 100000, 999999 );
        update_user_meta( $user->ID, 'aas_2fa_code', $code );
        
        // Send email (in production, use SMS or TOTP)
        wp_mail( $user->user_email, 'Your Login Code', "Your code is: $code" );
        
        // Store user ID in session transient temporarily
        $session_token = wp_generate_password( 32, false );
        set_transient( 'aas_2fa_session_' . $session_token, $user->ID, 5 * MINUTE_IN_SECONDS );
        
        // Redirect to 2FA page instead of logging in natively
        // As a filter, returning an error blocks the native login. The frontend must catch 'requires_2fa'
        return new WP_Error( 'requires_2fa', __( 'Two-factor authentication code sent.' ), array( 'session_token' => $session_token ) );
    }
    
    return $user;
}

// Setup user profile field for 2FA
add_action( 'show_user_profile', 'aas_2fa_profile_fields' );
add_action( 'edit_user_profile', 'aas_2fa_profile_fields' );
function aas_2fa_profile_fields( $user ) {
    $is_enabled = get_user_meta( $user->ID, 'aas_2fa_enabled', true );
    ?>
    <h3>Advanced Authentication</h3>
    <table class="form-table">
        <tr>
            <th><label for="aas_2fa_enabled">Two-Factor Authentication (Email)</label></th>
            <td>
                <input type="checkbox" name="aas_2fa_enabled" id="aas_2fa_enabled" value="1" <?php checked( $is_enabled, 1 ); ?> />
                <span class="description">Require a code sent to your email to login.</span>
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'aas_save_2fa_profile_fields' );
add_action( 'edit_user_profile_update', 'aas_save_2fa_profile_fields' );
function aas_save_2fa_profile_fields( $user_id ) {
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'aas_2fa_enabled', isset( $_POST['aas_2fa_enabled'] ) ? 1 : 0 );
}
