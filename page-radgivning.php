<?php
/**
 * Template Name: Rådgivning
 * Template Post Type: page
 */
get_header();
?>

<main class="site-main">
    <?php get_template_part('template-parts/service-hero', null, array(
        'title'       => 'Rådgivning',
        'description' => 'Har du en plan for markedsføringen din? Vi hjelper deg med å legge en strategi som når din kundegruppe på en effektiv måte.',
    )); ?>

    <section class="section section-gray">
        <div class="container">
            <div class="two-col" style="margin-bottom: 4rem;">
                <div>
                    <h2>Skreddersydd markedsføringsstrategi</h2>
                    <p style="font-size:1.125rem; color:#4b5563;">Vår erfaring viser at bedrifter med en klar markedsføringsstrategi oppnår bedre resultater. Vi bistår deg i hele prosessen &#8211; fra analyse til implementering.</p>
                    <p style="font-size:1.125rem; color:#4b5563;">Med Holthe får du en dedikert rådgiver som forstår din bransje og dine utfordringer. Vi kombinerer databasert analyse med kreativ tenkning for å finne de beste løsningene.</p>
                </div>
                <div class="image-placeholder light">R</div>
            </div>

            <div class="grid grid-2">
                <div class="card">
                    <div class="card-body">
                        <h3>Strategiutvikling</h3>
                        <p style="color:#4b5563;">Vi lager en helhetlig markedsføringsstrategi som er tilpasset dine mål og ressurser.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Markedsanalyse</h3>
                        <p style="color:#4b5563;">Grundig analyse av marked, konkurrenter og målgrupper for å finne de beste mulighetene.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Posisjonering</h3>
                        <p style="color:#4b5563;">Vi hjelper deg med å finne din unike posisjon i markedet og kommunisere den tydelig.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Løpende rådgivning</h3>
                        <p style="color:#4b5563;">Vi kan være din sparringspartner over tid og bistå med justeringer og nye initiativ.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/service-cta', null, array(
        'title'       => 'Klar for å ta markedsføringen til neste nivå?',
        'description' => 'Kontakt oss for en uforpliktende samtale om hvordan vi kan hjelpe deg.',
    )); ?>
</main>

<?php get_footer(); ?>
