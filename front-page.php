<?php
/**
 * Front Page - Homepage
 */
get_header();

// Make sure $post is set for holthe_field() helpers
$front_id = (int) get_option('page_on_front');
if ($front_id) {
    global $post;
    $post = get_post($front_id);
    setup_postdata($post);
}
?>

<main class="site-main">

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/hero-chess.jpg'); ?>" alt="Strategi">
        </div>
        <div class="container">
            <div class="hero-content">
                <h1>
                    <?php holthe_text('hero_title_1', 'Markedsføring'); ?><br>
                    <?php holthe_text('hero_title_2', 'som skaper'); ?><br>
                    <span class="muted"><?php holthe_text('hero_title_3', 'resultater'); ?></span>
                </h1>
                <p class="hero-subtitle"><?php holthe_text('hero_sub_1', 'Din totalleverandør innen'); ?></p>
                <p class="hero-subtitle-strong"><?php holthe_text('hero_sub_2', 'markedsføring, reklameprodukter og arrangementer.'); ?></p>
                <p class="hero-subtitle-small"><?php holthe_text('hero_sub_3', 'Vi gjør næringslivet synlig'); ?></p>
                <div class="btn-group">
                    <a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>" class="btn btn-white"><?php holthe_text('hero_btn_primary', 'Start ditt prosjekt'); ?></a>
                    <a href="<?php echo esc_url(holthe_page_url('arbeid')); ?>" class="btn btn-outline-white"><?php holthe_text('hero_btn_secondary', 'Se vårt arbeid'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Work Section -->
    <section class="section section-gray" id="work">
        <div class="container">
            <div class="work-header">
                <h2>Arbeid</h2>
                <a href="<?php echo esc_url(holthe_page_url('arbeid')); ?>" class="btn btn-primary">Se alt arbeid</a>
            </div>

            <div class="grid grid-3">
                <?php
                $cases = new WP_Query(array(
                    'post_type'      => 'case_study',
                    'posts_per_page' => 3,
                ));

                if ($cases->have_posts()) :
                    while ($cases->have_posts()) : $cases->the_post();
                        $logo     = get_post_meta(get_the_ID(), 'logo_url', true);
                        $category = get_post_meta(get_the_ID(), 'category', true);
                        $testim   = get_post_meta(get_the_ID(), 'testimonial', true);
                        $author   = get_post_meta(get_the_ID(), 'testimonial_author', true);
                        $role     = get_post_meta(get_the_ID(), 'testimonial_role', true);
                ?>
                <article class="card">
                    <div class="card-body">
                        <div class="case-logo" style="height: 8rem; background: #fff; border: 1px solid #e5e7eb; border-radius: 0.5rem; margin-bottom: 1.5rem; padding: 1rem;">
                            <?php if ($logo) : ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php elseif (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('holthe-case-thumb'); ?>
                            <?php else : ?>
                                <span class="case-logo-placeholder"><?php echo esc_html(mb_substr(get_the_title(), 0, 1)); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ($category) : ?>
                            <span class="badge"><?php echo esc_html($category); ?></span>
                        <?php endif; ?>
                        <h3 class="case-title" style="margin-top: 1rem;"><?php the_title(); ?></h3>
                        <?php if ($testim) : ?>
                            <p class="case-description" style="color:#4b5563;"><?php echo esc_html($testim); ?></p>
                        <?php else : ?>
                            <p class="case-description"><?php echo wp_kses_post(get_the_excerpt()); ?></p>
                        <?php endif; ?>
                        <?php if ($author) : ?>
                            <div style="font-size:0.875rem;color:#6b7280;margin-top:1rem;">
                                <div style="font-weight:500;color:#374151;"><?php echo esc_html($author); ?></div>
                                <div style="font-style:italic;"><?php echo esc_html($role); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback content when no cases are added
                    $fallback_cases = array(
                        array(
                            'client'      => 'MotorForum',
                            'category'    => 'Event & Messe',
                            'testimonial' => 'Vi gikk med et ønske om en Bilmesse og kontaktet Holthe som øyeblikkelig kastet seg rundt.',
                            'author'      => 'Christian Selander',
                            'role'        => 'MotorForum',
                        ),
                        array(
                            'client'      => 'Farris Bad',
                            'category'    => 'Markedsføring',
                            'testimonial' => 'Jeg er trygg på at Holthe gjør deg synlig.',
                            'author'      => 'Andreas Nilson',
                            'role'        => 'Hotelldirektør Farris Bad | Direktør The Well | Grandkvartalet',
                        ),
                        array(
                            'client'      => 'Bedehuset Restaurant',
                            'category'    => 'Reklameproduksjon',
                            'testimonial' => 'Vi bruker alltid Holthe til vårt markedsmateriell.',
                            'author'      => 'Pål Taklo',
                            'role'        => 'Innehaver Bedehuset Restaurant, Majas Bakeri Larvik, Stavern og Amfi.',
                        ),
                    );
                    foreach ($fallback_cases as $case) :
                ?>
                <article class="card">
                    <div class="card-body">
                        <div class="case-logo" style="height: 8rem; background: #fff; border: 1px solid #e5e7eb; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                            <span class="case-logo-placeholder"><?php echo esc_html(mb_substr($case['client'], 0, 1)); ?></span>
                        </div>
                        <span class="badge"><?php echo esc_html($case['category']); ?></span>
                        <h3 class="case-title" style="margin-top: 1rem;"><?php echo esc_html($case['client']); ?></h3>
                        <p class="case-description"><?php echo esc_html($case['testimonial']); ?></p>
                        <div class="case-testimonial">
                            <div class="author"><?php echo esc_html($case['author']); ?></div>
                            <div><?php echo esc_html($case['role']); ?></div>
                        </div>
                    </div>
                </article>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section" id="services">
        <div class="container">
            <h2 class="section-title">Tjenester</h2>
            <p class="section-subtitle">Utfordringer vi hjelper deg med å løse</p>

            <div class="services-list">
                <?php
                $service_defaults = array(
                    1 => array('title' => 'Markedsføring',    'slug' => 'markedsforing',     'desc' => 'Vi kan være din eksterne markedsavdeling og bistå der dere trenger det – enten det er digital eller analog markedsføring.'),
                    2 => array('title' => 'Event & Messe',    'slug' => 'event-og-messe',    'desc' => 'Vi hjelper deg med arrangementer og messer for dine kunder eller leverandører. Fra idé til gjennomføring.'),
                    3 => array('title' => 'Reklameprodukter', 'slug' => 'reklameproduksjon', 'desc' => 'Film, animasjon, markedsmateriell, trykksaker, skilt & dekor. Vi leverer på 1–3 dager!'),
                    4 => array('title' => 'Rådgivning',       'slug' => 'radgivning',        'desc' => 'Har du en plan for markedsføringen din? Vi hjelper deg med å legge en strategi som når din kundegruppe på en effektiv måte.'),
                );
                foreach ($service_defaults as $i => $d) :
                    $title = holthe_field("service_{$i}_title", $d['title']);
                    $desc  = holthe_field("service_{$i}_desc", $d['desc']);
                    $slug  = holthe_field("service_{$i}_slug", $d['slug']);
                ?>
                <div class="service-item">
                    <div class="service-number"><?php echo esc_html(sprintf('%02d', $i)); ?></div>
                    <div class="service-content">
                        <h3><a href="<?php echo esc_url(holthe_page_url($slug)); ?>"><?php echo esc_html($title); ?></a></h3>
                        <p><?php echo esc_html($desc); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section section-dark">
        <div class="container">
            <div class="stats-grid">
                <?php
                $stat_defaults = array(
                    1 => array('15+',  'År med erfaring'),
                    2 => array('100+', 'Prosjekter levert'),
                    3 => array('24/7', 'Support'),
                    4 => array('100%', 'Kundetilfredshet'),
                );
                foreach ($stat_defaults as $i => $d) :
                ?>
                <div>
                    <div class="stat-value"><?php holthe_text("stat_{$i}_value", $d[0]); ?></div>
                    <div class="stat-label"><?php holthe_text("stat_{$i}_label", $d[1]); ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2><?php holthe_text('cta_title', 'Klar for å starte ditt neste prosjekt?'); ?></h2>
            <p><?php holthe_text('cta_description', 'La oss skape noe ekstraordinært sammen. Kontakt oss i dag for en uforpliktende samtale.'); ?></p>
            <div class="btn-group">
                <a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>" class="btn btn-primary"><?php holthe_text('cta_btn_primary', 'Kontakt oss'); ?></a>
                <a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>" class="btn btn-outline"><?php holthe_text('cta_btn_phone', 'Ring ' . holthe_phone()); ?></a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
