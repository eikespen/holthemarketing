<?php
/**
 * Template Name: Event & Messe
 * Template Post Type: page
 */
get_header();
?>

<main class="site-main">
    <?php get_template_part('template-parts/service-hero', null, array(
        'title'       => 'Event & Messe',
        'description' => 'Vi hjelper deg med arrangementer og messer for dine kunder eller leverandører. Fra idé til gjennomføring.',
    )); ?>

    <section class="section section-gray">
        <div class="container">
            <h2>Hva vi tilbyr</h2>
            <p class="section-subtitle">Komplett hjelp fra konsept til gjennomføring.</p>
            <div class="grid grid-2">
                <div class="card">
                    <div class="card-body">
                        <h3>Konsept &amp; planlegging</h3>
                        <p style="color:#4b5563;">Vi hjelper deg med å utvikle et arrangementskonsept som engasjerer målgruppen din.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Logistikk &amp; produksjon</h3>
                        <p style="color:#4b5563;">Lokaler, scene, lyd &amp; lys, catering, bemanning &#8211; vi håndterer alt.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Markedsføring &amp; påmelding</h3>
                        <p style="color:#4b5563;">Vi sørger for at deltakerne dukker opp &#8211; fra invitasjon til påmeldingssystem.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Profilering</h3>
                        <p style="color:#4b5563;">Profilmateriell, messestand, bannere, skilt og alt som trengs for å bli sett.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2>Vår prosess</h2>
            <p class="section-subtitle">Fire trinn til et vellykket arrangement.</p>
            <div class="grid grid-4">
                <div>
                    <div class="service-number">01</div>
                    <h3>Idé &amp; konsept</h3>
                    <p style="color:#4b5563;">Vi utvikler arrangementet sammen med deg.</p>
                </div>
                <div>
                    <div class="service-number">02</div>
                    <h3>Planlegging</h3>
                    <p style="color:#4b5563;">Detaljert plan for logistikk, markedsføring og gjennomføring.</p>
                </div>
                <div>
                    <div class="service-number">03</div>
                    <h3>Gjennomføring</h3>
                    <p style="color:#4b5563;">Vi står på under hele arrangementet og sikrer at alt går etter planen.</p>
                </div>
                <div>
                    <div class="service-number">04</div>
                    <h3>Oppfølging</h3>
                    <p style="color:#4b5563;">Evaluering, rapportering og oppfølging av deltakerne.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-dark">
        <div class="container">
            <div class="stats-grid">
                <div>
                    <div class="stat-value">50+</div>
                    <div class="stat-label">Events per år</div>
                </div>
                <div>
                    <div class="stat-value">1000+</div>
                    <div class="stat-label">Deltakere</div>
                </div>
                <div>
                    <div class="stat-value">15+</div>
                    <div class="stat-label">Års erfaring</div>
                </div>
                <div>
                    <div class="stat-value">100%</div>
                    <div class="stat-label">Dedikasjon</div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/service-cta', null, array(
        'title'       => 'Planlegger du et arrangement?',
        'description' => 'La oss gjøre det til en suksess. Kontakt oss for en uforpliktende samtale.',
    )); ?>
</main>

<?php get_footer(); ?>
