<?php
/**
 * Single news template
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
                            <div class="post-meta" style="color:#6b7280; margin-bottom: 0.5rem;"><?php echo esc_html(get_the_date()); ?></div>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail" style="margin: 2rem 0;">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>

                    <div style="margin-top: 3rem;">
                        <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>" class="btn btn-outline">&larr; Alle nyheter</a>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
