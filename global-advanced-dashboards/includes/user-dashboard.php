<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode('global_user_dashboard', 'gad_render_user_dashboard');

function gad_render_user_dashboard() {
    if (!is_user_logged_in()) {
        return '<div class="gad-alert">Please log in to access your unified dashboard.</div>';
    }

    $user_id = get_current_user_id();
    $current_user = wp_get_current_user();
    
    // Fetch multi-plugin data safely
    $credits = (int) get_user_meta($user_id, 'aits_credits', true);
    
    // Fetch ibs_bookings (from Interpreter Booking System)
    $bookings = get_posts(['post_type' => 'ibs_booking', 'author' => $user_id, 'numberposts' => 5]);
    
    // Fetch Wallet Transactions (from Credit Wallet System)
    $wallet_txs = get_posts(['post_type' => 'cws_transaction', 'author' => $user_id, 'numberposts' => 5]);

    ob_start();
    ?>
    <div class="gad-portal">
        <aside class="gad-sidebar">
            <div class="gad-profile">
                <div class="gad-avatar"><?php echo strtoupper(substr($current_user->user_login, 0, 1)); ?></div>
                <div class="gad-user-info">
                    <strong><?php echo esc_html($current_user->user_login); ?></strong>
                    <span>Wallet: <?php echo esc_html($credits); ?> Cr</span>
                </div>
            </div>
            <nav class="gad-nav">
                <a href="#" class="gad-nav-item active" data-tab="overview">🏠 Overview</a>
                <a href="#" class="gad-nav-item" data-tab="orders">📦 Translation Orders</a>
                <a href="#" class="gad-nav-item" data-tab="bookings">📅 My Bookings</a>
                <a href="#" class="gad-nav-item" data-tab="wallet">💳 Wallet & Credits</a>
                <a href="#" class="gad-nav-item" data-tab="history">📜 AI History</a>
            </nav>
        </aside>

        <main class="gad-main">
            <!-- OVERVIEW TAB -->
            <div id="gad-tab-overview" class="gad-tab-content active">
                <h2>Welcome back, <?php echo esc_html($current_user->user_firstname ?: $current_user->user_login); ?></h2>
                <div class="gad-grid-3">
                    <div class="gad-card">
                        <div class="gad-card-title">Available Credits</div>
                        <div class="gad-card-value text-blue"><?php echo esc_html($credits); ?></div>
                    </div>
                    <div class="gad-card">
                        <div class="gad-card-title">Upcoming Bookings</div>
                        <div class="gad-card-value text-green"><?php echo count($bookings); ?></div>
                    </div>
                    <div class="gad-card">
                        <div class="gad-card-title">Pending Orders</div>
                        <div class="gad-card-value text-yellow">1</div>
                    </div>
                </div>

                <div class="gad-split-panels mt-20">
                    <div class="gad-panel">
                        <h3>Recent Transactions</h3>
                        <?php if($wallet_txs): ?>
                            <ul class="gad-list">
                                <?php foreach($wallet_txs as $tx): 
                                    $type = get_post_meta($tx->ID, '_cws_type', true);
                                    $amt = get_post_meta($tx->ID, '_cws_amount', true);
                                ?>
                                    <li>
                                        <span><?php echo esc_html($tx->post_title); ?></span>
                                        <strong class="<?php echo $type === 'credit' ? 'text-green' : 'text-red'; ?>">
                                            <?php echo $type === 'credit' ? '+' : '-'; ?> <?php echo esc_html(get_post_meta($tx->ID, '_cws_credits_added', true) ?: get_post_meta($tx->ID, '_cws_credits_deducted', true)); ?> Cr
                                        </strong>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="gad-empty">No transactions found.</p>
                        <?php endif; ?>
                    </div>
                    <div class="gad-panel">
                        <h3>Next Booking</h3>
                        <?php if($bookings): $next = $bookings[0]; ?>
                            <div class="gad-highlight-box">
                                <strong><?php echo esc_html(get_post_meta($next->ID, '_ibs_date', true) . ' at ' . get_post_meta($next->ID, '_ibs_time', true)); ?></strong><br>
                                Service: <?php echo esc_html(strtoupper(get_post_meta($next->ID, '_ibs_service', true))); ?><br>
                                Language: <?php echo esc_html(strtoupper(get_post_meta($next->ID, '_ibs_language', true))); ?>
                            </div>
                        <?php else: ?>
                            <p class="gad-empty">No upcoming appointments.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- ORDERS TAB -->
            <div id="gad-tab-orders" class="gad-tab-content">
                <h2>Human Translation Orders</h2>
                <div class="gad-panel">
                    <table class="gad-table">
                        <thead><tr><th>Order ID</th><th>Service Type</th><th>Word Count</th><th>Status</th></tr></thead>
                        <tbody>
                            <tr><td>#HTS-992</td><td>Technical Docs</td><td>4,500</td><td><span class="gad-tag gad-tag-yellow">In Progress</span></td></tr>
                            <tr><td>#HTS-951</td><td>Standard</td><td>1,200</td><td><span class="gad-tag gad-tag-green">Completed</span></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- BOOKINGS TAB -->
            <div id="gad-tab-bookings" class="gad-tab-content">
                <h2>Live Interpretation Bookings</h2>
                <div class="gad-panel">
                    <table class="gad-table">
                        <thead><tr><th>Booking ID</th><th>Date/Time</th><th>Language</th><th>Assigned To</th></tr></thead>
                        <tbody>
                            <?php if($bookings): foreach($bookings as $b): ?>
                                <tr>
                                    <td>#<?php echo esc_html($b->ID); ?></td>
                                    <td><?php echo esc_html(get_post_meta($b->ID, '_ibs_date', true)); ?> <?php echo esc_html(get_post_meta($b->ID, '_ibs_time', true)); ?></td>
                                    <td><?php echo esc_html(strtoupper(get_post_meta($b->ID, '_ibs_language', true))); ?></td>
                                    <td><?php echo esc_html(get_post_meta($b->ID, '_ibs_interpreter', true)); ?></td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr><td colspan="4">No bookings found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- WALLET TAB -->
            <div id="gad-tab-wallet" class="gad-tab-content">
                <h2>Wallet & Credits</h2>
                <div class="gad-panel">
                    <div class="gad-balance-card">
                        <h3>Current Balance</h3>
                        <h1><?php echo esc_html($credits); ?> <span>Credits</span></h1>
                        <button class="gad-btn">Add Funds</button>
                    </div>
                </div>
            </div>

            <!-- HISTORY TAB -->
            <div id="gad-tab-history" class="gad-tab-content">
                <h2>AI File Translation History</h2>
                <div class="gad-panel">
                    <p>Load history from `wp_aits_translations` custom table.</p>
                    <button class="gad-btn gad-btn-outline">Refresh Logs</button>
                </div>
            </div>
            
        </main>
    </div>
    <?php
    return ob_get_clean();
}
