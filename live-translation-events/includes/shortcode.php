<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode('lte_meeting_ui', 'lte_render_meeting_ui');

function lte_render_meeting_ui() {
    ob_start();
    ?>
    <div class="lte-app-wrapper">
        <div class="lte-header">
            <div class="lte-title">
                <h2>Instant Meet <span class="lte-ai-badge">Live AI Translation Active</span></h2>
                <div class="lte-link-area">
                    <input type="text" id="lte-invite-link" value="https://meet.aitranslate.com/session-xyz" readonly>
                    <button id="lte-copy-link" class="lte-btn-secondary">Copy Invite Link</button>
                </div>
            </div>
            <div class="lte-controls">
                <select id="lte-my-language" class="lte-select">
                    <option value="en">I speak: English</option>
                    <option value="es">I speak: Spanish</option>
                    <option value="fr">I speak: French</option>
                    <option value="ja">I speak: Japanese</option>
                    <option value="zh">I speak: Mandarin</option>
                </select>
            </div>
        </div>

        <div class="lte-meeting-room">
            <!-- Main Speaker Video (Simulated) -->
            <div class="lte-video-container lte-main-speaker">
                <div class="lte-video-feed">🎥 User Camera Stream</div>
                <div class="lte-nameplate">Alex (English)</div>
                <!-- Live Captions Area -->
                <div class="lte-live-captions">
                    <span class="lte-subtitle-source">"Welcome everyone to the quarterly review."</span>
                    <br/>
                    <span class="lte-subtitle-target">"Bienvenidos todos a la revisión trimestral."</span>
                </div>
            </div>

            <!-- Sidebar Participants -->
            <div class="lte-sidebar">
                <div class="lte-video-container lte-participant">
                    <div class="lte-video-feed">🎥 Maria (Spanish)</div>
                </div>
                <div class="lte-video-container lte-participant">
                    <div class="lte-video-feed">🤖 Human Interpreter (Assigned)</div>
                </div>
                <div class="lte-video-container lte-participant lte-ai-assistant">
                    <div class="lte-video-feed">✨ AI Speech-to-Text Engine</div>
                </div>
            </div>
        </div>
        
        <div class="lte-toolbar">
            <button class="lte-btn-icon">🔇 Mute</button>
            <button class="lte-btn-icon">📷 Stop Video</button>
            <button class="lte-btn-icon">💬 Chat</button>
            <button class="lte-btn-icon">⚙️ Captions</button>
            <button class="lte-btn-danger">Leave Event</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
