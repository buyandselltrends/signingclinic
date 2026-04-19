<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Register shortcode [ai_translation_system]
add_shortcode( 'ai_translation_system', 'aits_render_shortcode' );

function aits_render_shortcode( $atts ) {
    ob_start();
    
    $user_id = get_current_user_id();
    $credits = $user_id ? (int) get_user_meta( $user_id, 'aits_credits', true ) : 'Guest';
    if ($user_id && get_user_meta( $user_id, 'aits_credits', true ) === '') {
        update_user_meta( $user_id, 'aits_credits', 100 );
        $credits = 100;
    }
    ?>
    <div class="aits-container">
        <div class="aits-header">
            <h3>AI Translator <span class="aits-badge">Neural V3</span></h3>
            <div class="aits-credit-panel">
                <div class="aits-credits">Balance: <strong id="aits-credit-count"><?php echo esc_html($credits); ?></strong> credits</div>
                <button class="aits-btn-buy" onclick="document.getElementById('aits-wallet-modal').style.display='flex'">Buy Credits</button>
            </div>
        </div>
        <div class="aits-monthly-text">You receive 100 free credits monthly.</div>
        
        <div class="aits-tools" style="display:flex; gap:15px; margin-bottom:15px;">
            <div style="flex:1;">
                <label style="display:block; font-size:12px; font-weight:bold; margin-bottom:5px; color:#64748b;">Source Language</label>
                <select id="aits-source-lang" style="width:100%; padding:10px; border-radius:8px; border:1px solid #cbd5e1;">
                    <option value="auto">✨ Auto-Detect Language</option>
                    <optgroup label="Priority Languages">
                        <option value="en">English</option>
                        <option value="ak">Twi</option>
                        <option value="ee">Ewe</option>
                        <option value="gaa">Ga</option>
                        <option value="pcm">Pidgin</option>
                        <option value="ig">Igbo</option>
                    </optgroup>
                    <optgroup label="Other Languages">
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                        <option value="de">German</option>
                        <option value="it">Italian</option>
                        <option value="pt">Portuguese</option>
                    </optgroup>
                </select>
            </div>
            <div style="flex:1;">
                <label style="display:block; font-size:12px; font-weight:bold; margin-bottom:5px; color:#64748b;">Target Language</label>
                <select id="aits-lang-selector" style="width:100%; padding:10px; border-radius:8px; border:1px solid #cbd5e1;">
                    <optgroup label="Priority Languages">
                        <option value="en">English</option>
                        <option value="ak">Twi</option>
                        <option value="ee">Ewe</option>
                        <option value="gaa">Ga</option>
                        <option value="pcm">Pidgin</option>
                        <option value="ig">Igbo</option>
                    </optgroup>
                    <optgroup label="Other Languages">
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                        <option value="de">German</option>
                        <option value="ja">Japanese</option>
                        <option value="zh">Chinese</option>
                    </optgroup>
                </select>
            </div>
        </div>

        <!-- Detected language note -->
        <div id="aits-detected-note" style="display:none; font-size:12px; color:#10b981; font-weight:bold; margin-bottom:10px;"></div>

        <div class="aits-workspace">
            <div class="aits-box">
                <textarea id="aits-source-text" placeholder="Enter text to translate..."></textarea>
                <div class="aits-dragdrop" id="aits-dragdrop">
                    <div class="aits-drag-icon">📄</div>
                    <p class="aits-drag-title">Drag & Drop or <span style="text-decoration: underline;">Browse</span></p>
                    <p class="aits-drag-subtitle">Accepted: <strong>PDF, DOCX, TXT</strong></p>
                    <input type="file" id="aits-file-input" accept=".txt,.pdf,.docx" style="display:none;" />
                    <button class="aits-btn-secondary" onclick="document.getElementById('aits-file-input').click()">Browse Files</button>
                    <p id="aits-file-name" class="aits-file-name"></p>
                </div>
            </div>
            
            <div class="aits-box">
                <textarea id="aits-target-text" readonly placeholder="Translation will appear here..."></textarea>
                
                <!-- Progress Indicator -->
                <div id="aits-progress" class="aits-progress" style="display:none;">
                    <div id="aits-progress-dyn-text" class="aits-progress-text">Analyzing neural weights and translating...</div>
                    <div class="aits-progress-bar-container">
                        <div class="aits-progress-bar" id="aits-progress-bar"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="aits-actions">
            <button id="aits-translate-btn" class="aits-btn-primary">Translate Now (1 Credit)</button>
        </div>
        
        <div id="aits-message"></div>
    </div>

    <!-- Wallet Modal -->
    <div id="aits-wallet-modal" class="aits-modal-overlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
        <div class="aits-modal-content" style="background:#fff; width:90%; max-width:640px; max-height:80vh; overflow-y:auto; border-radius:12px; padding:30px; position:relative;">
            <button onclick="document.getElementById('aits-wallet-modal').style.display='none'" style="position:absolute; top:20px; right:20px; background:none; border:none; font-size:28px; cursor:pointer;">&times;</button>
            <div style="margin-top:20px;">
                <?php echo do_shortcode('[cws_wallet_dashboard]'); ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
