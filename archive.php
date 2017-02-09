<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Ogitive
 */

get_header(); ?>




		<?php if ( have_posts() ) : ?>

				<?php
					the_archive_title( '<h1>', '</h1>' );
					the_archive_description( '<div>', '</div>' );
				?>


			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>


				<!-- CONTENT GOES HERE -- >			

			<?php endwhile; endif; ?>
			

<?php get_sidebar(); ?>
<?php get_footer(); ?>
