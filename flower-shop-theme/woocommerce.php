<?php
/**
 * WooCommerce fallback template.
 *
 * @package BlossomBoutique
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="section">
    <div class="container">
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php
get_footer();
