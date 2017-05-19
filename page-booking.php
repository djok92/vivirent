<?php
/*
*
* Template Name: Booking
*
*/

$action     = isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : '';
$booking_id = isset( $_REQUEST['booking_id'] ) ? intval( $_REQUEST['booking_id'] ) : '';

if ( function_exists( 'af_booking' ) ) {
	$errors = af_booking()->bookingPage( $data );
}

get_header(); ?>


<!-- start the loop -->
<?php while ( have_posts() ) : the_post(); ?>

    <section class="p-100-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="Booking">
						<?php if ( $action == 'success' ): ?>

                            <h1><?php _e( 'Uspešan booking', 'wpog' ); ?></h1>

                            <p>
								<?php printf( __( 'Vaš broj bookinga je %s', 'wpog' ), $booking_id ); ?>
                            </p>
                            <br><br>

						<?php else: ?>

                            <h1><?php the_title(); ?></h1>

							<?php the_content(); ?>
                            <br><br>


							<?php if ( ! empty( $errors ) ): ?>

                                <div class="af-booking-errors">

                                    <p><strong><?php _e( 'Greška', 'wpog' ); ?></strong></p>

									<?php foreach ( $errors as $e ): ?>
                                        <p>
											<?php
											if ( $e == 'invalid_booking' ) {

												_e( 'Uneti podaci nisu ispravni, molimo pokušajte ponovo.', 'wpog' );

											} elseif ( $e == 'required' ) {

												_e( 'Molimo unesite obavezna polja', 'wpog' );

											} elseif ( $e == 'email' ) {

												_e( 'Loše ste uneli email adresu', 'wpog' );

											}
											?>
                                        </p>
									<?php endforeach; ?>
                                </div>
							<?php endif; ?>

                            <h3><?php _e( 'Podaci bookinga', 'wpog' ); ?></h3>

                            <p>
								<?php printf( __( 'Apartman: %s', 'wpog' ), $data['acm_name'] ); ?>
                            </p>

                            <p>
								<?php printf( __( 'Dolazak: %s', 'wpog' ), $data['user_checkin'] ); ?>
                            </p>

                            <p>
								<?php printf( __( 'Odlazak: %s', 'wpog' ), $data['user_checkout'] ); ?>
                            </p>

                            <p>
								<?php printf( __( 'Broj noćenja: %s', 'wpog' ), $data['nights'] ); ?>
                            </p>

                            <p>
								<?php printf( __( 'Broj gostiju: %s', 'wpog' ), $data['guests'] ); ?>
                            </p>

                            <br><br>

                            <h3><?php _e( 'Korisnički podaci', 'wpog' ); ?></h3>

                            <form action="" method="post">
                                <input type="hidden" name="action" value="booking">
                                <input type="hidden" name="acm_id" value="<?php echo esc_attr( $data['acm_id'] ); ?>">
                                <input type="hidden" name="checkin" value="<?php echo esc_attr( $data['checkin'] ); ?>">
                                <input type="hidden" name="nights" value="<?php echo esc_attr( $data['nights'] ); ?>">
                                <input type="hidden" name="guests" value="<?php echo esc_attr( $data['guests'] ); ?>">


                                <div class='Booking__Input'>
                                    <p><?php _e( 'Ime', 'wpog' ); ?></p>
                                    <input type="text" name="first_name"
                                           value="<?php echo esc_attr( $data['first_name'] ); ?>">
                                </div>


                                <div class='Booking__Input'>
                                    <p><?php _e( 'Prezime', 'wpog' ); ?></p>
                                    <input type="text" name="last_name"
                                           value="<?php echo esc_attr( $data['last_name'] ); ?>">
                                </div>


                                <div class='Booking__Input'>
                                    <p><?php _e( 'Telefon', 'wpog' ); ?></p>
                                    <input type="text" name="phone"
                                           value="<?php echo esc_attr( $data['phone'] ); ?>">
                                </div>


                                <div class='Booking__Input'>
                                    <p><?php _e( 'Email', 'wpog' ); ?></p>
                                    <input type="text" name="email"
                                           value="<?php echo esc_attr( $data['email'] ); ?>">
                                </div>


                                <div class='Booking__Input'>
                                    <p><?php _e( 'Adresa', 'wpog' ); ?></p>
                                    <input type="text" name="address"
                                           value="<?php echo esc_attr( $data['address'] ); ?>">
                                </div>


                                <div class='Booking__Input'>
                                    <p><?php _e( 'Grad', 'wpog' ); ?></p>
                                    <input type="text" name="city" value="<?php echo esc_attr( $data['city'] ); ?>">
                                </div>


                                <div class='Booking__Input'>
                                    <p><?php _e( 'Zemlja', 'wpog' ); ?></p>
                                    <div class="Booking__Input_Select">
                                        <select name="country" class="select2">
											<?php
											$country = $data['country'];
											if ( function_exists( 'af_booking' ) ) {

												echo '<option value="">' . __( '', 'wpog' ) . '</option>';

												foreach ( af_booking()->getCountries() as $cc => $cname ) {
													echo '<option value="' . $cc . '" ' . selected( $cc, $country, false ) . '>' . $cname . '</option>';
												}
											}
											?>
                                        </select>
                                    </div>
                                </div>

                                <div class='Booking__Input Promo'>
                                    <p><?php _e( 'Promo kupon', 'wpog' ); ?></p>
                                    <input type="text" name="promo"
                                           value="<?php echo esc_attr( $data['promo'] ); ?>">
                                </div>


                                <div class='Booking__Input Submit'>
                                    <input type="submit" value="<?php _e( 'Potvrdi', 'wpog' ); ?>">
                                </div>

                            </form>

                            <div class="Booking__Input Back-btn">
                                <a href="<?php the_permalink( $data['acm_id'] ); ?>"><i
                                            class="fa fa-angle-double-left fa-2x"></i><span><?php _e( 'Nazad', 'wpog' ); ?></span></a>
                            </div>


						<?php endif; ?>
                    </div> <!-- /.Booking -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- section -->


<?php endwhile; ?>
<!-- end the loop -->


<?php get_footer(); ?>
