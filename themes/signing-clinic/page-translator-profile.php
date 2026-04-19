<?php
/**
 * Template Name: Translator Profile
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
            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-300">Translator Profile</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="bg-white dark:bg-gray-900 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 p-8 md:p-12">
        <?php
        $user_id = get_current_user_id();
        if ( isset($_GET['tr_id']) ) {
            $user_id = intval($_GET['tr_id']);
        }

        $user_info = get_userdata($user_id);
        
        if ($user_info) :
            $languages = get_user_meta($user_id, 'aits_languages', true);
            $rates = get_user_meta($user_id, 'aits_rates', true);
            $specialization = get_user_meta($user_id, 'aits_specialization', true);
            $bio = get_user_meta($user_id, 'aits_bio', true);
            $formats = get_user_meta($user_id, 'aits_formats', true);
            $rating = get_user_meta($user_id, 'tm_avg_rating', true) ?: 'N/A';
        ?>
            <div class="flex flex-col md:flex-row gap-8 items-start mb-12">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-3xl flex items-center justify-center text-blue-600 dark:text-blue-400 text-4xl font-bold border-4 border-white dark:border-gray-800 shadow-xl">
                    <?php echo esc_html(substr($user_info->display_name, 0, 1)); ?>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white"><?php echo esc_html($user_info->display_name); ?></h1>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase">Verified Pro</span>
                    </div>
                    <p class="text-lg text-gray-500 mb-6"><?php echo esc_html($specialization ?: 'Professional Linguist'); ?></p>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center gap-1.5 px-4 py-2 bg-gray-50 dark:bg-gray-800 rounded-xl text-sm font-semibold">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <?php echo esc_html($rating); ?> Rating
                        </div>
                        <div class="flex items-center gap-1.5 px-4 py-2 bg-gray-50 dark:bg-gray-800 rounded-xl text-sm font-semibold text-blue-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5a18.022 18.022 0 01-3.827-5.802M10.999 5.5l1.011 2.685M7 7l1.011 2.685m4.989 3.315a18.022 18.022 0 01-3.828 5.799m1.42 4.087l-4.545-4.454m0 0l-1.011-2.685M12 21a9.003 9.003 0 008.313-5.547M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Native Speaker
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-auto mt-6 md:mt-0">
                    <button class="w-full md:w-auto px-10 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/20">Hire This Translator</button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2 space-y-10">
                    <section>
                        <h2 class="text-xl font-extrabold mb-4 flex items-center gap-2">
                            <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                            Professional Bio
                        </h2>
                        <div class="text-gray-600 dark:text-gray-400 leading-relaxed text-lg">
                            <?php echo wpautop(esc_html($bio ?: 'This translator has not provided a bio yet.')); ?>
                        </div>
                    </section>

                    <section class="p-8 bg-gray-50 dark:bg-gray-800/50 rounded-3xl border border-gray-100 dark:border-gray-800">
                        <h2 class="text-xl font-extrabold mb-6">Experience & Skills</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Languages</p>
                                <p class="text-gray-900 dark:text-white font-medium"><?php echo esc_html($languages ?: 'None listed'); ?></p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Specializations</p>
                                <p class="text-gray-900 dark:text-white font-medium"><?php echo esc_html($specialization ?: 'General Translation'); ?></p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Accepted Formats</p>
                                <p class="text-gray-900 dark:text-white font-medium"><?php echo esc_html($formats ?: 'PDF, DOCX, TXT'); ?></p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Standard Rate</p>
                                <p class="text-2xl font-black text-blue-600">$<?php echo esc_html($rates ?: '0.10'); ?><span class="text-xs text-gray-500 font-normal ml-1">/word</span></p>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="space-y-8">
                     <div class="p-8 bg-gradient-to-br from-gray-900 to-black rounded-3xl text-white shadow-2xl">
                        <h3 class="text-lg font-bold mb-4">Quick Fact</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-6 italic">"Available for large enterprise projects with 24-hour turnaround times."</p>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-3 text-sm">
                                <span class="text-green-400">✓</span> High Availability
                            </li>
                            <li class="flex items-center gap-3 text-sm">
                                <span class="text-green-400">✓</span> NDA Signed
                            </li>
                        </ul>
                     </div>
                </div>
            </div>

            <!-- Recent Reviews -->
            <div class="mt-20">
                <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-8">Recent Feedback</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white dark:bg-gray-900 p-8 rounded-[32px] border border-gray-100 dark:border-gray-800 shadow-sm relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50/20 dark:bg-blue-900/10 rounded-bl-[120px] -mr-12 -mt-12 transition-all group-hover:scale-110"></div>
                        <div class="flex justify-between items-center mb-6 relative z-10">
                            <div class="flex text-yellow-500">
                                <?php for($i=0; $i<5; $i++): ?>
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <?php endfor; ?>
                            </div>
                            <span class="text-[10px] text-gray-400 font-black tracking-widest uppercase">October 2026</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-8 font-medium italic">"The automated workflow coupled with <?php echo esc_html($user_info->display_name); ?>'s final polish saved us significantly on our annual translation budget."</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center font-bold text-gray-400">MV</div>
                            <div>
                                <p class="text-[10px] font-black uppercase tracking-widest leading-none text-gray-900 dark:text-white">Marcus V.</p>
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Tech Solutions Inc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <div class="text-center py-20">
                <div class="w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold mb-2">Profile Not Found</h2>
                <p class="text-gray-500">The translator ID specified does not exist or has been removed.</p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mt-8 inline-block text-blue-600 font-bold underline">Return to marketplace</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>