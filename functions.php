<?php
/**
 * Holthe Marketing Theme Functions
 *
 * @package Holthe
 * @author Espen Tjøstheim Eik
 */

// Include meta boxes
require_once get_template_directory() . '/inc/meta-boxes.php';

// Force Norwegian bokmål on the frontend so Yoast, html lang, and
// og:locale all use nb_NO regardless of the WordPress site setting.
add_filter('locale', function ($locale) {
    if (is_admin()) return $locale;
    return 'nb_NO';
});
add_filter('wpseo_locale', function () { return 'nb_NO'; });

// Theme Setup
function holthe_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('menus');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'holthe'),
        'footer_services' => __('Footer - Services', 'holthe'),
    ));

    // Image sizes
    add_image_size('holthe-hero', 1920, 1080, true);
    add_image_size('holthe-case-thumb', 800, 600, true);
    add_image_size('holthe-news-thumb', 800, 450, true);

    // Load text domain
    load_theme_textdomain('holthe', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'holthe_theme_setup');

// Enqueue scripts and styles
function holthe_enqueue_scripts() {
    wp_enqueue_style(
        'holthe-style',
        get_stylesheet_uri(),
        array(),
        '1.0.0'
    );

    wp_enqueue_script(
        'holthe-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'holthe_enqueue_scripts');

// Register Custom Post Types
function holthe_register_post_types() {
    // Case / Reference Post Type
    // NOTE: has_archive is disabled and the rewrite slug is 'prosjekt' so the
    // /arbeid/ URL is free to serve the page with the page-arbeid.php template.
    register_post_type('case_study', array(
        'labels' => array(
            'name'          => 'Prosjekter',
            'singular_name' => 'Prosjekt',
            'add_new'       => 'Legg til prosjekt',
            'add_new_item'  => 'Legg til nytt prosjekt',
            'edit_item'     => 'Rediger prosjekt',
            'new_item'      => 'Nytt prosjekt',
            'view_item'     => 'Vis prosjekt',
            'search_items'  => 'Søk prosjekter',
            'not_found'     => 'Ingen prosjekter funnet',
            'menu_name'     => 'Prosjekter',
        ),
        'public'       => true,
        'has_archive'  => false,
        'show_in_rest' => true,
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'    => 'dashicons-portfolio',
        'rewrite'      => array('slug' => 'prosjekt'),
    ));

    // Case categories
    register_taxonomy('case_category', 'case_study', array(
        'labels' => array(
            'name'          => 'Kategorier',
            'singular_name' => 'Kategori',
        ),
        'public'            => true,
        'show_in_rest'      => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'prosjekt-kategori'),
    ));

    // News Post Type
    register_post_type('news', array(
        'labels' => array(
            'name'          => 'Nyheter',
            'singular_name' => 'Nyhet',
            'add_new'       => 'Legg til nyhet',
            'add_new_item'  => 'Legg til ny nyhet',
            'edit_item'     => 'Rediger nyhet',
            'new_item'      => 'Ny nyhet',
            'view_item'     => 'Vis nyhet',
            'search_items'  => 'Søk nyheter',
            'not_found'     => 'Ingen nyheter funnet',
            'menu_name'     => 'Nyheter',
        ),
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'    => 'dashicons-megaphone',
        'rewrite'      => array('slug' => 'nyheter'),
    ));
}
add_action('init', 'holthe_register_post_types');

// Elementor support
function holthe_elementor_support() {
    add_post_type_support('page', 'elementor');
    add_post_type_support('case_study', 'elementor');
    add_post_type_support('news', 'elementor');
}
add_action('init', 'holthe_elementor_support');

// Widget areas
function holthe_widgets_init() {
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar-1',
        'description'   => 'Main sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'holthe_widgets_init');

// Custom excerpt length
function holthe_excerpt_length($length) {
    return 28;
}
add_filter('excerpt_length', 'holthe_excerpt_length');

// Custom excerpt more
function holthe_excerpt_more($more) {
    return '…';
}
add_filter('excerpt_more', 'holthe_excerpt_more');

/**
 * Contact form handler
 */
function holthe_handle_contact_form() {
    if (!isset($_POST['holthe_contact_nonce']) || !wp_verify_nonce($_POST['holthe_contact_nonce'], 'holthe_contact_form')) {
        return;
    }

    $name    = sanitize_text_field($_POST['name'] ?? '');
    $company = sanitize_text_field($_POST['company'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $phone   = sanitize_text_field($_POST['phone'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        set_transient('holthe_contact_error', 'Vennligst fyll ut alle obligatoriske felt.', 60);
        wp_safe_redirect(add_query_arg('form', 'error', wp_get_referer()));
        exit;
    }

    if (!is_email($email)) {
        set_transient('holthe_contact_error', 'Vennligst oppgi en gyldig e-postadresse.', 60);
        wp_safe_redirect(add_query_arg('form', 'error', wp_get_referer()));
        exit;
    }

    $to      = get_option('admin_email');
    $subject = 'Ny henvendelse fra ' . $name . ' via holthe.com';
    $body    = "Navn: {$name}\n";
    $body   .= "Bedrift: {$company}\n";
    $body   .= "E-post: {$email}\n";
    $body   .= "Telefon: {$phone}\n\n";
    $body   .= "Melding:\n{$message}\n";
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        set_transient('holthe_contact_success', 'Takk for henvendelsen! Vi tar kontakt så snart som mulig.', 60);
        wp_safe_redirect(add_query_arg('form', 'success', wp_get_referer()));
    } else {
        set_transient('holthe_contact_error', 'Noe gikk galt. Vennligst prøv igjen eller ring oss direkte.', 60);
        wp_safe_redirect(add_query_arg('form', 'error', wp_get_referer()));
    }
    exit;
}
add_action('admin_post_nopriv_holthe_contact', 'holthe_handle_contact_form');
add_action('admin_post_holthe_contact', 'holthe_handle_contact_form');

/**
 * Helper: output a button link
 */
function holthe_button($url, $label, $class = 'btn btn-primary') {
    printf(
        '<a href="%s" class="%s">%s</a>',
        esc_url($url),
        esc_attr($class),
        esc_html($label)
    );
}

/**
 * Helper: get page permalink by slug with fallback to home
 */
function holthe_page_url($slug) {
    $page = get_page_by_path($slug);
    if ($page) {
        return get_permalink($page);
    }
    return home_url('/' . $slug);
}

/**
 * Register a simple settings page for contact info (used in footer/contact templates)
 */
function holthe_settings_init() {
    register_setting('holthe_settings', 'holthe_phone');
    register_setting('holthe_settings', 'holthe_email');
    register_setting('holthe_settings', 'holthe_address');
    register_setting('holthe_settings', 'holthe_tagline');
}
add_action('admin_init', 'holthe_settings_init');

function holthe_settings_page() {
    add_theme_page(
        'Holthe Marketing innstillinger',
        'Holthe innstillinger',
        'manage_options',
        'holthe-settings',
        'holthe_settings_page_html'
    );
}
add_action('admin_menu', 'holthe_settings_page');

function holthe_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('holthe_settings');
            do_settings_sections('holthe_settings');
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Telefonnummer</th>
                    <td><input type="text" name="holthe_phone" value="<?php echo esc_attr(get_option('holthe_phone', '+47 950 68 097')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row">E-post</th>
                    <td><input type="email" name="holthe_email" value="<?php echo esc_attr(get_option('holthe_email', 'post@holthe.com')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row">Adresse</th>
                    <td><input type="text" name="holthe_address" value="<?php echo esc_attr(get_option('holthe_address', 'Holthe Marketing AS')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row">Tagline (footer)</th>
                    <td><input type="text" name="holthe_tagline" value="<?php echo esc_attr(get_option('holthe_tagline', 'Din totalleverandør innen markedsføring. Kompetanse og gjennomføring under ett tak.')); ?>" class="large-text" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * Helpers for frontend contact info
 */
function holthe_phone() {
    return get_option('holthe_phone', '+47 950 68 097');
}

function holthe_phone_tel() {
    return preg_replace('/[^0-9+]/', '', holthe_phone());
}

function holthe_email() {
    return get_option('holthe_email', 'post@holthe.com');
}

function holthe_address() {
    return get_option('holthe_address', 'Holthe Marketing AS');
}

function holthe_tagline_text() {
    return get_option(
        'holthe_tagline',
        'Din totalleverandør innen markedsføring. Kompetanse og gjennomføring under ett tak.'
    );
}
