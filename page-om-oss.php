<?php
/**
 * Template Name: Om oss
 * Template Post Type: page
 */
get_header();
?>

<main class="site-main">

    <section class="page-hero">
        <div class="container">
            <span class="badge badge-outline">Om oss</span>
            <h1 style="margin-top: 1rem;">Din totalleverandør innen markedsføring</h1>
            <p class="lead">Holthe Marketing leverer kompetanse og gjennomføring under ett tak. Vi kombinerer strategisk tenkning med praktisk gjennomføring for å skape resultater som varer.</p>
        </div>
    </section>

    <section class="section section-gray">
        <div class="container">
            <div class="two-col">
                <div>
                    <h2>Vår historie</h2>
                    <p>Siden 2009 har vi hjulpet bedrifter med å vokse gjennom smart markedsføring og kreative løsninger. Det som startet som en liten markedsføringsbedrift har utviklet seg til en totalleverandør med kompetanse innen alt fra strategisk rådgivning til praktisk gjennomføring.</p>
                    <p>Vi brenner for å hjelpe bedrifter med å nå sitt potensial. Med et team av erfarne fagfolk og et nettverk av samarbeidspartnere, leverer vi resultater som gjør en reell forskjell.</p>
                </div>
                <div class="image-placeholder">H</div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 style="margin-bottom: 3rem;">Våre kompetanseområder</h2>
            <div class="grid grid-2">
                <div class="card">
                    <div class="card-body">
                        <h3>Strategi &amp; rådgivning</h3>
                        <p>Vi hjelper deg med å legge en markedsføringsstrategi som treffer riktig kundegruppe og gir målbare resultater.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Event &amp; messe</h3>
                        <p>Fra idé til gjennomføring. Vi planlegger og arrangerer events og messer som engasjerer og skaper verdi.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Produksjon &amp; design</h3>
                        <p>Film, animasjon, trykksaker, skilt &amp; dekor. Vi leverer profesjonelt markedsmateriell raskt og effektivt.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Digital markedsføring</h3>
                        <p>SEO, SEM, sosiale medier og innholdsproduksjon. Vi sørger for at du blir funnet og husket på nett.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-gray">
        <div class="container">
            <h2>Hvorfor velge oss?</h2>
            <p class="section-subtitle">Vi er mer enn bare en leverandør &#8211; vi er din partner for vekst.</p>
            <div class="grid grid-4">
                <div>
                    <h3>Erfaring</h3>
                    <p style="color:#4b5563;">Over 15 års erfaring med å levere resultater for kunder i ulike bransjer.</p>
                </div>
                <div>
                    <h3>Kompetanse</h3>
                    <p style="color:#4b5563;">Bred fagkompetanse som dekker hele spekteret av moderne markedsføring.</p>
                </div>
                <div>
                    <h3>Kvalitet</h3>
                    <p style="color:#4b5563;">Vi leverer høy kvalitet i alle ledd, fra strategi til ferdig produkt.</p>
                </div>
                <div>
                    <h3>Resultater</h3>
                    <p style="color:#4b5563;">Vi måler suksess i reelle resultater for din bedrift, ikke i leverte timer.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-dark">
        <div class="container">
            <div style="max-width: 48rem;">
                <h2>Et team som brenner for resultater</h2>
                <p style="color:#9ca3af; font-size:1.25rem;">Vårt team består av erfarne fagfolk innen markedsføring, design, produksjon og event. Vi jobber tett sammen med deg for å sikre at hvert prosjekt leverer resultater som overgår forventningene.</p>
                <p style="color:#9ca3af; font-size:1.25rem;">Med en kombinasjon av kreativitet, teknisk kompetanse og bransjekunnskap, skaper vi løsninger som fungerer i praksis &#8211; ikke bare på papiret.</p>
            </div>
        </div>
    </section>

    <?php
    // Include page content if page has custom content from editor
    if (have_posts()) :
        while (have_posts()) : the_post();
            $content = get_the_content();
            if (!empty(trim($content))) :
                ?>
                <section class="section">
                    <div class="container container-narrow">
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </section>
                <?php
            endif;
        endwhile;
    endif;
    ?>

    <section class="cta-section">
        <div class="container">
            <h2>La oss ta en prat</h2>
            <p>Vi ser frem til å høre om dine utfordringer og muligheter. Kontakt oss for en uforpliktende samtale.</p>
            <div class="btn-group">
                <a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>" class="btn btn-primary">Kontakt oss</a>
                <a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>" class="btn btn-outline">Ring <?php echo esc_html(holthe_phone()); ?></a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
