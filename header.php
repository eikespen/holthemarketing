<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="site-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/holthe-logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                <?php endif; ?>
            </a>
        </div>

        <nav class="main-navigation" aria-label="<?php esc_attr_e('Primary Menu', 'holthe'); ?>">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'primary-menu',
                    'fallback_cb'    => 'holthe_default_nav',
                ));
            } else {
                holthe_default_nav();
            }
            ?>
        </nav>

        <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e('Toggle menu', 'holthe'); ?>" aria-expanded="false">
            <span>☰</span>
        </button>
    </div>

    <div class="mobile-menu" id="mobile-menu">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'mobile-primary-menu',
                'fallback_cb'    => 'holthe_default_nav',
            ));
        } else {
            holthe_default_nav();
        }
        ?>
    </div>
</header>

<?php
/**
 * Default navigation fallback
 */
function holthe_default_nav() {
    $items = array(
        'arbeid'               => 'Arbeid',
        'markedsforing'        => 'Markedsføring',
        'nettsider'            => 'Nettsider',
        'reklameproduksjon'    => 'Reklameproduksjon',
        'event-og-messe'       => 'Event og Messe',
        'radgivning'           => 'Rådgivning',
        'om-oss'               => 'Om Oss',
        'kontakt'              => 'Kontakt',
    );
    echo '<ul>';
    foreach ($items as $slug => $label) {
        printf(
            '<li><a href="%s">%s</a></li>',
            esc_url(holthe_page_url($slug)),
            esc_html($label)
        );
    }
    echo '</ul>';
}
?>
