<?php
if (!function_exists('af_booking')) {
	return;
}
?>
<div class="booking-form">
    <p>Pretraga Apartmana</p>
    <form action="<?php echo af_booking()->getSearchURL(); ?>" method="get">
        <div class="booking-form__item">
            <label><?php _e('Datum dolaska', 'wpog'); ?></label>
						<div class="datepicker-holder">
							<i class="fa fa-calendar-o"></i>
							<input id="af-search-calendar" type="text" name="checkin" class="datepicker date-icon form-control" />
						</div>
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <label><?php _e('Broj noći', 'wpog'); ?>:</label>
            <select id="count_nights" type="text" name="nights" class="select2 night" >
							<?php
							for ($i = 1; $i <= 7; $i++) {
								$str = $i == 1 ? __('noć', 'wpog') : __('noći', 'wpog');
								echo '<option value="' . $i . '">' . $i . ' ' . $str . '</option>';
							}
							?>
            </select> 
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <label><?php _e('Broj osoba', 'wpog'); ?>:</label>
            <select id="count_persons" type="text" name="guests" class="select2 person" >
							<?php
							for ($i = 1; $i <= 7; $i++) {
								$str = $i == 1 ? __('osoba', 'wpog') : __('osobe', 'wpog');
								echo '<option value="' . $i . '">' . $i . ' ' . $str . '</option>';
							}
							?>
            </select>
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <label><?php _e('Posebni uslovi', 'wpog'); ?></label>
            <select id="special_requests" type="text" name="special_requests" class="select2 person" >
                <option>Sopstveni bazen</option>
                <option>Sopstveni ulaz</option>
                <option>Sopstveno kupatilo</option>
                <option>Sopstveni ulaz</option>
            </select> 
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <input type="submit" name="submit" value="pretraži"/>
        </div> <!-- /.booking-form__item -->
    </form>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			af_booking_search.init();
		});
	</script>
</div> <!-- /.booking-form -->
