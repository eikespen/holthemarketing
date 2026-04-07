<?php
/**
 * Template Name: Om oss
 * Template Post Type: page
 */
get_header();
the_post();
?>

<main class="site-main">

    <section class="page-hero">
        <div class="container">
            <span class="badge badge-outline"><?php holthe_text('hero_badge', 'Om oss'); ?></span>
            <h1 style="margin-top: 1rem;"><?php holthe_text('hero_title', 'Din totalleverandør innen markedsføring'); ?></h1>
            <p class="lead"><?php holthe_text('hero_description', 'Holthe Marketing leverer kompetanse og gjennomføring under ett tak. Vi kombinerer strategisk tenkning med praktisk gjennomføring for å skape resultater som varer.'); ?></p>
        </div>
    </section>

    <section class="section section-gray">
        <div class="container">
            <div class="two-col">
                <div>
                    <h2><?php holthe_text('story_title', 'Vår historie'); ?></h2>
                    <p><?php holthe_text('story_p1', 'Siden 2009 har vi hjulpet bedrifter med å vokse gjennom smart markedsføring og kreative løsninger. Det som startet som en liten markedsføringsbedrift har utviklet seg til en totalleverandør med kompetanse innen alt fra strategisk rådgivning til praktisk gjennomføring.'); ?></p>
                    <p><?php holthe_text('story_p2', 'Vi brenner for å hjelpe bedrifter med å nå sitt potensial. Med et team av erfarne fagfolk og et nettverk av samarbeidspartnere, leverer vi resultater som gjør en reell forskjell.'); ?></p>
                </div>
                <div class="image-placeholder">H</div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 style="margin-bottom: 3rem;">Våre kompetanseområder</h2>
            <div class="grid grid-2">
                <?php
                $expertise_defaults = array(
                    1 => array('Strategi & rådgivning',  'Vi hjelper deg med å legge en markedsføringsstrategi som treffer riktig kundegruppe og gir målbare resultater.'),
                    2 => array('Event & messe',          'Fra idé til gjennomføring. Vi planlegger og arrangerer events og messer som engasjerer og skaper verdi.'),
                    3 => array('Produksjon & design',    'Film, animasjon, trykksaker, skilt & dekor. Vi leverer profesjonelt markedsmateriell raskt og effektivt.'),
                    4 => array('Digital markedsføring',  'SEO, SEM, sosiale medier og innholdsproduksjon. Vi sørger for at du blir funnet og husket på nett.'),
                );
                foreach ($expertise_defaults as $i => $d) :
                    $title = holthe_field("expertise_{$i}_title", $d[0]);
                    $desc  = holthe_field("expertise_{$i}_desc", $d[1]);
                    if (!$title) continue;
                ?>
                <div class="card">
                    <div class="card-body">
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($desc); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section-gray">
        <div class="container">
            <h2><?php holthe_text('benefits_title', 'Hvorfor velge oss?'); ?></h2>
            <p class="section-subtitle"><?php holthe_text('benefits_description', 'Vi er mer enn bare en leverandør – vi er din partner for vekst.'); ?></p>
            <div class="grid grid-4">
                <?php
                $benefit_defaults = array(
                    1 => array('Erfaring',    'Over 15 års erfaring med å levere resultater for kunder i ulike bransjer.'),
                    2 => array('Kompetanse',  'Bred fagkompetanse som dekker hele spekteret av moderne markedsføring.'),
                    3 => array('Kvalitet',    'Vi leverer høy kvalitet i alle ledd, fra strategi til ferdig produkt.'),
                    4 => array('Resultater',  'Vi måler suksess i reelle resultater for din bedrift, ikke i leverte timer.'),
                );
                foreach ($benefit_defaults as $i => $d) :
                    $title = holthe_field("benefit_{$i}_title", $d[0]);
                    $desc  = holthe_field("benefit_{$i}_desc", $d[1]);
                    if (!$title) continue;
                ?>
                <div>
                    <h3><?php echo esc_html($title); ?></h3>
                    <p style="color:#4b5563;"><?php echo esc_html($desc); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section-dark">
        <div class="container">
            <div style="max-width: 48rem;">
                <h2><?php holthe_text('team_title', 'Et team som brenner for resultater'); ?></h2>
                <p style="color:#9ca3af; font-size:1.25rem;"><?php holthe_text('team_p1', 'Vårt team består av erfarne fagfolk innen markedsføring, design, produksjon og event. Vi jobber tett sammen med deg for å sikre at hvert prosjekt leverer resultater som overgår forventningene.'); ?></p>
                <p style="color:#9ca3af; font-size:1.25rem;"><?php holthe_text('team_p2', 'Med en kombinasjon av kreativitet, teknisk kompetanse og bransjekunnskap, skaper vi løsninger som fungerer i praksis – ikke bare på papiret.'); ?></p>
            </div>
        </div>
    </section>

    <?php
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
    ?>

    <section class="cta-section">
        <div class="container">
            <h2><?php holthe_text('cta_title', 'La oss ta en prat'); ?></h2>
            <p><?php holthe_text('cta_description', 'Vi ser frem til å høre om dine utfordringer og muligheter. Kontakt oss for en uforpliktende samtale.'); ?></p>
            <div class="btn-group">
                <a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>" class="btn btn-primary">Kontakt oss</a>
                <a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>" class="btn btn-outline">Ring <?php echo esc_html(holthe_phone()); ?></a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
