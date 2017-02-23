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
                        <div id="calendar_available" class="datepicker" data-date="21/02/2017"></div>
                        <form method="POST" action="">
                            <div class="form-item">
                                <p>Datum dolaska:</p>
                                <div class="datepicker-holder">
                                    <i class="fa fa-calendar-o"></i>
                                    <input id="date_arival" type="text" name="date_arival" class="datepicker date-icon form-control" />
                                </div>
                            </div> <!-- /.form-item --> 
                            <div class="form-item">
                                <p>Broj noci:</p>
                                <select id="count_nights" type="text" name="count_nights" class="select2 night" >
                                    <option>1 noć</option>
                                    <option>2 noći</option>
                                    <option>3 noći</option>
                                    <option>4 noći</option>
                                    <option>5 noći</option>
                                    <option>6 noći</option>
                                    <option>7 noći</option>
                                </select> 
                            </div> <!-- /.form-item --> 
                            <div class="form-item">
                                <p>Broj osoba:</p>
                                <select id="count_persons" type="text" name="count_persons" class="select2 person" >
                                    <option>1 osoba</option>
                                    <option>2 osobe</option>
                                    <option>3 osobe</option>
                                    <option>4 osobe</option>
                                    <option>5 osoba</option>
                                    <option>6 osoba</option>
                                    <option>7 osoba</option>
                                </select> 
                            </div> <!-- /.form-item -->
                            <div class="form-item">
                                <p>Kalkulator:</p>
                                <span>5475&euro;</span>
                            </div> <!-- /.form-item --> 
                            <div class="form-item">
                                <input type="submit" name="submit" value="rezerviši" /> 
                            </div> <!-- /.form-item --> 
                            <div class="form-item">
                                <a href="#">cenovnik</a>
                            </div> <!-- /.form-item --> 
                        </form>
                    </div> <!-- /.booking-box -->
                </div> <!-- /.col-md-3 -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>