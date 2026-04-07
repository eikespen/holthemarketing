=== Holthe Marketing Theme ===

Contributors: Espen Tjøstheim Eik
Requires at least: WordPress 6.0
Tested up to: 6.4
Requires PHP: 7.4
Version: 1.0.0
License: Proprietary

Custom WordPress theme for Holthe Marketing AS — a full-service marketing
agency in Norway. Minimalist black & white design, responsive layout, and
Elementor-compatible page templates that match the React prototype built
on Databutton.

== Description ==

This theme is a direct port of the Holthe Marketing React prototype to a
standard WordPress theme. It provides:

* Fixed black header with primary navigation menu
* Mobile menu
* Front page with hero, case studies, numbered services list, stats and CTA
* Page templates for:
  - Om oss (About us)
  - Arbeid (Work / cases)
  - Kontakt (Contact, with built-in contact form handler)
  - Rådgivning (Advisory)
  - Event & Messe
  - Reklameproduksjon
  - Markedsføring
* Custom post types:
  - case_study (Prosjekter) with category taxonomy
  - news (Nyheter)
* Single and archive templates for each post type
* Built-in theme settings page for phone, email, address and tagline
* Simple contact form that sends to the WordPress admin email
* Elementor compatibility for pages, case studies and news
* Fully responsive layout
* Language ready (text domain: holthe)

== Installation ==

1. Upload the `holthe-marketing-theme` folder to the `/wp-content/themes/`
   directory (or upload the .zip via Appearance → Themes → Add New).
2. Activate the theme through the 'Appearance → Themes' menu in WordPress.
3. Go to **Appearance → Menus** and create a primary menu assigned to the
   `Primary Menu` location.
4. Go to **Appearance → Holthe innstillinger** to configure phone, e-mail,
   address and footer tagline.
5. Create WordPress pages with the following slugs so the default menu and
   links work:
   - om-oss
   - arbeid
   - radgivning
   - event-og-messe
   - reklameproduksjon
   - markedsforing
   - kontakt
6. Assign the matching Page Template to each page (e.g. "Om oss", "Kontakt"
   etc.) from the Page Attributes box.
7. Under **Prosjekter**, add case studies. Each case study supports the
   following custom fields (Custom Fields panel):
   - logo_url
   - category
   - year
   - project
   - testimonial
   - testimonial_author
   - testimonial_role
   - result_1, result_2, result_3

== Contact form ==

The Kontakt template includes a native contact form that submits via
`admin-post.php` and sends an e-mail to the WordPress admin address. Swap
this out for Contact Form 7, WPForms or similar if you prefer — the markup
is simple Tailwind-style classes already present in `style.css`.

== Changelog ==

= 1.0.0 =
* Initial release — ported from the Holthe Marketing React prototype.
