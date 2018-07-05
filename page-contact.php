<?php
/*
 *
 * Template Name: Kontakt
 *
 */


get_header(); ?>

<!-- start the loop -->
<?php while(have_posts()) : the_post(); ?>

    <section class="p-100-0">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="page-content">
						<?php the_content(); ?>
                    </div> <!-- /.page-content -->
                </div> <!-- /.col-md-5 -->
                <div class="col-md-8">
                    <div class="Contact__Form">
						<?php echo do_shortcode('[contact-form-7 id="608" title="Contact Form Page"]'); ?>
                    </div>
                </div> <!-- /.col-md-7 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>
