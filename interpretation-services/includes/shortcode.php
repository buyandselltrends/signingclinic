<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Booking & Real-time App Shortcode
add_shortcode('its_app', function() {
    ob_start();
    ?>
    <div class="its-container">
        <!-- Setup Screen -->
        <div id="its-setup-screen" class="its-screen active">
            <h3>Start Interpretation Session</h3>
            <div class="its-form-group">
                <label>Service Type</label>
                <select id="its-service">
                    <option value="phone">Phone Interpretation (Real-time via phone)</option>
                    <option value="video">Video Interpretation (Live video-based)</option>
                    <option value="onsite">On-site Interpreting (In-person service)</option>
                    <option value="asl">ASL Interpreting (Sign Language specialists)</option>
                    <option value="ai">AI Real-time Interpreter (Instant AI-powered)</option>
                </select>
            </div>
            <div class="its-form-group">
                <label>Mode</label>
                <select id="its-mode">
                    <option value="ondemand">On-Demand (Instant Connect)</option>
                    <option value="scheduled">Scheduled Booking</option>
                </select>
            </div>
            
            <div class="its-form-group">
                <label>Language Pair</label>
                <select id="its-language">
                    <optgroup label="Priority Languages">
                        <option value="spoken_sign">Spoken ↔ Sign Language</option>
                        <option value="asl">American Sign Language (ASL)</option>
                        <option value="gsl">Ghanaian Sign Language (GSL)</option>
                    </optgroup>
                    <optgroup label="Other Spoken Languages">
                        <option value="en_es">English ↔ Spanish</option>
                        <option value="en_fr">English ↔ French</option>
                        <option value="en_zh">English ↔ Chinese</option>
                    </optgroup>
                </select>
            </div>
            <div class="its-form-group" style="display:flex; align-items:center; gap:8px;">
                <input type="checkbox" id="its-urgent" value="1">
                <label for="its-urgent" style="margin:0;">Urgent Request (Priority Match, +GHS 20.00 / $1.00 per min)</label>
            </div>
            
            <div class="its-pricing-note">
                Calculating rate...
            </div>

            <button id="its-btn-start" class="its-btn-primary">Talk to Interpreter Now</button>
        </div>

        <!-- Connecting Screen -->
        <div id="its-connecting-screen" class="its-screen" style="display:none; text-align:center;">
            <div class="its-spinner"></div>
            <p id="its-connecting-text">Matching you with an available interpreter...</p>
        </div>

        <!-- Active Session Screen -->
        <div id="its-active-screen" class="its-screen" style="display:none;">
            <div class="its-session-header">
                <div>
                    <span class="its-badge">LIVE</span> <span id="its-interpreter-name">Connected</span>
                </div>
                <div class="its-timer" id="its-timer">00:00</div>
            </div>
            
            <!-- Extendable WebRTC Area -->
            <div class="its-video-placeholder" id="its-video-area" style="display:none;">
                <div class="its-webrtc-notice">WebRTC Video Stream Placeholder</div>
                <div class="its-avatar">👤</div>
            </div>

            <div class="its-session-stats">
                Current Cost: <strong id="its-current-cost">GHS 0.00</strong>
            </div>

            <button id="its-btn-end" class="its-btn-danger">End Session</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
});

// User Session Dashboard Shortcode
add_shortcode('its_dashboard', function() {
    $user_id = get_current_user_id();
    if (!$user_id) return '<p>Please log in to view your interpretation history.</p>';

    $sessions = get_posts([
        'post_type' => 'its_session',
        'author' => $user_id,
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    ]);

    ob_start();
    ?>
    <div class="its-dashboard">
        <h3>My Session History</h3>
        <table class="its-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Service Mode</th>
                    <th>Duration</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php if($sessions): foreach($sessions as $s): 
                    $curr_dur = get_post_meta($s->ID, '_its_duration', true);
                    $mins = floor($curr_dur / 60);
                    $secs = $curr_dur % 60;
                    $service = ucfirst(get_post_meta($s->ID, '_its_service', true));
                    $mode = ucfirst(get_post_meta($s->ID, '_its_mode', true));
                ?>
                <tr>
                    <td><?php echo get_the_date('M j, Y H:i', $s->ID); ?></td>
                    <td><?php echo esc_html($service . ' (' . $mode . ')'); ?></td>
                    <td><?php echo sprintf('%02d:%02d', $mins, $secs); ?></td>
                    <td><?php 
                        $cost_usd = (float)get_post_meta($s->ID, '_its_cost', true);
                        $cost_ghs = $cost_usd * 20;
                        echo 'GHS ' . number_format($cost_ghs, 2) . ' ($' . number_format($cost_usd, 2) . ')'; 
                    ?></td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="4">No previous sessions found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
    return ob_get_clean();
});
