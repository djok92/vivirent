<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Ogitive
 */

get_header(); ?>

    <section class="p-100-0">
        <div class="container">

			<?php /* Start the Loop */
			if ( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>


                    <div class="Article">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="img-holder">
                                    <a href="<?php the_permalink(); ?>">
										<?php if ( get_the_post_thumbnail() ) {
											the_post_thumbnail( 'archive-size' );
										} else { ?>
                                            <img src="<?php the_field( 'defimg', 'options' ); ?>"/>
										<?php } ?>
                                    </a>
                                </div>
                            </div> <!-- /.col-md-5 -->
                            <div class="col-md-7">
                                <div class="archive-content">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div>
										<?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="link blue"><?php _e('VIŠE INFORMACIJA', 'wpog'); ?></a>
                                </div>
                            </div> <!-- /.col-md-7 -->
                        </div> <!-- /.row -->
                    </div>


				<?php endwhile;
			endif;
			?>

        </div> <!-- /.container -->
    </section>


<?php get_footer(); ?>