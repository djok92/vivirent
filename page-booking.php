<?php
/*
*
* Template Name: Booking
*
*/

$action =     isset($_REQUEST['action']) ?     $_REQUEST['action'] :             '';
$booking_id = isset($_REQUEST['booking_id']) ? intval($_REQUEST['booking_id']) : '';

if (function_exists('af_booking')) {
	$errors = af_booking()->bookingPage($data);
}

get_header(); ?>


<!-- start the loop -->
<?php while ( have_posts() ) : the_post(); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	
                		<?php if ($action == 'success'): ?>

                    	<h1>Uspešan booking</h1>
                    	
                    	<p>Vaš broj bookinga je <?php echo $booking_id; ?></p>
                    	<br><br>
                		
                		<?php else: ?>
                	
                    	<h1><?php the_title(); ?></h1>
                    	
                    	<?php the_content(); ?>
                    	<br><br>
                    	
                    	
                    	<?php if (!empty($errors)): ?>
                    	
                    		<div class="af-booking-errors">
                    			
                    			<p><strong>Greška</strong></p>
                    			
                    			<?php	foreach ($errors as $e): ?>
                    				<p>
                    					<?php
                    					if ($e == 'invalid_booking') {
                    						
                    						echo 'Uneti podaci nisu ispravni, molimo pokušajte ponovo.';
                    					
                    					} elseif ($e == 'required') {
                    						
                    						echo 'Molimo unesite obavezna polja';
                    						
                    					} elseif ($e == 'email') {
                    						
                    						echo 'Loše ste uneli email adresu';
                    					}
                    					?>
                    				</p>
                    			<?php endforeach; ?>
                    		</div>
                    	<?php endif; ?>
                    	
                    	<h3>Podaci bookinga</h3>

                    	<p>
                    		Apartman: <?php echo $data['acm_name']; ?>
                    	</p>
                    	
                    	<p>
                    		Dolazak: <?php echo $data['user_checkin']; ?>
                    	</p>
                    	
                    	<p>
                    		Odlazak: <?php echo $data['user_checkout']; ?>
                    	</p>
                    	
                    	<p>
                    		Broj noćenja: <?php echo $data['nights']; ?>
                    	</p>
                    	
                    	<p>
                    		Broj gostiju: <?php echo $data['guests']; ?>
                    	</p>
                    	
                    	<br><br>
                    	
                    	<h3>Korisnički podaci</h3>
                    	
                    	<form action="" method="post">
                    		<input type="hidden" name="action" value="booking">
                    		<input type="hidden" name="acm_id" value="<?php echo esc_attr($data['acm_id']); ?>">
                    		<input type="hidden" name="checkin" value="<?php echo esc_attr($data['checkin']); ?>">
                    		<input type="hidden" name="nights" value="<?php echo esc_attr($data['nights']); ?>">
                    		<input type="hidden" name="guests" value="<?php echo esc_attr($data['guests']); ?>">
                    	
                    		<p>
                    			<label>
                    				Ime
                    				<input type="text" name="first_name" value="<?php echo esc_attr($data['first_name']); ?>">
                    			</label>
                    		</p>
                    	  
                    	  <p>
                    			<label>
                    				Prezime
                    				<input type="text" name="last_name" value="<?php echo esc_attr($data['last_name']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				Telefon
                    				<input type="text" name="phone" value="<?php echo esc_attr($data['phone']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				Email
                    				<input type="text" name="email" value="<?php echo esc_attr($data['email']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				Address
                    				<input type="text" name="address" value="<?php echo esc_attr($data['address']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				City
                    				<input type="text" name="city" value="<?php echo esc_attr($data['city']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				Country
                    				<select name="country" class="select2" >
                    					<?php
                    					$country = $data['country'];
                    					if (function_exists('af_booking')) {
                    						
                    						echo '<option value="">Izaberite</option>';
                    						
                    						foreach (af_booking()->getCountries() as $cc => $cname) {
                    							echo '<option value="' . $cc . '" ' . selected($cc, $country, false) . '>' . $cname . '</option>';
                    						}
                    					}
                    					?>
                    				</select>
                    			</label>
                    		</p>
                    	
                    		<br><br>
                    	  <p>
                    			<label>
                    				Promo kupon
                    				<input type="text" name="promo" value="<?php echo esc_attr($data['promo']); ?>">
                    			</label>
                    		</p>
                    		
                    		<br><br>                   	
                    		<input type="submit" value="Potvrdi">                  	                    	
                    		<br><br>
                    		
                    	</form>

                    	<p>
                    		<a href="<?php the_permalink($data['acm_id']); ?>">&laquo;Nazad</a>
                    	</p>
                    	                    	
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>
       



<?php endwhile; ?>
<!-- end the loop -->




<?php get_footer(); ?>
