<?php
/**
 * Blossom Boutique theme setup.
 *
 * @package BlossomBoutique
 */

if (! defined('ABSPATH')) {
    exit;
}

function blossom_boutique_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    register_nav_menus([
        'primary' => __('Primary Menu', 'blossom-boutique'),
        'footer'  => __('Footer Menu', 'blossom-boutique'),
    ]);
}
add_action('after_setup_theme', 'blossom_boutique_setup');

function blossom_boutique_scripts(): void
{
    wp_enqueue_style('blossom-boutique-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'blossom_boutique_scripts');

function blossom_boutique_register_sidebars(): void
{
    register_sidebar([
        'name'          => __('Shop Filters', 'blossom-boutique'),
        'id'            => 'shop-filters',
        'description'   => __('Widgets shown on WooCommerce shop pages.', 'blossom-boutique'),
        'before_widget' => '<section class="card widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'blossom_boutique_register_sidebars');

function blossom_boutique_cart_count_fragment(array $fragments): array
{
    if (! function_exists('WC')) {
        return $fragments;
    }

    ob_start();
    ?>
    <span class="bb-cart-count"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
    <?php
    $fragments['span.bb-cart-count'] = ob_get_clean();

    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'blossom_boutique_cart_count_fragment');
