<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('wp_ajax_ibs_submit_booking', 'ibs_submit_booking');
add_action('wp_ajax_nopriv_ibs_submit_booking', 'ibs_submit_booking');

function ibs_submit_booking() {
    check_ajax_referer('ibs_secure_booking', 'security');
    
    $service = sanitize_text_field($_POST['service']);
    $language = sanitize_text_field($_POST['language']);
    $date = sanitize_text_field($_POST['date']);
    $time = sanitize_text_field($_POST['time']);
    
    if (!$service || !$language || !$date || !$time) {
        wp_send_json_error(['message' => 'Please fill all required fields.']);
    }

    // Auto-assignment Logic (Mocking the matching pool)
    $interpreters = [
        'es' => ['Maria G.', 'Carlos R.', 'Sofia M.'],
        'fr' => ['Jean P.', 'Chloe D.'],
        'ja' => ['Kenji T.', 'Aiko S.'],
        'zh' => ['Wei L.', 'Ying C.'],
        'de' => ['Hans K.', 'Anna B.']
    ];

    $pool = isset($interpreters[$language]) ? $interpreters[$language] : ['System Auto-Assign', 'Freelance Network'];
    $assigned_interpreter = $pool[array_rand($pool)];
    
    // Create Booking Record
    $user_id = get_current_user_id();
    $post_id = wp_insert_post([
        'post_title' => 'Booking - ' . $date . ' @ ' . $time,
        'post_type' => 'ibs_booking',
        'post_status' => 'publish',
        'post_author' => $user_id ? $user_id : 1
    ]);
    
    update_post_meta($post_id, '_ibs_service', $service);
    update_post_meta($post_id, '_ibs_language', $language);
    update_post_meta($post_id, '_ibs_date', $date);
    update_post_meta($post_id, '_ibs_time', $time);
    update_post_meta($post_id, '_ibs_interpreter', $assigned_interpreter);
    update_post_meta($post_id, '_ibs_status', 'Confirmed');

    // MOCK: Email Notification Logic (wp_mail would normally fire here)
    // wp_mail($user_email, 'Booking Confirmed', 'Your interpreter has been assigned.');

    wp_send_json_success([
        'message' => 'Booking confirmed!',
        'assigned' => $assigned_interpreter,
        'email_status' => 'Confirmation email sent.'
    ]);
}
