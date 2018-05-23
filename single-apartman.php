<?php
/*
 *
 * Single Apartman
 *
 */

get_header();
?>


    <!-- start the loop -->
<?php while( have_posts() ) : the_post(); ?>


    <section class='apartment-single'>
        <div class="container">
            <div class="row">


                <div class="col-md-9">
                    <p class="apartment-name"><?php $terms = get_the_terms( $post->ID, 'vila' );
						foreach ( $terms as $term ) {
							echo $term->name;
						} ?> </p>
                    <h1><?php the_title(); ?></h1>
                    <div class="row">
                        <div class="col-md-7">
                            <div class='apartment-desc'>
								<?php the_content(); ?>
                                <a href="#" class='link blue'><?php _e('Više informacija', 'wpog'); ?></a>
                            </div> <!-- /.apartment-desc -->
                        </div> <!-- /.col-md-7 -->

                        <div class="col-md-5">
                            <div class='apartment-table'>

                                <div class="table-row">
                                    <div><?php _e('Maksimalan broj gostiju', 'wpog'); ?></div>
                                    <div><?php the_field( 'broj_gostiju' ); ?></div>
                                </div> <!-- /.table-row -->
                                <div class="table-row">
                                    <div><?php _e('Kvadratura apartmana', 'wpog'); ?></div>
                                    <div><?php the_field( 'kvadratura' ); ?></div>
                                </div> <!-- /.table-row -->
                                <div class="table-row">
                                    <div><?php _e('Lokacija u objektu', 'wpog'); ?></div>
                                    <div><?php the_field( 'lokacija' ); ?></div>
                                </div> <!-- /.table-row -->
                                <div class="table-row">
                                    <div><?php _e('Broj soba', 'wpog'); ?></div>
                                    <div><?php the_field( 'soba' ); ?></div>
                                </div> <!-- /.table-row -->
                                <div class="table-row">
                                    <div><?php _e('Broj kupatila', 'wpog'); ?></div>
                                    <div><?php the_field( 'kupaonica' ); ?></div>
                                </div> <!-- /.table-row -->
                                <div class="table-row">
                                    <div><?php _e('Broj toaleta', 'wpog'); ?></div>
                                    <div><?php the_field( 'toalet' ); ?></div>
                                </div> <!-- /.table-row -->
                                <div class="table-row">
                                    <div><?php _e('Broj parking mesta', 'wpog'); ?></div>
                                    <div><?php the_field( 'parking' ); ?></div>
                                </div> <!-- /.table-row -->

								<?php if ( get_field( 'pristup_bazenu' ) ) { ?>
                                    <div class="table-row">
                                        <div><?php _e('Broj parking mesta', 'wpog'); ?></div>
                                        <div><?php the_field( 'vrednost' ); ?></div>
                                    </div> <!-- /.table-row -->
								<?php } ?>

								<?php if ( get_field( 'terasa' ) ) { ?>
                                    <div class="table-row">
                                        <div><?php _e('Broj terasa', 'wpog'); ?></div>
                                        <div><?php the_field( 'terasa' ); ?></div>
                                    </div> <!-- /.table-row -->
								<?php } ?>

								<?php if ( get_field( 'jacuzzi' ) ) { ?>
                                    <div class="table-row">
                                        <div><?php _e('Broj jacuzzi kada', 'wpog'); ?></div>
                                        <div><?php the_field( 'jacuzzi' ); ?></div>
                                    </div> <!-- /.table-row -->
								<?php } ?>


                            </div> <!-- /.apartment-desc -->
                        </div> <!-- /.col-md-5 -->
                    </div> <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class='accordion-holder'>
                                <p class="section-name"><?php _e( 'KARAKTERISTIKE PO PROSTORIJAMA', 'wpog' ) ?></p>

                                <div data-accordion-group>
                                    <div class="accordion" data-accordion>
                                        <div data-control>Spavaca soba 1</div>
                                        <div data-content>
                                            <div class="accordion-content">
                                                <div class="img-holder">
                                                    <img alt="slider-img"
                                                         src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/a-small-img.jpg"/>
                                                </div> <!-- /.img-holder -->
                                                <div class="accordion-desc">
                                                    <div>
                                                        <p>Dvokrevetna soba</p>
                                                        <p>Bračni krevet: 200x160</p>
                                                        <p>Popločano, s terasom, klima-uređaj: 1</p>
                                                    </div>
                                                    <div class="accordion-spec">
                                                        <img alt="sprite"
                                                             src="<?php echo get_template_directory_uri(); ?>/dist/images/sprite.jpg"/>
                                                    </div>
                                                </div> <!-- /.accordion-desc -->
                                            </div><!-- /.accordion-content -->
                                        </div> <!-- /[data-content] -->
                                    </div> <!-- /.accordion -->
                                    <div class="accordion" data-accordion>
                                        <div data-control>Spavaca soba 1</div>
                                        <div data-content>
                                            <div class="accordion-content">
                                                <div class="img-holder">
                                                    <img alt="slider-img"
                                                         src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/a-small-img.jpg"/>
                                                </div> <!-- /.img-holder -->
                                                <div class="accordion-desc">
                                                    <div>
                                                        <p>Dvokrevetna soba</p>
                                                        <p>Bračni krevet: 200x160</p>
                                                        <p>Popločano, s terasom, klima-uređaj: 1</p>
                                                    </div>
                                                    <div class="accordion-spec">
                                                        <img alt="sprite"
                                                             src="<?php echo get_template_directory_uri(); ?>/dist/images/sprite.jpg"/>
                                                    </div>
                                                </div> <!-- /.accordion-desc -->
                                            </div><!-- /.accordion-content -->
                                        </div> <!-- /[data-content] -->
                                    </div> <!-- /.accordion -->
                                </div> <!-- /[data-accordion-group] -->

                            </div> <!-- /.apartment-desc -->
                        </div> <!-- /.col-md-12 -->

                    </div> <!-- /.row -->

                </div> <!-- /.col-md-9 -->


                <div class="col-md-3">
                	<?php get_template_part('parts/booking-box'); ?>
                </div> <!-- /.col-md-3 -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

<?php endwhile; ?>
    <!-- end the loop -->

<?php get_footer(); ?>
