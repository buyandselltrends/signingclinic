<?php
/**
 * Plugin Name: Automation Workflow Engine
 * Description: Automates assignments, invoicing, order fulfillment, and notifications.
 * Version: 1.0.0
 * Author: AI Dev
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Auto-Assign Translator
add_action( 'aits_translation_order_created', 'awe_auto_assign_translator', 10, 1 );
function awe_auto_assign_translator( $order_id ) {
    // Integrate with intelligent matching engine (e.g., ibs_match_translator)
    do_action( 'ibs_match_translator', $order_id );
}

// 2. Auto-Send Invoice (On Order Completion)
add_action( 'aits_translation_order_completed', 'awe_auto_send_invoice', 10, 1 );
function awe_auto_send_invoice( $order_id ) {
    // Trigger notification system with invoice data
    $invoice_data = apply_filters( 'aits_get_invoice_data', array(), $order_id );
    do_action( 'aits_send_notification', get_post_field( 'post_author', $order_id ), 'invoice', $invoice_data );
}

// 3. Auto-Complete (Cron)
if ( ! wp_next_scheduled( 'awe_process_auto_completions' ) ) {
    wp_schedule_event( time(), 'hourly', 'awe_process_auto_completions' );
}
add_action( 'awe_process_auto_completions', 'awe_handle_auto_completions' );
function awe_handle_auto_completions() {
    global $wpdb;
    // Find sessions older than X hours that haven't been completed
    $stale_jobs = $wpdb->get_results( "SELECT id FROM {$wpdb->prefix}aits_jobs WHERE status = 'in_progress' AND updated_at < NOW() - INTERVAL 24 HOUR" );
    foreach ( $stale_jobs as $job ) {
        do_action( 'aits_complete_order', $job->id );
    }
}

// 4. Auto-Reminders (Cron)
if ( ! wp_next_scheduled( 'awe_process_reminders' ) ) {
    wp_schedule_event( time(), 'daily', 'awe_process_reminders' );
}
add_action( 'awe_process_reminders', 'awe_send_reminders' );
function awe_send_reminders() {
    // Find unassigned jobs or upcoming interpretations and nudge users
    do_action( 'aits_send_notification', 'all', 'reminder', array( 'message' => 'Pending actions require your attention.' ) );
}
