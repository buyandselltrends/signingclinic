<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('wp_head', 'ppe_inject_seo_meta', 1);

function ppe_inject_seo_meta() {
    if (!is_singular()) return;
    
    global $post;
    $title = get_the_title();
    $desc = wp_trim_words(strip_shortcodes(wp_strip_all_tags($post->post_content)), 25, '...');
    $url = get_permalink();
    
    // Standard Meta
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    
    // Open Graph
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    
    // Schema JSON-LD for Software Application / Local Business
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "SoftwareApplication",
        "name" => "LinguistAI Platform",
        "applicationCategory" => "BusinessApplication",
        "offers" => [
            "@type" => "Offer",
            "price" => "0.00",
            "priceCurrency" => "USD"
        ]
    ];
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";
}
