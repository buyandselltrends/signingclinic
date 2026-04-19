<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function lte_add_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=lte_event',
        'Event Dashboard',
        'Event Dashboard',
        'manage_options',
        'lte-event-dashboard',
        'lte_render_dashboard'
    );
}
add_action('admin_menu', 'lte_add_admin_menu');

function lte_render_dashboard() {
    $events = get_posts([
        'post_type' => 'lte_event',
        'numberposts' => -1,
        'post_status' => 'any'
    ]);
    ?>
    <div class="wrap">
        <h1>Live Translation Event Dashboard</h1>
        <p>Manage your real-time interpretation events, instant meets, and participant assignments.</p>

        <div class="card" style="max-width: 100%; margin-top: 20px;">
            <h2>Monetization & Billing</h2>
            <p><strong>Business Subscription Status:</strong> <span style="color: green;">Active</span></p>
            <p>You can charge per-event for public users or utilize the enterprise subscription tier for unlimited scheduled sessions.</p>
            <button class="button button-primary">Manage Subscription</button>
        </div>

        <table class="wp-list-table widefat fixed striped" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Interpreter Assigned</th>
                    <th>Participants</th>
                    <th>Status</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <?php if($events): foreach($events as $event): ?>
                <tr>
                    <td>#<?php echo esc_html($event->ID); ?></td>
                    <td><strong><?php echo esc_html($event->post_title); ?></strong></td>
                    <td><?php echo get_post_meta($event->ID, '_lte_interpreter', true) ?: 'Unassigned AI'; ?></td>
                    <td><?php echo (int)get_post_meta($event->ID, '_lte_participants', true); ?> Invited</td>
                    <td>Scheduled</td>
                    <td><a href="<?php echo get_permalink($event->ID); ?>" target="_blank">View UI</a></td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="6">No events scheduled. Create a new event to get started.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
