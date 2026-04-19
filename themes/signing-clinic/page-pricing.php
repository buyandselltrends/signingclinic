<?php
/**
 * Template Name: Pricing
 */
get_header(); ?>

<main class="pt-24 pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen">
    <!-- Breadcrumbs -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Home
          </a>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">Pricing</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="text-center mb-16">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Simple, transparent pricing</h1>
        <p class="text-xl text-gray-600 dark:text-gray-400">Pay as you go or choose a plan that scales with your business.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <!-- Starter Plan -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-3xl p-8 hover:shadow-xl transition-shadow flex flex-col">
            <h3 class="text-2xl font-semibold mb-2">Starter</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-6">Perfect for occasional translations.</p>
            <div class="mb-6">
                <span class="text-4xl font-bold">GHS 0.00</span>
                <span class="text-gray-500">/mo ($0.00)</span>
            </div>
            <ul class="space-y-4 mb-8 flex-1">
                <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span class="text-gray-600 dark:text-gray-300">100 Free AI Credits / mo</span></li>
                <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span class="text-gray-600 dark:text-gray-300">Document Translation</span></li>
                <li class="flex items-start text-gray-400 line-through"><svg class="w-5 h-5 text-gray-300 dark:text-gray-700 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Live Interpretation</li>
            </ul>
            <a href="/register" class="w-full text-center bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-medium py-3 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">Start Free</a>
        </div>

        <!-- Professional Plan -->
        <div class="bg-blue-600 rounded-3xl p-8 shadow-2xl shadow-blue-500/20 transform scale-105 border border-blue-500 flex flex-col relative">
            <div class="absolute top-0 right-8 transform -translate-y-1/2 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">Most Popular</div>
            <h3 class="text-2xl text-white font-semibold mb-2">Professional</h3>
            <p class="text-blue-100 mb-6">For growing teams and businesses.</p>
            <div class="mb-6 text-white">
                <span class="text-4xl font-bold">GHS 980.00</span>
                <span class="text-blue-200">/mo ($49.00)</span>
            </div>
            <ul class="space-y-4 mb-8 flex-1 text-white">
                <li class="flex items-start"><svg class="w-5 h-5 text-blue-200 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span>5,000 AI Credits / mo</span></li>
                <li class="flex items-start"><svg class="w-5 h-5 text-blue-200 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span>Human Translation Access</span></li>
                <li class="flex items-start"><svg class="w-5 h-5 text-blue-200 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span>Live Interpretation Booking</span></li>
                <li class="flex items-start"><svg class="w-5 h-5 text-blue-200 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span>API Access</span></li>
            </ul>
            <a href="/register" class="w-full text-center bg-white text-blue-600 font-bold py-3 rounded-xl hover:bg-gray-50 transition-colors">Get Professional</a>
        </div>

        <!-- Enterprise Plan -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-3xl p-8 hover:shadow-xl transition-shadow flex flex-col">
            <h3 class="text-2xl font-semibold mb-2">Enterprise</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-6">Unlimited scale for global corporations.</p>
            <div class="mb-6">
                <span class="text-4xl font-bold">Custom</span>
            </div>
            <ul class="space-y-4 mb-8 flex-1">
                <li class="flex items-start"><svg class="w-5 h-5 text-purple-600 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span class="text-gray-600 dark:text-gray-300">Custom Volume Discounts</span></li>
                <li class="flex items-start"><svg class="w-5 h-5 text-purple-600 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span class="text-gray-600 dark:text-gray-300">Dedicated Account Manager</span></li>
                <li class="flex items-start"><svg class="w-5 h-5 text-purple-600 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span class="text-gray-600 dark:text-gray-300">SSO & Advanced Security</span></li>
                <li class="flex items-start"><svg class="w-5 h-5 text-purple-600 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span class="text-gray-600 dark:text-gray-300">SLA Guarantee</span></li>
            </ul>
            <a href="/contact" class="w-full text-center bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-medium py-3 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">Contact Sales</a>
        </div>
    <!-- Pricing FAQ -->
    <div class="max-w-3xl mx-auto mb-20">
        <h2 class="text-3xl font-black text-center mb-12">Frequently Asked Questions</h2>
        <div class="space-y-6">
            <div class="bg-white dark:bg-gray-900 p-8 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
                <h4 class="font-bold text-lg mb-2">How are credits calculated?</h4>
                <p class="text-gray-500 text-sm leading-relaxed">Most translations cost 1 credit per word. Specialized technical or legal translations may cost up to 1.5 credits per word depending on the selected model priority.</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-8 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
                <h4 class="font-bold text-lg mb-2">Do my credits expire?</h4>
                <p class="text-gray-500 text-sm leading-relaxed">Subscription credits refill monthly and do not roll over. However, individual credit packages purchased through the wallet never expire.</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-8 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
                <h4 class="font-bold text-lg mb-2">Can I switch plans anytime?</h4>
                <p class="text-gray-500 text-sm leading-relaxed">Yes, you can upgrade or downgrade your plan at any time through your dashboard billing settings. Changes are prorated immediately.</p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>