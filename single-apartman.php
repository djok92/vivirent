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
                            <h3><?php the_title(); ?></h3>
                            <div class='apartment-desc'>
								<?php the_content(); ?>
                                <a href="#" class='link blue'><?php _e('Više informacija', 'wpog'); ?></a>
                            </div> <!-- /.apartment-desc -->
                        </div> <!-- /.col-md-5 -->

                        <div class="col-md-4">
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
                        </div> <!-- /.col-md-4 -->
                        <div class="col-md-3">
                            <h3><?php _e('Cenovnik', 'wpog') ?></h3>
                            <div class="pricesBoxHolder">
                                <div class="Prices Prices--New">
                                    <div class="singlePriceBox">
                                        <p>cena dnevno od</p>
                                        <span>212 &euro;</span>
                                    </div><!--/.singlePriceBox-->

                                    <div class="singlePriceBox">
                                        <p>cena nedeljno od</p>
                                        <span>2272 &euro;</span>
                                    </div><!--/.singlePriceBox-->
                                </div><!-- /.newPrices -->

                                <div class="pricesBoxButtonHolder">
                                    <a href="#"><?php _e('Kontakt', 'wpog'); ?></a>
                                </div><!--/.pricesBoxButonHolder-->
                                <div class="pricesBoxButtonHolder">
                                    <a href="#"><?php _e('Rezervisi', 'wpog'); ?></a>
                                </div><!--/.pricesBoxButonHolder-->
                            </div><!--/.pricesBoxHolder-->
                        </div><!-- /.col-md-3 -->
                    </div> <!-- /.row -->

                    <div class="row">
                        <div class="col-md-9">
                            <div class='accordion-holder'>
                                <p class="section-name"><?php _e('KARAKTERISTIKE', 'wpog') ?></p>
                                <div class="apartment-description">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis iste nam nulla
                                    quas saepe veniam? Autem cupiditate ea eligendi esse eveniet, facilis illo iste non
                                    placeat praesentium provident quibusdam veniam!
                                </div>
                                <div class="accordion-spec">
                                    <img alt="sprite"
                                         src="<?php echo get_template_directory_uri(); ?>/dist/images/sprite.jpg"/>
                                </div>
                                <div data-accordion-group>
									<?php for($i = 0; $i < 6; $i ++): ?>
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

                                                    </div> <!-- /.accordion-desc -->
                                                </div><!-- /.accordion-content -->
                                            </div> <!-- /[data-content] -->
                                        </div> <!-- /.accordion -->
									<?php endfor; ?>
                                </div> <!-- /[data-accordion-group] -->
                            </div> <!-- /.apartment-desc -->
                        </div> <!-- /.col-md-9 -->
                    </div> <!-- /.row -->
                </div> <!-- /#tab-1  Informacije -->

                <div id="tab-2" class="tabs-content">

                    <div class="googleMapHolder">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3359.3526510871725!2d13.80457421979795!3d44.92602791351589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477cd2dd6127a5e3%3A0x9d046dde165240b2!2sTourist+Association+of+Fa%C5%BEana!5e0!3m2!1ssr!2srs!4v1527232536628"
                                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                </div><!-- /#tab-2 Lokacija -->

                <div id="tab-3" class="tabs-content">
                    <div class="Contact__Description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eum fugit illo natus non
                        obcaecati perferendis recusandae repellendus rerum tenetur? Animi consequatur doloribus enim
                        impedit officia quaerat sed sunt voluptas?
                    </div><!--/.Contact__Description-->
                    <div class="tabCaptionHolder">
                        <h3><?php _e('Ostavite utisak za apartman 3', 'wpog') ?></h3>
                    </div><!--/.tabCaptionHolder-->
                    <div class="tabButtonHolder">
                        <a href="#">posalji utisak</a>
                    </div><!--/.buttonCaptionHolder-->

                    <div class="row">
                        <div class="col-md-12">
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
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis commodi dicta fugit
                        libero nobis. Accusantium adipisci ex fugiat illum minima nam, omnis quaerat quia quis
                        reiciendis suscipit unde vitae!
                    </div><!-- /.reservationDescription -->

                    <div class="Wizzard">
                        <ul class="Wizzard__Nav">
                            <li><a href="#"> Odaberite datum</a></li>
                            <li class="active"><a href="#">Unos informacija</a></li>
                            <li><a href="#">Potvrda</a></li>
                        </ul><!-- /.Wizzard__Nav -->

                        <div id="step-1" class="Wizzard__Content">
                            <div class="row">
                                <div class="col-md-9">
                                    <h3>Odaberite datum dolaska - Apartman 3</h3>
                                    <div class="description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquam est
                                        odit vitae. Culpa doloremque dolores excepturi minus quam. Accusantium assumenda
                                        dignissimos dolore error id ipsam quam quod suscipit vel?
                                    </div><!-- /.description -->

                                </div><!-- /.col-md-9 -->
                            </div><!-- /.row -->
                        </div><!-- /#step-1.Wizzard__Nav -->

                    </div><!-- /.Wizzard -->
                </div><!-- /#tab-4 Rezervacija -->

                <div id="tab-5" class="tabs-content">
                    <div class="Contact__Description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eum fugit illo natus non
                        obcaecati perferendis recusandae repellendus rerum tenetur? Animi consequatur doloribus enim
                        impedit officia quaerat sed sunt voluptas?
                    </div>
                    <div class="tabCaptionHolder">
                        <h3><?php _e('kontakt za apartman 3', 'wpog') ?></h3>
                    </div>
                    <div class="Contact__Form">
						<?php echo do_shortcode('[contact-form-7 id="520" title="Contact form"]'); ?>
                    </div><!-- /.Contact__Form -->
                </div><!-- /#tab-5 Kontakt -->
            </div> <!-- /.tabs-holder -->

        </div> <!-- /.container -->
    </section> <!-- /.apartment-single -->

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>
