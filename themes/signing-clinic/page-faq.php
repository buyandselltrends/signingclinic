<?php
/**
 * Template Name: FAQ
 */
get_header(); ?>
<main class="pt-32 pb-20 max-w-4xl mx-auto px-4">
    <h1 class="text-4xl font-bold mb-12 text-center">Frequently Asked Questions</h1>
    <div id="faq-accordion" class="space-y-4">
        <?php 
        $faqs = [
            ['q' => 'How does the translation work?', 'a' => 'We use advanced AI models to translate text within seconds.'],
            ['q' => 'Is my data secure?', 'a' => 'Yes, all translations are encrypted and deleted after processing.'],
            ['q' => 'How can I buy credits?', 'a' => 'Visit the Wallet section in your dashboard to purchase credit packages.']
        ];
        foreach ($faqs as $index => $faq): ?>
            <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden bg-white dark:bg-gray-800">
                <button class="w-full text-left p-6 font-semibold flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-700 transition" onclick="this.nextElementSibling.classList.toggle('hidden')">
                    <?php echo esc_html($faq['q']); ?>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="hidden p-6 pt-0 text-gray-600 dark:text-gray-300"><?php echo esc_html($faq['a']); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php get_footer(); ?>
