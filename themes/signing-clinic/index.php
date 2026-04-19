<?php
/**
 * Generic fallback template
 */
get_header(); ?>

<main class="pt-24 pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen">
    
    <!-- Breadcrumbs -->
    <?php ai_translate_breadcrumbs(); ?>

    <?php if ( have_posts() ) : ?>
        <div class="space-y-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                    <h2 class="text-3xl font-bold mb-4">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="prose dark:prose-invert max-w-none">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <div class="text-center py-20">
            <h2 class="text-2xl font-bold">Nothing found</h2>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
