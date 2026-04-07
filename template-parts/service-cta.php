<?php
/**
 * Service page CTA
 */
$default_title       = $args['title']       ?? 'Klar for å ta markedsføringen til neste nivå?';
$default_description = $args['description'] ?? 'Kontakt oss for en uforpliktende samtale om hvordan vi kan hjelpe deg.';

$title       = holthe_field('cta_title', $default_title);
$description = holthe_field('cta_description', $default_description);
?>
<section class="cta-section">
    <div class="container">
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo esc_html($description); ?></p>
        <div class="btn-group">
            <a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>" class="btn btn-primary">Kontakt oss</a>
            <a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>" class="btn btn-outline">Ring <?php echo esc_html(holthe_phone()); ?></a>
        </div>
    </div>
</section>
