<?php
/*
*
* Template Name: Full Width
*
*/

get_header(); ?>


<!-- start the loop -->
<?php while ( have_posts() ) : the_post(); ?>

<!-- CONTENT GOES HERE -->

<?php endwhile; ?>
<!-- end the loop -->




<?php get_sidebar(); ?>
<?php get_footer(); ?>
