<?php
/*
 *
 * Single Apartman
 *
 */

get_header();
?>


<!-- start the loop -->
<?php while(have_posts()) : the_post(); ?>


    <section class='apartment-single'>

        <div class="container">
            <!-- Tabs navigation -->
            <ul class="tabs">
                <li class="tab-link current">
                    <p><?php _e('Informacije', 'wpog') ?></p>
                </li>
                <li class="tab-link">
                    <p><?php _e('Lokacija', 'wpog') ?></p>
                </li>
                <li class="tab-link">
                    <p><?php _e('Utisci', 'wpog') ?></p>
                </li>
                <li class="tab-link">
                    <p><?php _e('Rezervacija', 'wpog') ?></p>
                </li>
                <li class="tab-link">
                    <p><?php _e('Kontakt', 'wpog') ?></p>
                </li>
            </ul> <!-- tabs -->
            <div class="tabs-holder">

                <div id="tab-1" class="tabs-content current">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="tab-1-infoHolder">
                                <h3><?php the_title(); ?></h3>
                                <div class='apartment-desc'>
									<?php the_content(); ?>
                                    <a href="#" class='link blue'><?php _e('Više informacija', 'wpog'); ?></a>
                                </div> <!-- /.apartment-desc -->
                            </div><!--/.tab-1-infoHolder-->
                        </div> <!-- /.col-md-5 -->

                        <div class="col-md-4 col-xs-7" id="tab-1-table">
                            <h3><?php _e('Detalji', 'wpog') ?></h3>
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
                        </div> <!-- /.col-md-4 col-xs-7 -->
                        <div class="col-md-3 col-xs-5" id="tab-1-prices">
                            <div class="pricesBoxCaption">
                                <h3><?php _e('Cenovnik', 'wpog') ?></h3>
                            </div>
                            <div class="pricesBoxHolder">
                                <div class="Prices Prices--New">
									<?php echo do_shortcode('[afb-prices]'); ?>
                                </div><!-- /.newPrices -->

                                <div class="pricesBoxButtonHolder">
                                    <a href="#"><?php _e('Kontakt', 'wpog'); ?></a>
                                </div><!--/.pricesBoxButonHolder-->
                                <div class="pricesBoxButtonHolder">
                                    <a href="#"><?php _e('Rezervisi', 'wpog'); ?></a>
                                </div><!--/.pricesBoxButonHolder-->
                            </div><!--/.pricesBoxHolder-->
                        </div><!-- /.col-md-3 col-xs-5 -->
                    </div> <!-- /.row -->

                    <div class="row">
                        <div class="col-md-9">
                            <div class='accordion-holder'>
                                <p class="section-name"><?php _e('Karakteristike', 'wpog') ?></p>
                                <div class="apartment-description">
									<?php the_field('karakteristike'); ?>
                                </div>
								<?php $icons = get_field('karakteristike_ikonice');
								if($icons): ?>
                                    <div class="accordion-spec">
										<?php foreach($icons as $icon): ?>
                                            <div class="AccordionIcon">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/ico-<?php echo $icon; ?>.svg"
                                                     alt="">
                                            </div>
										<?php endforeach; ?>
                                    </div>
								<?php endif; ?>
                                <div data-accordion-group>
									<?php $i = 1;
									if(have_rows('sobe_repeater')):
										while(have_rows('sobe_repeater')) : the_row(); ?>
                                            <div class="accordion Specification" data-accordion>
                                                <div data-control><?php the_sub_field('naziv_prostorije') ?></div>
                                                <div data-content>
                                                    <div class="accordion-content">
                                                        <div class="img-holder">
                                                            <img alt="room image"
                                                                 src="<?php the_sub_field('room_image'); ?>"/>
                                                        </div> <!-- /.img-holder -->
                                                        <div class="accordion-desc">
															<?php the_sub_field('room_desc'); ?>
                                                        </div> <!-- /.accordion-desc -->
                                                    </div><!-- /.accordion-content -->
                                                </div> <!-- /[data-content] -->
                                            </div> <!-- /.accordion -->
											<?php $i ++; endwhile;
									endif; ?>
                                </div> <!-- /[data-accordion-group] -->
                            </div> <!-- /.apartment-desc -->
                        </div> <!-- /.col-md-9 -->
                    </div> <!-- /.row -->
                </div> <!-- /#tab-1  Informacije -->

                <div id="tab-2" class="tabs-content">

                    <div class="googleMapHolder">
						<?php $location = get_field('location');

						if(!empty($location)): ?>
                            <div class="acf-map">
                                <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                                     data-lng="<?php echo $location['lng']; ?>"></div>
                            </div>
						<?php endif; ?>
                    </div>
                </div><!-- /#tab-2 Lokacija -->

                <div id="tab-3" class="tabs-content">
                    <div class="Contact__Description">
						<?php the_field('opis_utiska'); ?>
                    </div><!--/.Contact__Description-->
                    <div class="tabCaptionHolder">
                        <h3><?php _e('Ostavite utisak za apartman', 'wpog') ?></h3>
                    </div><!--/.tabCaptionHolder-->
                    <div class="tabButtonHolder">
                        <a id="contactToggle" href="#">posalji utisak</a>
                    </div><!--/.buttonCaptionHolder-->

                    <div class="row">
                        <div class="col-md-12">

                            <div class="Contact__Form">
								<?php echo do_shortcode('[contact-form-7 id="522" title="Forma za utisak"]'); ?>
                            </div><!-- /.Contact__Form -->

							<?php for($i = 0; $i < 3; $i ++) { ?>

                                <div class="commentHolder">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="commentLeftHolder">
                                                <div class="commentFlagHolder">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/flagTR.png">
                                                </div><!--/.commentFlagHolder-->
                                                <div class="commentNameHolder">
                                                    <p>Dragan Petrovic</p>
                                                </div><!--/.commentNameHolder-->
                                                <div class="commentDateHolder">
                                                    <span>04/2016</span>
                                                </div><!--/.commentDateHolder-->
                                            </div><!--/.commentLeftHolder-->
                                        </div><!--/.col-md-2-->
                                        <div class="col-md-10">
                                            <div class="commentMainHolder">
                                                <div class="commentCaption">
                                                    <h3><?php _e('Animi consequatur doloribus enimimpedit', 'wpog') ?></h3>
                                                </div><!--/.commentCaption-->
                                                <div class="commentRating">
                                                    <p>aaaaaaa</p>
                                                </div><!--/.commentRating-->
                                                <div class="commentContent">
                                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio
                                                        saepe laboriosam obcaecati amet eveniet vero sit ab delectus
                                                        tenetur in odit temporibus ut vitae dicta itaque, quibusdam
                                                        asperiores expedita quam.Lorem, ipsum dolor sit amet consectetur
                                                        adipisicing elit. Optio saepe laboriosam obcaecati amet eveniet
                                                        vero sit ab delectus tenetur in odit temporibus ut vitae dicta
                                                        itaque, quibusdam asperiores expedita quam.</p>
                                                </div><!--/.commentContent-->
                                            </div><!--/.commentMainHolder-->
                                        </div><!--/.col-md-10-->
                                    </div><!--/.row-->
                                </div><!--/.commentHolder-->

							<?php } ?> <!--End For Loop-->
                        </div><!--/.row-->
                    </div><!--/.col-md-12-->

                </div><!-- /#tab-3 Utisci -->

                <div id="tab-4" class="tabs-content">
                    <div class="reservationDescription">
						<?php the_field('opis_rezervacije'); ?>
                    </div><!-- /.reservationDescription -->

					<?php get_template_part('parts/booking', 'form'); ?>

                </div><!-- /#tab-4 Rezervacija -->

                <div id="tab-5" class="tabs-content">
                    <div class="Contact__Description">
						<?php the_field('opis_kontakt'); ?>
                    </div>
                    <div class="tabCaptionHolder">
                        <h3><?php _e('kontakt za apartman 3', 'wpog') ?></h3>
                    </div>
                    <div class="Contact__Form">
						<?php echo do_shortcode('[contact-form-7 id="560" title="Contact form"]'); ?>
                    </div><!-- /.Contact__Form -->
                </div><!-- /#tab-5 Kontakt -->
            </div> <!-- /.tabs-holder -->

        </div> <!-- /.container -->
    </section> <!-- /.apartment-single -->


    <noscript>
        <label> <span> Ime i prezime </span>
            [text your-name] </label>

        <label> <span> Email adresa </span>
            [email your-email] </label>

        <label> <span> Naslov </span>
            [text your-subject] </label>

        <label> <span> Komentar </span>
            [textarea your-message] </label>

        <label> <span class='ratingLabel'> Ocena </span>
            <span class='Rating'><span class='Rating__Star'></span><span class='Rating__Star'></span><span
                        class='Rating__Star'></span><span class='Rating__Star'></span><span
                        class='Rating__Star filled'></span></span>
            <input name="rating" hidden>
        </label>
        <div>
            [submit "Posalji"]
        </div>
    </noscript>

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>
