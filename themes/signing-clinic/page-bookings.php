<?php
/**
 * Template Name: Bookings
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
            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">Bookings</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="mb-10">
        <h1 class="text-4xl font-black text-gray-900 dark:text-white mb-4">Appointments & Residencies</h1>
        <p class="text-gray-500">Manage your live interpretation sessions and recurring language consultations.</p>
    </div>

    <!-- Booking Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white dark:bg-gray-900 rounded-[32px] border border-gray-100 dark:border-gray-800 overflow-hidden shadow-sm">
                <div class="px-8 py-6 border-b border-gray-50 dark:border-gray-800 flex justify-between items-center bg-gray-50 dark:bg-gray-950">
                    <h3 class="font-bold">Upcoming Sessions</h3>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black uppercase">List</button>
                        <button class="px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-lg text-[10px] font-black uppercase opacity-40">Calendar</button>
                    </div>
                </div>
                <div class="p-4 space-y-4">
                    <!-- Session Card -->
                    <div class="flex items-center gap-6 p-6 rounded-3xl border border-blue-100 dark:border-blue-900/30 bg-blue-50/30 dark:bg-blue-900/10">
                        <div class="w-16 h-16 bg-white dark:bg-gray-800 rounded-2xl flex flex-col items-center justify-center shadow-sm">
                            <span class="text-[10px] font-black text-blue-600 uppercase tracking-widest">Oct</span>
                            <span class="text-2xl font-black">18</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-lg">Legal Tech Conference (Live)</h4>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-1">14:00 - 16:00 UTC • Zoom Video Integration</p>
                        </div>
                        <div class="flex flex-col items-end gap-3">
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-black rounded-full uppercase">Confirmed</span>
                            <button class="text-blue-600 font-bold text-xs hover:underline">Join Link &rarr;</button>
                        </div>
                    </div>

                    <div class="flex items-center gap-6 p-6 rounded-3xl border border-gray-100 dark:border-gray-800 grayscale">
                        <div class="w-16 h-16 bg-gray-50 dark:bg-gray-800 rounded-2xl flex flex-col items-center justify-center">
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Oct</span>
                            <span class="text-2xl font-black">20</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-lg">Monthly Brand Sync</h4>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-1">10:00 - 11:00 UTC • Phone Interpretation</p>
                        </div>
                        <div class="text-right">
                            <span class="px-3 py-1 bg-gray-100 text-gray-500 text-[10px] font-black rounded-full uppercase tracking-widest">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-gray-900 rounded-[40px] p-8 text-white">
                <h3 class="font-bold text-xl mb-6">Need a translator for a live event?</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-8">We have 2,000+ verified interpreters available for immediate booking across all time zones.</p>
                <div class="space-y-4">
                    <button class="w-full py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/10">Book New Session</button>
                    <button class="w-full py-4 bg-white/5 border border-white/10 text-white font-bold rounded-2xl hover:bg-white/10 transition-all text-sm">View Availability Map</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>