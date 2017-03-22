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
                    <div class="row">
                        <div class="col-md-7">
                            <div class='apartment-desc'>
								<?php the_content(); ?>
                                <a href="#" class='link blue'>Više informacija</a>
                            </div> <!-- /.apartment-desc -->
                        </div> <!-- /.col-md-7 -->

                        <div class="col-md-5">
                            <div class='apartment-table'>

								<?php
								// check if the repeater field has rows of data
								if ( have_rows( 'specifikacije_repeater' ) ):

									// loop through the rows of data
									while ( have_rows( 'specifikacije_repeater' ) ) : the_row();
										?>

                                        <div class="table-row">
                                            <div><?php the_sub_field( 'funkcionalnost' ); ?></div>
                                            <div><?php the_sub_field( 'vrednost' ); ?></div>
                                        </div> <!-- /.table-row -->

										<?php
									endwhile;

								else :

									echo 'Trenutno nema unetih specifikacija za ovaj apartman.';

								endif;
								?>

                            </div> <!-- /.apartment-desc -->
                        </div> <!-- /.col-md-5 -->
                    </div> <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class='accordion-holder'>
                                <p class="section-name">KARAKTERISTIKE PO PROSTORIJAMA</p>

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
                    <div class="row">
                        <div class="col-md-7">
                            <div class="box">
                                <p class="section-name">VILLA FASANA</p>
                                <img alt="vila-img"
                                     src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/vila-img.jpg"/>
                            </div>
                        </div> <!-- /.col-md-7 -->
                        <div class="col-md-5">
                            <div class="box">

                            </div> <!-- /.box -->
                        </div> <!-- /.col-md-5 -->
                    </div> <!-- /.row -->
                </div> <!-- /.col-md-9 -->


                <div class="col-md-3">
                    <div class="booking-box">
                        <p>Kalendar dostupnosti</p>
                        <div id="af-calendar"></div>

                        <form action="<?php if ( function_exists( 'af_booking' ) ) {
							echo af_booking()->getBookingURL();
						} ?>" method="get" onsubmit="return af_booking.checkForm();">
                            <input type="hidden" id="af-acm-id" name="acm_id" value="<?php the_id(); ?>">
                            <input id="af-selection" type="hidden" name="checkin" value="">

                            <div class="form-item">
                                <p>Datum dolaska:</p>
                                <div class="datepicker-holder">
                                    <i class="fa fa-calendar-o"></i>
                                    <div id="af-date">Izaberite iz kalendara</div>
                                </div>
                            </div> <!-- /.form-item -->
                            <div class="form-item">
                                <p>Broj noci:</p>
                                <select id="count_nights" type="text" name="nights" class="select2 night"></select>
                            </div> <!-- /.form-item -->
                            <div class="form-item">
                                <p>Broj osoba:</p>
                                <select id="count_persons" type="text" name="guests" class="select2 person">
                                    <option value="1">1 osoba</option>
                                    <option value="2">2 osobe</option>
                                    <option value="3">3 osobe</option>
                                    <option value="4">4 osobe</option>
                                    <option value="5">5 osoba</option>
                                    <option value="6">6 osoba</option>
                                    <option value="7">7 osoba</option>
                                </select>
                            </div> <!-- /.form-item -->
                            <div class="form-item">
                                <p>Kalkulator:</p>
                                <div id="af-calc-price"></div>
                            </div> <!-- /.form-item -->
                            <div class="form-item">
                                <input id="af-reserve" type="submit" value="REZERVIŠI">
                            </div> <!-- /.form-item -->
                        </form>
                        <script>document.addEventListener('DOMContentLoaded', function () {
                                af_booking.init('noć', 'noći');
                            });</script>
                    </div> <!-- /.booking-box -->
                </div> <!-- /.col-md-3 -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

<?php endwhile; ?>
    <!-- end the loop -->

<?php get_footer(); ?>