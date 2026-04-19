<?php
/**
 * Plugin Name: Booking System
 * Description: Manages scheduling of interpretation sessions and auto-assignment.
 * Version: 1.0.0
 * Author: AI Dev
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'BS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Database setup for Bookings
register_activation_hook( __FILE__, 'bs_activate' );
function bs_activate() {
    global $wpdb;
    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}bs_bookings (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        interpreter_id bigint(20) DEFAULT NULL,
        service_type varchar(50) NOT NULL,
        language varchar(50) NOT NULL,
        booking_time datetime NOT NULL,
        status varchar(20) DEFAULT 'unassigned',
        PRIMARY KEY  (id)
    ) {$wpdb->get_charset_collate()};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

require_once BS_PLUGIN_DIR . 'includes/scheduler.php';
