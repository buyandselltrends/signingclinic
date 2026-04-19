<?php
/**
 * Template Name: Careers
 */
get_header(); ?>
<main class="pt-32 pb-20 max-w-4xl mx-auto px-4">
    <h1 class="text-4xl font-bold mb-8">Careers</h1>
    <div class="prose dark:prose-invert mb-12">
        <p>Join our mission to bridge global communication.</p>
        <h2>Open Positions</h2>
        <ul>
            <li>Senior AI Engineer</li>
            <li>Frontend Developer</li>
        </ul>
    </div>
    <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-2xl">
        <h3 class="text-2xl font-bold mb-6">Apply Now</h3>
        <form class="space-y-4">
            <input type="text" placeholder="Your Name" class="w-full p-3 rounded-lg border dark:bg-gray-700">
            <input type="email" placeholder="Email" class="w-full p-3 rounded-lg border dark:bg-gray-700">
            <textarea placeholder="Tell us about yourself..." class="w-full p-3 rounded-lg border dark:bg-gray-700"></textarea>
            <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold">Submit Application</button>
        </form>
    </div>
</main>
<?php get_footer(); ?>
