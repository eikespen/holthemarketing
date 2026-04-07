<?php
/**
 * Default page template
 *
 * Renders hero + optional "Våre tjenester" grid + optional "Vår tilnærming"
 * numbered steps + optional stats + optional post content + optional CTA.
 */
get_header();
the_post();

$hero_badge       = holthe_field('hero_badge', '');
$hero_title       = holthe_field('hero_title', get_the_title());
$hero_description = holthe_field('hero_description', '');

// Services cards
$service_cards = array();
for ($i = 1; $i <= 4; $i++) {
    $t = holthe_field("services_{$i}_title", '');
    if ($t === '') continue;
    $tags_raw = holthe_field("services_{$i}_tags", '');
    $tags = array_filter(array_map('trim', explode(',', $tags_raw)));
    $service_cards[] = array(
        'title' => $t,
        'desc'  => holthe_field("services_{$i}_desc", ''),
        'tags'  => $tags,
    );
}

// Approach steps
$approach_title = holthe_field('approach_title', '');
$approach_desc  = holthe_field('approach_description', '');
$approach_steps = array();
for ($i = 1; $i <= 3; $i++) {
    $t = holthe_field("approach_{$i}_title", '');
    if ($t === '') continue;
    $approach_steps[] = array(
        'title' => $t,
        'desc'  => holthe_field("approach_{$i}_desc", ''),
    );
}

// Stats
$stats_title = holthe_field('stats_title', '');
$stats_desc  = holthe_field('stats_description', '');
$stats_items = array();
for ($i = 1; $i <= 3; $i++) {
    $v = holthe_field("stat_{$i}_value", '');
    if ($v === '') continue;
    $stats_items[] = array(
        'value' => $v,
        'label' => holthe_field("stat_{$i}_label", ''),
    );
}

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

    <?php if (!empty($service_cards)) : ?>
    <section class="section section-gray">
        <div class="container">
            <h2 style="margin-bottom: 3rem;">Våre tjenester</h2>
            <div class="grid grid-2">
                <?php foreach ($service_cards as $card) : ?>
                <div class="card">
                    <div class="card-body">
                        <h3><?php echo esc_html($card['title']); ?></h3>
                        <p style="color:#4b5563;"><?php echo esc_html($card['desc']); ?></p>
                        <?php if (!empty($card['tags'])) : ?>
                            <div class="service-tags" style="margin-top:1rem;display:flex;flex-wrap:wrap;gap:0.5rem;">
                                <?php foreach ($card['tags'] as $tag) : ?>
                                    <span class="badge"><?php echo esc_html($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if (!empty($approach_steps)) : ?>
    <section class="section">
        <div class="container">
            <?php if ($approach_title) : ?>
                <h2><?php echo esc_html($approach_title); ?></h2>
            <?php endif; ?>
            <?php if ($approach_desc) : ?>
                <p class="section-subtitle"><?php echo esc_html($approach_desc); ?></p>
            <?php endif; ?>
            <div class="services-list">
                <?php foreach ($approach_steps as $i => $step) : ?>
                <div class="service-item">
                    <div class="service-number"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></div>
                    <div class="service-content">
                        <h3><?php echo esc_html($step['title']); ?></h3>
                        <p><?php echo esc_html($step['desc']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if (!empty($stats_items)) : ?>
    <section class="section section-dark">
        <div class="container">
            <?php if ($stats_title) : ?>
                <h2 class="text-center" style="margin-bottom: 1rem;"><?php echo esc_html($stats_title); ?></h2>
            <?php endif; ?>
            <?php if ($stats_desc) : ?>
                <p class="section-subtitle text-center mx-auto" style="max-width:42rem;margin-bottom:3rem;"><?php echo esc_html($stats_desc); ?></p>
            <?php endif; ?>
            <div class="stats-grid">
                <?php foreach ($stats_items as $stat) : ?>
                <div>
                    <div class="stat-value"><?php echo esc_html($stat['value']); ?></div>
                    <div class="stat-label"><?php echo esc_html($stat['label']); ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

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
