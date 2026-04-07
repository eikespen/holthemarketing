<?php
/**
 * Default page template
 */
get_header();
?>

<main class="site-main">
    <section class="page-content">
        <div class="container container-narrow">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
