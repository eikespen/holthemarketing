<?php
/**
 * Main index template - blog listing fallback
 */
get_header();
?>

<main class="site-main">
    <section class="archive-header">
        <div class="container">
            <h1><?php
                if (is_home() && !is_front_page()) {
                    single_post_title();
                } elseif (is_archive()) {
                    the_archive_title();
                } else {
                    echo 'Nyheter';
                }
            ?></h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="post-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article <?php post_class('card post-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="post-thumb">
                                    <?php the_post_thumbnail('holthe-news-thumb'); ?>
                                </a>
                            <?php endif; ?>
                            <div class="post-body">
                                <div class="post-meta"><?php echo esc_html(get_the_date()); ?></div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="post-excerpt"><?php the_excerpt(); ?></div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php the_posts_pagination(array('mid_size' => 2)); ?>
            <?php else : ?>
                <p>Ingen innlegg funnet.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
