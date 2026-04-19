<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode('hts_order_form', 'hts_render_order_form');

function hts_render_order_form() {
    ob_start();
    ?>
    <div class="hts-container">
        <h3>Request Human Translation</h3>
        <form id="hts-form" class="hts-form">
            <div class="hts-group">
                <label>Upload Document (PDF/DOCX)</label>
                <input type="file" id="hts-file" accept=".pdf,.doc,.docx" required>
                <small class="hts-hint">Word count will be estimated automatically.</small>
            </div>
            
            <div class="hts-row">
                <div class="hts-group">
                    <label>Source Language</label>
                    <select id="hts-source"><option>English</option><option>Spanish</option></select>
                </div>
                <div class="hts-group">
                    <label>Target Language</label>
                    <select id="hts-target"><option>Spanish</option><option>Japanese</option><option>French</option></select>
                </div>
            </div>

            <div class="hts-group">
                <label>Service Type</label>
                <select id="hts-service">
                    <option value="standard" data-rate="0.10">Standard Translation ($0.10/word)</option>
                    <option value="technical" data-rate="0.15">Technical Translation ($0.15/word)</option>
                    <option value="hybrid" data-rate="0.08">AI + Human Hybrid ($0.08/word)</option>
                    <option value="localization" data-rate="0.20">Full Localization ($0.20/word)</option>
                </select>
            </div>

            <div class="hts-group hts-flex-check">
                <input type="checkbox" id="hts-express" value="1.5">
                <label for="hts-express">Express Delivery (1.5x price)</label>
            </div>

            <div class="hts-estimator">
                <h4>Pricing Estimator</h4>
                <div class="hts-est-row"><span>Estimated Words:</span> <strong id="hts-words">0</strong></div>
                <div class="hts-est-row"><span>Price per Word:</span> <strong id="hts-rate">$0.00</strong></div>
                <hr>
                <div class="hts-est-total"><span>Total Estimate:</span> <strong id="hts-total">$0.00</strong></div>
                <small>(Minimum charge is $20.00)</small>
            </div>

            <button type="submit" class="hts-submit">Submit Order & Pay</button>
            <div id="hts-status"></div>
        </form>
    </div>
    <?php
    return ob_get_clean();
}

add_action('wp_ajax_hts_submit_order', 'hts_submit_order');
add_action('wp_ajax_nopriv_hts_submit_order', 'hts_submit_order');

function hts_submit_order() {
    // Generate Order Post
    $order_id = wp_insert_post([
        'post_title' => 'Order - ' . date('Y-m-d H:i:s'),
        'post_type' => 'hts_order',
        'post_status' => 'publish'
    ]);

    $price = sanitize_text_field($_POST['price']);
    update_post_meta($order_id, '_hts_price', $price);
    update_post_meta($order_id, '_hts_status', 'pending');
    update_post_meta($order_id, '_hts_service', sanitize_text_field($_POST['service']));

    wp_send_json_success(['message' => 'Order placed successfully! We will email you shortly.']);
}
