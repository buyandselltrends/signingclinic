<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Cache Wrapper for external API calls (e.g. Google Cloud AI, OpenAI)
 * Greatly reduces translation latency for identical strings.
 */
function ppe_cached_translation_request($string, $target_lang, $api_closure, $ttl = 86400) {
    $cache_key = 'ppe_trans_' . md5($string . '_' . $target_lang);
    $cached_result = get_transient($cache_key);
    
    if (false === $cached_result) {
        $cached_result = $api_closure($string, $target_lang);
        if ($cached_result && !is_wp_error($cached_result)) {
            set_transient($cache_key, $cached_result, $ttl);
        }
    }
    
    return $cached_result;
}

// Add Browser Caching Headers to WordPress Front-end
add_action('template_redirect', function() {
    if ( !is_user_logged_in() && $_SERVER['REQUEST_METHOD'] === 'GET' ) {
        // Cache static-like pages for 1 hour for unauthenticated users
        header('Cache-Control: public, max-age=3600, s-maxage=3600');
        header('Vary: Accept-Encoding');
    }
});
