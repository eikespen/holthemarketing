<?php
/**
 * Service page hero - expects $args with title, description
 * Reads overrides from page meta (hero_title, hero_description, hero_badge).
 */
$default_title       = $args['title']       ?? 'Tjeneste';
$default_description = $args['description'] ?? '';
$default_badge       = $args['badge']       ?? 'Tjenester';

$title       = holthe_field('hero_title', $default_title);
$description = holthe_field('hero_description', $default_description);
$badge       = holthe_field('hero_badge', $default_badge);
?>
<section class="page-hero">
    <div class="container">
        <?php if ($badge) : ?>
            <span class="badge badge-outline"><?php echo esc_html($badge); ?></span>
        <?php endif; ?>
        <h1 style="margin-top: 1rem;"><?php echo esc_html($title); ?></h1>
        <?php if ($description) : ?>
            <p class="lead"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
    </div>
</section>
