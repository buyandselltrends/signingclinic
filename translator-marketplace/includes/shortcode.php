<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode('tm_marketplace_hub', 'tm_render_hub');

function tm_render_hub() {
    ob_start();
    
    // Fetch Jobs
    $jobs = get_posts([
        'post_type' => 'tm_job',
        'numberposts' => -1,
        'post_status' => 'publish'
    ]);
    ?>
    <div class="tm-app-container">
        <!-- Tabs -->
        <div class="tm-nav-tabs">
            <button class="tm-tab active" data-view="board">🌎 Job Board</button>
            <button class="tm-tab" data-view="post">📝 Post a Job</button>
            <button class="tm-tab" data-view="profile">👤 Freelancer Profile</button>
        </div>
        
        <div class="tm-content">
            
            <!-- Job Board View -->
            <div id="tm-view-board" class="tm-view active">
                <div class="tm-header-flex">
                    <h2>Available Translation Gigs</h2>
                    <div class="tm-badge tm-badge-blue">Platform Commission: 15%</div>
                </div>
                
                <div class="tm-job-feed" id="tm-job-feed">
                    <?php if($jobs): foreach($jobs as $job): 
                        $status = get_post_meta($job->ID, '_tm_status', true);
                        $budget = get_post_meta($job->ID, '_tm_budget', true);
                        $lang = get_post_meta($job->ID, '_tm_language', true);
                    ?>
                        <div class="tm-job-card <?php echo esc_attr($status); ?>" id="tm-job-<?php echo esc_attr($job->ID); ?>">
                            <div class="tm-job-main">
                                <h3 class="tm-job-title"><?php echo esc_html($job->post_title); ?></h3>
                                <p class="tm-job-desc"><?php echo wp_trim_words($job->post_content, 20); ?></p>
                                <div class="tm-job-meta">
                                    <span>🌐 <?php echo esc_html(strtoupper($lang)); ?></span>
                                    <span>💰 $<?php echo esc_html($budget); ?> Fixed</span>
                                    <?php if($status === 'progress'): ?>
                                        <span class="tm-badge tm-badge-yellow">In Progress</span>
                                    <?php elseif($status === 'completed'): ?>
                                        <span class="tm-badge tm-badge-green">Completed</span>
                                    <?php else: ?>
                                        <span class="tm-badge tm-badge-gray">Open for Bids</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tm-job-actions">
                                <?php if($status === 'open'): ?>
                                    <button class="tm-btn tm-btn-primary tm-accept-btn" data-id="<?php echo esc_attr($job->ID); ?>">Accept Job</button>
                                <?php elseif($status === 'progress'): ?>
                                    <button class="tm-btn tm-btn-success tm-complete-btn" data-id="<?php echo esc_attr($job->ID); ?>">Mark Complete & Rate</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; else: ?>
                        <div class="tm-empty-state">No jobs available. Be the first to post a request!</div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Post a Job View -->
            <div id="tm-view-post" class="tm-view">
                <h2>Create a Marketplace Listing</h2>
                <div class="tm-form">
                    <label>Job Title</label>
                    <input type="text" id="tm-title" placeholder="e.g. Translate Legal PDF to Spanish" class="tm-input">
                    
                    <label>Target Language</label>
                    <select id="tm-lang" class="tm-input">
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                        <option value="ja">Japanese</option>
                        <option value="ar">Arabic</option>
                    </select>

                    <label>Budget (USD)</label>
                    <input type="number" id="tm-budget" placeholder="100.00" class="tm-input">

                    <label>Description & Scope</label>
                    <textarea id="tm-desc" rows="4" class="tm-input" placeholder="Detailed requirements..."></textarea>
                    
                    <button id="tm-submit-job" class="tm-btn tm-btn-primary" style="margin-top: 10px;">Post Job securely</button>
                    <div id="tm-post-msg" style="margin-top:15px; font-weight:600;"></div>
                </div>
            </div>

            <!-- Profile View -->
            <div id="tm-view-profile" class="tm-view">
                <h2>My Translator Profile</h2>
                <div class="tm-profile-card">
                    <div class="tm-profile-header">
                        <div class="tm-avatar">J</div>
                        <div class="tm-bio">
                            <h3>John Linguist</h3>
                            <p>⭐ 4.9/5 (12 Reviews)</p>
                        </div>
                    </div>
                    <hr class="tm-divider">
                    <div class="tm-settings-grid">
                        <div>
                            <label>Base Rate per Word</label>
                            <input type="text" value="$0.10" class="tm-input">
                        </div>
                        <div>
                            <label>Fluent Languages</label>
                            <input type="text" value="English, Spanish, French" class="tm-input">
                        </div>
                    </div>
                    <button class="tm-btn" style="margin-top:15px;" onclick="alert('Profile Updated!')">Save Profile</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Rating Modal (Hidden) -->
    <div class="tm-modal" id="tm-rating-modal">
        <div class="tm-modal-content">
            <h3>Review Translator</h3>
            <p>How was the linguistic quality of this delivery?</p>
            <div class="tm-stars">
                <span class="tm-star" data-val="1">★</span>
                <span class="tm-star" data-val="2">★</span>
                <span class="tm-star" data-val="3">★</span>
                <span class="tm-star" data-val="4">★</span>
                <span class="tm-star" data-val="5">★</span>
            </div>
            <input type="hidden" id="tm-active-review-id">
            <button id="tm-submit-review" class="tm-btn tm-btn-success" style="margin-top: 20px; width:100%;" disabled>Submit & Pay Freelancer</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
