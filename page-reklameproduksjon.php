<?php
/**
 * Template Name: Reklameproduksjon
 * Template Post Type: page
 */
get_header();
the_post();
?>

<main class="site-main">
    <?php get_template_part('template-parts/service-hero', null, array(
        'title'       => 'Reklameproduksjon',
        'description' => 'Fra giveaways til profesjonell klesprofilering. Vi leverer reklameartikler som styrker ditt merke og skaper varige inntrykk.',
    )); ?>

    <section class="section section-gray">
        <div class="container">
            <h2>Hvorfor velge oss?</h2>
            <div class="grid grid-4">
                <div>
                    <h3>Kvalitet</h3>
                    <p style="color:#4b5563;">Vi samarbeider kun med leverandører som holder høy kvalitet over tid.</p>
                </div>
                <div>
                    <h3>Rask levering</h3>
                    <p style="color:#4b5563;">1&#8211;3 dagers leveringstid på mange produkter.</p>
                </div>
                <div>
                    <h3>Bredt utvalg</h3>
                    <p style="color:#4b5563;">Alt fra trykksaker og klær til skilt, dekor og messeutstyr.</p>
                </div>
                <div>
                    <h3>Fullservice</h3>
                    <p style="color:#4b5563;">Vi håndterer design, produksjon og levering &#8211; du slipper å koordinere flere leverandører.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2>Produktkategorier</h2>
            <p class="section-subtitle">Vi tilbyr et bredt spekter av reklameprodukter tilpasset dine behov.</p>
            <div class="grid grid-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Trykksaker</h3>
                        <p style="color:#4b5563;">Brosjyrer, foldere, visittkort, plakater, kataloger og mye mer.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Profilklær</h3>
                        <p style="color:#4b5563;">T-skjorter, jakker, caps og arbeidstøy med din logo.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Skilt &amp; dekor</h3>
                        <p style="color:#4b5563;">Fasadeskilt, bilreklame, messestand og interiør med merkevaren din.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Giveaways</h3>
                        <p style="color:#4b5563;">Smarte og gjennomtenkte gaveartikler som skaper varige inntrykk.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Film &amp; animasjon</h3>
                        <p style="color:#4b5563;">Profesjonell film og animasjon for nett, sosiale medier og intern bruk.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Messeutstyr</h3>
                        <p style="color:#4b5563;">Rollups, bannere, beachflagg og komplette messestands.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-gray">
        <div class="container">
            <h2>Fra idé til ferdig produkt</h2>
            <div class="grid grid-4" style="margin-top: 3rem;">
                <div>
                    <div class="service-number">01</div>
                    <h3>Idé</h3>
                    <p style="color:#4b5563;">Vi finner den beste løsningen for ditt behov og budsjett.</p>
                </div>
                <div>
                    <div class="service-number">02</div>
                    <h3>Design</h3>
                    <p style="color:#4b5563;">Vårt designteam lager profesjonelle og merkevaretilpassede grafiske løsninger.</p>
                </div>
                <div>
                    <div class="service-number">03</div>
                    <h3>Produksjon</h3>
                    <p style="color:#4b5563;">Vi produserer hos kvalitetsleverandører med kort leveringstid.</p>
                </div>
                <div>
                    <div class="service-number">04</div>
                    <h3>Levering</h3>
                    <p style="color:#4b5563;">Rask levering rett på døra &#8211; eller dit du ønsker.</p>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/service-cta', null, array(
        'title'       => 'Klar for å styrke ditt merke?',
        'description' => 'Kontakt oss for en gjennomgang av vårt produktutvalg og priser.',
    )); ?>
</main>

<?php get_footer(); ?>
