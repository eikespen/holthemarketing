<?php
/**
 * Meta boxes for Holthe Marketing theme
 *
 * Registers editable fields for:
 *  - case_study CPT (Prosjekter)
 *  - Front page (homepage)
 *  - Om oss page template
 *  - Kontakt page template
 *  - Arbeid page template
 *  - Service page templates (Rådgivning, Event, Reklameproduksjon, Markedsføring)
 *
 * @package Holthe
 */

if (!defined('ABSPATH')) exit;

/**
 * Helper: read a custom field with a fallback.
 */
function holthe_field($key, $default = '') {
    global $post;
    if (!$post) return $default;
    $val = get_post_meta($post->ID, $key, true);
    return ($val !== '' && $val !== null) ? $val : $default;
}

/**
 * Helper: output escaped text or fall back to default.
 */
function holthe_text($key, $default = '') {
    echo esc_html(holthe_field($key, $default));
}

/**
 * Helper: output wp_kses_post (for rich-text fields).
 */
function holthe_html($key, $default = '') {
    echo wp_kses_post(holthe_field($key, $default));
}

// -----------------------------------------------------------------------------
// Field rendering helpers (admin side)
// -----------------------------------------------------------------------------
function holthe_mb_text($post, $key, $label, $placeholder = '') {
    $value = get_post_meta($post->ID, $key, true);
    printf(
        '<p><label for="%1$s" style="display:block;font-weight:600;margin-bottom:4px;">%2$s</label>' .
        '<input type="text" id="%1$s" name="%1$s" value="%3$s" placeholder="%4$s" style="width:100%%;" /></p>',
        esc_attr($key),
        esc_html($label),
        esc_attr($value),
        esc_attr($placeholder)
    );
}

function holthe_mb_textarea($post, $key, $label, $rows = 3, $placeholder = '') {
    $value = get_post_meta($post->ID, $key, true);
    printf(
        '<p><label for="%1$s" style="display:block;font-weight:600;margin-bottom:4px;">%2$s</label>' .
        '<textarea id="%1$s" name="%1$s" rows="%3$d" placeholder="%5$s" style="width:100%%;">%4$s</textarea></p>',
        esc_attr($key),
        esc_html($label),
        (int) $rows,
        esc_textarea($value),
        esc_attr($placeholder)
    );
}

function holthe_mb_section($title) {
    printf('<h3 style="margin-top:1.5em;padding-top:1em;border-top:1px solid #ddd;">%s</h3>', esc_html($title));
}

function holthe_mb_nonce($key) {
    wp_nonce_field('holthe_mb_' . $key, 'holthe_mb_' . $key . '_nonce');
}

function holthe_mb_verify($key) {
    if (!isset($_POST['holthe_mb_' . $key . '_nonce'])) return false;
    if (!wp_verify_nonce($_POST['holthe_mb_' . $key . '_nonce'], 'holthe_mb_' . $key)) return false;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;
    if (!current_user_can('edit_posts')) return false;
    return true;
}

function holthe_mb_save_keys($post_id, $keys) {
    foreach ($keys as $key) {
        if (isset($_POST[$key])) {
            update_post_meta($post_id, $key, wp_kses_post($_POST[$key]));
        }
    }
}

// -----------------------------------------------------------------------------
// Page template detection
// -----------------------------------------------------------------------------
function holthe_current_template($post) {
    return get_post_meta($post->ID, '_wp_page_template', true);
}

function holthe_is_front_page_edit($post) {
    return (int) get_option('page_on_front') === (int) $post->ID;
}

// -----------------------------------------------------------------------------
// CASE STUDY META BOX
// -----------------------------------------------------------------------------
add_action('add_meta_boxes', function () {
    add_meta_box(
        'holthe_case_details',
        'Prosjektdetaljer',
        'holthe_mb_case_study',
        'case_study',
        'normal',
        'high'
    );
});

