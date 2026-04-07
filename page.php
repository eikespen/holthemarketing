<?php
/**
 * Default page template
 *
 * Used by any page that doesn't have a more specific page-<slug>.php template.
 * Renders a hero (from meta), the post content, and an optional CTA.
 */
get_header();
the_post();

$hero_badge       = holthe_field('hero_badge', '');
$hero_title       = holthe_field('hero_title', get_the_title());
$hero_description = holthe_field('hero_description', '');
$cta_show         = holthe_field('cta_show', '1');
$cta_title        = holthe_field('cta_title', 'Klar for å starte?');
$cta_description  = holthe_field('cta_description', 'Kontakt oss for en uforpliktende samtale.');
?>

<main class="site-main">

    <section class="page-hero">
        <div class="container">
            <?php if ($hero_badge) : ?>
                <span class="badge badge-outline"><?php echo esc_html($hero_badge); ?></span>
            <?php endif; ?>
            <h1 style="margin-top: 1rem;"><?php echo esc_html($hero_title); ?></h1>
            <?php if ($hero_description) : ?>
                <p class="lead"><?php echo esc_html($hero_description); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <?php
    $content = get_the_content();
    if (!empty(trim($content))) :
        ?>
        <section class="section">
            <div class="container container-narrow">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>
        </section>
        <?php
    endif;
    ?>

    <?php if ($cta_show !== '0') : ?>
    <section class="cta-section">
        <div class="container">
            <h2><?php echo esc_html($cta_title); ?></h2>
            <p><?php echo esc_html($cta_description); ?></p>
            <div class="btn-group">
                <a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>" class="btn btn-primary">Kontakt oss</a>
                <a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>" class="btn btn-outline">Ring <?php echo esc_html(holthe_phone()); ?></a>
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
