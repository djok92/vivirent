<?php
/*
 *
 * Single Apartman
 *
 */

get_header();
?>


<!-- start the loop -->
<?php while (have_posts()) : the_post(); ?>


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
                                if (have_rows('specifikacije_repeater')):

                                    // loop through the rows of data
                                    while (have_rows('specifikacije_repeater')) : the_row();
                                        ?>

                                        <div class="table-row">
                                            <div><?php the_sub_field('funkcionalnost'); ?></div>
                                            <div><?php the_sub_field('vrednost'); ?></div>
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
                        <div class="col-md-7">
                            <div class='accordion-holder'>
                                <p class="section-name">KARAKTERISTIKE PO PROSTORIJAMA</p>
                            </div> <!-- /.apartment-desc -->
                        </div> <!-- /.col-md-7 -->
                        <div class="col-md-5">
                            <p class="section-name">Lokacija</p>
                        </div> <!-- /.col-md-5 -->
                    </div> <!-- /.row -->

                </div> <!-- /.col-md-9 -->


                <div class="col-md-3">
                    <div class="booking-box">
                        <p>Kalendar dostupnosti</p>
                        <div id="af-calendar"></div>
                        
                        <form action="<?php if (function_exists('af_booking')) echo af_booking()->getBookingURL(); ?>" method="get">
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
                                <select id="count_nights" type="text" name="nights" class="select2 night" >
                                    <option value="1">1 noć</option>
                                    <?php for ($i = 2; $i <= 30; $i++): ?>
                                    	<option value="<?php echo $i; ?>"><?php echo $i; ?> noći</option>
                                    <?php endfor; ?>
                                </select> 
                            </div> <!-- /.form-item --> 
                            <div class="form-item">
                                <p>Broj osoba:</p>
                                <select id="count_persons" type="text" name="guests" class="select2 person" >
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
                                <input id="af-reserve" type="submit" value="REZERVIŠI">
                            </div> <!-- /.form-item -->                             
                        </form>
                        <script>document.addEventListener('DOMContentLoaded', function() { af_booking.init(); });</script>
                    </div> <!-- /.booking-box -->
                </div> <!-- /.col-md-3 -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>