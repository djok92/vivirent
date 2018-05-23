<?php
/**
 * The template for displaying all single posts.
 *
 * @package WP_Ogitive
 */
get_header();
?>

    <section class="p-100-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-content">
                        <!-- start the loop -->
						<?php
						while ( have_posts() ) : the_post();
							the_content();
						endwhile;
						?>
                        <!-- end the loop -->
                    </div> <!-- /.page-content -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
					<?php get_template_part( 'breadcrumbs' ); ?>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->


            <div class="row">
                <div class="col-md-12">
					<?php get_template_part( 'parts/posts', 'related' ) ?>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->


        </div>
        </div> <!-- /.container -->
    </section>


<?php get_footer(); ?>
