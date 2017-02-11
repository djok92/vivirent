<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Ogitive
 */
get_header();
?>


<section class="p-100-0">
    <div class="container">
        <?php for ($i = 1; $i < 5; $i++) { ?>
            <div class="single-post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="img-holder">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/archive-img.jpg" />
                        </div>
                    </div> <!-- /.col-md-5 -->
                    <div class="col-md-7">
                        <div class="archive-content">
                            <h2>Fusce nec odio consectetur fermentum nisi eget, pellentesque</h2>
                            <div>
                                Vestibulum ultrices justo id lobortis vulputate.
                                Nam ullamcorper, nulla et adipiscing laoreet, urna odio volutpat justo, vitae pulvinar nisi leo in turpis. Sed sodales porttitor magna.
                                Morbi in justo quis nunc interdum feugiat.
                            </div>
                            <a href="#" class="link blue">VIŠE INFORMACIJA</a>
                        </div>
                    </div> <!-- /.col-md-7 -->
                </div> <!-- /.row -->
            </div> 
        <?php } ?>
    </div> <!-- /.container -->
</section>





<?php get_footer(); ?>
