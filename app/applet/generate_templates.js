const fs = require('fs');

const templates = [
  // PUBLIC
  { file: 'page-services.php', name: 'Services', title: 'Our Interpreting & Translation Services' },
  { file: 'page-about.php', name: 'About Us', title: 'About AI Translate Pro' },
  { file: 'page-contact.php', name: 'Contact', title: 'Get in Touch' },
  { file: 'page-faq.php', name: 'FAQ', title: 'Frequently Asked Questions' },
  { file: 'page-careers.php', name: 'Careers', title: 'Join Our Team' },
  { file: 'page-api.php', name: 'API Documentation', title: 'API Documentation' },
  { file: 'page-enterprise.php', name: 'Enterprise Solutions', title: 'Enterprise Language Solutions' },
  
  // AUTH
  { file: 'page-register.php', name: 'Register', title: 'Create an Account' },
  { file: 'page-forgot-password.php', name: 'Forgot Password', title: 'Reset Your Password' },
  { file: 'page-verify-email.php', name: 'Email Verification', title: 'Verify Your Email' },

  // USER
  { file: 'page-orders.php', name: 'Orders', title: 'My Translation Orders' },
  { file: 'page-bookings.php', name: 'Bookings', title: 'My Bookings' },
  { file: 'page-wallet.php', name: 'Wallet', title: 'Credit & Wallet System' },
  { file: 'page-settings.php', name: 'Settings', title: 'Account Settings' },
  { file: 'page-notifications.php', name: 'Notifications', title: 'Notifications' },
  { file: 'page-messages.php', name: 'Messages', title: 'Messages & Chat' },

  // BUSINESS
  { file: 'page-team.php', name: 'Team Management', title: 'Team Management' },
  { file: 'page-reports.php', name: 'Usage Reports', title: 'Usage Reports' },
  { file: 'page-billing.php', name: 'Billing', title: 'Billing & Invoices' },

  // TRANSLATOR
  { file: 'page-translator-profile.php', name: 'Translator Profile', title: 'Translator Profile' },
  { file: 'page-job-requests.php', name: 'Job Requests', title: 'Open Job Requests' },
  { file: 'page-earnings.php', name: 'Earnings Dashboard', title: 'Earnings & Payouts' },

  // LEGAL
  { file: 'page-privacy.php', name: 'Privacy Policy', title: 'Privacy Policy' },
  { file: 'page-terms.php', name: 'Terms of Service', title: 'Terms of Service' },
  { file: 'page-refund.php', name: 'Refund Policy', title: 'Refund Policy' },
];

templates.forEach(t => {
  const content = `<?php
/**
 * Template Name: ${t.name}
 */
get_header(); ?>

<main class="pt-24 pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen">
    <!-- Breadcrumbs -->
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
            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">${t.name}</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 p-8 md:p-12">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">${t.title}</h1>
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="prose dark:prose-invert max-w-none">
                <?php the_content(); ?>
            </div>
        <?php endwhile; else: ?>
            <p class="text-gray-500 dark:text-gray-400">Content for ${t.name} is coming soon.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
`;
  fs.writeFileSync('/ai-translation-theme/templates/' + t.file, content);
});
console.log('Templates generated');
