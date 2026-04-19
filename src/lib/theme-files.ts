export const themeFiles: Record<string, string> = {
  // Theme Stylesheet Header
  'style.css': `/*
Theme Name: Voxlingo AI
Theme URI: https://example.com/voxlingo
Author: Google AI Studio
Author URI: https://example.com/
Description: A premium SaaS WordPress theme for AI-powered translation and interpretation platforms. Features modern dark/light styling, clean modular codebase, and high performance.
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.4
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: voxlingo
Tags: artificial-intelligence, SaaS, modern, translation, full-width-template
*/

/* Core styles are loaded from assets/css/main.css to separate WordPress meta from actual CSS. */
`,

  // Functions.php Setup
  'functions.php': `<?php
/**
 * Voxlingo functions and definitions
 *
 * @package Voxlingo
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function voxlingo_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'voxlingo' ),
      'menu-footer' => esc_html__( 'Footer', 'voxlingo' ),
		)
	);

	// Switch default core markup to HTML5
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'voxlingo_setup' );

/**
 * Enqueue scripts and styles.
 */
function voxlingo_scripts() {
  // Tailwind CSS from CDN for styling
  wp_enqueue_script( 'tailwind-cdn', 'https://cdn.tailwindcss.com', array(), '3.4.1', false );
  
  // Custom Tailwind Config injected via inline script
  wp_add_inline_script('tailwind-cdn', '
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          fontFamily: {
            sans: ["Inter", "system-ui", "sans-serif"],
            display: ["Lexend", "system-ui", "sans-serif"],
          },
          colors: {
            brand: {
              50: "#f0fdfa",
              100: "#ccfbf1",
              500: "#14b8a6",
              600: "#0d9488",
              900: "#134e4a",
              950: "#042f2e"
            },
            surface: {
              light: "#ffffff",
              dark: "#09090b"
            }
          }
        }
      }
    }
  ', 'before');

	wp_enqueue_style( 'voxlingo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'voxlingo-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION );
	wp_enqueue_script( 'voxlingo-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'voxlingo_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
`,

  // Inc template tags (dummy just in case)
  'inc/template-tags.php': `<?php
/**
 * Custom template tags for this theme
 */
// Placeholder for future template tags.
`,

  // Header.php
  'header.php': `<?php
/**
 * The header for our theme
 *
 * @package Voxlingo
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="antialiased">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Lexend:wght@300;400;500;600&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-surface-light dark:bg-surface-dark text-slate-900 dark:text-slate-50 relative'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site min-h-screen flex flex-col">
	<header id="masthead" class="site-header sticky top-0 z-50 w-full backdrop-blur transition-all border-b border-slate-200 dark:border-slate-800 bg-white/70 dark:bg-slate-950/70">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex-shrink-0 flex items-center gap-2">
          <svg class="h-8 w-8 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
          </svg>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="font-display font-semibold text-xl tracking-tight">Voxlingo</a>
        </div>
        <nav id="site-navigation" class="hidden md:block">
          <?php
            wp_nav_menu(
              array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'flex space-x-8',
                'fallback_cb'    => false, // We will manually output fallback items if needed
              )
            );
          ?>
          <?php if ( ! has_nav_menu( 'menu-1' ) ) : ?>
             <!-- Fallback Menu -->
             <ul class="flex space-x-8 text-sm font-medium text-slate-600 dark:text-slate-300">
                <li><a href="/services" class="hover:text-brand-500 transition-colors">Services</a></li>
                <li><a href="/pricing" class="hover:text-brand-500 transition-colors">Pricing</a></li>
                <li><a href="/contact" class="hover:text-brand-500 transition-colors">Contact</a></li>
             </ul>
          <?php endif; ?>
        </nav>
        <div class="hidden md:flex items-center space-x-4">
          <a href="/auth" class="text-sm font-medium hover:text-brand-500 transition-colors">Log in</a>
          <a href="/auth" class="text-sm font-medium px-4 py-2 rounded-full bg-brand-500 text-white hover:bg-brand-600 transition-colors shadow">Get Started</a>
        </div>
      </div>
    </div>
	</header><!-- #masthead -->
  <main id="primary" class="site-main flex-grow">
`,

  // Footer.php
  'footer.php': `<?php
/**
 * The template for displaying the footer
 *
 * @package Voxlingo
 */
?>
  </main><!-- #primary -->

	<footer id="colophon" class="site-footer bg-slate-50 dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 py-12 mt-auto">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="col-span-1 md:col-span-1">
          <div class="flex items-center gap-2 mb-4">
            <svg class="h-6 w-6 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
            </svg>
            <span class="font-display font-semibold text-lg">Voxlingo</span>
          </div>
          <p class="text-sm text-slate-500 dark:text-slate-400">
            Real-time AI-powered translation and interpretation for borderless communication.
          </p>
        </div>
        <div>
          <h3 class="text-sm font-semibold tracking-wider uppercase mb-4">Product</h3>
          <ul class="space-y-3 text-sm text-slate-500 dark:text-slate-400">
            <li><a href="/services" class="hover:text-brand-500">Features</a></li>
            <li><a href="/pricing" class="hover:text-brand-500">Pricing</a></li>
            <li><a href="#" class="hover:text-brand-500">API Documentation</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-sm font-semibold tracking-wider uppercase mb-4">Company</h3>
          <ul class="space-y-3 text-sm text-slate-500 dark:text-slate-400">
            <li><a href="#" class="hover:text-brand-500">About</a></li>
            <li><a href="#" class="hover:text-brand-500">Blog</a></li>
            <li><a href="/contact" class="hover:text-brand-500">Contact</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-sm font-semibold tracking-wider uppercase mb-4">Legal</h3>
          <ul class="space-y-3 text-sm text-slate-500 dark:text-slate-400">
            <li><a href="#" class="hover:text-brand-500">Privacy Policy</a></li>
            <li><a href="#" class="hover:text-brand-500">Terms of Service</a></li>
          </ul>
        </div>
      </div>
      <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-800 text-center text-sm text-slate-500 dark:text-slate-400">
        &copy; <?php echo date('Y'); ?> Voxlingo AI. All rights reserved.
      </div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
`,

  // Index.php (Fallback)
  'index.php': `<?php
get_header(); ?>
<div class="max-w-7xl mx-auto px-4 py-16">
  <?php if ( have_posts() ) : ?>
    <header class="page-header mb-8">
      <h1 class="font-display text-4xl font-bold">Latest Posts</h1>
    </header>
    <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('p-6 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl'); ?>>
        <h2 class="text-xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="text-slate-500 text-sm mb-4"><?php the_excerpt(); ?></div>
        <a href="<?php the_permalink(); ?>" class="text-brand-500 hover:text-brand-600 font-medium text-sm">Read More &rarr;</a>
      </article>
    <?php endwhile; ?>
    </div>
  <?php else : ?>
    <p>No content found.</p>
  <?php endif; ?>
</div>
<?php get_footer();
`,

  // Front Page.php
  'front-page.php': `<?php
/**
 * Template Name: Homepage (Custom)
 */
get_header(); ?>

<!-- HERO SECTION -->
<section class="relative overflow-hidden pt-24 pb-32 sm:pt-32 sm:pb-40">
  <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#14b8a6] to-[#3b82f6] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
  </div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium mb-8">
       <span class="flex h-2 w-2 rounded-full bg-brand-500"></span> Voxlingo API 2.0 is now live
    </div>
    <h1 class="font-display text-5xl md:text-7xl font-semibold tracking-tight mb-8">
      Speak to the world.<br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-500 to-blue-500">Zero language barriers.</span>
    </h1>
    <p class="max-w-2xl mx-auto text-lg md:text-xl text-slate-600 dark:text-slate-400 mb-10">
      AI-powered translation and interpretation in 100+ languages. Instantly integrate neural machine translation or book human interpreters on demand.
    </p>
    <div class="flex flex-col sm:flex-row justify-center gap-4">
      <a href="/pricing" class="px-8 py-4 rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-medium hover:bg-slate-800 dark:hover:bg-slate-100 transition-colors shadow-lg">Start Building Free</a>
      <a href="/services" class="px-8 py-4 rounded-full bg-white dark:bg-slate-900 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-800 font-medium hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors shadow-sm">View Services</a>
    </div>
  </div>
</section>

<!-- SERVICES OVERVIEW -->
<section class="py-24 bg-slate-50 dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-16">
      <h2 class="font-display text-3xl md:text-4xl font-semibold mb-4">Precision at every scale.</h2>
      <p class="text-xl text-slate-500 dark:text-slate-400 max-w-2xl">From instant neural string translation to verified human experts for your most critical meetings.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Card 1 -->
      <div class="bg-white dark:bg-slate-950 p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col items-start hover:shadow-md transition-shadow">
        <div class="w-12 h-12 rounded-2xl bg-brand-50 dark:bg-brand-900/30 flex items-center justify-center mb-6">
           <svg class="h-6 w-6 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
        </div>
        <h3 class="font-display text-xl font-semibold mb-3">Neural API</h3>
        <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 flex-grow">Sub-100ms latency translation API trained on custom terminology for enterprise software.</p>
        <a href="#" class="text-brand-500 font-medium text-sm flex items-center hover:text-brand-600 mt-auto">Explore API <span class="ml-1">&rarr;</span></a>
      </div>
      <!-- Card 2 -->
      <div class="bg-white dark:bg-slate-950 p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col items-start hover:shadow-md transition-shadow">
        <div class="w-12 h-12 rounded-2xl bg-purple-50 dark:bg-purple-900/30 flex items-center justify-center mb-6">
           <svg class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
        </div>
        <h3 class="font-display text-xl font-semibold mb-3">Human-in-the-Loop</h3>
        <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 flex-grow">AI draft translation seamlessly routed to verified human linguists for guaranteed accuracy.</p>
        <a href="#" class="text-purple-500 font-medium text-sm flex items-center hover:text-purple-600 mt-auto">Learn More <span class="ml-1">&rarr;</span></a>
      </div>
      <!-- Card 3 -->
      <div class="bg-white dark:bg-slate-950 p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col items-start hover:shadow-md transition-shadow">
        <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center mb-6">
           <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" /></svg>
        </div>
        <h3 class="font-display text-xl font-semibold mb-3">Live Interpretation</h3>
        <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 flex-grow">Book over-the-phone or video interpreters instantly for medical, legal, or business needs.</p>
        <a href="#" class="text-blue-500 font-medium text-sm flex items-center hover:text-blue-600 mt-auto">Book Now <span class="ml-1">&rarr;</span></a>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="py-24">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-16 text-center">
      <h2 class="font-display text-3xl font-semibold mb-4">How it works</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
      <div class="hidden md:block absolute top-[28px] left-[16%] right-[16%] h-px bg-slate-200 dark:bg-slate-800 z-0"></div>
      
      <div class="text-center relative z-10">
        <div class="w-14 h-14 bg-white dark:bg-slate-950 border border-brand-500 text-brand-500 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 shadow-sm">1</div>
        <h3 class="font-semibold text-lg mb-2">Connect</h3>
        <p class="text-sm text-slate-500 dark:text-slate-400">Integrate our SDKs into your app or upload documents in the dashboard.</p>
      </div>
      <div class="text-center relative z-10">
        <div class="w-14 h-14 bg-white dark:bg-slate-950 border border-brand-500 text-brand-500 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 shadow-sm">2</div>
        <h3 class="font-semibold text-lg mb-2">Process</h3>
        <p class="text-sm text-slate-500 dark:text-slate-400">Our routing engine chooses pure AI, hybrid, or human based on your parameters.</p>
      </div>
      <div class="text-center relative z-10">
        <div class="w-14 h-14 bg-white dark:bg-slate-950 border border-brand-500 text-brand-500 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 shadow-sm">3</div>
        <h3 class="font-semibold text-lg mb-2">Deliver</h3>
        <p class="text-sm text-slate-500 dark:text-slate-400">Receive hyper-accurate translations or connect with a live interpreter immediately.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA SECTION -->
<section class="py-24 bg-brand-900 border-t border-brand-800 relative overflow-hidden">
  <div class="absolute inset-0 opacity-10 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
  <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
    <h2 class="font-display text-4xl text-white font-semibold mb-6">Ready to break the language barrier?</h2>
    <p class="text-brand-100 text-lg mb-10 max-w-2xl mx-auto">Join thousands of companies using Voxlingo to communicate securely and accurately across borders.</p>
    <a href="/auth" class="inline-block px-8 py-4 rounded-full bg-brand-500 text-white font-medium hover:bg-brand-400 transition-colors shadow-lg">Start for free</a>
  </div>
</section>

<?php get_footer(); ?>
`,

  // Services Page
  'page-services.php': `<?php
/**
 * Template Name: Services
 */
get_header(); ?>
<div class="max-w-7xl mx-auto px-4 py-20 min-h-screen">
  <h1 class="font-display text-5xl font-bold mb-8">Our Services</h1>
  <p class="text-xl text-slate-500 dark:text-slate-400 mb-12 max-w-3xl">Comprehensive translation and interpretation services powered by industry-leading AI and world-class human experts.</p>
  
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
    <div class="p-8 rounded-3xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800">
       <h3 class="text-2xl font-semibold mb-4">Neural Machine Translation (NMT)</h3>
       <p class="text-slate-600 dark:text-slate-400 mb-4">Sub-second translation API scalable to millions of words per minute. Highly customizable terminology and brand voice.</p>
       <ul class="list-disc pl-5 text-slate-600 dark:text-slate-400 space-y-2">
         <li>100+ languages supported</li>
         <li>Auto-scaling infrastructure</li>
         <li>Custom Glossaries</li>
       </ul>
    </div>
    <div class="p-8 rounded-3xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800">
       <h3 class="text-2xl font-semibold mb-4">Document Translation</h3>
       <p class="text-slate-600 dark:text-slate-400 mb-4">Upload PDFs, Word docs, and spreadsheets. Maintain exact formatting while translating text instantly or scheduling a human review.</p>
       <ul class="list-disc pl-5 text-slate-600 dark:text-slate-400 space-y-2">
         <li>Format retention</li>
         <li>ISO-certified human reviewers</li>
         <li>End-to-end encryption</li>
       </ul>
    </div>
  </div>
</div>
<?php get_footer(); ?>
`,

  // Pricing Page
  'page-pricing.php': `<?php
/**
 * Template Name: Pricing
 */
get_header(); ?>
<div class="py-24 bg-slate-50 dark:bg-slate-950 min-h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h1 class="font-display text-4xl md:text-5xl font-bold mb-4">Simple, transparent pricing.</h1>
      <p class="text-lg text-slate-500 dark:text-slate-400">Pay only for what you use. No enterprise lock-in.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
      <!-- Free -->
      <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl border border-slate-200 dark:border-slate-800">
        <h3 class="text-xl font-semibold mb-2">Developer</h3>
        <div class="text-3xl font-bold mb-4">$0<span class="text-sm font-normal text-slate-500"> /mo</span></div>
        <p class="text-sm text-slate-500 mb-6">Perfect for testing the API.</p>
        <ul class="space-y-3 mb-8 text-sm">
          <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg> 500k MT characters / mo</li>
          <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg> Community Support</li>
        </ul>
        <button class="w-full py-3 rounded-full border border-slate-300 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition">Get Started</button>
      </div>

      <!-- Pro -->
      <div class="bg-slate-900 dark:bg-slate-800 p-8 rounded-3xl border border-brand-500 relative transform md:-translate-y-4 shadow-xl">
        <div class="absolute top-0 right-8 transform -translate-y-1/2">
          <span class="bg-brand-500 text-white text-xs font-bold uppercase tracking-wider py-1 px-3 rounded-full">Popular</span>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-white">Pro</h3>
        <div class="text-3xl font-bold mb-4 text-white">$49<span class="text-sm font-normal text-slate-400"> /mo</span></div>
        <p class="text-sm text-slate-400 mb-6">For scaling applications.</p>
        <ul class="space-y-3 mb-8 text-sm text-slate-300">
          <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg> 5M MT characters / mo</li>
          <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg> $0.05 / word for Human</li>
          <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg> Email Support</li>
        </ul>
        <button class="w-full py-3 rounded-full bg-brand-500 text-white font-medium hover:bg-brand-600 transition">Start Free Trial</button>
      </div>

      <!-- Enterprise -->
      <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl border border-slate-200 dark:border-slate-800">
        <h3 class="text-xl font-semibold mb-2">Enterprise</h3>
        <div class="text-3xl font-bold mb-4">Custom</div>
        <p class="text-sm text-slate-500 mb-6">For mission-critical deployments.</p>
        <ul class="space-y-3 mb-8 text-sm">
          <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg> Unlimited MT routing</li>
          <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg> Volume discounts</li>
          <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg> Dedicated Account Manager</li>
        </ul>
        <button class="w-full py-3 rounded-full border border-slate-300 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition">Contact Sales</button>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
`,

  // Dashboard Page (App)
  'page-dashboard.php': `<?php
/**
 * Template Name: Dashboard
 */
// If not using a framework, redirect or show simple mock dashboard.
if (!is_user_logged_in() && false) { // Assuming mock auth bypass for theme
    wp_redirect(home_url('/auth'));
    exit;
}
get_header(); ?>
<div class="flex min-h-screen bg-slate-50 dark:bg-slate-950">
  <aside class="w-64 border-r border-slate-200 dark:border-slate-800 p-6 hidden md:block">
    <div class="mb-8 font-semibold text-lg">Dashboard</div>
    <ul class="space-y-2">
      <li><a href="#" class="block px-4 py-2 rounded-lg bg-slate-200 dark:bg-slate-800 font-medium">Projects</a></li>
      <li><a href="#" class="block px-4 py-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-900">API Keys</a></li>
      <li><a href="#" class="block px-4 py-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-900">Billing</a></li>
      <li><a href="#" class="block px-4 py-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-900">Settings</a></li>
    </ul>
  </aside>
  <main class="flex-1 p-8">
    <h1 class="text-3xl font-display font-semibold mb-8">Welcome back.</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800">
        <div class="text-sm text-slate-500 mb-2">Usage this month</div>
        <div class="text-2xl font-bold">124.5k <span class="text-sm font-normal">chars</span></div>
      </div>
      <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800">
        <div class="text-sm text-slate-500 mb-2">Active Projects</div>
        <div class="text-2xl font-bold">4</div>
      </div>
    </div>
    
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 font-medium">Recent Documents</div>
        <div class="p-6 text-center text-slate-500">
           No documents translated yet. 
           <button class="block mx-auto mt-4 px-4 py-2 bg-brand-500 text-white rounded-lg hover:bg-brand-600">New Translation</button>
        </div>
    </div>
  </main>
</div>
<?php get_footer(); ?>
`,

  // Auth Page
  'page-auth.php': `<?php
/**
 * Template Name: Authentication
 */
get_header(); ?>
<div class="min-h-screen flex items-center justify-center bg-slate-50 dark:bg-slate-950 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8 bg-white dark:bg-slate-900 p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-xl">
    <div>
      <h2 class="mt-2 text-center text-3xl font-display font-bold">Sign in to your account</h2>
      <p class="mt-2 text-center text-sm text-slate-600 dark:text-slate-400">
        Or <a href="#" class="font-medium text-brand-500 hover:text-brand-500">start your 14-day free trial</a>
      </p>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
      <input type="hidden" name="remember" value="true">
      <div class="space-y-4">
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-xl relative block w-full px-3 py-3 border border-slate-300 dark:border-slate-700 bg-transparent placeholder-slate-500 text-slate-900 dark:text-white focus:outline-none focus:ring-brand-500 focus:border-brand-500 focus:z-10 sm:text-sm" placeholder="Email address">
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-xl relative block w-full px-3 py-3 border border-slate-300 dark:border-slate-700 bg-transparent placeholder-slate-500 text-slate-900 dark:text-white focus:outline-none focus:ring-brand-500 focus:border-brand-500 focus:z-10 sm:text-sm" placeholder="Password">
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-brand-500 focus:ring-brand-500 border-slate-300 rounded">
          <label for="remember-me" class="ml-2 block text-sm text-slate-900 dark:text-slate-300">
            Remember me
          </label>
        </div>

        <div class="text-sm">
          <a href="#" class="font-medium text-brand-500 hover:text-brand-500">
            Forgot your password?
          </a>
        </div>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-brand-500 hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition">
          Sign in
        </button>
      </div>
    </form>
  </div>
</div>
<?php get_footer(); ?>
`,

  // Custom CSS (Main.css)
  'assets/css/main.css': `
/* Additional custom CSS outside of Tailwind (if any) */
.glass-effect {
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}
`,

  // Custom JS
  'assets/js/main.js': `
// Voxlingo Custom Scripts
document.addEventListener('DOMContentLoaded', () => {
  console.log('Voxlingo Theme Loaded.');
});
`,

  // Style Guide MD
  'style-guide.md': `# Voxlingo Theme Style Guide

## Typography
- **Primary / Sans**: Inter (system-ui, sans-serif) - used for body, labels, interface.
- **Display**: Lexend (system-ui, sans-serif) - used for big headings (H1-H4) to give a modern tech SaaS feel.

## Colors
- **Brand / Accent**: Teal/Mint (brand-500: #14b8a6). Used for primary CTAs, links, and highlights.
- **Surfaces**: 
  - Light mode: Clean white (#ffffff) to soft slate (#f8fafc)
  - Dark mode: Almost black / deep slate (#09090b to #020617)
- **Text**:
  - Light mode: slate-900 (#0f172a) for high contrast
  - Dark mode: slate-50 (#f8fafc) for high contrast

## UI Elements
- **Cards**: High rounded corners (\`rounded-2xl\` or \`rounded-3xl\`), subtle borders (\`border-slate-200\`), light shadows.
- **Buttons**: Pill-shaped (\`rounded-full\`), bold, smooth transitions.
- **Gradients**: used exclusively as background ambiance or textual highlights (\`bg-clip-text\`).

## File Structure
- Uses standard WP Hierarchy.
- Custom pages map intuitively to the business needs: \`front-page.php\`, \`page-services.php\`, \`page-pricing.php\`, \`page-dashboard.php\`.
`
};
