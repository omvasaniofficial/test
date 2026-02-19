<?php
/**
 * WooCommerce product archive template.
 *
 * @package BlossomBoutique
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="section">
    <div class="container" style="display:grid;grid-template-columns:280px 1fr;gap:1.4rem;align-items:start;">
        <aside>
            <?php if (is_active_sidebar('shop-filters')) : ?>
                <?php dynamic_sidebar('shop-filters'); ?>
            <?php endif; ?>
        </aside>
        <section>
            <?php woocommerce_content(); ?>
        </section>
    </div>
</main>
<?php
get_footer();