function holthe_mb_case_study($post) {
    holthe_mb_nonce('case_study');
    holthe_mb_text($post, 'logo_url', 'Logo URL', 'https://...');
    holthe_mb_text($post, 'category', 'Kategori', 'Event & Messe');
    holthe_mb_text($post, 'year', 'År', '2024');
    holthe_mb_text($post, 'project', 'Prosjekt', 'Kort prosjekttittel');

    holthe_mb_section('Testimonial');
    holthe_mb_textarea($post, 'testimonial', 'Sitat', 3);
    holthe_mb_text($post, 'testimonial_author', 'Forfatter');
    holthe_mb_text($post, 'testimonial_role', 'Rolle / firma');

    holthe_mb_section('Resultater');
    holthe_mb_text($post, 'result_1', 'Resultat 1');
    holthe_mb_text($post, 'result_2', 'Resultat 2');
    holthe_mb_text($post, 'result_3', 'Resultat 3');
}

add_action('save_post_case_study', function ($post_id) {
    if (!holthe_mb_verify('case_study')) return;
    holthe_mb_save_keys($post_id, array(
        'logo_url', 'category', 'year', 'project',
        'testimonial', 'testimonial_author', 'testimonial_role',
        'result_1', 'result_2', 'result_3',
    ));
});

// -----------------------------------------------------------------------------
// FRONT PAGE META BOX
// -----------------------------------------------------------------------------
add_action('add_meta_boxes', function () {
    add_meta_box(
        'holthe_front_page',
        'Forsideinnhold',
        'holthe_mb_front_page',
        'page',
        'normal',
        'high'
    );
});

function holthe_mb_front_page($post) {
    if (!holthe_is_front_page_edit($post)) {
        echo '<p style="color:#666;">Denne boksen vises kun for siden som er satt som forside under Innstillinger &rarr; Lesing.</p>';
        return;
    }
    holthe_mb_nonce('front_page');

    holthe_mb_section('Hero');
    holthe_mb_text($post, 'hero_title_1', 'Tittel linje 1', 'Markedsføring');
    holthe_mb_text($post, 'hero_title_2', 'Tittel linje 2', 'som skaper');
    holthe_mb_text($post, 'hero_title_3', 'Tittel linje 3 (grå)', 'resultater');
    holthe_mb_text($post, 'hero_sub_1', 'Undertekst 1', 'Din totalleverandør innen');
    holthe_mb_text($post, 'hero_sub_2', 'Undertekst 2 (fet)', 'markedsføring, reklameprodukter og arrangementer.');
    holthe_mb_text($post, 'hero_sub_3', 'Undertekst 3', 'Vi gjør næringslivet synlig');
    holthe_mb_text($post, 'hero_btn_primary', 'Primær-knapp tekst', 'Start ditt prosjekt');
    holthe_mb_text($post, 'hero_btn_secondary', 'Sekundær-knapp tekst', 'Se vårt arbeid');

    holthe_mb_section('Tjenester (01-04)');
    for ($i = 1; $i <= 4; $i++) {
        holthe_mb_text($post, "service_{$i}_title", "Tjeneste {$i} tittel");
        holthe_mb_textarea($post, "service_{$i}_desc", "Tjeneste {$i} beskrivelse", 2);
        holthe_mb_text($post, "service_{$i}_slug", "Tjeneste {$i} side-slug (lenke)");
    }

    holthe_mb_section('Statistikk (4 tall)');
    for ($i = 1; $i <= 4; $i++) {
        holthe_mb_text($post, "stat_{$i}_value", "Tall {$i} verdi", '15+');
        holthe_mb_text($post, "stat_{$i}_label", "Tall {$i} tekst", 'År med erfaring');
    }

    holthe_mb_section('CTA nederst');
    holthe_mb_text($post, 'cta_title', 'CTA tittel', 'Klar for å starte ditt neste prosjekt?');
    holthe_mb_textarea($post, 'cta_description', 'CTA beskrivelse', 2);
    holthe_mb_text($post, 'cta_btn_primary', 'Primær-knapp', 'Kontakt oss');
    holthe_mb_text($post, 'cta_btn_phone', 'Telefon-knapp tekst', 'Ring +47 950 68 097');
}

