<?php
/**
 * Template Name: Front Page
 */
get_header(); ?>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-white dark:bg-gray-900 pt-24 pb-32 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-7xl font-bold tracking-tight text-gray-900 dark:text-white mb-8">
            Speak the world's <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">languages seamlessly</span>
        </h1>
        <p class="mt-6 text-lg md:text-xl leading-8 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto mb-10">
            Enterprise-grade translation and interpretation powered by advanced AI and verified by human experts. Get accurate results in seconds.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/register" class="inline-flex justify-center items-center rounded-xl px-8 py-4 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition-all hover:scale-105">Start translating for free <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
            <a href="/services" class="inline-flex justify-center items-center rounded-xl px-8 py-4 text-sm font-semibold text-gray-900 dark:text-white ring-1 ring-inset ring-gray-300 dark:ring-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-all">Explore our services &rarr;</a>
        </div>
    </div>
</section>

<!-- Demo translation widget from Plugin shortcode -->
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php echo do_shortcode('[ai_translation_system]'); ?>
    </div>
</section>

<!-- Interpretation Services & Modes -->
<section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-gray-900 dark:text-white mb-4">Elite Interpretation Solutions</h2>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto">Flexible modes and specialized services tailored for global communication.</p>
        </div>

        <!-- Sign Language Services Highlight (Theme Implementation) -->
        <div class="bg-indigo-600 rounded-[40px] p-10 mb-16 text-white relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-full bg-white opacity-5 -skew-x-12 translate-x-1/2"></div>
            <div class="relative z-10 flex flex-col md:flex-row items-center gap-10">
                <div class="shrink-0 w-20 h-20 bg-white/20 rounded-3xl flex items-center justify-center">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 013 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m-6 5.5V11"></path></svg>
                </div>
                <div class="flex-grow">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-[10px] font-black uppercase tracking-widest mb-4">Accessibility Priority</div>
                    <h2 class="text-3xl font-black mb-2">Sign Language Services</h2>
                    <p class="text-indigo-100 max-w-2xl leading-relaxed">
                        Premiere <strong>American Sign Language (ASL)</strong> and <strong>Ghanaian Sign Language (GSL)</strong> interpretation for educational, legal, and clinical environments.
                    </p>
                </div>
                <div class="flex gap-4">
                    <div class="border border-white/20 bg-white/5 py-4 px-8 rounded-2xl text-center">
                        <p class="text-2xl font-black">ASL</p>
                        <p class="text-[10px] opacity-70 font-bold uppercase">Certified</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-3xl border border-gray-100 dark:border-gray-700 hover:scale-105 transition-transform">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5.25v13.5m18-13.5v13.5M3 5.25h18M3 18.75h18M6.75 5.25v13.5m10.5-13.5v13.5M12 5.25v13.5"></path></svg>
                </div>
                <h3 class="font-black text-lg mb-2">Phone Interpretation</h3>
                <p class="text-xs text-gray-500 font-bold mb-2">Real-time via phone</p>
                <p class="text-sm text-gray-500">Connect to a live interpreter in seconds via any phone line.</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-3xl border border-gray-100 dark:border-gray-700 hover:scale-105 transition-transform">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-black text-lg mb-2">Video Interpretation</h3>
                <p class="text-xs text-gray-500 font-bold mb-2">Live video-based interpreting</p>
                <p class="text-sm text-gray-500">Visual, face-to-face communication for enhanced understanding.</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-3xl border border-gray-100 dark:border-gray-700 hover:scale-105 transition-transform">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="font-black text-lg mb-2">On-site Interpreting</h3>
                <p class="text-xs text-gray-500 font-bold mb-2">In-person interpreter service</p>
                <p class="text-sm text-gray-500">Professional linguists dispatched directly to your location.</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-3xl border border-gray-100 dark:border-gray-700 hover:scale-105 transition-transform">
                <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 013 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m-6 5.5V11"></path></svg>
                </div>
                <h3 class="font-black text-lg mb-2">ASL Interpreting</h3>
                <p class="text-xs text-gray-500 font-bold mb-2">Sign Language specialists</p>
                <p class="text-sm text-gray-500">Certified American Sign Language experts for inclusive access.</p>
            </div>
        </div>

        <!-- Modes Section -->
        <div class="bg-gray-900 rounded-[48px] p-12 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-600/10 blur-[120px]"></div>
            <div class="relative z-10">
                <h3 class="text-2xl font-black mb-10 text-center">Strategic Deployment Modes</h3>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <div class="text-center p-4">
                        <div class="text-blue-400 font-black text-xs uppercase tracking-widest mb-2">Mode 01</div>
                        <div class="font-bold">On-demand</div>
                        <p class="text-[10px] text-gray-400 mt-1">Instant Connection</p>
                    </div>
                    <div class="text-center p-4 border-l border-white/10">
                        <div class="text-purple-400 font-black text-xs uppercase tracking-widest mb-2">Mode 02</div>
                        <div class="font-bold">Scheduled</div>
                        <p class="text-[10px] text-gray-400 mt-1">Pre-booked slots</p>
                    </div>
                    <div class="text-center p-4 border-l border-white/10">
                        <div class="text-green-400 font-black text-xs uppercase tracking-widest mb-2">Mode 03</div>
                        <div class="font-bold">OPI</div>
                        <p class="text-[10px] text-gray-400 mt-1">Audio Only</p>
                    </div>
                    <div class="text-center p-4 border-l border-white/10">
                        <div class="text-yellow-400 font-black text-xs uppercase tracking-widest mb-2">Mode 04</div>
                        <div class="font-bold">VRI</div>
                        <p class="text-[10px] text-gray-400 mt-1">Live Video</p>
                    </div>
                    <div class="text-center p-4 border-l border-white/10">
                        <div class="text-blue-400 font-black text-xs uppercase tracking-widest mb-2">Mode 05</div>
                        <div class="font-bold underline decoration-blue-500/50">AI Interpreter</div>
                        <p class="text-[10px] text-gray-400 mt-1 italic">Instant AI Translation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-24 bg-gray-50 dark:bg-gray-950 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Translation solutions for every need</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 hover:shadow-md transition-shadow">
                <h3 class="text-xl font-semibold mb-3">Document Translation</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-4">Instant AI translation for PDFs, Word, and Excel with perfect formatting retention.</p>
                <a href="/services" class="text-sm font-medium text-blue-600 hover:text-blue-700 inline-flex items-center">Learn how <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
            </div>
            <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 hover:shadow-md transition-shadow">
                <h3 class="text-xl font-semibold mb-3">Live Interpretation</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-4">Real-time voice translation for meetings, conferences, and video calls.</p>
                <a href="/services" class="text-sm font-medium text-purple-600 hover:text-purple-700 inline-flex items-center">See it in action <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
            </div>
            <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 hover:shadow-md transition-shadow">
                <h3 class="text-xl font-semibold mb-3">API Integration</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-4">Embed our powerful AI translation capabilities directly into your application.</p>
                <a href="/api" class="text-sm font-medium text-green-600 hover:text-green-700 inline-flex items-center">View Docs <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Carousel -->
