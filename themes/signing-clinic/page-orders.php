<?php
/**
 * Template Name: Orders
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
            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">Orders</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
        <div>
            <h1 class="text-4xl font-black text-gray-900 dark:text-white mb-4">Translation Pipeline</h1>
            <p class="text-gray-500">Track the progress of your active and historical translation projects.</p>
        </div>
        <div class="flex bg-gray-100 dark:bg-gray-800 p-1.5 rounded-2xl">
            <button class="px-6 py-2.5 bg-white dark:bg-gray-900 shadow-sm rounded-xl text-sm font-bold">Active</button>
            <button class="px-6 py-2.5 text-gray-400 text-sm font-bold">Completed</button>
            <button class="px-6 py-2.5 text-gray-400 text-sm font-bold">Archived</button>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-900 rounded-[40px] border border-gray-100 dark:border-gray-800 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-950 text-[10px] font-black uppercase tracking-widest text-gray-400">
                        <th class="px-8 py-4">Project / File</th>
                        <th class="px-8 py-4">Language Pair</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-gray-800">
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-850 transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-xl flex items-center justify-center font-black text-xs">PDF</div>
                                <div>
                                    <p class="font-bold text-gray-900 dark:text-white">Commercial_Lease_V4.pdf</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Order #TR-11920</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-lg text-xs font-bold text-gray-600 dark:text-gray-300">EN &rarr; DE</span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                                <span class="text-sm font-bold text-blue-600">Translating...</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button class="text-sm font-bold text-gray-400 hover:text-gray-900">Manage</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-850 transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 text-purple-600 rounded-xl flex items-center justify-center font-black text-xs">API</div>
                                <div>
                                    <p class="font-bold text-gray-900 dark:text-white">Shopify_Product_Batch_12</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Order #TR-11882</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-lg text-xs font-bold text-gray-600 dark:text-gray-300">EN &rarr; FR, ES, IT</span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-sm font-bold text-green-600">Completed</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button class="text-sm font-bold text-blue-600 hover:underline">Download JSON</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php get_footer(); ?>