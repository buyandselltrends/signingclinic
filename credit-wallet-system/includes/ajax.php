<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// We use "aits_credits" as the native meta key to seamlessly integrate with the AI Translation System!

add_action('wp_ajax_cws_process_payment', 'cws_process_payment');

function cws_process_payment() {
    check_ajax_referer('cws_secure_checkout', 'security');
    
    $user_id = get_current_user_id();
    if (!$user_id) wp_send_json_error(['message' => 'Must be logged in.']);

    $package = sanitize_text_field($_POST['package']);
    $gateway = sanitize_text_field($_POST['gateway']);
    
    // Package Data map
    $packages = [
        'small'  => ['credits' => 500, 'price' => 5.00],
        'medium' => ['credits' => 2000, 'price' => 18.00],
        'large'  => ['credits' => 5000, 'price' => 40.00]
    ];
    
    if(!isset($packages[$package])) {
        wp_send_json_error(['message' => 'Invalid package selected.']);
    }

    $credits_to_add = $packages[$package]['credits'];
    $price = $packages[$package]['price'];

    // Mock Gateway Logic
    sleep(1); // Simulate API latency
    if ($gateway === 'stripe' || $gateway === 'paypal' || $gateway === 'mobile_money') {
        $tx_id = strtoupper(uniqid('TXN_'));
        
        // Add credits
        $current_credits = (int) get_user_meta($user_id, 'aits_credits', true);
        update_user_meta($user_id, 'aits_credits', $current_credits + $credits_to_add);
        
        // Log transaction
        $post_id = wp_insert_post([
            'post_title' => 'Fund Addition - ' . $tx_id,
            'post_type' => 'cws_transaction',
            'post_status' => 'publish',
            'post_author' => $user_id
        ]);
        
        update_post_meta($post_id, '_cws_amount', $price);
        update_post_meta($post_id, '_cws_credits_added', $credits_to_add);
        update_post_meta($post_id, '_cws_gateway', $gateway);
        update_post_meta($post_id, '_cws_type', 'credit');

        wp_send_json_success([
            'message' => 'Payment successful! ' . $credits_to_add . ' credits added.',
            'new_balance' => $current_credits + $credits_to_add
        ]);
    }

    wp_send_json_error(['message' => 'Payment failed. Invalid gateway.']);
}

// Deduction Helper Function (For developers to hook into the wallet)
function cws_deduct_credits($user_id, $amount, $description) {
    $current = (int) get_user_meta($user_id, 'aits_credits', true);
    if ($current >= $amount) {
        update_user_meta($user_id, 'aits_credits', $current - $amount);
        
        // Log deduction
        $post_id = wp_insert_post([
            'post_title' => 'Usage Deduction - ' . strtoupper(uniqid()),
            'post_type' => 'cws_transaction',
            'post_status' => 'publish',
            'post_author' => $user_id
        ]);
        update_post_meta($post_id, '_cws_amount', 0);
        update_post_meta($post_id, '_cws_credits_deducted', $amount);
        update_post_meta($post_id, '_cws_type', 'debit');
        update_post_meta($post_id, '_cws_description', $description);
        
        return true;
    }
    return false;
}
