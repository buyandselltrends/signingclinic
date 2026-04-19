<?php
/**
 * Plugin Name: Advanced Security & Auth Engine
 * Description: Secure authentication, 2FA, rate limiting, and RBAC enforcement.
 * Version: 1.0.0
 * Author: AI Dev
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'ASA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Add Roles on activation
register_activation_hook( __FILE__, 'asa_add_roles' );
function asa_add_roles() {
    add_role('translator', 'Translator', ['read' => true]);
    add_role('interpreter', 'Interpreter', ['read' => true]);
    add_role('business_client', 'Business Client', ['read' => true]);
}

require_once ASA_PLUGIN_DIR . 'includes/auth.php';
require_once ASA_PLUGIN_DIR . 'includes/security.php';
require_once ASA_PLUGIN_DIR . 'includes/advanced.php';
