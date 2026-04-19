<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('admin_menu', function() {
    add_submenu_page(
        'edit.php?post_type=ibs_booking',
        'Booking Dashboard',
        'Booking Dashboard',
        'manage_options',
        'ibs-booking-dashboard',
        'ibs_render_admin_dashboard'
    );
    add_submenu_page(
        'edit.php?post_type=ibs_booking',
        'Interpreter Calendar',
        'Interpreter Calendar',
        'manage_options',
        'ibs-interpreter-calendar',
        'ibs_render_admin_calendar'
    );
});

function ibs_render_admin_dashboard() {
    $bookings = get_posts([
        'post_type' => 'ibs_booking',
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    ]);
    ?>
    <div class="wrap">
        <h1>Booking Management Dashboard</h1>
        <p>Monitor interpreter assignments, review upcoming calendars, and manage auto-assigned interpreter matches.</p>

        <!-- KPI widgets -->
        <div style="display: flex; gap: 20px; margin-top: 20px;">
            <div style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #ccd0d4; flex: 1;">
                <h3 style="margin: 0; color: #646970;">Upcoming This Week</h3>
                <h2 style="margin: 5px 0 0 0; font-size: 30px;">14</h2>
            </div>
            <div style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #ccd0d4; flex: 1;">
                <h3 style="margin: 0; color: #646970;">Active Interpreters</h3>
                <h2 style="margin: 5px 0 0 0; font-size: 30px;">8/15</h2>
            </div>
            <div style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #ccd0d4; flex: 1;">
                <h3 style="margin: 0; color: #646970;">Automation Rate</h3>
                <h2 style="margin: 5px 0 0 0; font-size: 30px; color: #2271b1;">100%</h2>
            </div>
        </div>
        
        <table class="wp-list-table widefat fixed striped" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Date / Time</th>
                    <th>Service</th>
                    <th>Language</th>
                    <th>Assigned Interpreter</th>
                    <th>Status</th>
                    <th>Chat</th>
                </tr>
            </thead>
            <tbody>
                <?php if($bookings): foreach($bookings as $booking): 
                    $date = get_post_meta($booking->ID, '_ibs_date', true);
                    $time = get_post_meta($booking->ID, '_ibs_time', true);
                    $service = get_post_meta($booking->ID, '_ibs_service', true);
                    $lang = get_post_meta($booking->ID, '_ibs_language', true);
                    $interp = get_post_meta($booking->ID, '_ibs_interpreter', true);
                ?>
                <tr>
                    <td>#<?php echo esc_html($booking->ID); ?></td>
                    <td><strong><?php echo esc_html($date); ?></strong> at <?php echo esc_html($time); ?></td>
                    <td><?php echo esc_html(strtoupper($service)); ?></td>
                    <td><?php echo esc_html(strtoupper($lang)); ?></td>
                    <td><span class="dashicons dashicons-admin-users" style="color: #2271b1; margin-top:2px;"></span> <?php echo esc_html($interp); ?></td>
                    <td><span style="background: #d1fae5; color: #065f46; padding: 3px 8px; border-radius: 12px; font-weight: bold; font-size: 11px;">Confirmed</span></td>
                    <td><button class="button ibs-chat-btn" data-booking="<?php echo esc_attr($booking->ID); ?>">Chat</button></td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="7">No bookings found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Chat Modal -->
    <div id="ibs-chat-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
        <div style="background:#fff; width:400px; height:500px; border-radius:8px; display:flex; flex-direction:column; overflow:hidden;">
            <div style="padding:15px; border-bottom:1px solid #ccc; font-weight:bold; display:flex; justify-content:space-between;">
                Chat with Interpreter
                <button onclick="jQuery('#ibs-chat-modal').hide();" style="border:none; cursor:pointer;">&times;</button>
            </div>
            <div id="ibs-chat-messages" style="flex:1; overflow-y:auto; padding:15px; display:flex; flex-direction:column; gap:10px;"></div>
            <div style="padding:15px; border-top:1px solid #ccc; display:flex; gap:5px;">
                <input type="text" id="ibs-chat-input" style="flex:1;" placeholder="Type message...">
                <button id="ibs-send-msg" class="button button-primary">Send</button>
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        let currentBookingId = 0;
        $('.ibs-chat-btn').click(function() {
            currentBookingId = $(this).data('booking');
            $('#ibs-chat-modal').css('display', 'flex');
            loadMessages();
        });
        
        $('#ibs-send-msg').click(function() {
            const msg = $('#ibs-chat-input').val();
            if(!msg) return;
            $.ajax({
                url: '/wp-json/rtc/v1/chat/messages',
                method: 'POST',
                data: { session_id: 'booking_' + currentBookingId, message: msg, receiver_id: 1 }, 
                beforeSend: function(xhr) { xhr.setRequestHeader('X-WP-Nonce', '<?php echo wp_create_nonce("wp_rest"); ?>'); }
            }).done(function(){
                $('#ibs-chat-input').val('');
                loadMessages();
            });
        });
        
        function loadMessages() {
            $('#ibs-chat-messages').html('Loading...');
            $.ajax({
                url: '/wp-json/rtc/v1/chat/messages?session_id=booking_' + currentBookingId,
                method: 'GET'
            }).done(function(res){
                $('#ibs-chat-messages').empty();
                res.messages.forEach(m => {
                    $('#ibs-chat-messages').append('<div><strong>' + m.sender_id + ':</strong> ' + m.message + '</div>');
                });
            });
        }
    });
    </script>
    <?php
}

