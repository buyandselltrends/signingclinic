<?php
/**
 * AI Translate Pro functions and definitions
 */

if ( ! defined( 'AI_TRANSLATE_VERSION' ) ) {
	define( 'AI_TRANSLATE_VERSION', '1.0.0' );
}

function ai_translate_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Menu', 'ai-translate-pro' ),
            'footer'  => esc_html__( 'Footer Menu', 'ai-translate-pro' ),
        )
    );

    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'ai_translate_setup' );

function ai_translate_scripts() {
    wp_enqueue_style( 'ai-translate-main', get_stylesheet_uri(), array(), AI_TRANSLATE_VERSION );
    wp_enqueue_style( 'ai-translate-custom', get_template_directory_uri() . '/assets/css/main.css', array('ai-translate-main'), AI_TRANSLATE_VERSION );
    wp_enqueue_script( 'ai-translate-script', get_template_directory_uri() . '/assets/js/main.js', array(), AI_TRANSLATE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'ai_translate_scripts' );

// Breadcrumbs
function ai_translate_breadcrumbs() {
    if ( is_front_page() ) return;
    echo '<nav class="flex mb-8" aria-label="Breadcrumb">';
    echo '<ol class="inline-flex items-center space-x-1 md:space-x-3">';
    echo '<li class="inline-flex items-center"><a href="' . esc_url( home_url( '/' ) ) . '" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400">Home</a></li>';
    if ( is_category() || is_tag() || is_author() || is_search() ) {
        echo '<li aria-current="page"><div class="flex items-center"><svg class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg><span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">Archives</span></div></li>';
    } else {
        echo '<li aria-current="page"><div class="flex items-center"><svg class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg><span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">' . get_the_title() . '</span></div></li>';
    }
    echo '</ol></nav>';
}

// Hide admin bar for subscribers 
add_action('after_setup_theme', 'ai_translate_remove_admin_bar');
function ai_translate_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

// Ensure lazy loading is applied to all images for performance
add_filter( 'wp_get_attachment_image_attributes', 'ai_translate_lazy_load_images', 10, 3 );
function ai_translate_lazy_load_images( $attr, $attachment, $size ) {
    $attr['loading'] = 'lazy';
    return $attr;
}

add_filter('the_content', 'ai_translate_add_lazy_loading_to_content_images');
function ai_translate_add_lazy_loading_to_content_images($content) {
    if ( false !== strpos( $content, '<img' ) ) {
        $content = preg_replace( '/<img(.*?)src=/i', '<img$1loading="lazy" src=', $content );
    }
    return $content;
}

/**
 * Currency Conversion Helpers
 */
function ai_translate_get_pricing_display($usd_amount) {
    $ghs_rate = 20; // 1 USD = 20 GHS
    $ghs_amount = $usd_amount * $ghs_rate;
    return sprintf('GHS %0.2f ($%0.2f)', $ghs_amount, $usd_amount);
}

/**
 * Automatically create required pages on theme activation
 */
function ai_translate_create_pages() {
    $pages = array(
        'pricing' => 'Pricing',
        'dashboard' => 'Dashboard',
        'login' => 'Login',
        'register' => 'Register',
        'services' => 'Services',
        'contact' => 'Contact',
        'about' => 'About',
        'api' => 'API',
        'bookings' => 'Bookings',
        'earnings' => 'Earnings',
        'messages' => 'Messages',
        'notifications' => 'Notifications',
        'orders' => 'Orders',
        'reports' => 'Reports',
        'settings' => 'Settings',
        'wallet' => 'Wallet',
        'translator-profile' => 'Translator Profile',
        'job-requests' => 'Job Requests',
        'enterprise' => 'Enterprise',
        'careers' => 'Careers',
        'faq' => 'FAQ',
        'privacy' => 'Privacy Policy',
        'terms' => 'Terms of Service',
        'refund' => 'Refund Policy',
        'verify-email' => 'Verify Email',
        'forgot-password' => 'Forgot Password',
        'billing' => 'Billing',
        'team' => 'Team',
        'disputes' => 'Marketplace Disputes'
    );

    foreach ( $pages as $slug => $title ) {
        $page_check = get_page_by_path( $slug );
        if ( ! isset( $page_check->ID ) ) {
            wp_insert_post( array(
                'post_type'   => 'page',
                'post_title'  => $title,
                'post_name'   => $slug,
                'post_status' => 'publish',
                'page_template' => 'page-' . $slug . '.php'
            ) );
        }
    }
}
add_action( 'after_switch_theme', 'ai_translate_create_pages' );
// Also run once if pages don't exist for immediate fix
add_action( 'init', 'ai_translate_create_pages' );