add_action('save_post_page', function ($post_id) {
    if (!holthe_mb_verify('front_page')) return;
    $keys = array(
        'hero_title_1','hero_title_2','hero_title_3',
        'hero_sub_1','hero_sub_2','hero_sub_3',
        'hero_btn_primary','hero_btn_secondary',
        'cta_title','cta_description','cta_btn_primary','cta_btn_phone',
    );
    for ($i = 1; $i <= 4; $i++) {
        $keys[] = "service_{$i}_title";
        $keys[] = "service_{$i}_desc";
        $keys[] = "service_{$i}_slug";
        $keys[] = "stat_{$i}_value";
        $keys[] = "stat_{$i}_label";
    }
    holthe_mb_save_keys($post_id, $keys);
});

// -----------------------------------------------------------------------------
// OM OSS META BOX
// -----------------------------------------------------------------------------
add_action('add_meta_boxes', function () {
    add_meta_box(
        'holthe_om_oss',
        'Om oss – seksjoner',
        'holthe_mb_om_oss',
        'page',
        'normal',
        'high'
    );
});

function holthe_mb_om_oss($post) {
    if (holthe_current_template($post) !== 'page-om-oss.php') {
        echo '<p style="color:#666;">Velg sidemalen "Om oss" under Egenskaper &rarr; Sidemal.</p>';
        return;
    }
    holthe_mb_nonce('om_oss');

    holthe_mb_section('Hero');
    holthe_mb_text($post, 'hero_badge', 'Merke (badge)', 'Om oss');
    holthe_mb_text($post, 'hero_title', 'Tittel', 'Din totalleverandør innen markedsføring');
    holthe_mb_textarea($post, 'hero_description', 'Beskrivelse', 3);

    holthe_mb_section('Vår historie');
    holthe_mb_text($post, 'story_title', 'Tittel', 'Vår historie');
    holthe_mb_textarea($post, 'story_p1', 'Avsnitt 1', 4);
    holthe_mb_textarea($post, 'story_p2', 'Avsnitt 2', 4);

    holthe_mb_section('Kompetanseområder (4 stk)');
    for ($i = 1; $i <= 4; $i++) {
        holthe_mb_text($post, "expertise_{$i}_title", "Område {$i} tittel");
        holthe_mb_textarea($post, "expertise_{$i}_desc", "Område {$i} beskrivelse", 2);
    }

    holthe_mb_section('Hvorfor velge oss');
    holthe_mb_text($post, 'benefits_title', 'Tittel', 'Hvorfor velge oss?');
    holthe_mb_textarea($post, 'benefits_description', 'Beskrivelse', 2);
    for ($i = 1; $i <= 4; $i++) {
        holthe_mb_text($post, "benefit_{$i}_title", "Fordel {$i} tittel");
        holthe_mb_textarea($post, "benefit_{$i}_desc", "Fordel {$i} beskrivelse", 2);
    }

    holthe_mb_section('Team');
    holthe_mb_text($post, 'team_title', 'Tittel');
    holthe_mb_textarea($post, 'team_p1', 'Avsnitt 1', 3);
    holthe_mb_textarea($post, 'team_p2', 'Avsnitt 2', 3);

    holthe_mb_section('CTA');
    holthe_mb_text($post, 'cta_title', 'CTA tittel');
    holthe_mb_textarea($post, 'cta_description', 'CTA beskrivelse', 2);
}

add_action('save_post_page', function ($post_id) {
    if (!holthe_mb_verify('om_oss')) return;
    $keys = array(
        'hero_badge','hero_title','hero_description',
        'story_title','story_p1','story_p2',
        'benefits_title','benefits_description',
        'team_title','team_p1','team_p2',
        'cta_title','cta_description',
    );
    for ($i = 1; $i <= 4; $i++) {
        $keys[] = "expertise_{$i}_title";
        $keys[] = "expertise_{$i}_desc";
        $keys[] = "benefit_{$i}_title";
        $keys[] = "benefit_{$i}_desc";
    }
    holthe_mb_save_keys($post_id, $keys);
});

