<?php
/*
 *
 * Template Name: Lokacija
 *
 */

get_header();
?>


<?php

// check if the repeater field has rows of data
if( have_rows('sekcije_repeater') ):

    // loop through the rows of data
    while ( have_rows('sekcije_repeater') ) : the_row(); ?>

    
        <?php $vrsta = get_sub_field('vrsta');

        if ($vrsta == 0) {// bez pozadine templejt  ?>      



                <section class="p-100-0">
                    <div class="region-holder">
                        <div class="front-part">
                            <div class="container">

                                <div class="row">
                                    <div class="col-md-4">
                                        <img alt="<?php the_sub_field('naslov'); ?>" src="<?php the_sub_field('foto'); ?>"/>
                                    </div> <!-- /.col-md-4 -->

                                    <div class="col-md-6 col-md-offset-1">

                                        <div class='section-content'> <!-- section content -->

                                            <h2><?php the_sub_field('naslov'); ?></h2>

                                            <div>
                                                <?php the_sub_field('opis'); ?>
                                            </div>

                                            <div class="thumbs-holder">
                                                <?php 
                                                $images = get_sub_field('galerija');
                                                if( $images ): ?>                                               
                                                        <?php foreach( $images as $image ): ?>
                                                                <a href="<?php echo $image['url']; ?>">
                                                                    <img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['thumbnail']; ?>"/>
                                                                </a>                                                        
                                                        <?php endforeach; ?>                                                
                                                <?php endif; ?>

                                            </div> <!-- /.thumbs-holder -->

                                            <a href="#" class="link white">više informacija</a>

                                        </div> <!-- section content -->

                                    </div> <!-- /.col-md-6 -->


                                </div> <!-- /.row -->
                            </div> <!-- /.container -->
                        </div><!-- /.front-part -->
                    </div>
                </section>



        <?php } else { // sa pozadinom templejt ?>


                <section class="p-100-0 text-white">
                    <div class="region-holder with-bkg">

                        <div class="img-holder">
                            <img alt="img" src="<?php the_sub_field('bkg'); ?>" />
                            <div class="gradient"></div>
                        </div>

                        <div class="front-part">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">

                                        <div class='section-content'> <!-- section content -->

                                            <h2><?php the_sub_field('naslov'); ?></h2>

                                            <div>
                                                <?php the_sub_field('opis'); ?>
                                            </div>

                                            <?php 
                                            $images = get_sub_field('galerija');
                                            if( $images ): ?>                                               
                                                    <?php foreach( $images as $image ): ?>
                                                            <a href="<?php echo $image['url']; ?>">
                                                                <img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['thumbnail']; ?>"/>
                                                            </a>                                                        
                                                    <?php endforeach; ?>                                                
                                            <?php endif; ?>

                                            <a href="#" class="link white">više informacija</a>

                                        </div> <!-- section content -->

                                    </div> <!-- /.col-md-7 -->

                                    <div class="col-md-5">
                                        <img alt="<?php the_sub_field('naslov'); ?>" src="<?php the_sub_field('foto'); ?>"/>
                                    </div> <!-- /.col-md-6 -->

                                </div> <!-- /.row -->
                            </div> <!-- /.container -->
                        </div><!-- /.front-part -->


                    </div>
                </section>

        <?php } ?>

        
    <?php endwhile;

else :

    echo 'Materijal nije trenutno dostupan.';

endif;



?>
















<?php
get_footer();
