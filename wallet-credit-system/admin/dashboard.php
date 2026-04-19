<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Admin Menu for Wallet Management
add_action('admin_menu', function() {
    add_submenu_page(
        'users.php',
        'Wallet Manager',
        'Wallet Manager',
        'manage_options',
        'cws-wallet-manager',
        'cws_render_admin_dashboard'
    );
});

function cws_render_admin_dashboard() {
    // Basic User Search
    $users = get_users();
    ?>
    <div class="wrap">
        <h1>Credit & Wallet Management</h1>
        <p>Manage user balances and audit system-wide financial transactions across the interpretation network.</p>
        
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Current Balance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): 
                    $bal = (int) get_user_meta($user->ID, 'aits_credits', true);
                ?>
                <tr>
                    <td><?php echo esc_html($user->ID); ?></td>
                    <td><strong><?php echo esc_html($user->user_login); ?></strong></td>
                    <td><?php echo esc_html($user->user_email); ?></td>
                    <td><?php echo esc_html($bal); ?> Credits</td>
                    <td>
                        <button class="button" onclick="prompt('Enter new balance for user <?php echo esc_js($user->user_login); ?>:', '<?php echo esc_js($bal); ?>')">Adjust Balance</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}
