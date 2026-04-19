<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('admin_menu', function() {
    add_menu_page(
        'Platform Analytics',
        'Global Analytics',
        'manage_options',
        'gad-admin-dashboard',
        'gad_render_admin_dashboard',
        'dashicons-chart-area',
        3
    );
});

function gad_render_admin_dashboard() {
    // Quick mock metrics
    $total_users = count_users()['total_users'];
    
    // Fetch all wallet deposits
    $txs = get_posts(['post_type' => 'cws_transaction', 'numberposts' => -1]);
    $total_revenue = 0;
    foreach($txs as $tx) {
        if(get_post_meta($tx->ID, '_cws_type', true) === 'credit') {
            $total_revenue += (float) get_post_meta($tx->ID, '_cws_amount', true);
        }
    }
    
    ?>
    <div class="wrap gad-admin-wrap">
        <h1 class="gad-admin-title">Global Platform Analytics</h1>
        
        <!-- Top Metrics -->
        <div class="gad-grid-4">
            <div class="gad-admin-card">
                <div class="gad-stat-icon dashicons dashicons-admin-users"></div>
                <h4>Total Users</h4>
                <div class="gad-stat-val"><?php echo esc_html($total_users); ?></div>
                <div class="gad-stat-trend text-green">^+12% this month</div>
            </div>
            <div class="gad-admin-card">
                <div class="gad-stat-icon dashicons dashicons-money-alt"></div>
                <h4>Gross Payments</h4>
                <div class="gad-stat-val">$<?php echo number_format($total_revenue, 2); ?></div>
                <div class="gad-stat-trend text-green">^+8% this month</div>
            </div>
            <div class="gad-admin-card">
                <div class="gad-stat-icon dashicons dashicons-video-alt3"></div>
                <h4>Live Sessions (MTD)</h4>
                <div class="gad-stat-val">142</div>
                <div class="gad-stat-trend text-green">^+22% this month</div>
            </div>
            <div class="gad-admin-card">
                <div class="gad-stat-icon dashicons dashicons-translation"></div>
                <h4>AI Words Translated</h4>
                <div class="gad-stat-val">1.2M</div>
                <div class="gad-stat-trend text-yellow">-2% this month</div>
            </div>
        </div>

        <div class="gad-split-panels mt-20">
            <!-- Reports / Chart Area -->
            <div class="gad-admin-panel" style="flex: 2;">
                <div class="gad-panel-header">
                    <h3>Revenue Analytics Overview</h3>
                    <button class="button button-primary">Export CSV Report</button>
                </div>
                <div class="gad-chart-mockup">
                    <!-- CSS simulated chart -->
                    <div class="bar" style="height: 40%"><span>Mar</span></div>
                    <div class="bar" style="height: 60%"><span>Apr</span></div>
                    <div class="bar" style="height: 55%"><span>May</span></div>
                    <div class="bar" style="height: 80%"><span>Jun</span></div>
                    <div class="bar" style="height: 95%"><span>Jul</span></div>
                    <div class="bar" style="height: 85%"><span>Aug</span></div>
                </div>
            </div>

            <!-- Recent Gateway Payments -->
            <div class="gad-admin-panel" style="flex: 1;">
                <div class="gad-panel-header">
                    <h3>Recent Gateway Payments</h3>
                </div>
                <ul class="gad-feed">
                    <?php 
                    $fund_limit = 0;
                    foreach($txs as $tx): 
                        if(get_post_meta($tx->ID, '_cws_type', true) !== 'credit') continue;
                        if($fund_limit++ >= 6) break;
                        $amt = get_post_meta($tx->ID, '_cws_amount', true);
                        $gateway = get_post_meta($tx->ID, '_cws_gateway', true);
                    ?>
                    <li>
                        <div class="gad-feed-icon">💳</div>
                        <div class="gad-feed-meta">
                            <strong>$<?php echo esc_html($amt); ?></strong>
                            <span>via <?php echo esc_html(ucfirst($gateway)); ?></span>
                        </div>
                        <div class="gad-feed-date"><?php echo get_the_date('M j', $tx->ID); ?></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        
    </div>
    <?php
}
