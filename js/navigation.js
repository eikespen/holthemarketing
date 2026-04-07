(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var toggle = document.querySelector('.mobile-menu-toggle');
        var menu = document.getElementById('mobile-menu');

        if (!toggle || !menu) {
            return;
        }

        toggle.addEventListener('click', function () {
            var isOpen = menu.classList.toggle('open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            toggle.innerHTML = isOpen ? '<span>✕</span>' : '<span>☰</span>';
            document.body.style.overflow = isOpen ? 'hidden' : '';
        });

        // Close menu on link click
        var mobileLinks = menu.querySelectorAll('a');
        mobileLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                menu.classList.remove('open');
                toggle.setAttribute('aria-expanded', 'false');
                toggle.innerHTML = '<span>☰</span>';
                document.body.style.overflow = '';
            });
        });

        // Close on Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menu.classList.contains('open')) {
                menu.classList.remove('open');
                toggle.setAttribute('aria-expanded', 'false');
                toggle.innerHTML = '<span>☰</span>';
                document.body.style.overflow = '';
            }
        });
    });
})();
