<?php
/**
 * Theme footer.
 *
 * @package BlossomBoutique
 */

if (! defined('ABSPATH')) {
    exit;
}
?>
<footer class="site-footer">
    <div class="container">
        <p>&copy; <?php echo esc_html(gmdate('Y')); ?> <?php bloginfo('name'); ?>.</p>
        <?php
        wp_nav_menu([
            'theme_location' => 'footer',
            'menu_class'     => 'footer-menu',
            'container'      => false,
            'fallback_cb'    => false,
        ]);
        ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
