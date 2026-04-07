<?php
/**
 * Template Name: Kontakt
 * Template Post Type: page
 */
get_header();
the_post();

$success = get_transient('holthe_contact_success');
$error   = get_transient('holthe_contact_error');
if ($success) delete_transient('holthe_contact_success');
if ($error)   delete_transient('holthe_contact_error');
?>

<main class="site-main">

    <section class="page-hero">
        <div class="container">
            <span class="badge badge-outline"><?php holthe_text('hero_badge', 'Ta kontakt'); ?></span>
            <h1 style="margin-top: 1rem;"><?php holthe_text('hero_title', 'La oss ta en prat'); ?></h1>
            <p class="lead"><?php holthe_text('hero_description', 'Har du et prosjekt du vil diskutere? Trenger du hjelp med markedsføringen? Vi er her for å hjelpe deg videre.'); ?></p>
        </div>
    </section>

    <section class="section section-gray">
        <div class="container">
            <h2 style="margin-bottom: 3rem;">Kontakt oss</h2>
            <div class="contact-methods">
                <div class="contact-card">
                    <h3><?php holthe_text('contact_phone_title', 'Telefon'); ?></h3>
                    <p class="detail"><a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>"><?php echo esc_html(holthe_phone()); ?></a></p>
                    <p class="description"><?php holthe_text('contact_phone_description', 'Ring oss for en uforpliktende samtale'); ?></p>
                </div>
                <div class="contact-card">
                    <h3><?php holthe_text('contact_email_title', 'E-post'); ?></h3>
                    <p class="detail"><a href="mailto:<?php echo esc_attr(holthe_email()); ?>"><?php echo esc_html(holthe_email()); ?></a></p>
                    <p class="description"><?php holthe_text('contact_email_description', 'Send oss en e-post, vi svarer raskt'); ?></p>
                </div>
                <div class="contact-card">
                    <h3><?php holthe_text('contact_address_title', 'Besøk oss'); ?></h3>
                    <p class="detail"><?php echo esc_html(holthe_address()); ?></p>
                    <p class="description"><?php holthe_text('contact_address_description', 'Vi tar gjerne en kaffe og en prat'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container" style="max-width: 64rem;">
            <h2><?php holthe_text('form_title', 'Send oss en melding'); ?></h2>
            <p class="section-subtitle"><?php holthe_text('form_description', 'Fyll ut skjemaet nedenfor, så kontakter vi deg så snart som mulig.'); ?></p>

            <?php if ($success) : ?>
                <div class="form-message success"><?php echo esc_html($success); ?></div>
            <?php elseif ($error) : ?>
                <div class="form-message error"><?php echo esc_html($error); ?></div>
            <?php endif; ?>

            <div class="contact-form-card">
                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="holthe_contact">
                    <?php wp_nonce_field('holthe_contact_form', 'holthe_contact_nonce'); ?>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name">Navn *</label>
                            <input type="text" id="contact-name" name="name" placeholder="Ditt navn" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-company">Bedrift</label>
                            <input type="text" id="contact-company" name="company" placeholder="Bedriftsnavn">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-email">E-post *</label>
                            <input type="email" id="contact-email" name="email" placeholder="din@epost.no" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-phone">Telefon</label>
                            <input type="tel" id="contact-phone" name="phone" placeholder="Ditt telefonnummer">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contact-message">Hva kan vi hjelpe deg med? *</label>
                        <textarea id="contact-message" name="message" rows="6" placeholder="Fortell oss om ditt prosjekt eller dine behov..." required></textarea>
                    </div>

                    <button type="submit" class="form-submit">Send henvendelse</button>
                </form>
            </div>
        </div>
    </section>

    <section class="section section-dark">
        <div class="container">
            <h2>Hvorfor ta kontakt?</h2>
            <div class="reasons-grid" style="margin-top: 3rem;">
                <?php
                $reason_defaults = array(
                    1 => array('Gratis konsultasjon',    'Første samtale er helt uforpliktende og gratis. Vi lytter og gir ærlige råd.'),
                    2 => array('Rask respons',           'Vi svarer på alle henvendelser innen 24 timer. Som regel mye raskere.'),
                    3 => array('Erfarne rådgivere',      'Du snakker direkte med våre erfarne fagfolk – ikke en callsenteragent.'),
                    4 => array('Skreddersydde løsninger','Vi tilpasser alle forslag og tilbud til din bedrift og dine behov.'),
                );
                foreach ($reason_defaults as $i => $d) :
                    $title = holthe_field("reason_{$i}_title", $d[0]);
                    $desc  = holthe_field("reason_{$i}_desc", $d[1]);
                    if (!$title) continue;
                ?>
                <div class="reason-item">
                    <div class="number"><?php echo esc_html(sprintf('%02d', $i)); ?></div>
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($desc); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2><?php holthe_text('cta_title', 'Klar til å starte?'); ?></h2>
            <p><?php holthe_text('cta_description', 'Vi ser frem til å høre fra deg. Ta kontakt i dag, så får du svar innen 24 timer.'); ?></p>
            <div class="btn-group">
                <a href="#contact-name" class="btn btn-primary">Send oss en melding</a>
                <a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>" class="btn btn-outline">Ring <?php echo esc_html(holthe_phone()); ?></a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
