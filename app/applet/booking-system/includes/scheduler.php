<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function bs_create_booking( $user_id, $service_type, $language, $booking_time ) {
    global $wpdb;
    
    // 1. Insert Booking
    $wpdb->insert( $wpdb->prefix . 'bs_bookings', [
        'user_id'      => $user_id,
        'service_type' => $service_type,
        'language'     => $language,
        'booking_time' => $booking_time,
        'status'       => 'unassigned'
    ]);
    
    $booking_id = $wpdb->insert_id;
    
    // 2. Automated Assignment (Logic Trigger)
    bs_auto_assign_interpreter( $booking_id, $language );
    
    return $booking_id;
}

function bs_auto_assign_interpreter( $booking_id, $language ) {
    // Search for available interpreter and update booking
    // This connects to the Interpretation/User management system
    global $wpdb;
    $wpdb->update( 
        $wpdb->prefix . 'bs_bookings', 
        ['status' => 'assigned', 'interpreter_id' => 1], // Simplified
        ['id' => $booking_id] 
    );
}
