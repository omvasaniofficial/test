<?php
/**
 * WooCommerce single product template.
 *
 * @package BlossomBoutique
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="section">
    <div class="container card">
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php
get_footer();
