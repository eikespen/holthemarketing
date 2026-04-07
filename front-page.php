<?php
/**
 * Front Page - Homepage
 */
get_header();
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
                    Markedsføring<br>
                    som skaper<br>
                    <span class="muted">resultater</span>
                </h1>
                <p class="hero-subtitle">Din totalleverandør innen</p>
                <p class="hero-subtitle-strong">markedsføring, reklameprodukter og arrangementer.</p>
                <p class="hero-subtitle-small">Vi gjør næringslivet synlig</p>
                <div class="btn-group">
                    <a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>" class="btn btn-white">Start ditt prosjekt</a>
                    <a href="<?php echo esc_url(holthe_page_url('arbeid')); ?>" class="btn btn-outline-white">Se vårt arbeid</a>
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
                        <p class="case-description"><?php echo wp_kses_post(get_the_excerpt()); ?></p>
                        <?php if ($author) : ?>
                            <div class="case-testimonial">
                                <div class="author"><?php echo esc_html($author); ?></div>
                                <div><?php echo esc_html($role); ?></div>
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
                <div class="service-item">
                    <div class="service-number">01</div>
                    <div class="service-content">
                        <h3><a href="<?php echo esc_url(holthe_page_url('markedsforing')); ?>">Markedsføring</a></h3>
                        <p>Vi kan være din eksterne markedsavdeling og bistå der dere trenger det &#8211; enten det er digital eller analog markedsføring.</p>
                    </div>
                </div>
                <div class="service-item">
                    <div class="service-number">02</div>
                    <div class="service-content">
                        <h3><a href="<?php echo esc_url(holthe_page_url('event-og-messe')); ?>">Event &amp; Messe</a></h3>
                        <p>Vi hjelper deg med arrangementer og messer for dine kunder eller leverandører. Fra idé til gjennomføring.</p>
                    </div>
                </div>
                <div class="service-item">
                    <div class="service-number">03</div>
                    <div class="service-content">
                        <h3><a href="<?php echo esc_url(holthe_page_url('reklameproduksjon')); ?>">Reklameprodukter</a></h3>
                        <p>Film, animasjon, markedsmateriell, trykksaker, skilt &amp; dekor. Vi leverer på 1&#8211;3 dager!</p>
                    </div>
                </div>
                <div class="service-item">
                    <div class="service-number">04</div>
                    <div class="service-content">
                        <h3><a href="<?php echo esc_url(holthe_page_url('radgivning')); ?>">Rådgivning</a></h3>
                        <p>Har du en plan for markedsføringen din? Vi hjelper deg med å legge en strategi som når din kundegruppe på en effektiv måte.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section section-dark">
        <div class="container">
            <div class="stats-grid">
                <div>
                    <div class="stat-value">15+</div>
                    <div class="stat-label">År med erfaring</div>
                </div>
                <div>
                    <div class="stat-value">100+</div>
                    <div class="stat-label">Prosjekter levert</div>
                </div>
                <div>
                    <div class="stat-value">24/7</div>
                    <div class="stat-label">Support</div>
                </div>
                <div>
                    <div class="stat-value">100%</div>
                    <div class="stat-label">Kundetilfredshet</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Klar for å starte ditt neste prosjekt?</h2>
            <p>La oss skape noe ekstraordinært sammen. Kontakt oss i dag for en uforpliktende samtale.</p>
            <div class="btn-group">
                <a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>" class="btn btn-primary">Kontakt oss</a>
                <a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>" class="btn btn-outline">Ring <?php echo esc_html(holthe_phone()); ?></a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
