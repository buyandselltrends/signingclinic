<?php
/**
 * Footer template
 */
?>
</main>
<footer class="bg-gray-50 dark:bg-gray-950 border-t border-gray-200 dark:border-gray-800 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div class="col-span-1 md:col-span-1">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600 mb-4 block">
                    AI Translate
                </a>
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    Breaking language barriers with human-like AI translation and interpretation. Fast, secure, and accurate.
                </p>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Product</h4>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url( home_url( '/features' ) ); ?>" class="text-sm text-gray-500 hover:text-blue-600">Features</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/pricing' ) ); ?>" class="text-sm text-gray-500 hover:text-blue-600">Pricing</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/api' ) ); ?>" class="text-sm text-gray-500 hover:text-blue-600">API</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Resources</h4>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="text-sm text-gray-500 hover:text-blue-600">Blog</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/support' ) ); ?>" class="text-sm text-gray-500 hover:text-blue-600">Support</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="text-sm text-gray-500 hover:text-blue-600">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Legal</h4>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>" class="text-sm text-gray-500 hover:text-blue-600">Privacy Policy</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/terms' ) ); ?>" class="text-sm text-gray-500 hover:text-blue-600">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-gray-400">
                &copy; <?php echo date('Y'); ?> AI Translate Pro. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<button id="scroll-to-top" class="fixed bottom-6 right-6 hidden bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition-colors z-50 focus:outline-none" aria-label="Scroll to Top">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
