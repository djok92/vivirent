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
Stranica koju tražite ne postoji na sajtu ili nije trenutno dostupna.			

Molimo vas da se vratite na  <a href='<?php echo home_url(); ?>'>početnu stranu</a> ili da odaberete drugu stranu iz navigacije.

<?php endwhile; ?>
<!-- end the loop -->




<?php get_footer(); ?>
