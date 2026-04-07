<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                <?php endif; ?>
                <p><?php echo esc_html(holthe_tagline_text()); ?></p>
                <div class="footer-social">
                    <span>LinkedIn</span>
                    <span>Facebook</span>
                    <span>Instagram</span>
                </div>
            </div>

            <div class="footer-column">
                <h4>Tjenester</h4>
                <ul>
                    <li><a href="<?php echo esc_url(holthe_page_url('radgivning')); ?>">Rådgivning</a></li>
                    <li><a href="<?php echo esc_url(holthe_page_url('event-og-messe')); ?>">Event &amp; Messe</a></li>
                    <li><a href="<?php echo esc_url(holthe_page_url('reklameproduksjon')); ?>">Reklameproduksjon</a></li>
                    <li><a href="<?php echo esc_url(holthe_page_url('markedsforing')); ?>">Markedsføring</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Kontakt</h4>
                <ul>
                    <li><a href="tel:<?php echo esc_attr(holthe_phone_tel()); ?>"><?php echo esc_html(holthe_phone()); ?></a></li>
                    <li><a href="mailto:<?php echo esc_attr(holthe_email()); ?>"><?php echo esc_html(holthe_email()); ?></a></li>
                    <li><a href="<?php echo esc_url(holthe_page_url('kontakt')); ?>"><?php echo esc_html(holthe_address()); ?></a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html(date('Y')); ?> Holthe Marketing AS. Alle rettigheter forbeholdt.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
