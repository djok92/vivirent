<?php
/*
*
* Template Name: Category
*
*/

get_header(); ?>



<?php the_content(); ?>


	<?php 
		// WP_Query arguments
		$args = array (
			'post_type'              => 'post_type',
			'category_name'          => 'category_name',
			'posts_per_page'         => '-1',
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>
				

				// do something				


			<?php }
		} else { ?>
			
			Stranica nije dostupna. Vratite se na <a href="<?php echo home_url(); ?>">početnu stranu</a>.

		<?php }

		// Restore original Post Data
		wp_reset_postdata();
	?>



<?php get_sidebar(); ?>
<?php get_footer(); ?>