<section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-200 overflow-hidden" id="testimonials-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Loved by thousands</h2>
        </div>
        
        <div class="relative max-w-4xl mx-auto">
            <div class="overflow-hidden rounded-2xl" id="testimonial-slider-container">
                <div class="flex transition-transform duration-500 ease-in-out" id="testimonial-track">
                    <!-- Slide 1 -->
                    <div class="w-full shrink-0 px-8 py-12 bg-blue-50 dark:bg-gray-800 text-center rounded-2xl border border-blue-100 dark:border-gray-700">
                        <p class="text-xl italic text-gray-700 dark:text-gray-300 mb-6">"This AI translation plugin integrated flawlessly into our internal tools. The accuracy is unmatched!"</p>
                        <h4 class="font-bold text-gray-900 dark:text-white">Sarah Jenkins</h4>
                        <span class="text-sm text-gray-500">CTO, GlobalReach</span>
                    </div>
                    <!-- Slide 2 -->
                    <div class="w-full shrink-0 px-8 py-12 bg-blue-50 dark:bg-gray-800 text-center rounded-2xl border border-blue-100 dark:border-gray-700">
                        <p class="text-xl italic text-gray-700 dark:text-gray-300 mb-6">"We translate thousands of PDF documents daily. AI Translate Pro handles them instantly with perfect layouts."</p>
                        <h4 class="font-bold text-gray-900 dark:text-white">Michael Chen</h4>
                        <span class="text-sm text-gray-500">VP of Operations, LegalCorp</span>
                    </div>
                    <!-- Slide 3 -->
                    <div class="w-full shrink-0 px-8 py-12 bg-blue-50 dark:bg-gray-800 text-center rounded-2xl border border-blue-100 dark:border-gray-700">
                        <p class="text-xl italic text-gray-700 dark:text-gray-300 mb-6">"The credit system makes it incredibly easy to manage agency usage across all our clients."</p>
                        <h4 class="font-bold text-gray-900 dark:text-white">Emily Rossi</h4>
                        <span class="text-sm text-gray-500">Founder, Multilingual Ads</span>
                    </div>
                </div>
            </div>
            
            <button id="slider-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-12 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-2 rounded-full shadow-md text-gray-600 dark:text-gray-300 hover:text-blue-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button id="slider-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-12 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-2 rounded-full shadow-md text-gray-600 dark:text-gray-300 hover:text-blue-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
    </div>
</section>

