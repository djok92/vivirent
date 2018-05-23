<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WP_Ogitive
 */

get_header(); ?>

<!-- start the loop -->
<?php while ( have_posts() ) : the_post(); ?>

<section class="p-100-0">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
            	<div class="page-content">
                    <?php the_content(); ?>
                </div> <!-- /.page-content -->
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->

        <div class="row"> 
            <div class="col-md-12">
                <?php get_template_part('breadcrumbs'); ?>
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->        

    </div>
</div> <!-- /.container -->
</section>

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>
