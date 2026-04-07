<?php
/**
 * Archive template for case studies - redirects to /arbeid page if it exists
 */
$arbeid_page = get_page_by_path('arbeid');
if ($arbeid_page) {
    wp_safe_redirect(get_permalink($arbeid_page));
    exit;
}
include get_template_directory() . '/page-arbeid.php';
