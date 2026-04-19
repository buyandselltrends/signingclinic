<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode('cws_wallet_dashboard', 'cws_render_dashboard');

function cws_render_dashboard() {
    $user_id = get_current_user_id();
    if (!$user_id) return '<p>Please log in to access your wallet.</p>';

    $balance = (int) get_user_meta($user_id, 'aits_credits', true);
    
    // Get transaction history
    $transactions = get_posts([
        'post_type' => 'cws_transaction',
        'author' => $user_id,
        'numberposts' => 10,
        'orderby' => 'date',
        'order' => 'DESC'
    ]);

    ob_start();
    ?>
    <div class="cws-container">
        <!-- Balance Header -->
        <div class="cws-header">
            <div>
                <h3 style="margin:0; color:#fff;">Available Balance</h3>
                <h1 style="margin:5px 0 0 0; color:#fff; font-size:36px;"><span id="cws-bal-display"><?php echo esc_html($balance); ?></span> <span style="font-size:16px; font-weight:normal;">Credits</span></h1>
            </div>
            <div class="cws-icon">💰</div>
        </div>

        <!-- Add Funds Sections -->
        <div class="cws-section">
            <h4>Add Funds</h4>
            <div class="cws-packages">
                <div class="cws-pkg cws-pkg-small" data-pkg="small">
                    <h5>Starter Pack</h5>
                    <div class="cws-pkg-cr">500 Credits</div>
                    <div class="cws-pkg-pr">GHS 100.00 <span style="font-size:10px; opacity:0.6;">($5.00)</span></div>
                </div>
                <div class="cws-pkg cws-pkg-med active" data-pkg="medium">
                    <div class="cws-popular">Most Popular</div>
                    <h5>Pro Pack</h5>
                    <div class="cws-pkg-cr">2,000 Credits</div>
                    <div class="cws-pkg-pr">GHS 360.00 <span style="font-size:10px; opacity:0.6;">($18.00)</span></div>
                </div>
                <div class="cws-pkg cws-pkg-large" data-pkg="large">
                    <h5>Enterprise Pack</h5>
                    <div class="cws-pkg-cr">5,000 Credits</div>
                    <div class="cws-pkg-pr">GHS 800.00 <span style="font-size:10px; opacity:0.6;">($40.00)</span></div>
                </div>
            </div>

            <h4 style="margin-top:20px;">Secure Payment Method</h4>
            <div class="cws-gateways">
                <label class="cws-radio-btn"><input type="radio" name="cws_gateway" value="stripe" checked> <span>💳 Credit Card (Stripe)</span></label>
                <label class="cws-radio-btn"><input type="radio" name="cws_gateway" value="paypal"> <span>🔵 PayPal</span></label>
                <label class="cws-radio-btn"><input type="radio" name="cws_gateway" value="mobile_money"> <span>📱 Mobile Money (M-Pesa/MTN)</span></label>
            </div>

            <button id="cws-checkout-btn" class="cws-btn">Complete Secure Checkout</button>
            <div id="cws-checkout-msg"></div>
        </div>

        <!-- History -->
        <div class="cws-section">
            <h4>Recent Transactions</h4>
            <table class="cws-table" style="width:100%; border-collapse:collapse;">
                <thead><tr style="border-bottom:1px solid #e5e7eb;"><th style="padding:10px;text-align:left;">Date</th><th style="padding:10px;text-align:left;">Type</th><th style="padding:10px;text-align:left;">Details</th></tr></thead>
                <tbody>
                    <?php if($transactions): foreach($transactions as $tx): 
                        $type = get_post_meta($tx->ID, '_cws_type', true);
                        $amt = get_post_meta($tx->ID, '_cws_amount', true);
                        $cr_add = get_post_meta($tx->ID, '_cws_credits_added', true);
                        $cr_ded = get_post_meta($tx->ID, '_cws_credits_deducted', true);
                    ?>
                    <tr style="border-bottom:1px solid #f3f4f6;">
                        <td style="padding:12px 10px; font-size:14px; color:#6b7280;"><?php echo get_the_date('M j, y', $tx->ID); ?></td>
                        <td style="padding:12px 10px;">
                            <?php if($type === 'credit'): ?>
                                <span style="display:inline-flex; align-items:center; gap:5px; background:#dcfce7; color:#166534; padding:4px 8px; border-radius:9999px; font-size:12px; font-weight:600;">
                                    <span>↗️</span> +<?php echo esc_html($cr_add); ?> Cr
                                </span>
                            <?php else: ?>
                                <span style="display:inline-flex; align-items:center; gap:5px; background:#fee2e2; color:#991b1b; padding:4px 8px; border-radius:9999px; font-size:12px; font-weight:600;">
                                    <span>↘️</span> -<?php echo esc_html($cr_ded); ?> Cr
                                </span>
                            <?php endif; ?>
                        </td>
                        <td style="padding:12px 10px; font-size:14px; color:#374151;">
                            <?php if($type === 'credit'): ?>
                                💳 Funded via <?php echo esc_html(ucfirst(get_post_meta($tx->ID, '_cws_gateway', true))); ?>
                            <?php else: ?>
                                🤖 <?php echo esc_html(get_post_meta($tx->ID, '_cws_description', true)); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td colspan="3" style="padding:15px; text-align:center; color:#6b7280;">No transactions found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