<!-- Featured Translators -->
<section class="py-24 bg-gray-50 dark:bg-gray-950 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div>
                <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-4">Meet our Expert Linguists</h2>
                <p class="text-gray-500 max-w-xl">Work with verified industry specialists for your most sensitive translation needs.</p>
            </div>
            <a href="/translator-profile" class="text-sm font-bold text-blue-600 hover:underline">View all experts &rarr;</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Translator 1 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-[32px] border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl transition-all group">
                <div class="relative w-20 h-20 mb-6 mx-auto">
                    <div class="absolute inset-0 bg-blue-600 rounded-2xl rotate-6 group-hover:rotate-12 transition-transform"></div>
                    <div class="absolute inset-0 bg-gray-100 dark:bg-gray-800 rounded-2xl flex items-center justify-center font-black text-xl overflow-hidden">
                        <img src="https://picsum.photos/seed/face1/200/200" alt="Translator" class="w-full h-full object-cover" referrerPolicy="no-referrer" />
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="font-black text-gray-900 dark:text-white">Elena Rodriguez</h4>
                    <p class="text-[10px] font-black uppercase tracking-widest text-blue-600 mt-1">Legal • ES &rarr; EN</p>
                    <div class="flex justify-center gap-1 mt-4 text-yellow-500">
                         <?php for($i=0; $i<5; $i++): ?><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg><?php endfor; ?>
                    </div>
                    <button class="mt-6 w-full py-3 bg-gray-50 dark:bg-gray-800 rounded-xl text-xs font-bold hover:bg-gray-100 transition-colors">View Profile</button>
                </div>
            </div>

            <!-- Translator 2 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-[32px] border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl transition-all group">
                <div class="relative w-20 h-20 mb-6 mx-auto">
                    <div class="absolute inset-0 bg-purple-600 rounded-2xl -rotate-3 group-hover:-rotate-6 transition-transform"></div>
                    <div class="absolute inset-0 bg-gray-100 dark:bg-gray-800 rounded-2xl flex items-center justify-center font-black text-xl overflow-hidden">
                        <img src="https://picsum.photos/seed/face2/200/200" alt="Translator" class="w-full h-full object-cover" referrerPolicy="no-referrer" />
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="font-black text-gray-900 dark:text-white">Kenji Sato</h4>
                    <p class="text-[10px] font-black uppercase tracking-widest text-purple-600 mt-1">Tech • EN &rarr; JP</p>
                    <div class="flex justify-center gap-1 mt-4 text-yellow-500">
                         <?php for($i=0; $i<5; $i++): ?><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg><?php endfor; ?>
                    </div>
                    <button class="mt-6 w-full py-3 bg-gray-50 dark:bg-gray-800 rounded-xl text-xs font-bold hover:bg-gray-100 transition-colors">View Profile</button>
                </div>
            </div>

            <!-- Translator 3 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-[32px] border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl transition-all group">
                <div class="relative w-20 h-20 mb-6 mx-auto">
                    <div class="absolute inset-0 bg-green-600 rounded-2xl rotate-3 group-hover:rotate-9 transition-transform"></div>
                    <div class="absolute inset-0 bg-gray-100 dark:bg-gray-800 rounded-2xl flex items-center justify-center font-black text-xl overflow-hidden">
                        <img src="https://picsum.photos/seed/face3/200/200" alt="Translator" class="w-full h-full object-cover" referrerPolicy="no-referrer" />
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="font-black text-gray-900 dark:text-white">Amira Hassan</h4>
                    <p class="text-[10px] font-black uppercase tracking-widest text-green-600 mt-1">Medical • AR &rarr; FR</p>
                    <div class="flex justify-center gap-1 mt-4 text-yellow-500">
                         <?php for($i=0; $i<5; $i++): ?><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg><?php endfor; ?>
                    </div>
                    <button class="mt-6 w-full py-3 bg-gray-50 dark:bg-gray-800 rounded-xl text-xs font-bold hover:bg-gray-100 transition-colors">View Profile</button>
                </div>
            </div>

            <!-- Translator 4 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-[32px] border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl transition-all group">
                <div class="relative w-20 h-20 mb-6 mx-auto">
                    <div class="absolute inset-0 bg-yellow-600 rounded-2xl -rotate-6 group-hover:-rotate-12 transition-transform"></div>
                    <div class="absolute inset-0 bg-gray-100 dark:bg-gray-800 rounded-2xl flex items-center justify-center font-black text-xl overflow-hidden">
                        <img src="https://picsum.photos/seed/face4/200/200" alt="Translator" class="w-full h-full object-cover" referrerPolicy="no-referrer" />
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="font-black text-gray-900 dark:text-white">Luc Miller</h4>
                    <p class="text-[10px] font-black uppercase tracking-widest text-yellow-600 mt-1">Finance • FR &rarr; EN</p>
                    <div class="flex justify-center gap-1 mt-4 text-yellow-500">
                         <?php for($i=0; $i<5; $i++): ?><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg><?php endfor; ?>
                    </div>
                    <button class="mt-6 w-full py-3 bg-gray-50 dark:bg-gray-800 rounded-xl text-xs font-bold hover:bg-gray-100 transition-colors">View Profile</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-blue-600 dark:bg-blue-900 border-t border-blue-700 dark:border-gray-800">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Ready to go global?</h2>
        <p class="text-blue-100 mb-10 text-lg">Join 10,000+ companies translating millions of words daily.</p>
        <a href="/register" class="inline-flex items-center bg-white text-blue-600 font-bold px-8 py-4 rounded-xl hover:scale-105 transition-transform shadow-lg group">Start Your Free Trial <span class="bg-blue-50 text-blue-600 rounded-full p-1 ml-2 group-hover:bg-blue-100 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span></a>
    </div>
</section>

<?php get_footer(); ?>
