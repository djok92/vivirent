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
                      <?php
                      if (function_exists('pll_current_language')) {

                        switch (pll_current_language()) {

                          case 'en':
                            $form_id = 684;
                            break;

                          default:
                            $form_id = 634;
                            break;
                        }

                        echo do_shortcode('[contact-form-7 id="' . $form_id . '"]');
                      }
                      ?>
                    </div>
                </div> <!-- /.col-md-7 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>
