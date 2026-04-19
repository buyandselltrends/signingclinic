<?php get_header(); ?>
<main class="pt-24 pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen">
    <?php ai_translate_breadcrumbs(); ?>
    <h1 class="text-3xl font-bold mb-2">Author: <?php the_author_meta('display_name'); ?></h1>
    <p class="text-gray-600 mb-8"><?php the_author_meta('description'); ?></p>
    <?php if ( have_posts() ) : ?>
        <div class="space-y-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                    <h2 class="text-2xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="text-sm text-gray-500 mb-4"><?php echo get_the_date(); ?></div>
                    <div class="prose dark:prose-invert max-w-none"><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>
            <div class="pagination mt-8"><?php the_posts_pagination(); ?></div>
        </div>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