// -----------------------------------------------------------------------------
// KONTAKT META BOX
// -----------------------------------------------------------------------------
add_action('add_meta_boxes', function () {
    add_meta_box(
        'holthe_kontakt',
        'Kontakt – seksjoner',
        'holthe_mb_kontakt',
        'page',
        'normal',
        'high'
    );
});

function holthe_mb_kontakt($post) {
    if (holthe_current_template($post) !== 'page-kontakt.php') {
        echo '<p style="color:#666;">Velg sidemalen "Kontakt" under Egenskaper &rarr; Sidemal.</p>';
        return;
    }
    holthe_mb_nonce('kontakt');

    holthe_mb_section('Hero');
    holthe_mb_text($post, 'hero_badge', 'Merke', 'Ta kontakt');
    holthe_mb_text($post, 'hero_title', 'Tittel', 'La oss ta en prat');
    holthe_mb_textarea($post, 'hero_description', 'Beskrivelse', 3);

    holthe_mb_section('Kontaktmetoder');
    holthe_mb_text($post, 'contact_phone_title', 'Telefon tittel', 'Telefon');
    holthe_mb_text($post, 'contact_phone_description', 'Telefon beskrivelse', 'Ring oss for en uforpliktende samtale');
    holthe_mb_text($post, 'contact_email_title', 'E-post tittel', 'E-post');
    holthe_mb_text($post, 'contact_email_description', 'E-post beskrivelse', 'Send oss en e-post, vi svarer raskt');
    holthe_mb_text($post, 'contact_address_title', 'Besøk tittel', 'Besøk oss');
    holthe_mb_text($post, 'contact_address_description', 'Besøk beskrivelse', 'Vi tar gjerne en kaffe og en prat');

    holthe_mb_section('Skjema');
    holthe_mb_text($post, 'form_title', 'Skjema tittel', 'Send oss en melding');
    holthe_mb_textarea($post, 'form_description', 'Skjema beskrivelse', 2);

    holthe_mb_section('Hvorfor ta kontakt (4 grunner)');
    for ($i = 1; $i <= 4; $i++) {
        holthe_mb_text($post, "reason_{$i}_title", "Grunn {$i} tittel");
        holthe_mb_textarea($post, "reason_{$i}_desc", "Grunn {$i} beskrivelse", 2);
    }

    holthe_mb_section('CTA');
    holthe_mb_text($post, 'cta_title', 'CTA tittel');
    holthe_mb_textarea($post, 'cta_description', 'CTA beskrivelse', 2);
}

add_action('save_post_page', function ($post_id) {
    if (!holthe_mb_verify('kontakt')) return;
    $keys = array(
        'hero_badge','hero_title','hero_description',
        'contact_phone_title','contact_phone_description',
        'contact_email_title','contact_email_description',
        'contact_address_title','contact_address_description',
        'form_title','form_description',
        'cta_title','cta_description',
    );
    for ($i = 1; $i <= 4; $i++) {
        $keys[] = "reason_{$i}_title";
        $keys[] = "reason_{$i}_desc";
    }
    holthe_mb_save_keys($post_id, $keys);
});

// -----------------------------------------------------------------------------
// ARBEID META BOX
// -----------------------------------------------------------------------------
add_action('add_meta_boxes', function () {
    add_meta_box(
        'holthe_arbeid',
        'Arbeid – seksjoner',
        'holthe_mb_arbeid',
        'page',
        'normal',
        'high'
    );
});