function ibs_render_admin_calendar() {
    ?>
    <div class="wrap">
        <h1>Interpreter Calendar & Availability</h1>
        <p>Translators can visually manage their working hours, blackout states, and assigned shifts below.</p>
        
        <div style="background: #fff; border: 1px solid #ccd0d4; padding: 20px; border-radius: 8px; margin-top: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="margin:0;">April 2026</h2>
                <div>
                    <button class="button">Previous Month</button>
                    <button class="button">Next Month</button>
                    <button class="button button-primary">Save Availability Constraints</button>
                </div>
            </div>
            
            <table class="wp-list-table widefat fixed" style="border: 1px solid #e2e8f0; border-collapse: collapse; width: 100%;">
                <thead>
                    <tr style="background:#f8fafc;">
                        <th style="padding:15px; border:1px solid #e2e8f0; text-align:center;">Mon</th>
                        <th style="padding:15px; border:1px solid #e2e8f0; text-align:center;">Tue</th>
                        <th style="padding:15px; border:1px solid #e2e8f0; text-align:center;">Wed</th>
                        <th style="padding:15px; border:1px solid #e2e8f0; text-align:center;">Thu</th>
                        <th style="padding:15px; border:1px solid #e2e8f0; text-align:center;">Fri</th>
                        <th style="padding:15px; border:1px solid #e2e8f0; text-align:center; color:#ef4444;">Sat</th>
                        <th style="padding:15px; border:1px solid #e2e8f0; text-align:center; color:#ef4444;">Sun</th>
                    </tr>
                </thead>
                <tbody style="background: #fff;">
                    <!-- Week 1 Mock -->
                    <tr>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold; color:#94a3b8;">30</span>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold; color:#94a3b8;">31</span>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold;">1</span><br>
                            <div style="background:#dbeafe; color:#1e40af; font-size:11px; padding:4px; border-radius:4px; margin-top:5px; cursor:pointer;">09:00 - 17:00 (Available)</div>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold;">2</span><br>
                            <div style="background:#dbeafe; color:#1e40af; font-size:11px; padding:4px; border-radius:4px; margin-top:5px; cursor:pointer;">09:00 - 17:00 (Available)</div>
                            <div style="background:#fef9c3; color:#854d0e; font-size:11px; padding:4px; border-radius:4px; margin-top:5px; border-left:3px solid #eab308;">14:00 - OPI Booking #13</div>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold;">3</span><br>
                            <div style="background:#fee2e2; color:#991b1b; font-size:11px; padding:4px; border-radius:4px; margin-top:5px; cursor:pointer;">Out of Office</div>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px; background:#f8fafc;">
                            <span style="font-weight:bold;">4</span>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px; background:#f8fafc;">
                            <span style="font-weight:bold;">5</span>
                        </td>
                    </tr>
                    <!-- Week 2 Mock -->
                    <tr>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold;">6</span><br>
                            <div style="background:#dbeafe; color:#1e40af; font-size:11px; padding:4px; border-radius:4px; margin-top:5px; cursor:pointer;">09:00 - 17:00 (Available)</div>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold;">7</span><br>
                            <div style="background:#dcfce7; color:#166534; font-size:11px; padding:4px; border-radius:4px; margin-top:5px; cursor:pointer; border-left: 3px solid #22c55e;">10:00 - VRI Booking #14</div>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold;">8</span><br>
                            <div style="background:#dbeafe; color:#1e40af; font-size:11px; padding:4px; border-radius:4px; margin-top:5px; cursor:pointer;">09:00 - 17:00 (Available)</div>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold;">9</span><br>
                            <div style="background:#dbeafe; color:#1e40af; font-size:11px; padding:4px; border-radius:4px; margin-top:5px; cursor:pointer;">09:00 - 17:00 (Available)</div>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px;">
                            <span style="font-weight:bold;">10</span><br>
                            <div style="background:#dbeafe; color:#1e40af; font-size:11px; padding:4px; border-radius:4px; margin-top:5px; cursor:pointer;">09:00 - 12:00 (Half Day)</div>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px; background:#f8fafc;">
                            <span style="font-weight:bold;">11</span>
                        </td>
                        <td style="height:120px; border:1px solid #e2e8f0; vertical-align:top; padding:10px; background:#f8fafc;">
                            <span style="font-weight:bold;">12</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
