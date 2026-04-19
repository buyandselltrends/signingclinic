<?php
/**
 * Template Name: Wallet
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
            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">Wallet</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="space-y-10">
        <!-- Balance Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-2 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-10 text-white shadow-2xl shadow-blue-500/20 relative overflow-hidden">
                <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <h2 class="text-sm font-bold opacity-70 uppercase tracking-widest mb-4">Total Balance</h2>
                    <div class="flex items-baseline gap-3 mb-8">
                        <span class="text-6xl font-black">1,250</span>
                        <span class="text-xl font-bold opacity-80">Credits</span>
                    </div>
                    <div class="flex gap-4">
                        <button class="px-6 py-3 bg-white text-blue-600 font-bold rounded-xl text-sm shadow-xl hover:scale-105 transition-all">Add Credits</button>
                        <button class="px-6 py-3 bg-blue-500/30 text-white font-bold rounded-xl text-sm backdrop-blur-md border border-white/10">View History</button>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 border border-gray-100 dark:border-gray-700 shadow-sm flex flex-col justify-center">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Equivalent Value</p>
                <p class="text-3xl font-black text-gray-900 dark:text-white mb-4">GHS 250.00 <span class="text-xs text-gray-400 font-normal">($12.50 USD)</span></p>
                <div class="space-y-4">
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500">Processing Rate</span>
                        <span class="font-bold">1 Credit / Word</span>
                    </div>
                    <div class="h-1 bg-gray-100 dark:bg-gray-700 rounded-full"></div>
                    <p class="text-[10px] text-gray-400">Rates vary based on language complexity and specialized AI models.</p>
                </div>
            </div>
        </div>

        <!-- Purchase Packages -->
        <section>
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-2xl font-black text-gray-900 dark:text-white">Refill Credits</h2>
                    <p class="text-gray-500 text-sm">Save up to 25% with bulk credit packages.</p>
                </div>
                <div class="flex gap-2">
                    <div class="w-8 h-5 bg-gray-200 dark:bg-gray-800 rounded-lg"></div>
                    <div class="w-8 h-5 bg-gray-200 dark:bg-gray-800 rounded-lg"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Starter -->
                <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-100 dark:border-gray-800 shadow-sm hover:border-blue-200 transition-all flex flex-col">
                    <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-4">Starter</p>
                    <h3 class="text-3xl font-black mb-1">500 <span class="text-sm font-bold text-gray-400">Credits</span></h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mb-8">GHS 100.00 <span class="text-xs font-medium text-gray-500">($5.00)</span></p>
                    <div class="space-y-4 mb-8 flex-1">
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                             <CheckCircle2 class="w-4 h-4 text-green-500" /> API Access
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                             <CheckCircle2 class="w-4 h-4 text-green-500" /> Never Expires
                        </div>
                    </div>
                    <button class="w-full py-4 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white font-bold rounded-2xl hover:bg-gray-100 transition-all border border-gray-100 dark:border-gray-700">Select Package</button>
                </div>

                <!-- Recommended -->
                <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 border-2 border-blue-600 shadow-xl shadow-blue-500/5 transition-all flex flex-col relative scale-105">
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-blue-600 text-white px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">Best Value</div>
                    <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-4">Popular</p>
                    <h3 class="text-3xl font-black mb-1">2,000 <span class="text-sm font-bold text-gray-400">Credits</span></h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mb-8">GHS 360.00 <span class="text-xs font-medium text-gray-500">($18.00)</span></p>
                    <div class="space-y-4 mb-8 flex-1">
                        <div class="flex items-center gap-2 text-sm text-gray-900 dark:text-white font-medium">
                             <CheckCircle2 class="w-4 h-4 text-green-500" /> 10% Bonus Included
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                             <CheckCircle2 class="w-4 h-4 text-green-500" /> Priority Support
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                             <CheckCircle2 class="w-4 h-4 text-green-500" /> Advanced AI Models
                        </div>
                    </div>
                    <button class="w-full py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/20">Select Package</button>
                </div>

                <!-- Professional -->
                <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-100 dark:border-gray-800 shadow-sm hover:border-blue-200 transition-all flex flex-col">
                    <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-4">Enterprise</p>
                    <h3 class="text-3xl font-black mb-1">5,000 <span class="text-sm font-bold text-gray-400">Credits</span></h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mb-8">GHS 800.00 <span class="text-xs font-medium text-gray-500">($40.00)</span></p>
                    <div class="space-y-4 mb-8 flex-1">
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                             <CheckCircle2 class="w-4 h-4 text-green-500" /> 20% Bonus Included
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                             <CheckCircle2 class="w-4 h-4 text-green-500" /> Custom Invoicing
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                             <CheckCircle2 class="w-4 h-4 text-green-500" /> Bulk Translation Tool
                        </div>
                    </div>
                    <button class="w-full py-4 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white font-bold rounded-2xl hover:bg-gray-100 transition-all border border-gray-100 dark:border-gray-700">Select Package</button>
                </div>
            </div>
        </section>

        <!-- Transaction History -->
        <section class="bg-white dark:bg-gray-900 rounded-[40px] border border-gray-100 dark:border-gray-800 overflow-hidden">
            <div class="p-8 border-b border-gray-50 dark:border-gray-800">
                <h3 class="text-xl font-black text-gray-900 dark:text-white">Transaction History</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-950 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            <th class="px-8 py-4">Transaction ID</th>
                            <th class="px-8 py-4">Date</th>
                            <th class="px-8 py-4">Description</th>
                            <th class="px-8 py-4 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        <tr class="text-sm">
                            <td class="px-8 py-6 font-mono font-bold text-gray-400">#TX-992031</td>
                            <td class="px-8 py-6 text-gray-500 font-medium">Oct 14, 2026</td>
                            <td class="px-8 py-6 font-bold">2,000 Credit Refill</td>
                            <td class="px-8 py-6 text-right font-black text-green-500">+GHS 360.00 ($18.00)</td>
                        </tr>
                        <tr class="text-sm">
                            <td class="px-8 py-6 font-mono font-bold text-gray-400">#TX-991823</td>
                            <td class="px-8 py-6 text-gray-500 font-medium">Oct 12, 2026</td>
                            <td class="px-8 py-6 font-bold">Translation Fee (TR-88291)</td>
                            <td class="px-8 py-6 text-right font-black text-red-500">-12 Credits</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>