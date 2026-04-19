<?php
/**
 * Plugin Name: Developer API System
 * Description: Monetized Developer API with Key Management, Usage Tracking, and Rate Limiting.
 * Version: 1.0.0
 * Author: AI Dev
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'DEV_API_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Database setup for API Keys
register_activation_hook( __FILE__, 'dev_api_activate_plugin' );
function dev_api_activate_plugin() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    // Table for API Keys
    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}aits_api_keys (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        api_key varchar(64) NOT NULL,
        status varchar(20) DEFAULT 'active' NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id),
        UNIQUE KEY api_key (api_key)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

require_once DEV_API_PLUGIN_DIR . 'includes/keys.php';
require_once DEV_API_PLUGIN_DIR . 'includes/endpoints.php';
require_once DEV_API_PLUGIN_DIR . 'includes/billing.php';
