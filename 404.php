<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package WP_Ogitive
 */

get_header(); ?>




<!-- start the loop -->
<?php while ( have_posts() ) : the_post(); ?>

<!-- CONTENT GOES HERE -->
<?php _e('Stranica koju tražite ne postoji na sajtu ili nije trenutno dostupna.', 'wpog'); ?>

<?php printf(__('Molimo vas da se vratite na <a href="%s">početnu stranu</a> ili da odaberete drugu stranu iz navigacije.', 'wpog'), home_url()); ?>


<?php endwhile; ?>
<!-- end the loop -->




<?php get_footer(); ?>
