<?php
/**
 * Template Name: API Documentation
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
            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">API Documentation</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 min-h-screen">
        <!-- Sidebar Docs Nav -->
        <aside class="hidden lg:block space-y-8">
            <div>
                <h5 class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Getting Started</h5>
                <ul class="space-y-3 text-sm font-bold text-gray-500">
                    <li class="text-blue-600">Introduction</li>
                    <li class="hover:text-gray-900 transition-colors cursor-pointer">Authentication</li>
                    <li class="hover:text-gray-900 transition-colors cursor-pointer">Rate Limits</li>
                </ul>
            </div>
            <div>
                <h5 class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Endpoints</h5>
                <ul class="space-y-3 text-sm font-bold text-gray-500">
                    <li class="hover:text-gray-900 transition-colors cursor-pointer">Translate Text</li>
                    <li class="hover:text-gray-900 transition-colors cursor-pointer">Translate Document</li>
                    <li class="hover:text-gray-900 transition-colors cursor-pointer">Language Detection</li>
                    <li class="hover:text-gray-900 transition-colors cursor-pointer">Glossary Management</li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-12">
            <div>
                <h1 class="text-4xl font-black text-gray-900 dark:text-white mb-6">Introduction</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed max-w-2xl">
                    The AI Translate REST API allows you to programmatically access our world-class neural translation engines. 
                    Integration is seamless using standard HTTP methods and JSON payloads.
                </p>
            </div>

            <section class="space-y-6">
                <h2 class="text-2xl font-black text-gray-900 dark:text-white">Quick Start</h2>
                <p class="text-sm text-gray-500 font-medium">Get a translation in seconds using cURL:</p>
                <div class="bg-gray-900 rounded-2xl p-6 font-mono text-sm text-blue-400 overflow-x-auto border border-gray-800 shadow-2xl">
                    <pre><code>curl -X POST https://api.aitranslate.pro/v1/translate \
  -H "Authorization: Bearer YOUR_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{
    "text": "Hello world",
    "target_lang": "ES",
    "source_lang": "EN"
  }'</code></pre>
                </div>
            </section>

            <section class="space-y-6">
                <h2 class="text-2xl font-black text-gray-900 dark:text-white">Authentication</h2>
                <p class="text-sm text-gray-500 font-medium leading-relaxed">
                    All API requests must be authenticated using a Bearer Token. You can generate and manage your unique API keys 
                    directly from the <a href="/settings" class="text-blue-600 underline">Developer Settings</a> in your dashboard.
                </p>
                <div class="p-6 bg-yellow-50 dark:bg-yellow-900/10 border border-yellow-100 dark:border-yellow-900/30 rounded-2xl">
                    <p class="text-sm text-yellow-800 dark:text-yellow-200 font-bold flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        Security Notice:
                    </p>
                    <p class="text-xs text-yellow-700 dark:text-yellow-300 mt-2 font-medium">Never expose your API keys in client-side code (JavaScript). Always use a secure backend proxy.</p>
                </div>
            </section>

            <!-- Metadata Table -->
            <section class="bg-white dark:bg-gray-900 rounded-[32px] border border-gray-100 dark:border-gray-800 overflow-hidden shadow-sm">
                <div class="p-6 border-b border-gray-50 dark:border-gray-800">
                    <h3 class="font-bold">Error Codes</h3>
                </div>
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-950 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            <th class="px-6 py-4">Code</th>
                            <th class="px-6 py-4">Description</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-gray-800">
                        <tr><td class="px-6 py-4 font-bold text-red-500">401</td><td class="px-6 py-4 font-medium">Unauthorized - Invalid API Key</td></tr>
                        <tr><td class="px-6 py-4 font-bold text-red-500">402</td><td class="px-6 py-4 font-medium">Payment Required - Insufficient credits</td></tr>
                        <tr><td class="px-6 py-4 font-bold text-red-500">429</td><td class="px-6 py-4 font-medium">Too Many Requests - Rate limit exceeded</td></tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>