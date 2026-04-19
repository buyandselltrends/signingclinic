<?php
/**
 * Template Name: Enterprise Solutions
 */
get_header(); ?>

<main class="pt-24 pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen">
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
            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">Enterprise Solutions</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="mb-20">
        <h1 class="text-5xl font-black text-gray-900 dark:text-white mb-6 leading-tight">High performance language <br/>solutions for <span class="text-blue-600">Global Scale.</span></h1>
        <p class="text-xl text-gray-500 max-w-2xl leading-relaxed">Secure, compliant, and infinitely scalable translation infrastructure for modern enterprises.</p>
    </div>

    <!-- Trusted By -->
    <div class="mb-24 py-12 border-y border-gray-100 dark:border-gray-800">
        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 text-center mb-8">Trusted by industry leaders</p>
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-40 grayscale">
            <span class="text-xl font-bold">LEGACY CORP</span>
            <span class="text-xl font-bold">TECH GIANT</span>
            <span class="text-xl font-bold">GLOBAL REACH</span>
            <span class="text-xl font-bold">PRIME MEDIA</span>
        </div>
    </div>

    <!-- Solution Pillars -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-24">
        <div class="bg-white dark:bg-gray-900 p-12 rounded-[40px] border border-gray-100 dark:border-gray-800 shadow-sm">
            <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-8">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <h3 class="text-2xl font-black mb-4">Uncompromising Security</h3>
            <p class="text-gray-500 leading-relaxed mb-6">Enterprise-grade security with SOC2 Type II compliance, localized data residency options, and end-to-end encryption for all data in transit and at rest.</p>
            <ul class="space-y-3">
                <li class="flex items-center gap-2 text-sm font-bold"><CheckCircle2 class="w-4 h-4 text-green-500" /> SSO / SAML Integration</li>
                <li class="flex items-center gap-2 text-sm font-bold"><CheckCircle2 class="w-4 h-4 text-green-500" /> Data Isolation</li>
                <li class="flex items-center gap-2 text-sm font-bold"><CheckCircle2 class="w-4 h-4 text-green-500" /> GDPR & HIPAA Readiness</li>
            </ul>
        </div>

        <div class="bg-white dark:bg-gray-900 p-12 rounded-[40px] border border-gray-100 dark:border-gray-800 shadow-sm">
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-8">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <h3 class="text-2xl font-black mb-4">Dedicated Infrastructure</h3>
            <p class="text-gray-500 leading-relaxed mb-6">Bypass public rate limits with dedicated node clusters and prioritized queuing for your core business operations.</p>
            <ul class="space-y-3">
                <li class="flex items-center gap-2 text-sm font-bold"><CheckCircle2 class="w-4 h-4 text-green-500" /> 99.99% SLA Uptime</li>
                <li class="flex items-center gap-2 text-sm font-bold"><CheckCircle2 class="w-4 h-4 text-green-500" /> Priority Model Access</li>
                <li class="flex items-center gap-2 text-sm font-bold"><CheckCircle2 class="w-4 h-4 text-green-500" /> Custom Model Training</li>
            </ul>
        </div>
    </div>

    <!-- Contact CTA -->
    <div class="bg-blue-600 rounded-[50px] p-16 text-white text-center shadow-2xl shadow-blue-500/30">
        <h2 class="text-4xl font-black mb-6">Let's build your global solution.</h2>
        <p class="text-blue-100 mb-10 text-lg max-w-xl mx-auto opacity-90">Our language strategists are ready to design a custom integration plan for your team.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <button class="px-10 py-5 bg-white text-blue-600 font-bold rounded-2xl shadow-xl hover:scale-105 transition-all">Book a Demo</button>
            <button class="px-10 py-5 bg-blue-500/20 text-white font-bold rounded-2xl border border-white/20 backdrop-blur-md">Download Deck</button>
        </div>
    </div>
</main>

<?php get_footer(); ?>