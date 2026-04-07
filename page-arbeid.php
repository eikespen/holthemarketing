<?php
/**
 * Template Name: Arbeid
 * Template Post Type: page
 */
get_header();
?>

<main class="site-main">

    <section class="page-hero dark">
        <div class="container">
            <h1>Vårt arbeid</h1>
            <p class="lead">Se hvordan vi har hjulpet bedrifter med å vokse gjennom smart strategi og eksepsjonell gjennomføring.</p>
        </div>
    </section>

    <section class="work-filter">
        <div class="container">
            <div class="filter-pills">
                <span class="filter-pill active">Alle</span>
                <span class="filter-pill">Event &amp; Messe</span>
                <span class="filter-pill">Markedsføring</span>
                <span class="filter-pill">Reklameproduksjon</span>
                <span class="filter-pill">Rådgivning</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="grid grid-3">
                <?php
                $cases = new WP_Query(array(
                    'post_type'      => 'case_study',
                    'posts_per_page' => -1,
                ));

                if ($cases->have_posts()) :
                    while ($cases->have_posts()) : $cases->the_post();
                        $logo     = get_post_meta(get_the_ID(), 'logo_url', true);
                        $category = get_post_meta(get_the_ID(), 'category', true);
                        $year     = get_post_meta(get_the_ID(), 'year', true);
                        $project  = get_post_meta(get_the_ID(), 'project', true);
                        $author   = get_post_meta(get_the_ID(), 'testimonial_author', true);
                        $role     = get_post_meta(get_the_ID(), 'testimonial_role', true);
                        $testim   = get_post_meta(get_the_ID(), 'testimonial', true);
                        $result1  = get_post_meta(get_the_ID(), 'result_1', true);
                        $result2  = get_post_meta(get_the_ID(), 'result_2', true);
                        $result3  = get_post_meta(get_the_ID(), 'result_3', true);
                ?>
                <article class="case-card">
                    <div class="case-logo">
                        <?php if ($logo) : ?>
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php elseif (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('holthe-case-thumb'); ?>
                        <?php else : ?>
                            <span class="case-logo-placeholder"><?php echo esc_html(mb_substr(get_the_title(), 0, 1)); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="case-body">
                        <div class="case-meta">
                            <?php if ($category) : ?>
                                <span class="badge"><?php echo esc_html($category); ?></span>
                            <?php endif; ?>
                            <?php if ($year) : ?>
                                <span class="case-year"><?php echo esc_html($year); ?></span>
                            <?php endif; ?>
                        </div>
                        <h3 class="case-title"><?php the_title(); ?></h3>
                        <?php if ($project) : ?>
                            <div class="case-project"><?php echo esc_html($project); ?></div>
                        <?php endif; ?>
                        <div class="case-description"><?php echo wp_kses_post(get_the_excerpt()); ?></div>
                        <?php if ($result1 || $result2 || $result3) : ?>
                            <ul class="case-results">
                                <?php if ($result1) : ?><li><?php echo esc_html($result1); ?></li><?php endif; ?>
                                <?php if ($result2) : ?><li><?php echo esc_html($result2); ?></li><?php endif; ?>
                                <?php if ($result3) : ?><li><?php echo esc_html($result3); ?></li><?php endif; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if ($testim) : ?>
                            <div class="case-testimonial">
                                "<?php echo esc_html($testim); ?>"
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
                    // Fallback placeholder content
                    ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 0; color: #6b7280;">
                        <p>Ingen prosjekter er lagt til ennå. Legg til prosjekter under <strong>Prosjekter</strong> i WordPress-adminen.</p>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <section class="section section-dark">
        <div class="container">
            <h2 class="text-center" style="margin-bottom: 3rem;">Resultater som teller</h2>
            <div class="stats-grid">
                <div>
                    <div class="stat-value">100+</div>
                    <div class="stat-label">Prosjekter levert</div>
                </div>
                <div>
                    <div class="stat-value">50+</div>
                    <div class="stat-label">Fornøyde kunder</div>
                </div>
                <div>
                    <div class="stat-value">15+</div>
                    <div class="stat-label">År med erfaring</div>
                </div>
                <div>
                    <div class="stat-value">98%</div>
                    <div class="stat-label">Kundetilfredshet</div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2>Skal vi skape resultater for deg også?</h2>
            <p>La oss diskutere hvordan vi kan hjelpe din bedrift med å nå sine mål.</p>
            <div class="btn-group">
                <a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>" class="btn btn-primary">Kontakt oss</a>
                <a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>" class="btn btn-outline">Ring <?php echo esc_html(holthe_phone()); ?></a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
