<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Ensure the application roles exist natively inside WordPress
function aas_setup_roles() {
    // 1. Customer mapping
    add_role( 'aits_customer', 'Customer', array(
        'read' => true,
        'buy_credits' => true,
        'request_translation' => true
    ) );
    
    // 2. Translator mapping
    add_role( 'aits_translator', 'Translator', array(
        'read' => true,
        'accept_jobs' => true,
        'upload_deliverables' => true
    ) );
    
    // 3. Interpreter mapping
    add_role( 'aits_interpreter', 'Interpreter', array(
        'read' => true,
        'accept_calls' => true,
        'set_availability' => true
    ) );
    
    // 4. Business Client mapping (Enterprise feature)
    add_role( 'aits_business', 'Business Client', array(
        'read' => true,
        'manage_team' => true,
        'view_reports' => true,
        'buy_credits' => true,
        'request_translation' => true
    ) );
}

// Global API capability check wrapper
function aas_user_can( $user_id, $capability ) {
    $user = get_userdata( $user_id );
    if ( ! $user ) {
        return false;
    }
    return $user->has_cap( $capability ) || $user->has_cap( 'administrator' );
}

// Auto-assign roles based on Registration path
add_action( 'user_register', 'aas_assign_custom_role' );
function aas_assign_custom_role( $user_id ) {
    // Determine the intended role from the POST payload if registering via our custom SaaS UI
    if ( isset( $_POST['account_type'] ) ) {
        $allowed_roles = array( 'aits_customer', 'aits_translator', 'aits_interpreter', 'aits_business' );
        $requested_role = sanitize_text_field( $_POST['account_type'] );
        
        if ( in_array( $requested_role, $allowed_roles ) ) {
            $user = new WP_User( $user_id );
            
            // Remove the default subscriber role
            $user->remove_role( 'subscriber' );
            
            // Add the designated role
            $user->add_role( $requested_role );
        }
    }
}
