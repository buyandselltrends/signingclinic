<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function tm_add_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=tm_job',
        'Marketplace Settings & Commissions',
        'Marketplace Settings',
        'manage_options',
        'tm-marketplace-settings',
        'tm_render_settings_page'
    );
}
add_action( 'admin_menu', 'tm_add_admin_menu' );

function tm_render_settings_page() {
    // Determine stats
    $jobs = get_posts([
        'post_type' => 'tm_job',
        'numberposts' => -1,
        'post_status' => 'publish'
    ]);
    
    $total_value = 0;
    $platform_profit = 0;
    foreach($jobs as $job) {
        $budget = (float) get_post_meta($job->ID, '_tm_budget', true);
        if(get_post_meta($job->ID, '_tm_status', true) === 'completed') {
            $total_value += $budget;
            $platform_profit += ($budget * 0.15); // 15% commission
        }
    }
    
    ?>
    <div class="wrap">
        <h1>Marketplace Global Settings</h1>
        <p>Manage platform fees, review disputes, and monitor ecosystem liquidity connecting clients and freelancers.</p>

        <div style="display:flex; gap: 20px; margin-top:20px;">
            <div style="background:#fff; padding:20px; border:1px solid #ccc; flex:1;">
                <h3 style="margin-top:0;">Platform Commission Rate</h3>
                <input type="number" value="15" style="width:80px;" disabled> %
                <p style="font-size:12px; color:#666;">Deducted securely automatically via the Wallet system when jobs clear.</p>
            </div>
            <div style="background:#fff; padding:20px; border:1px solid #ccc; flex:1;">
                <h3 style="margin-top:0;">Ledger Value (Completed Jobs)</h3>
                <h2 style="margin:0; color:#2271b1;">$<?php echo number_format($total_value, 2); ?></h2>
            </div>
            <div style="background:#fff; padding:20px; border:1px solid #ccc; flex:1;">
                <h3 style="margin-top:0;">Gross Platform Revenue</h3>
                <h2 style="margin:0; color:#0f9d58;">$<?php echo number_format($platform_profit, 2); ?></h2>
            </div>
        </div>

        <table class="wp-list-table widefat fixed striped" style="margin-top: 30px;">
            <thead>
                <tr>
                    <th>Job Post</th>
                    <th>Client Budget</th>
                    <th>Status</th>
                    <th>Assigned Freelancer</th>
                    <th>Platform Fee (15%)</th>
                </tr>
            </thead>
            <tbody>
                <?php if($jobs): foreach($jobs as $job): 
                    $budget = get_post_meta($job->ID, '_tm_budget', true) ?: '0.00';
                    $status = get_post_meta($job->ID, '_tm_status', true) ?: 'open';
                    $freelancer = get_post_meta($job->ID, '_tm_freelancer', true) ?: 'Nobody';
                    $fee = number_format((float)$budget * 0.15, 2);
                ?>
                <tr>
                    <td><strong><?php echo esc_html($job->post_title); ?></strong></td>
                    <td>$<?php echo esc_html($budget); ?></td>
                    <td>
                        <?php if($status === 'open') echo '<span style="color:#b45309; font-weight:bold;">Open / Bidding</span>'; ?>
                        <?php if($status === 'progress') echo '<span style="color:#1d4ed8; font-weight:bold;">In Progress</span>'; ?>
                        <?php if($status === 'completed') echo '<span style="color:#047857; font-weight:bold;">Completed</span>'; ?>
                    </td>
                    <td><?php echo esc_html($freelancer); ?></td>
                    <td>$<?php echo esc_html($fee); ?></td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5">No active jobs in the marketplace right now.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
