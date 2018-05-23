<?php
if (!function_exists('af_booking')) {
	return;
}

global $is_booking_page;

// Input
$acm_id =  isset($_REQUEST['acm_id']) ?  intval($_REQUEST['acm_id']) : get_the_ID();
$checkin = isset($_REQUEST['checkin']) ? trim($_REQUEST['checkin']) :  af_booking()->getFirstBookableDate($acm_id);
$nights =  isset($_REQUEST['nights']) ?  intval($_REQUEST['nights']) : 1;
$guests =  isset($_REQUEST['guests']) ?  intval($_REQUEST['guests']) : 1;

$info = af_booking()->getBookingPrice($acm_id, $checkin, $nights);
?>
<div class="booking-box">
    <p><?php _e( 'Kalendar dostupnosti', 'wpog' ); ?></p>
    <div id="af-calendar"></div>

    <form action="<?php echo af_booking()->getBookingURL(); ?>" method="get" onsubmit="return af_booking.checkForm();">
        <input type="hidden" id="af-acm-id" name="acm_id" value="<?php echo $acm_id; ?>">
        <input id="af-selection" type="hidden" name="checkin" value="<?php echo esc_attr($checkin); ?>">

        <div class="form-item">
            <p><?php _e('Datum dolaska', 'wpog'); ?>:</p>
            <div class="datepicker-holder">
                <i class="fa fa-calendar-o"></i>
                <div id="af-date"><?php _e('Izaberite iz kalendara', 'wpog'); ?></div>
            </div>
        </div> <!-- /.form-item -->

        <div class="form-item">
            <p><?php _e('Broj noći', 'wpog'); ?>:</p>
            <select id="count_nights" type="text" name="nights" class="select2 night" data-default-nights = "<?php echo $nights; ?>"></select>
        </div> <!-- /.form-item -->

        <div class="form-item">
            <p><?php _e('Broj osoba', 'wpog'); ?>:</p>
            <select id="count_persons" type="text" name="guests" class="select2 person">
            	<?php

							$max_guests = af_booking()->getMaxGuests($acm_id);

							for ($i = 1; $i <= $max_guests; $i++) {
								$str = $i == 1 ? __('osoba', 'wpog') : __('osobe', 'wpog');
								echo '<option value="' . $i . '" ' . selected($i, $guests, false). '>' . $i . ' ' . $str . '</option>';
							}
            	?>
            </select>
        </div> <!-- /.form-item -->

        <div class="form-item">
            <p><?php _e('Kalkulator', 'wpog'); ?>:</p>
            <div id="af-calc-price"></div>
        </div> <!-- /.form-item -->
        
        <?php if (!$is_booking_page): ?>
	        <div class="form-item">
	            <input id="af-reserve" type="submit" value="<?php _e('REZERVIŠI', 'wpog'); ?>">
	        </div> <!-- /.form-item -->
	      <?php endif; ?>
		</form>

    <script>
			document.addEventListener('DOMContentLoaded', function () {
				af_booking.init('<?php _e('noć', 'wpog'); ?>', '<?php _e('noći', 'wpog'); ?>');
				jQuery('#af-calc-price').html('<?php echo $info['price']; ?>');
			});
		</script>
</div> <!-- /.booking-box -->
<div id="af-calendar-loader"><?php af_booking()->loader(80); ?></div>