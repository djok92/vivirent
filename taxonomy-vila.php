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
		if(have_posts()): ?>
			<?php while(have_posts()) : the_post(); ?>
                <div class="Villa">

                    <div class="apartments-box">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="apartments-box_img">
									<?php if(get_the_post_thumbnail()) {
										the_post_thumbnail();
									} else { ?>
                                        <img src="<?php the_field('defimg', 'options'); ?>"/>
									<?php } ?>
									<?php if(get_field('popust_text')): ?>
                                        <div class="discountBanner">
                                            <p><?php the_field('popust_text'); ?></p>
                                        </div><!--/.discountBanner-->
									<?php endif; ?>

                                </div><!--/."apartments-box_img-->
                            </div><!-- /.col-md-5 -->

                            <div class="col-md-7">
                                <div class="apartments-box__content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="vilaCaptionAndContent">
                                                <h3>
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <div>
													<?php the_excerpt(); ?>
                                                </div>
                                            </div><!--/.vilaCaptionAndContent-->
                                        </div><!--/.col-sm-12-->

                                        <div class="col-sm-7">
                                            <div class='apartment-table'>
                                                <div class="table-row">
                                                    <div><?php _e('Maksimalan broj osoba', 'wpog'); ?></div>
                                                    <div><?php echo do_shortcode('[max_guests]'); ?></div>
                                                </div> <!-- /.table-row -->
                                                <div class="table-row">
                                                    <div><?php _e('Kvadratura apartmana', 'wpog'); ?></div>
                                                    <div><?php the_field('kvadratura'); ?></div>
                                                </div> <!-- /.table-row -->
                                                <div class="table-row">
                                                    <div><?php _e('Lokacija u objektu', 'wpog'); ?></div>
                                                    <div><?php the_field('lokacija'); ?></div>
                                                </div> <!-- /.table-row -->
                                                <div class="table-row">
                                                    <div><?php _e('Broj soba', 'wpog'); ?></div>
                                                    <div><?php the_field('soba'); ?></div>
                                                </div> <!-- /.table-row -->
                                                <div class="table-row">
                                                    <div><?php _e('Broj kupaonica', 'wpog'); ?></div>
                                                    <div><?php the_field('kupaonica'); ?></div>
                                                </div> <!-- /.table-row -->
                                                <div class="table-row">
                                                    <div><?php _e('Broj parking mesta', 'wpog'); ?></div>
                                                    <div><?php the_field('parking'); ?></div>
                                                </div> <!--/.table-row-->
                                            </div> <!-- /.apartment-table -->
                                        </div><!--/.col-sm-7-->

                                        <div class="col-sm-5">
                                            <div class="pricesBoxHolder">
												<?php echo do_shortcode('[afb-prices post_id="' . get_the_ID() . '"]'); ?>
												<?php echo do_shortcode('[afb-reserve post_id="' . get_the_ID() . '"]'); ?>
                                            </div><!--/.pricesBoxHolder panel-->
                                        </div><!--/.col-sm-5-->

                                        <div class="col-sm-12">
                                            <div class="apartments-box__content_links">

                                                <a href="<?php the_permalink(); ?>"
                                                   class="link"><?php _e('Više informacija', 'wpog'); ?></a>
                                            </div>  <!-- /.apartments-box__content_links -->
                                        </div><!--/.col-sm-12-->
                                    </div><!--/.row-->
                                </div> <!-- /.apartments-box__content -->
                            </div><!--/.col-md-7-->
                        </div><!-- /.row -->
                    </div> <!-- /.apartments-box -->

                </div> <!-- /.accordion.Villa -->
			<?php endwhile;
		endif; ?>
    </div> <!-- /.container -->
</section>


<?php get_footer(); ?>
