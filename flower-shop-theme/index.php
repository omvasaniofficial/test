<?php
/**
 * Main template file.
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
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php esc_html_e('No content found.', 'blossom-boutique'); ?></p>
        <?php endif; ?>
    </div>
</main>
<?php
get_footer();
