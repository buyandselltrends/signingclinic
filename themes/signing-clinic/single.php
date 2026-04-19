<?php get_header(); ?>
<main class="pt-24 pb-16 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen">
    <?php ai_translate_breadcrumbs(); ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <article class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
            <h1 class="text-4xl font-extrabold mb-4"><?php the_title(); ?></h1>
            <div class="text-sm text-gray-500 mb-6">
                Published on <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?>
            </div>
            <div class="prose dark:prose-invert max-w-none">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
