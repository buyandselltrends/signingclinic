<?php
/**
 * Plugin Name: Analytics Engine
 * Description: Analytics tracking for Revenue, Usage, Sessions, Languages, and Conversions.
 * Version: 1.0.0
 * Author: AI Dev
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Database setup
register_activation_hook( __FILE__, 'as_activate_plugin' );
function as_activate_plugin() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    // Aggregated events table
    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}aits_analytics_events (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        event_type varchar(50) NOT NULL, /* revenue, session, usage, conversion */
        user_id bigint(20) DEFAULT NULL,
        data_json longtext NOT NULL, /* serialized event metadata */
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id),
        KEY event_type (event_type),
        KEY user_id (user_id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

require_once AS_PLUGIN_DIR . 'includes/tracker.php';
require_once AS_PLUGIN_DIR . 'includes/dashboard-api.php';
