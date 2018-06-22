<section id="apartment-section" class="apartments-section ">

    <div class="container">

        <div data-accordion-group> <!-- DO NOT DELETE-->
			<?php
			$terms = get_terms([
				'taxonomy' => 'vila'
			]); ?>

			<?php foreach($terms as $term):
				$isVilaApartments = $term->count >= 2;
	
				$postslist = null;
				$link      = null;
				if(!$isVilaApartments):
					$args      = [
						'post_type' => 'apartman',
						'tax_query' => [
							[
								'taxonomy' => 'vila',
								'terms'    => $term->term_id,
							]
						]
					];
					$postslist = get_posts($args);
					$link      = $postslist[0]->guid;
				endif;
				?>


                <div class="<?php if($isVilaApartments): echo 'Villa'; endif; ?> accordion" data-accordion>
                    <div data-control class="MainVilla">
                        <div class="apartments-box">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="apartments-box_img">
										<?php
										$imgVila = get_field('vila_img', $term);
										if($imgVila) {
											if($link): ?>
                                                <a href="<?php echo $postslist[0]->guid ?>">
											<?php endif; ?>
                                            <img alt="vilaImage" src="<?php echo $imgVila ?>"/>
                                            </a>
											<?php
										} else { ?>
                                            <a href="<?php echo $postslist[0]->guid ?>">
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
                                                    <h3><?php
														if($link): ?>
                                                        <a href="<?php echo $link; ?>">
															<?php endif;
															echo $term->name;
															if($isVilaApartments):
																_e(' / Apartmani', 'wpog'); endif; ?></a></h3>
                                                </div><!--/.vilaCaptionAndContent-->
                                            </div><!--/.col-sm-12-->

                                            <div class="col-sm-7">
                                                <div>
													<?php echo term_description($term->term_id, $term->taxonomy) ?>
                                                </div>
                                            </div><!--/.col-sm-7-->

                                            <div class="col-sm-5">
                                                <div class="pricesBoxHolder <?php if($isVilaApartments):
													echo 'pricesBoxHolder--Gray'; endif; ?>">
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
														<?php if($isVilaApartments): ?>
                                                            <span><?php _e('Više Informacija', 'wpog') ?></span>
														<?php else: ?>
                                                            <a href="<?php echo $postslist[0]->guid ?>"><?php _e('Rezerviši', 'wpog') ?></a>
														<?php endif; ?>
                                                    </div><!--/.pricesBoxButonHolder-->
                                                </div><!--/.pricesBoxHolder panel-->
                                            </div><!--/.col-sm-5-->

                                        </div><!--/.row-->
                                    </div> <!-- /.apartments-box__content -->
                                </div><!--/.col-md-7-->

                            </div><!-- /.row -->
                        </div> <!-- /.apartments-box -->
                    </div> <!-- /.MainVilla -->
					<?php if($isVilaApartments): ?>
                        <div data-content class="ApartmentsVilla">
							<?php
							$args  = [
								'post_type' => 'apartman',
								'tax_query' => [
									[
										'taxonomy' => 'vila',
										'terms'    => $term->term_id,
									]
								]
							];
							$query = new WP_Query($args);
							if($query->have_posts()):
								while($query->have_posts()):
									$query->the_post(); ?>
                                    <div class="apartments-box">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="apartments-box_img">
													<?php if(get_the_post_thumbnail()) {
														the_post_thumbnail();
													} else { ?>
                                                        <img src="<?php the_field('defimg', 'options'); ?>"/>
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
																	<?php echo $term->name; ?>
                                                                </p>
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
                                                                    <a href="<?php the_permalink(); ?>"><?php _e('Rezerviši', 'wpog'); ?></a>
                                                                </div><!--/.pricesBoxButonHolder-->
                                                            </div><!--/.pricesBoxHolder panel-->
                                                        </div><!--/.col-sm-5-->


                                                        <div class="col-sm-12">
                                                            <div class="apartments-box__content_links">
                                                                <a href="<?php the_permalink(); ?>"
                                                                   class="link"><?php _e('Rezerviši', 'wpog'); ?></a>
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
                        </div> <!-- /.ApartmentsVilla [data-content]  -->
					<?php endif; ?>
                </div> <!-- /.accordion.Villa -->
			<?php endforeach; ?>
        </div> <!-- /[data-accordion-group] -->  <!-- DO NOT DELETE-->
    </div><!-- /.container -->
</section>
