<?php
/**
 * Template Name: Markedsføring
 * Template Post Type: page
 */
get_header();
the_post();
?>

<main class="site-main">
    <?php get_template_part('template-parts/service-hero', null, array(
        'title'       => 'Markedsføring',
        'description' => 'Få flere kunder med målrettet markedsføring. Vi hjelper deg med både digital og tradisjonell markedsføring som gir resultater.',
    )); ?>

    <section class="section section-gray">
        <div class="container">
            <h2>Hva vi tilbyr</h2>
            <div class="grid grid-2">
                <a href="<?php echo esc_url(holthe_page_url('digital-markedsforing')); ?>" class="card" style="text-decoration:none;">
                    <div class="card-body">
                        <h3>Digital markedsføring</h3>
                        <p style="color:#4b5563;">SEO, SEM, sosiale medier, e-postmarkedsføring og målrettet annonsering på nett.</p>
                    </div>
                </a>
                <a href="<?php echo esc_url(holthe_page_url('tradisjonell-markedsforing')); ?>" class="card" style="text-decoration:none;">
                    <div class="card-body">
                        <h3>Tradisjonell markedsføring</h3>
                        <p style="color:#4b5563;">Print, utendørsreklame, radio og direkte markedsføring som treffer der kundene er.</p>
                    </div>
                </a>
                <a href="<?php echo esc_url(holthe_page_url('annonsering')); ?>" class="card" style="text-decoration:none;">
                    <div class="card-body">
                        <h3>Annonsering</h3>
                        <p style="color:#4b5563;">Effektive annonsekampanjer på Google, Meta, LinkedIn og andre kanaler.</p>
                    </div>
                </a>
                <a href="<?php echo esc_url(holthe_page_url('innholdsproduksjon')); ?>" class="card" style="text-decoration:none;">
                    <div class="card-body">
                        <h3>Innholdsproduksjon</h3>
                        <p style="color:#4b5563;">Tekst, bilde og video som engasjerer og konverterer.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="section section-dark">
        <div class="container">
            <h2 class="text-center">Resultater som teller</h2>
            <p class="section-subtitle text-center mx-auto" style="max-width:42rem;">Vi måler suksess i reelle resultater for din bedrift &#8211; økt trafikk, flere henvendelser og høyere salg.</p>
            <div class="stats-grid" style="margin-top: 3rem;">
                <div>
                    <div class="stat-value">300%</div>
                    <div class="stat-label">Gjennomsnittlig økning i netttrafikk</div>
                </div>
                <div>
                    <div class="stat-value">85%</div>
                    <div class="stat-label">Av kundene oppnår ROI på over 200%</div>
                </div>
                <div>
                    <div class="stat-value">15+</div>
                    <div class="stat-label">År med erfaring innen markedsføring</div>
                </div>
                <div>
                    <div class="stat-value">100%</div>
                    <div class="stat-label">Dedikerte rådgivere</div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/service-cta', null, array(
        'title'       => 'Klar for å vokse?',
        'description' => 'La oss lage en markedsføringsplan som får din bedrift til å vokse.',
    )); ?>
</main>

<?php get_footer(); ?>
