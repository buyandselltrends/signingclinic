<?php
/**
 * Header template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS Play CDN for immediate styling in preview -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
                    }
                },
                fontFamily: {
                    'sans': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
                    'body': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
                }
            }
        }
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans antialiased transition-colors duration-200'); ?>>
<?php wp_body_open(); ?>

<header class="fixed w-full z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0 flex items-center gap-2">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
                        AI Translate
                    </a>
                <?php endif; ?>
            </div>
            
            <nav class="hidden md:flex space-x-8 items-center">
                <!-- Dropdown 1: Solutions -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 py-2">
                        <span>Solutions</span>
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <!-- Mega Menu Panel -->
                    <div class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-[600px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-left z-50">
                        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="p-8 grid grid-cols-2 gap-8">
                                <div>
                                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Translation Services</h3>
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="/services" class="flex items-start group/link">
                                                <div class="p-2 bg-blue-50 dark:bg-gray-800 rounded-lg text-blue-600 mr-3 shrink-0"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white group-hover/link:text-blue-600">Document Translation</p>
                                                    <p class="text-sm text-gray-500 mt-1">Translate PDFs, Word, and Excel with AI.</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/interpreter-sessions" class="flex items-start group/link">
                                                <div class="p-2 bg-purple-50 dark:bg-gray-800 rounded-lg text-purple-600 mr-3 shrink-0"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/></svg></div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white group-hover/link:text-blue-600">Live Interpretation</p>
                                                    <p class="text-sm text-gray-500 mt-1">VRI & OPI voice scheduling.</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bg-gray-50 dark:bg-gray-800/50 -my-8 -mr-8 p-8 border-l border-gray-100 dark:border-gray-800">
                                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Enterprise</h3>
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="/enterprise" class="block">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white hover:text-blue-600">Corporate Solutions</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/api" class="block">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white hover:text-blue-600">API Documentation</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                                        <a href="/contact" class="text-sm font-medium text-blue-600 flex items-center hover:text-blue-700">Talk to Sales <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="/pricing" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Pricing</a>
                
                <!-- Dropdown 2: Resources -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 py-2">
                        <span>Company</span>
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <!-- Simple Dropdown -->
                    <div class="absolute left-0 top-full mt-2 w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg ring-1 ring-black ring-opacity-5 py-2">
                            <a href="/about-us" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-blue-600">About Us</a>
                            <a href="/careers" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-blue-600">Careers</a>
                            <a href="/contact" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-blue-600">Contact</a>
                            <a href="/faq" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-blue-600">FAQ</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="flex items-center space-x-4">
                <!-- Search Form -->
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="hidden md:flex items-center bg-gray-100 dark:bg-gray-800 rounded-full px-3 py-1.5 focus-within:ring-2 focus-within:ring-blue-500">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" name="s" placeholder="Search..." class="bg-transparent border-none focus:outline-none focus:ring-0 text-sm ml-2 w-32 placeholder-gray-500 dark:text-white" />
                </form>

                <!-- Dark Mode Toggle -->
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 transition-colors">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 01-1.415 0l-.708-.708a1 1 0 011.414-1.414l.708.708a1 1 0 010 1.414zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zm-4.22 4.22a1 1 0 010 1.415l-.708.708a1 1 0 01-1.414-1.414l.708-.708a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-4.22a1 1 0 010-1.415l.708-.708a1 1 0 011.414 1.414l-.708.708a1 1 0 01-1.415 0zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zm4.22-4.22a1 1 0 011.415 0l.708.708a1 1 0 01-1.414 1.414l-.708-.708a1 1 0 010-1.414zM10 6a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                </button>

                <!-- Desktop Auth -->
                <div class="hidden md:flex items-center space-x-4">
                    <?php if ( is_user_logged_in() ) : ?>
                        <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="text-sm font-medium hover:text-blue-600">Dashboard</a>
                        <a href="<?php echo wp_logout_url( home_url() ); ?>" class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 transition-colors">Sign out</a>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/login' ) ); ?>" class="text-sm font-medium hover:text-blue-600">Sign in</a>
                        <a href="<?php echo esc_url( home_url( '/register' ) ); ?>" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors shadow-md shadow-blue-500/20">Create Account</a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu Container -->
    <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 px-4 pt-2 pb-4 space-y-1">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="flex items-center bg-gray-100 dark:bg-gray-800 rounded-lg px-3 py-2 mb-4">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" name="s" placeholder="Search..." class="bg-transparent border-none focus:outline-none text-sm ml-2 w-full dark:text-white" />
        </form>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="block px-3 py-2 rounded-md font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">Services</a>
        <a href="<?php echo esc_url( home_url( '/pricing' ) ); ?>" class="block px-3 py-2 rounded-md font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">Pricing</a>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="block px-3 py-2 rounded-md font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">Contact</a>
        <div class="pt-4 pb-2 border-t border-gray-200 dark:border-gray-800 flex flex-col gap-2">
            <?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="block px-3 py-2 rounded-md font-medium text-gray-700 dark:text-gray-300">Dashboard</a>
                <a href="<?php echo wp_logout_url( home_url() ); ?>" class="block px-3 py-2 rounded-md font-medium text-white bg-gray-900 text-center">Sign out</a>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/login' ) ); ?>" class="block px-3 py-2 rounded-md font-medium text-gray-700 dark:text-gray-300">Sign in</a>
                <a href="<?php echo esc_url( home_url( '/register' ) ); ?>" class="block px-3 py-2 rounded-md font-medium text-white bg-blue-600 text-center">Create Account</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<main class="pt-20">
