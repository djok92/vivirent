<?php

/*
 *
 * Single Apartman
 *
 */

get_header();
?>


<!-- start the loop -->
<?php while ( have_posts() ) : the_post(); ?>


<section class='apartment-single'>
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <p class="apartment-name">Villa Fasana</p>
                <h1><?php the_title(); ?></h1>
            </div> <!-- /.col-md-9 -->


            <div class="col-md-3">
                <div class="booking-box">
                    <p>Kalendar dostupnosti</p>
                    <div class="datepicker" data-date="21/02/2017"></div>
                </div>
            </div> <!-- /.col-md-3 -->


        </div> <!-- /.row -->
    </div> <!-- /.container -->
    
    <div class="container">
        <div class="row">


            <div class="col-md-5">
                <div class='apartment-desc'>
                    <?php the_content(); ?>
                    <a href="#" class='link blue'>Više informacija</a>
                </div> <!-- /.apartment-desc -->
            </div> <!-- /.col-md-5 -->


            <div class="col-md-4">
                <div class='apartment-table'>

                <?php

                    // check if the repeater field has rows of data
                    if( have_rows('specifikacije_repeater') ):

                        // loop through the rows of data
                        while ( have_rows('specifikacije_repeater') ) : the_row(); ?>

                            <div class="table-row">
                                <div><?php the_sub_field('funkcionalnost'); ?></div>
                                <div><?php the_sub_field('vrednost'); ?></div>
                            </div> <!-- /.table-row -->                            

                        <?php endwhile;

                    else :

                        echo 'Trenutno nema unetih specifikacija za ovaj apartman.';

                    endif;

                    ?>

                </div> <!-- /.apartment-desc -->
            </div> <!-- /.col-md-4 -->



        </div> <!-- /.row -->
    </div> <!-- /.container -->
    
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class='accordion-holder'>
                    <p class="section-name">KARAKTERISTIKE PO PROSTORIJAMA</p>

                </div> <!-- /.apartment-desc -->
            </div> <!-- /.col-md-5 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->




</section>

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>