<?php
if (!function_exists('af_booking')) {
	return;
}

//af_booking()->test(49);
?>
<script>
	jQuery(function() {
		af_booking.initCalendar(<?php echo get_the_ID(); ?>);
	});
</script>
<div class="Wizzard">
	<ul class="Wizzard__Nav">
		<li id="step-1-nav" class="active"><a href="#"> Odaberite datum</a></li>
		<li id="step-2-nav"><a href="#">Unos informacija</a></li>
		<li id="step-3-nav"><a href="#">Potvrda</a></li>
	</ul><!-- /.Wizzard__Nav -->

	<div id="step-1" class="Wizzard__Content">
		<div class="Wizzard__Main">
			<div class="row">
				<div class="col-md-9">
					<h3>Odaberite datum dolaska - <?php the_title(); ?></h3>
					<div class="description">

						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquam
						est
						odit vitae. Culpa doloremque dolores excepturi minus quam. Accusantium
						assumenda
						dignissimos dolore error id ipsam quam quod suscipit vel?
					</div><!-- /.description -->
					<div id="three-calendars"></div><!-- /#three-calendars -->

					<h3 id="period-prices-title">Cene smestaja</h3>
					<table class="pricesTable" id="period-prices">
						<tr>
							<th>period boravka</th>
							<th>min nocenja</th>
							<th>cena od</th>
							<th>nedeljno od</th>
						</tr>
					</table><!--/.pricesTable-->

					<h3 id="duration-select-title" style="display:none">Odabir perioda</h3>
					<table class="pricesTable" id="duration-select" style="display:none">
						<tr>
							<th>period boravka</th>
							<th>broj noći</th>
							<th>cena</th>
						</tr>
					</table><!--/.pricesTable-->
				</div><!-- /.col-md-9 -->

				<div class="col-md-3">
					<div class="sideBoxInfo">

						<div class="firstStep">
							<div class="sideBoxCaption bold">
								<p><?php the_title(); ?></p>
							</div><!--/.sideBoxCaption bold-->
							<div class="sideBoxRow">
								<p>Objekat</p>
								<p>Vila Fasana</p>
							</div><!--/.sideBoxRow-->
						</div>

						<div class="secondStep">
							<div class="sideBoxRow">
								<p>Check In(od 12h)</p>
								<p>09.09.2018.</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Check Out(od 11h)</p>
								<p>16.09.2018.</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Smestaj</p>
								<p>8 noci</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Rentiranje</p>
								<p>684 evra</p>
							</div><!--/.sideBoxRow-->
						</div>

						<div class="thirdStep">
							<div class="sideBoxRow successColor">
								<p>Vaucer</p>
								<p>-10%</p>
							</div><!--/.sideBoxRow successColor-->
							<div class="sideBoxRow bold">
								<p>Total Sa popustom</p>
								<p>704 evra</p>
							</div><!--/.sideBoxRow bold-->
							<div class="sideBoxRow mt-30">
								<p>Broj Osoba</p>
								<p>6 noci</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Taksa</p>
								<p>20 evra</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Turisticka Taksa</p>
								<p>12 evra</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow bold infoColor mt-30">
								<p>Total</p>
								<p>716 evra</p>
							</div><!--/.sideBoxRow bold-->
						</div>

					</div> <!-- /.sideBoxInfo -->
				</div><!-- /.col-md-3 -->

			</div>
		</div><!--/.Wizzard__Main-->

		<div class="Wizzard__Footer">
			<div class="next">
				<a href="#" onclick="return af_booking.step2();">sledeci korak</a>
			</div><!--/.next-->
		</div><!-- /.Wizzard__Footer -->

	</div><!-- /#step-1.Wizzard__Nav -->


	<div id="step-2" class="Wizzard__Content">
		<div class="Wizzard__Main">
			<div class="row">
				<div class="col-md-9">

					<div class="wizzardSingleBox">
						<h3>Popust Vaucer (opciono)</h3>
						<div class="withInput">
							<p>Unesite broj na vauceru</p>
							<input type="text">
						</div><!--/.withInput-->
						<div class="statusMessage successBackground" style="display:none">
							<p>Vaucer je ispravan. Aktivirano je 10% popusta na celoupan iznos
								aranzmana</p>
						</div><!--/.statusMessage successBackground-->
					</div><!--/.wizzardSingleBox-->

					<div class="wizzardSingleBox">
						<h3>Odaberite broj osoba</h3>
						<div class="withInput">
							<p>Broj odraslih:</p>
							<select id="input_guests">
								<?php
								for ($i = 1; $i < 9; $i++) {
									echo '<option value="' . $i . '">' . $i . '</option>';
								}
								?>

							</select>

						</div><!--/.withInput-->
						<div class="statusMessage failedBackground" style="display:none">
							<p>Ukupan broj osoba za izabrani apartman ne moze prelaziti 8 osoba.</p>
						</div><!--/.statusMessage failedBackground-->
					</div><!--/.wizzardSingleBox-->

					<div class="wizzardSingleBox">
						<h3>Odaberite nacin placanja</h3>
						<div class="withInput">
							<p>Uplata</p>
							<select>
								<option>Sada 30% depozit - bank transfer</option>
								<option>70% ostatak - bank transfer</option>
							</select>
						</div><!--/.withInput-->
						<div class="withInput otherOption">
							<p>Ostatak uplate</p>
							<p>70% ostatak - bank transfer</p>
						</div><!--/.withInput otherOption-->
						<div class="statusMessage infoBackground">
							<p>Ukupno za uplatu:</p>
							<p>716 evra</p>
						</div><!--/.statusMessage infoBackground-->
					</div><!--/.wizzardSingleBox-->

					<div class="Contact__Form mt-60">
						<h3>Licne Informacije</h3>


							<div class='withInput'>
								<p><?php _e('Ime', 'wpog'); ?></p>
								<input type="text" id="input_first_name">
							</div>

							<div class='withInput'>
								<p><?php _e('Prezime', 'wpog'); ?></p>
								<input type="text" id="input_last_name">
							</div>

							<div class='withInput'>
								<p><?php _e('Telefon', 'wpog'); ?></p>
								<input type="text" id="input_phone">
							</div>

							<div class='withInput'>
								<p><?php _e('Email', 'wpog'); ?></p>
								<input type="text" id="input_email">
							</div>

							<div class='withInput'>
								<p><?php _e('Adresa', 'wpog'); ?></p>
								<input type="text" id="input_address">
							</div>

							<div class='withInput'>
								<p><?php _e('Grad', 'wpog'); ?></p>
								<input type="text" id="input_city">
							</div>

							<div class='withInput'>
								<p><?php _e('Zemlja', 'wpog'); ?></p>
								<div class="Booking__Input_Select">
									<select id="input_country" class="select2">
										<?php

										echo '<option value="">' . __('', 'wpog') . '</option>';

										foreach (af_booking()->getCountries() as $cc => $cname) {
											echo '<option value="' . $cc . '">' . $cname . '</option>';
										}
										?>
									</select>
								</div>
							</div>



					</div><!-- /.Contact__Form mt-60-->


					<div class="checkBox">
						<input type="checkbox" id="input_tos"><span>Prihvatam <a href="#">generalne uslove </a>koriscenja apartmana</span>
					</div><!--/.checkBox-->
				</div><!-- /.col-md-9 -->

				<div class="col-md-3">
					<div class="sideBoxInfo">

						<div class="firstStep">
							<div class="sideBoxCaption bold">
								<p>Apartman 3</p>
							</div><!--/.sideBoxCaption bold-->
							<div class="sideBoxRow">
								<p>Objekat</p>
								<p>Vila Fasana</p>
							</div><!--/.sideBoxRow-->
						</div>

						<div class="secondStep">
							<div class="sideBoxRow">
								<p>Check In(od 12h)</p>
								<p>09.09.2018.</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Check Out(od 11h)</p>
								<p>16.09.2018.</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Smestaj</p>
								<p>8 noci</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Rentiranje</p>
								<p>684 evra</p>
							</div><!--/.sideBoxRow-->
						</div>

						<div class="thirdStep">
							<div class="sideBoxRow successColor">
								<p>Vaucer</p>
								<p>-10%</p>
							</div><!--/.sideBoxRow successColor-->
							<div class="sideBoxRow bold">
								<p>Total Sa popustom</p>
								<p>704 evra</p>
							</div><!--/.sideBoxRow bold-->
							<div class="sideBoxRow mt-30">
								<p>Broj Osoba</p>
								<p>6 noci</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Taksa</p>
								<p>20 evra</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Turisticka Taksa</p>
								<p>12 evra</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow bold infoColor mt-30">
								<p>Total</p>
								<p>716 evra</p>
							</div><!--/.sideBoxRow bold-->
						</div>

					</div> <!-- /.sideBoxInfo -->
				</div><!-- /.col-md-3 -->
			</div><!-- /.row -->
		</div><!--/.Wizzard__Main-->

		<div class="Wizzard__Footer">
			<div class="previous">
				<a href="#">prethodni korak</a>
			</div><!--/.previous-->
			<div class="next">
				<a href="#" onclick="return af_booking.step3();">sledeci korak</a>
			</div><!--/.next-->
		</div><!-- /.Wizzard__Footer -->
	</div><!-- /#step-2.Wizzard__Nav -->

	<div id="step-3" class="Wizzard__Content">

		<div class="Wizzard__Main">
			<div class="step-3InfoHolder">
				<h3>Molimo potvrdite rezervaciju</h3>
				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti doloremque
					itaque, saepe in quidem animi voluptatibus. Consequuntur praesentium quia ad
					laboriosam hic minus ut, delectus officiis, libero consequatur iusto earum!</p>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="sideBoxInfo">

						<div class="firstStep">
							<div class="sideBoxCaption bold">
								<p>Apartman 3</p>
							</div><!--/.sideBoxCaption bold-->
							<div class="sideBoxRow">
								<p>Objekat</p>
								<p>Vila Fasana</p>
							</div><!--/.sideBoxRow-->
						</div>

						<div class="secondStep">
							<div class="sideBoxRow">
								<p>Check In(od 12h)</p>
								<p>09.09.2018.</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Check Out(od 11h)</p>
								<p>16.09.2018.</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Smestaj</p>
								<p>8 noci</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Rentiranje</p>
								<p>684 evra</p>
							</div><!--/.sideBoxRow-->
						</div>

						<div class="thirdStep">
							<div class="sideBoxRow successColor">
								<p>Vaucer</p>
								<p>-10%</p>
							</div><!--/.sideBoxRow successColor-->
							<div class="sideBoxRow bold">
								<p>Total Sa popustom</p>
								<p>704 evra</p>
							</div><!--/.sideBoxRow bold-->
							<div class="sideBoxRow mt-30">
								<p>Broj Osoba</p>
								<p>6 noci</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Taksa</p>
								<p>20 evra</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow">
								<p>Turisticka Taksa</p>
								<p>12 evra</p>
							</div><!--/.sideBoxRow-->
							<div class="sideBoxRow bold infoColor mt-30">
								<p>Total</p>
								<p>716 evra</p>
							</div><!--/.sideBoxRow bold-->
						</div>

					</div> <!-- /.sideBoxInfo -->
				</div><!--/.col-md-3-->
				<div class="col-md-6">
					<div class="reservationSummary">
						<div class="summaryCategories">
							<p>Ime</p>
							<p>Prezime</p>
							<p>Ulica i broj</p>
							<p>Grad</p>
							<p>Drzava</p>
							<p>Kontakt Telefon</p>
							<p>Email</p>
							<p>Napomena</p>
							<p>Placanje</p>
						</div>
						<div class="summaryData">
							<p id="display_first_name"></p>
							<p id="display_last_name"></p>
							<p id="display_address"></p>
							<p id="display_city"></p>
							<p id="display_country"></p>
							<p id="display_phone"></p>
							<p id="display_email"></p>
							<p></p>
							<p>30% - bank transfer</p>
						</div>
					</div>
				</div>
			</div><!--/.row-->

		</div><!--/.Wizzard__Main-->

		<div class="Wizzard__Footer">
			<div class="previous">
				<a href="#">prethodni korak</a>
			</div><!--/.previous-->
			<div class="next">
				<a href="#">sledeci korak</a>
			</div><!--/.next-->
		</div><!-- /.Wizzard__Footer -->

	</div><!--/#step-3.Wizzard_Nav-->

</div><!-- /.Wizzard -->
