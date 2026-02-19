<?php
/**
 * Front page template.
 *
 * @package BlossomBoutique
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main>
    <section class="hero">
        <div class="container hero-grid">
            <div>
                <span class="category-badge"><?php esc_html_e('Fresh Flowers Delivered Daily', 'blossom-boutique'); ?></span>
                <h1><?php esc_html_e('Blooming arrangements for every celebration.', 'blossom-boutique'); ?></h1>
                <p><?php esc_html_e('Discover hand-tied bouquets, wedding florals, and same-day flower delivery crafted by expert florists.', 'blossom-boutique'); ?></p>
                <p>
                    <a class="button" href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop')); ?>"><?php esc_html_e('Shop Flowers', 'blossom-boutique'); ?></a>
                </p>
            </div>
            <aside class="hero-card">
                <h2><?php esc_html_e('Today\'s Highlights', 'blossom-boutique'); ?></h2>
                <ul>
                    <li><?php esc_html_e('20% off premium rose bouquets', 'blossom-boutique'); ?></li>
                    <li><?php esc_html_e('Free handwritten gift cards', 'blossom-boutique'); ?></li>
                    <li><?php esc_html_e('Same-day delivery in selected zip codes', 'blossom-boutique'); ?></li>
                </ul>
            </aside>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Shop by Occasion', 'blossom-boutique'); ?></h2>
            <div class="grid grid-3">
                <article class="card"><h3><?php esc_html_e('Birthdays', 'blossom-boutique'); ?></h3><p><?php esc_html_e('Bright and joyful blooms to celebrate another beautiful year.', 'blossom-boutique'); ?></p></article>
                <article class="card"><h3><?php esc_html_e('Weddings', 'blossom-boutique'); ?></h3><p><?php esc_html_e('Elegant floral packages from bridal bouquets to venue installations.', 'blossom-boutique'); ?></p></article>
                <article class="card"><h3><?php esc_html_e('Sympathy', 'blossom-boutique'); ?></h3><p><?php esc_html_e('Thoughtful arrangements to show care, comfort, and remembrance.', 'blossom-boutique'); ?></p></article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Featured Flowers', 'blossom-boutique'); ?></h2>

            <div class="store-grid">
                <?php
                if (class_exists('WooCommerce')) {
                    $featured_products = new WP_Query([
                        'post_type'      => 'product',
                        'posts_per_page' => 8,
                        'tax_query'      => [
                            [
                                'taxonomy' => 'product_visibility',
                                'field'    => 'name',
                                'terms'    => 'featured',
                            ],
                        ],
                    ]);

                    if ($featured_products->have_posts()) {
                        while ($featured_products->have_posts()) {
                            $featured_products->the_post();
                            wc_get_template_part('content', 'product');
                        }
                        wp_reset_postdata();
                    }
                } else {
                    ?>
                    <article class="product-card"><div class="product-content"><h3>Rose Radiance</h3><p class="product-price">$49.00</p></div></article>
                    <article class="product-card"><div class="product-content"><h3>Spring Whisper</h3><p class="product-price">$42.00</p></div></article>
                    <article class="product-card"><div class="product-content"><h3>Sunset Tulips</h3><p class="product-price">$39.00</p></div></article>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container newsletter">
            <h2><?php esc_html_e('Get 10% off your first bouquet', 'blossom-boutique'); ?></h2>
            <p><?php esc_html_e('Join our newsletter for seasonal drops, flash discounts, and floral care tips.', 'blossom-boutique'); ?></p>
        </div>
    </section>
</main>
<?php
get_footer();
