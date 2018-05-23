<?php
/*
*
* Template Name: Booking
*
*/
if (!function_exists('af_booking')) {
	return;
}

global $is_booking_page;
$is_booking_page = true;

// Input
$action =     isset($_REQUEST['action']) ?     $_REQUEST['action'] :             '';
$acm_id =     isset($_REQUEST['acm_id']) ?     intval($_REQUEST['acm_id']) :     0;
$booking_id = isset($_REQUEST['booking_id']) ? intval($_REQUEST['booking_id']) : '';

$first_name = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '';
$last_name =  isset($_POST['last_name']) ?  sanitize_text_field($_POST['last_name']) :  '';
$phone =      isset($_POST['phone']) ?      sanitize_text_field($_POST['phone']) :      '';
$email =      isset($_POST['email']) ?      sanitize_email($_POST['email']) :           '';
$address =    isset($_POST['address']) ?    sanitize_text_field($_POST['address']) :    '';
$city =       isset($_POST['city']) ?       sanitize_text_field($_POST['city']) :       '';
$country =    isset($_POST['country']) ?    sanitize_text_field($_POST['country']) :    '';
$promo =      isset($_POST['promo']) ?      sanitize_text_field($_POST['promo']) :      '';

// Get accommodation name or redirect if wrong post id
if ($acm_id !== 0 && ($p = get_post($acm_id)) !== null) {
	$acm_name = $p->post_title;
} else {
	wp_redirect(home_url());
	exit;
}

$is_bookable = af_booking()->getFirstBookableDate($acm_id) !== false ? true : false;

if ($is_bookable) {
	$errors = af_booking()->bookingPage();
}

get_header(); ?>

<!-- start the loop -->
<?php while (have_posts()) : the_post(); ?>

	<section class="p-100-0">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="Booking">

						<?php if (!$is_bookable): ?>

							<h1><?php _e('Booking nije moguć', 'wpog'); ?></h1>
							<p><?php _e('Ovaj apartman trenutno nije na na raspolaganju.', 'wpog'); ?></p>

							<div class="Booking__Input Back-btn">
								<a href="#" onclick="history.back()">
									<i class="fa fa-angle-double-left fa-2x"></i><span><?php _e('Nazad', 'wpog'); ?></span></a>
							</div>

						<?php elseif ($action == 'success'): ?>

							<h1><?php _e('Uspešan booking', 'wpog'); ?></h1>

							<p>
								<?php printf(__('Vaš broj bookinga je %s', 'wpog'), $booking_id); ?>
							</p>
							<br><br>

						<?php else: ?>

							<h1><?php the_title(); ?></h1>

							<?php the_content(); ?>
							<br><br>

							<?php if (!empty($errors)): ?>

								<div class="af-booking-errors">

									<p><strong><?php _e('Greška', 'wpog'); ?></strong></p>

									<?php foreach ($errors as $e): ?>
										<p>
											<?php
											if ($e == 'invalid_booking') {

												_e('Uneti podaci nisu ispravni, molimo pokušajte ponovo.', 'wpog');

											} elseif ($e == 'required') {

												_e('Molimo unesite obavezna polja', 'wpog');

											} elseif ($e == 'email') {

												_e('Loše ste uneli email adresu', 'wpog');

											}
											?>
										</p>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<h3><?php _e('Podaci bookinga', 'wpog'); ?></h3>

							<p>
								<?php printf(__('Apartman: %s', 'wpog'), $acm_name); ?>
							</p>

							<p>
								<?php _e('Dolazak:', 'wpog'); ?> <span id="af-display-checkin"></span>
							</p>

							<p>
								<?php _e('Odlazak:', 'wpog'); ?> <span id="af-display-checkout"></span>
							</p>

							<br><br>

							<h3><?php _e('Korisnički podaci', 'wpog'); ?></h3>

							<form action="" method="post">
								<input type="hidden" name="action" value="booking">
								<input type="hidden" name="acm_id" value="<?php echo $acm_id; ?>">
								<input type="hidden" name="checkin" id="af-form-checkin">
								<input type="hidden" name="nights" id="af-form-nights">
								<input type="hidden" name="guests" id="af-form-guests">

								<div class='Booking__Input'>
									<p><?php _e('Ime', 'wpog'); ?></p>
									<input type="text" name="first_name" value="<?php echo esc_attr($first_name); ?>">
								</div>

								<div class='Booking__Input'>
									<p><?php _e('Prezime', 'wpog'); ?></p>
									<input type="text" name="last_name" value="<?php echo esc_attr($last_name); ?>">
								</div>

								<div class='Booking__Input'>
									<p><?php _e('Telefon', 'wpog'); ?></p>
									<input type="text" name="phone" value="<?php echo esc_attr($phone); ?>">
								</div>

								<div class='Booking__Input'>
									<p><?php _e('Email', 'wpog'); ?></p>
									<input type="text" name="email" value="<?php echo esc_attr($email); ?>">
								</div>

								<div class='Booking__Input'>
									<p><?php _e('Adresa', 'wpog'); ?></p>
									<input type="text" name="address" value="<?php echo esc_attr($address); ?>">
								</div>

								<div class='Booking__Input'>
									<p><?php _e('Grad', 'wpog'); ?></p>
									<input type="text" name="city" value="<?php echo esc_attr($city); ?>">
								</div>

								<div class='Booking__Input'>
									<p><?php _e('Zemlja', 'wpog'); ?></p>
									<div class="Booking__Input_Select">
										<select name="country" class="select2">
											<?php

											echo '<option value="">' . __('', 'wpog') . '</option>';

											foreach (af_booking()->getCountries() as $cc => $cname) {
												echo '<option value="' . $cc . '" ' . selected($cc, $country, false) . '>' . $cname . '</option>';
											}
											?>
										</select>
									</div>
								</div>

								<div class='Booking__Input Promo'>
									<p><?php _e('Promo kupon', 'wpog'); ?></p>
									<input type="text" name="promo" value="<?php echo esc_attr($promo); ?>">
								</div>

								<div class='Booking__Input Submit'>
									<input type="submit" value="<?php _e('Potvrdi', 'wpog'); ?>">
								</div>

							</form>

							<div class="Booking__Input Back-btn">
								<a href="<?php the_permalink($acm_id); ?>">
									<i class="fa fa-angle-double-left fa-2x"></i><span><?php _e('Nazad', 'wpog'); ?></span></a>
							</div>


						<?php endif; ?>
					</div> <!-- /.Booking -->
				</div> <!-- /.col-md-9 -->

				<div class="col-md-3">
					<?php if ($is_bookable && $action !== 'success'): ?>
						<?php get_template_part('parts/booking-box'); ?>
					<?php endif; ?>
				</div> <!-- /.col-md-3 -->

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- section -->

<?php endwhile; ?>
<!-- end the loop -->

<?php get_footer(); ?>
