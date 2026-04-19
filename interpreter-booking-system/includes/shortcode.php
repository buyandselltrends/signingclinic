<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode('ibs_booking_ui', 'ibs_render_booking_ui');

function ibs_render_booking_ui() {
    ob_start();
    ?>
    <div class="ibs-wrapper">
        <div class="ibs-wizard">
            <!-- Progress Bar -->
            <div class="ibs-progress">
                <div class="ibs-step active" data-step="1">1. Service</div>
                <div class="ibs-step" data-step="2">2. Language</div>
                <div class="ibs-step" data-step="3">3. Date & Time</div>
                <div class="ibs-step" data-step="4">4. Confirm</div>
            </div>

            <div class="ibs-content-area">
                <!-- Step 1: Service -->
                <div class="ibs-panel active" id="ibs-panel-1">
                    <h3>Select Required Service</h3>
                    <div class="ibs-grid">
                        <div class="ibs-card" data-val="phone" onclick="ibsSelect('service', 'phone', 1)">
                            <div class="ibs-icon">📞</div>
                            <h4>Phone Interpreting (OPI)</h4>
                            <p>Remote audio interpretation</p>
                        </div>
                        <div class="ibs-card" data-val="video" onclick="ibsSelect('service', 'video', 1)">
                            <div class="ibs-icon">💻</div>
                            <h4>Video Interpreting (VRI)</h4>
                            <p>Remote face-to-face interpretation</p>
                        </div>
                        <div class="ibs-card" data-val="onsite" onclick="ibsSelect('service', 'onsite', 1)">
                            <div class="ibs-icon">🤝</div>
                            <h4>On-site Interpreting</h4>
                            <p>In-person physical interpreter</p>
                        </div>
                        <div class="ibs-card" data-val="ai" onclick="ibsSelect('service', 'ai', 1)">
                            <div class="ibs-icon">🤖</div>
                            <h4>AI Interpreter</h4>
                            <p>Instant real-time AI translation</p>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Language -->
                <div class="ibs-panel" id="ibs-panel-2">
                    <h3>Select Target Language</h3>
                    <select id="ibs-language" class="ibs-input">
                        <option value="">-- Choose Language --</option>
                        <option value="es">Spanish (Español)</option>
                        <option value="fr">French (Français)</option>
                        <option value="de">German (Deutsch)</option>
                        <option value="ja">Japanese (日本語)</option>
                        <option value="zh">Mandarin (中文)</option>
                    </select>
                    <button class="ibs-btn" onclick="ibsNext(2)">Continue to Calendar</button>
                    <button class="ibs-btn-text" onclick="ibsPrev(2)">Back</button>
                </div>

                <!-- Step 3: Calendar & Time -->
                <div class="ibs-panel" id="ibs-panel-3">
                    <h3>Select Availability</h3>
                    <div class="ibs-calendar-layout">
                        <div class="ibs-calendar">
                            <div class="ibs-cal-header">
                                <button>&lt;</button>
                                <strong>October 2026</strong>
                                <button>&gt;</button>
                            </div>
                            <div class="ibs-cal-days">
                                <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
                            </div>
                            <div class="ibs-cal-grid" id="ibs-cal-grid">
                                <!-- JS will populate this -->
                            </div>
                        </div>
                        <div class="ibs-time-slots">
                            <h4 style="margin-top:0;">Available Slots</h4>
                            <div class="ibs-slots" id="ibs-slots">
                                <div class="ibs-empty-msg">Select a date first</div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        <button class="ibs-btn" onclick="ibsNext(3)">Review Booking</button>
                        <button class="ibs-btn-text" onclick="ibsPrev(3)">Back</button>
                    </div>
                </div>

                <!-- Step 4: Confirmation -->
                <div class="ibs-panel" id="ibs-panel-4">
                    <h3>Confirm Booking details</h3>
                    <div class="ibs-summary">
                        <p><strong>Service:</strong> <span id="summ-service">-</span></p>
                        <p><strong>Language:</strong> <span id="summ-language">-</span></p>
                        <p><strong>Date & Time:</strong> <span id="summ-datetime">-</span></p>
                        <div class="ibs-notice">
                            🤖 Our system will automatically assign the best matching interpreter and email you a confirmation link.
                        </div>
                    </div>
                    <button class="ibs-btn ibs-btn-success" id="ibs-submit-btn">Confirm & Book</button>
                    <button class="ibs-btn-text" onclick="ibsPrev(4)">Back</button>
                    <div id="ibs-response-msg" style="margin-top: 15px; font-weight: 500;"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
