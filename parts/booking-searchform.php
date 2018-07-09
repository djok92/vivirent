<?php
if(!function_exists('af_booking')) {
	return;
}
?>
<script>
	jQuery(document).ready(function () {
		af_booking_search.init();
	});
</script>
<div class="booking-form">
    <div class="bookingFormCaptionHolder">
        <p>Pretraga Apartmana</p>
    </div>
    <form action="<?php echo af_booking()->getSearchURL(); ?>" method="get">
        <div class="booking-form__item">
            <label><?php _e('Destinacija', 'wpog'); ?>:</label>
            <select id="Destination" type="text" name="dest" class="select2">
              <option value="" selected disabled><?php _e('Odaberi', 'wpog'); ?></option>
				<?php
				$terms = get_terms([
					'taxonomy'   => 'vila',
					'hide_empty' => false
				]);
				foreach($terms as $term): ?>
                    <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
				<?php endforeach; ?>
            </select>
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <label><?php _e('Datum dolaska', 'wpog'); ?></label>
            <div class="datepicker-holder">

                <i class="fa fa-calendar-o"></i>
                <input type="text" name="checkin" class="datepicker date-icon form-control" id="af-search-checkin" autocomplete="off" readonly="true" placeholder="<?php esc_attr_e('Odaberi', 'wpog'); ?>"/>
            </div>
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <label><?php _e('Datum odlaska', 'wpog'); ?></label>
            <div class="datepicker-holder">
                <i class="fa fa-calendar-o"></i>
                <input type="text" name="checkout" class="datepicker date-icon form-control" id="af-search-checkout" autocomplete="off" readonly="true" placeholder="<?php esc_attr_e('Odaberi', 'wpog'); ?>"/>
            </div>
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item personsCount">
            <label><?php _e('Broj osoba', 'wpog'); ?>:</label>
            <select id="count_persons" type="text" name="guests" class="select2 person">
				<?php
				for($i = 1; $i <= 7; $i ++) {
					$str = $i == 1 ? __('osoba', 'wpog') : __('osobe', 'wpog');
					echo '<option value="' . $i . '">' . $i . ' ' . $str . '</option>';
				}
				?>
            </select>
        </div> <!-- /.booking-form__item -->
        <!--        <div class="booking-form__item">-->
        <!--            <label>--><?php //_e('Posebni uslovi', 'wpog'); ?><!--</label>-->
        <!--            <select id="special_requests" type="text" name="special_requests" class="select2 person">-->
        <!--                <option>Sopstveni bazen</option>-->
        <!--                <option>Sopstveni ulaz</option>-->
        <!--                <option>Sopstveno kupatilo</option>-->
        <!--                <option>Sopstveni ulaz</option>-->
        <!--            </select>-->
        <!--        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <input type="submit" name="submit" value="pretraži"/>
        </div> <!-- /.booking-form__item -->
    </form>
</div> <!-- /.booking-form -->
