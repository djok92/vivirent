<section id="apartment-section" class="apartments-section ">
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-12">-->
    <!--                <h2>--><?php //the_field('hs2_naslov', 'options'); ?><!--</h2>-->
    <!--				--><?php //if(is_home()) { ?>
    <!--                    <div>-->
    <!--						--><?php //the_field('hs2_opis', 'options'); ?>
    <!--                    </div>-->
    <!--				--><?php //} ?>
    <!--            </div> <!-- /.col-md-12 -->
    <!--        </div> <!-- /.row -->
    <!--    </div> <!-- /.container -->

    <div class="container">
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

                                    <div class="col-md-12">
                                        <div class="vilaCaptionAndContent">
                                            <p class="apartments-box__content_name">
												<?php $terms = get_the_terms($post->ID, 'vila');
												foreach($terms as $term) {
													echo $term->name;
												} ?>
                                            </p>
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
                                                labore velit, lorem ipsum dolor sit amet consectetur adipisicing
                                                elit</p>
                                        </div><!--/.vilaCaptionAndContent-->
                                    </div><!--/.col-md-12-->

                                    <div class="col-md-12">
                                        <div class="tableAndPrices">
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

                                            <div class="pricesBoxHolder">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="singlePriceBox pricesBoxCrossed">
                                                            <p>cena dnevno od</p>
                                                            <span>272 &euro;</span>
                                                        </div><!--/.singlePriceBox pricesBoxCrossed-->
                                                    </div><!--/.col-md-6-->
                                                    <div class="col-md-6">
                                                        <div class="singlePriceBox pricesBoxCrossed">
                                                            <p>cena nedeljno od</p>
                                                            <span>2472 &euro;</span>
                                                        </div><!--/.singlePriceBox pricesBoxCrossed-->
                                                    </div><!--/.col-md-6-->

                                                    <div class="col-md-6">
                                                        <div class="singlePriceBox">
                                                            <p>cena dnevno od</p>
                                                            <span>212 &euro;</span>
                                                        </div><!--/.singlePriceBox-->
                                                    </div><!--/.col-md-6-->

                                                    <div class="col-md-6">
                                                        <div class="singlePriceBox">
                                                            <p>cena nedeljno od</p>
                                                            <span>2272 &euro;</span>
                                                        </div><!--/.singlePriceBox-->
                                                    </div><!--/.col-md-6-->

                                                    <div class="col-md-12">
                                                        <div class="pricesBoxButtonHolder">
                                                            <a href="#">rezervisi</a>
                                                        </div><!--/.pricesBoxButonHolder-->
                                                    </div><!--/.col-md-12-->

                                                </div><!--/.row-->
                                            </div><!--/.pricesBoxHolder-->
                                        </div> <!-- /.tableAndPrices -->
                                    </div><!--/.col-md-12-->

                                    <div class="col-md-12">
                                        <div class="apartments-box__content_links">
                                            <a href="<?php the_permalink(); ?>"
                                               class="link"><?php _e('više informacija', 'wpog'); ?></a>
                                            <!-- <a href="<?php if(function_exists('af_booking')) {
												echo add_query_arg(array('acm_id' => $post->ID), af_booking()->getBookingURL());
											} ?>" class="link"><?php _e('rezerviši', 'wpog'); ?></a> -->
                                        </div>  <!-- /.apartments-box__content_links -->
                                    </div>

                                </div><!--/.row-->
                            </div> <!-- /.apartments-box__content -->
                        </div><!-- /.col-md-7 -->
                    </div><!-- /.row -->
                </div> <!-- /.apartments-box -->
			<?php }
		} else { ?>
			<?php printf(__('Stranica nije dostupna. Vratite se na <a href="%s">početnu stranu</a>.', 'wpog'), home_url()); ?>
		<?php }
		// Restore original Post Data
		wp_reset_postdata();
		?>

    </div><!-- /.container -->
</section>
