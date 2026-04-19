<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('wp_ajax_tm_post_job', 'tm_post_job');
add_action('wp_ajax_tm_accept_job', 'tm_accept_job');
add_action('wp_ajax_tm_submit_review', 'tm_submit_review');

function tm_post_job() {
    check_ajax_referer('tm_secure_action', 'security');
    
    $title = sanitize_text_field($_POST['title']);
    $desc = sanitize_textarea_field($_POST['desc']);
    $budget = floatval($_POST['budget']);
    $lang = sanitize_text_field($_POST['language']);
    
    if (!$title || !$budget) wp_send_json_error(['message' => 'Missing fields']);

    $post_id = wp_insert_post([
        'post_title' => $title,
        'post_content' => $desc,
        'post_type' => 'tm_job',
        'post_status' => 'publish',
        'post_author' => get_current_user_id() ?: 1
    ]);

    update_post_meta($post_id, '_tm_budget', $budget);
    update_post_meta($post_id, '_tm_language', $lang);
    update_post_meta($post_id, '_tm_status', 'open');

    wp_send_json_success(['message' => 'Job posted successfully to the marketplace!']);
}

function tm_accept_job() {
    check_ajax_referer('tm_secure_action', 'security');
    
    $job_id = intval($_POST['job_id']);
    // In reality, this would bind the current user. Using a simulated freelancer tag.
    $user_name = "ProLinguist_" . rand(10,99);

    update_post_meta($job_id, '_tm_freelancer', $user_name);
    update_post_meta($job_id, '_tm_status', 'progress');

    wp_send_json_success(['message' => 'Successfully bonded to job. Contract started!']);
}

function tm_submit_review() {
    check_ajax_referer('tm_secure_action', 'security');
    
    $job_id = intval($_POST['job_id']);
    $rating = intval($_POST['rating']);
    
    update_post_meta($job_id, '_tm_status', 'completed');
    update_post_meta($job_id, '_tm_rating', $rating);

    // Compute Commission
    $budget = (float) get_post_meta($job_id, '_tm_budget', true);
    $fee = $budget * 0.15;
    $freelancer_pay = $budget - $fee;

    // Here we would sync with Custom Wallet system: `cws_deduct_credits` / add funds.

    wp_send_json_success([
        'message' => 'Job completed. You rated ' . $rating . ' stars.',
        'freelancer_net' => number_format($freelancer_pay, 2)
    ]);
}
