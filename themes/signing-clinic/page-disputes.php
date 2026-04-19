<?php
/**
 * Template Name: Marketplace Disputes
 */
get_header(); ?>

<main class="pt-24 pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen">
    <div class="mb-10">
        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">Marketplace Disputes</h1>
        <p class="text-gray-500">Manage and resolve issues related to your translation orders.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <!-- Dispute List Mockup -->
            <div class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-800 p-6 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-bold text-lg">Active Disputes</h2>
                    <button class="text-sm text-blue-600 font-bold">Show Closed</button>
                </div>
                
                <div class="space-y-4">
                    <div class="p-4 bg-red-50 dark:bg-red-900/10 rounded-2xl border border-red-100 dark:border-red-900/30 flex justify-between items-center">
                        <div>
                            <p class="font-bold text-red-700 dark:text-red-400">Order #TR-88293 - Quality Issue</p>
                            <p class="text-xs text-gray-500 mt-1">Opened on Oct 12 by Client</p>
                        </div>
                        <span class="px-3 py-1 bg-red-100 text-red-700 text-[10px] font-black rounded-full uppercase">Urgent</span>
                    </div>

                    <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 flex justify-between items-center opacity-60">
                        <div>
                            <p class="font-bold text-gray-700 dark:text-gray-300">Order #TR-88102 - Late Delivery</p>
                            <p class="text-xs text-gray-500 mt-1">Resolution in progress...</p>
                        </div>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-black rounded-full uppercase">Reviewing</span>
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-gray-100 dark:border-gray-800">
                    <button class="w-full py-4 bg-gray-900 text-white font-bold rounded-2xl hover:bg-black transition-all">Open New Dispute</button>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-700 p-8 rounded-3xl text-white">
                <h3 class="font-bold text-xl mb-4 text-white">Need mediation?</h3>
                <p class="text-blue-100 text-sm leading-relaxed mb-6">Our arbiter team is available 24/7 to resolve complex marketplace disagreements.</p>
                <button class="w-full py-3 bg-white text-blue-600 font-bold rounded-xl text-sm">Contact Support</button>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
