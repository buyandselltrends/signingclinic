<?php
/**
 * Template Name: Dashboard
 */

if ( !is_user_logged_in() ) {
    wp_redirect( home_url('/login') );
    exit;
}

get_header(); 
$current_user = wp_get_current_user();
?>

<div class="min-h-screen bg-gray-50 dark:bg-gray-950 flex">
    <!-- Sidebar Navigation -->
    <aside class="hidden lg:flex w-72 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 flex-col sticky top-20 h-[calc(100vh-80px)]">
        <div class="p-6 space-y-2 flex-1">
            <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-xl font-bold transition-all">
                <LayoutDashboard class="w-5 h-5" /> Overview
            </a>
            <a href="/orders" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-xl transition-all">
                <FileText class="w-5 h-5" /> My Orders
            </a>
            <a href="/wallet" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-xl transition-all">
                <Zap class="w-5 h-5" /> Wallet & Credits
            </a>
            <a href="/messages" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-xl transition-all">
                <MessageSquare class="w-5 h-5" /> Conversations
            </a>
            <a href="/bookings" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-xl transition-all">
                <Calendar class="w-5 h-5" /> Appointments
            </a>
        </div>
        <div class="p-6 border-t border-gray-100 dark:border-gray-800">
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-4 text-white">
                <p class="text-xs font-bold opacity-80 mb-2 uppercase tracking-widest">Storage Status</p>
                <div class="h-1.5 bg-white/20 rounded-full mb-3 overflow-hidden">
                    <div class="h-full bg-white w-3/4"></div>
                </div>
                <p class="text-[10px] font-bold">1.2 GB of 2.0 GB used</p>
            </div>
        </div>
    </aside>

    <main class="flex-1 p-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">Welcome, <?php echo esc_html($current_user->display_name); ?></h1>
                <p class="text-gray-500 mt-1">Here is what's happening with your projects today.</p>
            </div>
            <div class="flex gap-3">
                <a href="/pricing" class="px-5 py-2.5 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-sm font-bold shadow-sm">Upgrade Plan</a>
                <button class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-bold shadow-lg shadow-blue-500/20 hover:bg-blue-700">New Project</button>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 shadow-sm">
                <div class="w-10 h-10 bg-blue-50 dark:bg-blue-900/20 rounded-lg flex items-center justify-center text-blue-600 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5a18.022 18.022 0 01-3.827-5.802M10.999 5.5l1.011 2.685M7 7l1.011 2.685m4.989 3.315a18.022 18.022 0 01-3.828 5.799m1.42 4.087l-4.545-4.454m0 0l-1.011-2.685M12 21a9.003 9.003 0 008.313-5.547M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Translated</p>
                <div class="flex items-baseline gap-2">
                    <p class="text-3xl font-black text-gray-900 dark:text-white">12.4K</p>
                    <span class="text-xs font-bold text-green-500">+12%</span>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 shadow-sm">
                <div class="w-10 h-10 bg-purple-50 dark:bg-purple-900/20 rounded-lg flex items-center justify-center text-purple-600 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Queue Time</p>
                <p class="text-3xl font-black text-gray-900 dark:text-white">2.4m</p>
            </div>
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 shadow-sm">
                <div class="w-10 h-10 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg flex items-center justify-center text-yellow-600 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Credits left</p>
                <p class="text-3xl font-black text-blue-600">842</p>
            </div>
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 shadow-sm">
                <div class="w-10 h-10 bg-green-50 dark:bg-green-900/20 rounded-lg flex items-center justify-center text-green-600 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Accuracy Meta</p>
                <p class="text-3xl font-black text-gray-900 dark:text-white">99.8%</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- Recent Activity -->
                <div class="bg-white dark:bg-gray-900 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-50 dark:border-gray-800 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Active Pipelines</h3>
                        <a href="/orders" class="text-sm font-bold text-blue-600">View All</a>
                    </div>
                    <div class="p-4 space-y-4">
                        <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-50 dark:hover:bg-gray-850 transition-colors">
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center font-bold">PDF</div>
                            <div class="flex-1">
                                <p class="font-bold text-sm">March_Financial_Audit.pdf</p>
                                <p class="text-xs text-gray-500">English to Japanese • Technical Tier</p>
                            </div>
                            <div class="text-right">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-[10px] font-black rounded-full uppercase">Processing</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-50 dark:hover:bg-gray-850 transition-colors">
                            <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center font-bold">TXT</div>
                            <div class="flex-1">
                                <p class="font-bold text-sm">Support_Manifesto.txt</p>
                                <p class="text-xs text-gray-500">English to French • Neural V3</p>
                            </div>
                            <div class="text-right">
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-black rounded-full uppercase">Ready</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <!-- Billing & Credits -->
                <div class="bg-gray-900 rounded-3xl p-8 text-white relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-600/20 rounded-full blur-3xl"></div>
                    <h3 class="text-lg font-bold mb-6">Subscription Status</h3>
                    <div class="space-y-6 relative z-10">
                        <div>
                            <p class="text-xs font-bold text-white/50 uppercase tracking-widest mb-1">Your Plan</p>
                            <p class="text-xl font-bold">Business Professional</p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white/50 uppercase tracking-widest mb-1">Refill Date</p>
                            <p class="text-sm font-medium">May 12, 2026 (In 24 days)</p>
                        </div>
                        <a href="/pricing" class="block w-full py-4 bg-white text-gray-900 text-center font-bold rounded-2xl text-sm hover:bg-gray-100 transition-colors">Manage Sub</a>
                    </div>
                </div>

                <!-- Support Ticket Mockup -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 bg-yellow-50 dark:bg-yellow-900/20 text-yellow-600 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h4 class="font-bold">Need Help?</h4>
                    </div>
                    <p class="text-sm text-gray-500 mb-6 font-medium leading-relaxed">Our premium support team is available 24/7 for Enterprise customers.</p>
                    <button class="text-sm font-bold text-blue-600 hover:underline">Chat with an expert &rarr;</button>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
