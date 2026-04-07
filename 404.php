<?php
/**
 * 404 template
 */
get_header();
?>

<main class="site-main">
    <section class="error-404">
        <div class="container">
            <h1>404</h1>
            <h2>Siden ble ikke funnet</h2>
            <p style="font-size:1.25rem; color:#4b5563; margin-bottom: 2rem;">Beklager, vi fant ikke siden du lette etter.</p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Tilbake til forsiden</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
