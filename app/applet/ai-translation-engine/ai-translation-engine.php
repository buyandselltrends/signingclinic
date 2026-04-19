<?php
/**
 * Plugin Name: AI Translation Engine
 * Description: AI-powered text and file translation with integrated credit billing.
 * Version: 1.0.0
 * Author: AI Dev
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AITE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Database setup for History
register_activation_hook( __FILE__, 'aite_activate' );
function aite_activate() {
    global $wpdb;
    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}aite_history (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        input text NOT NULL,
        output text NOT NULL,
        PRIMARY KEY  (id)
    ) {$wpdb->get_charset_collate()};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

require_once AITE_PLUGIN_DIR . 'includes/engine.php';
require_once AITE_PLUGIN_DIR . 'includes/file-processor.php';
