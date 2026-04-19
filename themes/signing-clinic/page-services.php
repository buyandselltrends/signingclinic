<?php
/**
 * Template Name: Services
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
            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">Services</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="mb-16">
        <h1 class="text-4xl font-black text-gray-900 dark:text-white mb-4">Elite Interpretation & Language Modes</h1>
        <p class="text-xl text-gray-500 max-w-3xl">Specialized interpretation services delivered through advanced on-demand and scheduled infrastructure.</p>
    </div>

    <!-- Sign Language Services Highlight -->
    <div class="bg-indigo-600 rounded-[40px] p-10 mb-12 text-white relative overflow-hidden shadow-xl">
        <div class="absolute top-0 right-0 w-64 h-full bg-white opacity-5 -skew-x-12 translate-x-1/2"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-10">
            <div class="shrink-0 w-20 h-20 bg-white/20 rounded-3xl flex items-center justify-center">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 013 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m-6 5.5V11"></path></svg>
            </div>
            <div class="flex-grow">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-[10px] font-black uppercase tracking-widest mb-4">Accessibility First</div>
                <h2 class="text-3xl font-black mb-2">Sign Language Services</h2>
                <p class="text-indigo-100 max-w-2xl leading-relaxed">
                    We specialize in professional <strong>American Sign Language (ASL)</strong> and <strong>Ghanaian Sign Language (GSL)</strong> interpretation for educational, legal, and clinical environments.
                </p>
            </div>
            <div class="flex gap-4">
                <div class="border border-white/20 bg-white/5 py-4 px-8 rounded-2xl text-center">
                    <p class="text-2xl font-black">ASL</p>
                    <p class="text-[10px] opacity-70 font-bold uppercase">Certified</p>
                </div>
                <div class="border border-white/20 bg-white/5 py-4 px-8 rounded-2xl text-center">
                    <p class="text-2xl font-black">GSL</p>
                    <p class="text-[10px] opacity-70 font-bold uppercase">Priority</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Specialized Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-20">
        <div class="bg-white dark:bg-gray-900 rounded-[40px] p-10 border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl transition-all group">
            <div class="flex justify-between items-start mb-8">
                <div class="w-16 h-16 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-3xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5.25v13.5m18-13.5v13.5M3 5.25h18M3 18.75h18M6.75 5.25v13.5m10.5-13.5v13.5M12 5.25v13.5"></path></svg>
                </div>
                <span class="bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400 text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">Primary Service</span>
            </div>
            <h3 class="text-2xl font-black mb-4">Phone Interpretation</h3>
            <p class="text-gray-500 leading-relaxed font-bold mb-2">Real-time interpretation via phone</p>
            <p class="text-gray-500 leading-relaxed mb-6">Crystal-clear audio connection to certified linguists in 200+ languages. Perfect for immediate clinical or legal consultations.</p>
            <ul class="grid grid-cols-2 gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-600 rounded-full"></span> HIPAA Compliant</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-600 rounded-full"></span> 15s avg connect</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-600 rounded-full"></span> 24/7/365 availability</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-600 rounded-full"></span> Native fluency</li>
            </ul>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-[40px] p-10 border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl transition-all group">
            <div class="flex justify-between items-start mb-8">
                <div class="w-16 h-16 bg-purple-50 dark:bg-purple-900/20 text-purple-600 rounded-3xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </div>
                <span class="bg-purple-100 dark:bg-purple-900/40 text-purple-600 dark:text-purple-400 text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">High Definition</span>
            </div>
            <h3 class="text-2xl font-black mb-4">Video Interpretation</h3>
            <p class="text-gray-500 leading-relaxed font-bold mb-2">Live video-based interpreting</p>
            <p class="text-gray-500 leading-relaxed mb-6">High-definition visual communication for complex settings where facial expressions and body language are critical.</p>
            <ul class="grid grid-cols-2 gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-purple-600 rounded-full"></span> HD Video quality</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-purple-600 rounded-full"></span> Zoom/Meet/Teams</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-purple-600 rounded-full"></span> Document sharing</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-purple-600 rounded-full"></span> Encrypted streams</li>
            </ul>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-[40px] p-10 border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl transition-all group">
            <div class="w-16 h-16 bg-green-50 dark:bg-green-900/20 text-green-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <h3 class="text-2xl font-black mb-4">On-site Interpreting</h3>
            <p class="text-gray-500 leading-relaxed font-bold mb-2">In-person interpreter service</p>
            <p class="text-gray-500 leading-relaxed mb-6">Local expert linguists for conferences, court hearings, and sensitive on-site meetings. Worldwide dispatch capabilities.</p>
            <ul class="grid grid-cols-2 gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-600 rounded-full"></span> Local experts</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-600 rounded-full"></span> Bulk day rates</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-600 rounded-full"></span> Equipment rentals</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-600 rounded-full"></span> Specialized SMEs</li>
            </ul>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-[40px] p-10 border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl transition-all group">
            <div class="w-16 h-16 bg-yellow-50 dark:bg-yellow-900/20 text-yellow-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 013 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m-6 5.5V11"></path></svg>
            </div>
            <h3 class="text-2xl font-black mb-4">ASL Interpreting</h3>
            <p class="text-gray-500 leading-relaxed font-bold mb-2">American Sign Language specialists</p>
            <p class="text-gray-500 leading-relaxed mb-6">Certified American Sign Language interpretation through video remote and on-site channels for full ADA compliance.</p>
            <ul class="grid grid-cols-2 gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-yellow-600 rounded-full"></span> RID Certified</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-yellow-600 rounded-full"></span> Remote/On-site</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-yellow-600 rounded-full"></span> Educational/Legal</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-yellow-600 rounded-full"></span> 24/7 ASL Support</li>
            </ul>
        </div>
    </div>

    <!-- Deployment Modes Section -->
    <div class="bg-gray-50 dark:bg-gray-800 rounded-[60px] p-16 mb-20 border border-gray-100 dark:border-gray-700">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-4">Strategic Deployment Modes</h2>
            <p class="text-gray-500">Choose the optimal mode for your project complexity and budget.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <div class="text-center group">
                <div class="w-20 h-20 bg-white dark:bg-gray-900 rounded-full shadow-lg flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <span class="text-xl font-black">01</span>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-2">On-demand</h4>
                <p class="text-xs text-gray-500">Immediate connection for urgent needs.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-white dark:bg-gray-900 rounded-full shadow-lg flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-600 group-hover:text-white transition-all">
                    <span class="text-xl font-black">02</span>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-2">Scheduled</h4>
                <p class="text-xs text-gray-500">Pre-booked for guaranteed placement.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-white dark:bg-gray-900 rounded-full shadow-lg flex items-center justify-center mx-auto mb-6 group-hover:bg-green-600 group-hover:text-white transition-all">
                    <span class="text-xl font-black">03</span>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-2">OPI</h4>
                <p class="text-xs text-gray-500">Over-the-phone interpretation.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-white dark:bg-gray-900 rounded-full shadow-lg flex items-center justify-center mx-auto mb-6 group-hover:bg-yellow-600 group-hover:text-white transition-all">
                    <span class="text-xl font-black">04</span>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-2">VRI</h4>
                <p class="text-xs text-gray-500">Video remote interpretation.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-blue-600 text-white rounded-full shadow-lg flex items-center justify-center mx-auto mb-6 ring-4 ring-blue-100 dark:ring-blue-900/30">
                    <span class="text-xl font-black">AI</span>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-2">AI Interpreter</h4>
                <p class="text-xs text-gray-500 underline decoration-blue-400">Instant AI-powered translation</p>
                <p class="text-[10px] text-gray-400 mt-1 italic">Next-gen neural voice bot.</p>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-900 rounded-[60px] p-16 text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-600/10 blur-[100px]"></div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div>
                <h2 class="text-4xl font-black mb-8 leading-tight">Integrate directly into your existing workflow.</h2>
                <div class="space-y-8">
                    <div class="flex gap-6">
                        <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl mb-2">Robust API</h4>
                            <p class="text-gray-400">Scale your project with our REST API designed for developers.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl mb-2">SOC2 Compliance</h4>
                            <p class="text-gray-400">Your data is never stored and encryption is standard for all accounts.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white/5 p-8 rounded-3xl border border-white/10 backdrop-blur-sm">
                <img src="https://picsum.photos/seed/interface/800/600" alt="Interface" class="rounded-2xl shadow-2xl skew-y-3" referrerPolicy="no-referrer" />
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>