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
                    			
                    			<?php	foreach ($errors as $e): ?>
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
                    		<?php printf(__('Apartman: %s', 'wpog'), $data['acm_name']); ?>
                    	</p>
                    	
                    	<p>
                    		<?php printf(__('Dolazak: %s', 'wpog'), $data['user_checkin']); ?>
                    	</p>
                    	
                    	<p>
                    		<?php printf(__('Odlazak: %s', 'wpog'), $data['user_checkout']); ?>
                    	</p>
                    	
                    	<p>
                    		<?php printf(__('Broj noćenja: %s', 'wpog'), $data['nights']); ?>
                    	</p>
                    	
                    	<p>
                    		<?php printf(__('Broj gostiju: %s', 'wpog'), $data['guests']); ?>
                    	</p>
                    	
                    	<br><br>
                    	
                    	<h3><?php _e('Korisnički podaci', 'wpog'); ?></h3>
                    	
                    	<form action="" method="post">
                    		<input type="hidden" name="action" value="booking">
                    		<input type="hidden" name="acm_id" value="<?php echo esc_attr($data['acm_id']); ?>">
                    		<input type="hidden" name="checkin" value="<?php echo esc_attr($data['checkin']); ?>">
                    		<input type="hidden" name="nights" value="<?php echo esc_attr($data['nights']); ?>">
                    		<input type="hidden" name="guests" value="<?php echo esc_attr($data['guests']); ?>">
                    	
                    		<p>
                    			<label>
                    				<?php _e('Ime', 'wpog'); ?>
                    				<input type="text" name="first_name" value="<?php echo esc_attr($data['first_name']); ?>">
                    			</label>
                    		</p>
                    	  
                    	  <p>
                    			<label>
                    				<?php _e('Prezime', 'wpog'); ?>
                    				<input type="text" name="last_name" value="<?php echo esc_attr($data['last_name']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				<?php _e('Telefon', 'wpog'); ?>
                    				<input type="text" name="phone" value="<?php echo esc_attr($data['phone']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				<?php _e('Email', 'wpog'); ?>
                    				<input type="text" name="email" value="<?php echo esc_attr($data['email']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				<?php _e('Adresa', 'wpog'); ?>
                    				<input type="text" name="address" value="<?php echo esc_attr($data['address']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				<?php _e('Grad', 'wpog'); ?>
                    				<input type="text" name="city" value="<?php echo esc_attr($data['city']); ?>">
                    			</label>
                    		</p>
                    	
                    	  <p>
                    			<label>
                    				<?php _e('Zemlja', 'wpog'); ?>
                    				<select name="country" class="select2" >
                    					<?php
                    					$country = $data['country'];
                    					if (function_exists('af_booking')) {
                    						
                    						echo '<option value="">' . __('Izaberite', 'wpog') . '</option>';
                    						
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
                    				<?php _e('Promo kupon', 'wpog'); ?>
                    				<input type="text" name="promo" value="<?php echo esc_attr($data['promo']); ?>">
                    			</label>
                    		</p>
                    		
                    		<br><br>                   	
                    		<input type="submit" value="<?php _e('Potvrdi', 'wpog'); ?>">                  	                    	
                    		<br><br>
                    		
                    	</form>

                    	<p>
                    		<a href="<?php the_permalink($data['acm_id']); ?>">&laquo;<?php _e('Nazad', 'wpog'); ?></a>
                    	</p>
                    	                    	
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>
       



<?php endwhile; ?>
<!-- end the loop -->




<?php get_footer(); ?>
