<section id="apartment-section" class="apartments-section ">

    <div class="container">


        <div data-accordion-group> <!-- DO NOT DELETE-->

			<?php
			$i = 4;
			while($i --): ?>
                <!-- Main Villa that holds Other Apartments. This goes in loop (1st lvl) -->
                <div class="Villa accordion" data-accordion>
                    <div data-control class="MainVilla">
                        <div class="apartments-box">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="apartments-box_img">
										<?php if(get_the_post_thumbnail()) {
											the_post_thumbnail();
										} else { ?>
                                            <a href="<?php the_permalink(); ?> ">
                                                <img src="<?php the_field('defimg', 'options'); ?>"/>
                                            </a>
										<?php } ?>
                                        <div class="discountBanner">
                                            <p>15% Discount Last Minute</p>
                                        </div><!--/.discountBanner-->
                                    </div><!--/."apartments-box_img-->
                                </div><!-- /.col-md-5 -->

                                <div class="col-md-7">
                                    <div class="apartments-box__content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="vilaCaptionAndContent">
                                                    <h3><a href="<?php the_permalink(); ?>">Vila Fasana</a></h3>
                                                    <div>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Voluptates
                                                        labore velit, lorem ipsum dolor sit amet consectetur adipisicing
                                                        elit ipsum dolor sit amet consectetur adipisicing elit.
                                                        Voluptates
                                                        labore velit, lorem ipsum dolor sit amet consectetur adipisicing
                                                        elit lor sit amet consectetur adipisicing el.
                                                    </div>
                                                </div><!--/.vilaCaptionAndContent-->
                                            </div><!--/.col-sm-12-->
                                           
                                            <div class="col-sm-7">
                                                <div class='apartment-table'>
                                                    <div class="table-row">
                                                        <div><?php _e('Maksimalan broj osoba', 'wpog'); ?></div>
                                                        <div><?php the_field('broj_gostiju'); ?></div>
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
                                                    <div class="pricesOnly">
                                                        <div class="singlePriceBox pricesBoxCrossed">
                                                            <p>cena dnevno od</p>
                                                            <span>272&euro;</span>
                                                        </div><!--/.singlePriceBox pricesBoxCrossed-->
                                                        <div class="singlePriceBox pricesBoxCrossed">
                                                            <p>cena nedeljno od</p>
                                                            <span>2472&euro;</span>
                                                        </div><!--/.singlePriceBox pricesBoxCrossed-->
                                                        <div class="singlePriceBox">
                                                            <span>212&euro;</span>
                                                        </div><!--/.singlePriceBox-->
                                                        <div class="singlePriceBox">
                                                            <span>2272&euro;</span>
                                                        </div><!--/.singlePriceBox-->
                                                    </div>
                                                    <div class="pricesBoxButtonHolder">
                                                        <a href="#">Vise Informacija</a>
                                                    </div><!--/.pricesBoxButonHolder-->
                                                </div><!--/.pricesBoxHolder panel-->
                                            </div><!--/.col-sm-5-->
                                        
                                           
                                            <div class="col-sm-12">
                                                <div class="apartments-box__content_links">
                                                    <a href="<?php the_permalink(); ?>"
                                                        class="link"><?php _e('više informacija', 'wpog'); ?></a>
                                                    <!-- <a href="<?php if(function_exists('af_booking')) {
                                                        echo add_query_arg(array('acm_id' => $post->ID), af_booking()->getBookingURL());
                                                    } ?>" class="link"><?php _e('rezerviši', 'wpog'); ?></a> -->
                                                </div>  <!-- /.apartments-box__content_links -->
                                            </div><!--/.col-sm-12-->

                                        </div><!--/.row-->
                                    </div> <!-- /.apartments-box__content -->
                                </div><!--/.col-md-7-->

                            </div><!-- /.row -->
                        </div> <!-- /.apartments-box -->
                    </div> <!-- /.MainVilla -->

                    <!-- Apartments in parent Villa -->
                    <div data-content class="ApartmentsVilla">
						<?php
						// WP_Query arguments
						$args = array(
							'post_type'      => 'apartman',
							'posts_per_page' => '5',
						);
						// The Query
						$query = new WP_Query($args);

						// The Loop
						if($query->have_posts()) {
							while($query->have_posts()) {
								$query->the_post(); ?>
                                <div class="apartments-box">
                                    <div class="row">

                                        <div class="col-md-5">
                                            <div class="apartments-box_img">
												<?php if(get_the_post_thumbnail()) {
													the_post_thumbnail();
												} else { ?>
                                                    <a href="<?php the_permalink(); ?> ">
                                                        <img src="<?php the_field('defimg', 'options'); ?>"/>
                                                    </a>
												<?php } ?>
                                                <div class="discountBanner">
                                                    <p>15% Discount Last Minute</p>
                                                </div><!--/.discountBanner-->
                                            </div><!--/."apartments-box_img-->
                                        </div><!-- /.col-md-5 -->

                                        <div class="col-md-7">
                                            <div class="apartments-box__content">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="vilaCaptionAndContent">
                                                            <p class="apartments-box__content_name">
																<?php $terms = get_the_terms($post->ID, 'vila');
																foreach($terms as $term) {
																	echo $term->name;
																} ?>
                                                            </p>
                                                            <h3>
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </h3>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                Voluptates
                                                                labore velit, lorem ipsum dolor sit amet consectetur
                                                                adipisicing
                                                                elit</p>
                                                        </div><!--/.vilaCaptionAndContent-->
                                                    </div><!--/.col-sm-12-->
                                                   
                                                        <div class="col-sm-7">
                                                            <div class='apartment-table'>
                                                                <div class="table-row">
                                                                    <div><?php _e('Maksimalan broj osoba', 'wpog'); ?></div>
                                                                    <div><?php the_field('broj_gostiju'); ?></div>
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
                                                                <div class="pricesOnly">
                                                                    <div class="singlePriceBox pricesBoxCrossed">
                                                                        <p>cena dnevno od</p>
                                                                        <!-- <span>272&euro;</span>-->
                                                                    </div><!--/.singlePriceBox pricesBoxCrossed-->
                                                                    <div class="singlePriceBox pricesBoxCrossed">
                                                                        <p>cena nedeljno od</p>
                                                                        <!-- <span>2472&euro;</span>-->
                                                                    </div><!--/.singlePriceBox pricesBoxCrossed-->
                                                                    <div class="singlePriceBox">
                                                                        <span>212&euro;</span>
                                                                    </div><!--/.singlePriceBox-->
                                                                    <div class="singlePriceBox">
                                                                        <span>2272&euro;</span>
                                                                    </div><!--/.singlePriceBox-->
                                                                </div>
                                                                <div class="pricesBoxButtonHolder">
                                                                    <a href="#">rezervisi</a>
                                                                </div><!--/.pricesBoxButonHolder-->
                                                            </div><!--/.pricesBoxHolder panel-->
                                                        </div><!--/.col-sm-5-->
                                                   

                                                    <div class="col-sm-12">
                                                        <div class="apartments-box__content_links">
                                                            <a href="<?php the_permalink(); ?>"
                                                               class="link"><?php _e('više informacija', 'wpog'); ?></a>
                                                            <!-- <a href="<?php if(function_exists('af_booking')) {
																echo add_query_arg(array('acm_id' => $post->ID), af_booking()->getBookingURL());
															} ?>" class="link"><?php _e('rezerviši', 'wpog'); ?></a> -->
                                                        </div>  <!-- /.apartments-box__content_links -->
                                                    </div><!--/.col-sm-12-->

                                                </div><!--/.row-->
                                            </div> <!-- /.apartments-box__content -->
                                        </div><!--/.col-md-7-->

                                    </div><!-- /.row -->
                                </div> <!-- /.apartments-box -->
							<?php }
						} else { ?>
							<?php printf(__('Stranica nije dostupna. Vratite se na <a href="%s">početnu stranu</a>.', 'wpog'), home_url()); ?>
						<?php }
						wp_reset_postdata(); ?>

                    </div> <!-- /.ApartmentsVilla [data-content]  -->
                </div> <!-- /.accordion.Villa -->
			<?php endwhile; ?>
        </div> <!-- /[data-accordion-group] -->  <!-- DO NOT DELETE-->
    </div><!-- /.container -->
</section>
