<?php
/**
 * Single case study template
 */
get_header();

$logo     = get_post_meta(get_the_ID(), 'logo_url', true);
$category = get_post_meta(get_the_ID(), 'category', true);
$year     = get_post_meta(get_the_ID(), 'year', true);
$project  = get_post_meta(get_the_ID(), 'project', true);
$author   = get_post_meta(get_the_ID(), 'testimonial_author', true);
$role     = get_post_meta(get_the_ID(), 'testimonial_role', true);
$testim   = get_post_meta(get_the_ID(), 'testimonial', true);
?>

<main class="site-main">
    <section class="page-hero dark">
        <div class="container">
            <?php if ($category) : ?>
                <span class="badge" style="background: rgba(255,255,255,0.1); color: #fff; border-color: rgba(255,255,255,0.2);"><?php echo esc_html($category); ?></span>
            <?php endif; ?>
            <h1 style="margin-top: 1rem;"><?php the_title(); ?></h1>
            <?php if ($project) : ?>
                <p class="lead"><?php echo esc_html($project); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="page-content">
        <div class="container container-narrow">
            <?php if (has_post_thumbnail() || $logo) : ?>
                <div style="margin-bottom: 3rem;">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php elseif ($logo) : ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php while (have_posts()) : the_post(); ?>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>

            <?php if ($testim) : ?>
                <blockquote style="border-left: 4px solid #000; padding: 1.5rem 2rem; margin: 3rem 0; background: #f9fafb; font-style: italic; font-size: 1.25rem;">
                    &ldquo;<?php echo esc_html($testim); ?>&rdquo;
                    <?php if ($author) : ?>
                        <footer style="margin-top: 1rem; font-style: normal; font-size: 1rem; color: #4b5563;">
                            <strong><?php echo esc_html($author); ?></strong><?php if ($role) : ?>, <?php echo esc_html($role); ?><?php endif; ?>
                        </footer>
                    <?php endif; ?>
                </blockquote>
            <?php endif; ?>

            <div style="margin-top: 3rem;">
                <a href="<?php echo esc_url(holthe_page_url('arbeid')); ?>" class="btn btn-outline">&larr; Se alle prosjekter</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
