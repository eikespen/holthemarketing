<?php
/**
 * Service page hero - expects $args with title, description
 */
$title = $args['title'] ?? 'Tjeneste';
$description = $args['description'] ?? '';
?>
<section class="page-hero">
    <div class="container">
        <span class="badge badge-outline">Tjenester</span>
        <h1 style="margin-top: 1rem;"><?php echo esc_html($title); ?></h1>
        <?php if ($description) : ?>
            <p class="lead"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
    </div>
</section>
