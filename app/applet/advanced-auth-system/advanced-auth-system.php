<?php
/**
 * Plugin Name: Advanced Authentication System
 * Description: JWT, Social Login, 2FA, Email Verification, Rate Limiting, and RBAC for AI Translation Platform.
 * Version: 1.0.0
 * Author: AI Dev
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AAS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AAS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Includes
require_once AAS_PLUGIN_DIR . 'includes/security.php';
require_once AAS_PLUGIN_DIR . 'includes/email-verification.php';
require_once AAS_PLUGIN_DIR . 'includes/2fa.php';
require_once AAS_PLUGIN_DIR . 'includes/jwt.php';
require_once AAS_PLUGIN_DIR . 'includes/social-login.php';
require_once AAS_PLUGIN_DIR . 'includes/rbac.php';

// Plugin Activation Hook
register_activation_hook( __FILE__, 'aas_activate_plugin' );
function aas_activate_plugin() {
    // Generate JWT Secret if not exists
    if ( ! get_option( 'aas_jwt_secret' ) ) {
        update_option( 'aas_jwt_secret', wp_generate_password( 64, true, true ) );
    }
    
    // Set up roles
    aas_setup_roles();
}
