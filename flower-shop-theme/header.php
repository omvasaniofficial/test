<?php
/**
 * Theme header.
 *
 * @package BlossomBoutique
 */

if (! defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container header-inner">
        <div class="site-branding">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                ?><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a><?php
            }
            ?>
        </div>

        <nav class="main-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'blossom-boutique'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ]);
            ?>
        </nav>

        <div class="header-actions">
            <?php if (function_exists('wc_get_cart_url')) : ?>
                <a class="button" href="<?php echo esc_url(wc_get_cart_url()); ?>">
                    <?php esc_html_e('Cart', 'blossom-boutique'); ?>
                    <span class="bb-cart-count"><?php echo function_exists('WC') ? esc_html(WC()->cart->get_cart_contents_count()) : '0'; ?></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>