function holthe_mb_arbeid($post) {
    if (holthe_current_template($post) !== 'page-arbeid.php') {
        echo '<p style="color:#666;">Velg sidemalen "Arbeid" under Egenskaper &rarr; Sidemal.</p>';
        return;
    }
    holthe_mb_nonce('arbeid');

    holthe_mb_section('Hero');
    holthe_mb_text($post, 'hero_title', 'Tittel', 'Vårt arbeid');
    holthe_mb_textarea($post, 'hero_description', 'Beskrivelse', 3);

    holthe_mb_section('Statistikk');
    holthe_mb_text($post, 'stats_title', 'Seksjonstittel', 'Resultater som teller');
    for ($i = 1; $i <= 4; $i++) {
        holthe_mb_text($post, "stat_{$i}_value", "Tall {$i} verdi");
        holthe_mb_text($post, "stat_{$i}_label", "Tall {$i} tekst");
    }

    holthe_mb_section('CTA');
    holthe_mb_text($post, 'cta_title', 'CTA tittel');
    holthe_mb_textarea($post, 'cta_description', 'CTA beskrivelse', 2);
}

add_action('save_post_page', function ($post_id) {
    if (!holthe_mb_verify('arbeid')) return;
    $keys = array('hero_title','hero_description','stats_title','cta_title','cta_description');
    for ($i = 1; $i <= 4; $i++) {
        $keys[] = "stat_{$i}_value";
        $keys[] = "stat_{$i}_label";
    }
    holthe_mb_save_keys($post_id, $keys);
});

// -----------------------------------------------------------------------------
// SERVICE PAGE META BOX (shared across Rådgivning, Event, Reklame, Markedsføring)
// -----------------------------------------------------------------------------
add_action('add_meta_boxes', function () {
    add_meta_box(
        'holthe_service',
        'Tjenestesideinnhold',
        'holthe_mb_service',
        'page',
        'normal',
        'high'
    );
});

function holthe_mb_service($post) {
    $service_templates = array(
        'page-radgivning.php',
        'page-event-og-messe.php',
        'page-reklameproduksjon.php',
        'page-markedsforing.php',
    );
    $tpl = holthe_current_template($post);
    if (!in_array($tpl, $service_templates, true)) {
        echo '<p style="color:#666;">Velg en tjenestesidemal (Rådgivning, Event &amp; Messe, Reklameproduksjon, Markedsføring).</p>';
        return;
    }
    holthe_mb_nonce('service');

    holthe_mb_section('Hero');
    holthe_mb_text($post, 'hero_badge', 'Merke', 'Tjenester');
    holthe_mb_text($post, 'hero_title', 'Tittel');
    holthe_mb_textarea($post, 'hero_description', 'Beskrivelse', 3);

    holthe_mb_section('Hovedinnhold (valgfritt)');
    holthe_mb_text($post, 'content_title', 'Seksjonstittel');
    holthe_mb_textarea($post, 'content_p1', 'Avsnitt 1', 4);
    holthe_mb_textarea($post, 'content_p2', 'Avsnitt 2', 4);

    holthe_mb_section('Fordeler / punkter (opptil 6)');
    for ($i = 1; $i <= 6; $i++) {
        holthe_mb_text($post, "benefit_{$i}_title", "Punkt {$i} tittel");
        holthe_mb_textarea($post, "benefit_{$i}_desc", "Punkt {$i} beskrivelse", 2);
    }

    holthe_mb_section('CTA');
    holthe_mb_text($post, 'cta_title', 'CTA tittel');
    holthe_mb_textarea($post, 'cta_description', 'CTA beskrivelse', 2);
}

add_action('save_post_page', function ($post_id) {
    if (!holthe_mb_verify('service')) return;
    $keys = array(
        'hero_badge','hero_title','hero_description',
        'content_title','content_p1','content_p2',
        'cta_title','cta_description',
    );
    for ($i = 1; $i <= 6; $i++) {
        $keys[] = "benefit_{$i}_title";
        $keys[] = "benefit_{$i}_desc";
    }
    holthe_mb_save_keys($post_id, $keys);
});
