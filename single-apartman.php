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
                        </div> <!-- /.col-md-9 -->
                    </div> <!-- /.row -->
                </div> <!-- /#tab-1  Informacije -->

                <div id="tab-2" class="tabs-content">

                </div><!-- /#tab-2 Lokacija -->

                <div id="tab-3" class="tabs-content">

                </div><!-- /#tab-2 Utisci -->

                <div id="tab-4" class="tabs-content">

                </div><!-- /#tab-2 Rezervacija -->
                <div id="tab-5" class="tabs-content">
                    <div class="Contact__Description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eum fugit illo natus non
                        obcaecati perferendis recusandae repellendus rerum tenetur? Animi consequatur doloribus enim
                        impedit officia quaerat sed sunt voluptas?
                    </div>
                    <div class="Contact__Form">
						<?php echo do_shortcode('[contact-form-7 id="520" title="Contact form"]'); ?>
                    </div><!-- /.Contact__Form -->
                </div><!-- /#tab-2 Kontakt -->
            </div> <!-- /.tabs-holder -->

        </div> <!-- /.container -->
    </section> <!-- /.apartment-single -->

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>
