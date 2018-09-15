<?php
$terms = wp_get_post_terms(get_the_ID(), 'vila');
$args  = [
	'post_type'    => 'apartman',
	'tax_query'    => [
		[
			'taxonomy' => 'vila',
			'terms'    => $terms[0]->term_id,
		]
	],
	'post__not_in' => [get_the_ID()]
];

$query = new WP_Query($args);
if($query->have_posts()): ?>
    <div class="mt-60"></div>
	<?php while($query->have_posts()):
		$query->the_post(); ?>
        <div class="apartments-box">
            <div class="row">
                <div class="col-md-5">
                    <div class="apartments-box_img">
						<?php if(get_the_post_thumbnail()) { ?>
                            <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?> </a>
						<?php } else { ?>
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
                                <a href="<?php the_permalink(); ?>">
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
                                </a>
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
	<?php endwhile;
endif;
wp_reset_postdata(); ?>
