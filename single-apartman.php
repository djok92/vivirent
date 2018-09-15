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
                <li class="tab-link current" data-hash="info">
                    <p><?php _e('Informacije', 'wpog') ?></p>
                </li>
                <li class="tab-link" data-hash="location">
                    <p><?php _e('Lokacija', 'wpog') ?></p>
                </li>
                <li class="tab-link" data-hash="reviews">
                    <p><?php _e('Utisci', 'wpog') ?></p>
                </li>
                <li class="tab-link" data-hash="reserve">
                    <p><?php _e('Rezervacija', 'wpog') ?></p>
                </li>
                <li class="tab-link" data-hash="contact">
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
                                    <!--<a href="#" class='link blue'><?php _e('Više informacija', 'wpog'); ?></a>-->
                                </div> <!-- /.apartment-desc -->
                            </div><!--/.tab-1-infoHolder-->
                        </div> <!-- /.col-md-5 -->

                        <div class="col-md-4 col-xs-7" id="tab-1-table">
                            <h3><?php _e('Detalji', 'wpog') ?></h3>
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
								<?php echo do_shortcode('[afb-reserve]'); ?>
                            </div><!--/.pricesBoxHolder-->
                        </div><!-- /.col-md-3 col-xs-5 -->
                    </div> <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="section-name"><?php _e('Karakteristike', 'wpog') ?></p>
                            <div class="apartment-description">
								<?php the_field('karakteristike'); ?>
                            </div>
							<?php $icons = get_field('ikonice');
							if($icons): ?>
                                <div class="accordion-spec">
									<?php foreach($icons as $icon): ?>
                                        <div class="AccordionIcon">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/<?php echo $icon['value']; ?>.svg"
                                                 alt="icon" title="<?php echo $icon['label']; ?>">
                                        </div>
									<?php endforeach; ?>
                                </div>
							<?php endif; ?>
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-9">
                            <div class='accordion-holder'>
                                <div data-accordion-group>
									<?php $i = 1;
									if(have_rows('sobe_repeater')):
										while(have_rows('sobe_repeater')) : the_row();
											$isFirst = $i === 1 ? 'open' : ''; ?>
                                            <div class="accordion Specification <?php echo $isFirst; ?>" data-accordion>
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
                        <div class="col-md-3">
							<?php
							$icoDistance = get_field('icoDistance');
							if($icoDistance) { ?>
                            <div class="apartmenSpec">
								<?php if($icoDistance['do_mora']): ?>
                                    <div class="apartmenSpecIcon">
                                        <div class="iconHolder">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/ico-do-mora.svg"
                                                 alt="do mora" title="Do mora">
                                        </div><!-- /.iconHolder -->
                                        <span>Udaljenost od plaze:  <b><?php echo $icoDistance['do_mora']; ?></b></span>
                                    </div>
								<?php endif; ?>
								<?php if($icoDistance['do_centra']): ?>
                                    <div class="apartmenSpecIcon">
                                        <div class="iconHolder">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/ico-do-centra.svg"
                                                 alt="Do centra" title="Do centra">
                                        </div><!-- /.iconHolder -->
                                        <span>Udaljenost od centra:  <b><?php echo $icoDistance['do_centra']; ?></b></span>
                                    </div>
								<?php endif; ?>
								<?php if($icoDistance['do_prodavnice']): ?>
                                    <div class="apartmenSpecIcon">
                                        <div class="iconHolder">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/ico-do-prodavnice.svg"
                                                 alt="Do prodavnice" title="Do prodavnice">
                                        </div><!-- /.iconHolder -->
                                        <span>Udaljenost od prodavnice: <b> <?php echo $icoDistance['do_prodavnice']; ?></b></span>
                                    </div>
								<?php endif; ?>
								<?php if($icoDistance['do_restorana']): ?>
                                    <div class="apartmenSpecIcon">
                                        <div class="iconHolder">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/ico-do-restorana.svg"
                                                 alt="Do restorana" title="Do restorana">
                                        </div><!-- /.iconHolder -->
                                        <span>Udaljenost od restorana: <b><?php echo $icoDistance['do_restorana']; ?></b></span>
                                    </div>
								<?php endif;
								} ?>
                            </div>
                        </div><!-- /.col-md-3 -->
                    </div> <!-- /.row -->
					<?php get_template_part('parts/relatedApartments'); ?>
                </div> <!-- /#tab-1  Informacije -->

                <div id="tab-2" class="tabs-content">

                    <div class="googleMapHolder">
                        <div class='mapainfo'>
							<?php the_field('location_info'); ?> | <a href='<?php the_field('location_link'); ?>'
                                                                      class='bluelink' target='_blank'>Google Map</a>
                        </div>
						<?php $location = get_field('location');

						if(!empty($location)): ?>
              <div class="mapImage" style="background-image: url(<?php echo wpog_google_static_map_single($location); ?>);"></div>
<!--                            <div class="acf-map">-->
<!--                                <div class="marker" data-lat="--><?php //echo $location['lat']; ?><!--"-->
<!--                                     data-lng="--><?php //echo $location['lng']; ?><!--"></div>-->
<!--                            </div>-->
						<?php endif; ?>
                    </div>
                </div><!-- /#tab-2 Lokacija -->

                <div id="tab-3" class="tabs-content">
                    <div class="Contact__Description">
						<?php the_field('opis_utiska'); ?>
                    </div><!--/.Contact__Description-->

					<?php echo do_shortcode('[afb-reviewform]'); ?>

                    <div class="row">
                        <div class="col-md-12">

							<?php get_template_part('parts/reviews', 'apartments'); ?>

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
                        <h3><?php _e('kontakt za ', 'wpog') ?><?php the_title(); ?></h3>
                    </div>
                    <div class="Contact__Form">
                      <?php
                      if (function_exists('pll_current_language')) {
                        
                        switch (pll_current_language()) {

                          case 'en':
                            $form_id = 685;
                            break;

                          default:
                            $form_id = 560;
                            break;
                        }

                        echo do_shortcode('[contact-form-7 id="' . $form_id . '"]');
                      }
                      ?>
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
