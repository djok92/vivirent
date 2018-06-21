<?php
if(!function_exists('af_booking')) {
	return;
}
?>
<script>
    jQuery(document).ready(function () {
        af_booking.init();
    });
</script>
<div class="Wizzard">
    <ul class="Wizzard__Nav">
        <li id="step-1-nav"><a href="#">Odaberite datum</a></li>
        <li id="step-2-nav"><a href="#">Unos informacija</a></li>
        <li id="step-3-nav"><a href="#">Potvrda</a></li>
    </ul><!-- /.Wizzard__Nav -->

    <form id="af-booking-form">

        <input type="hidden" name="acm_id" value="<?php echo get_the_ID(); ?>">
        <input type="hidden" name="checkin" value="">
        <input type="hidden" name="nights" value="">
		<?php wp_nonce_field('af-booking', 'nonce', false); ?>

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

                        <span class="af-booking-legend available">Slobodno</span>
                        <span class="af-booking-legend reserved">Rezervisano</span>
                        <span class="af-booking-legend occupied">Zauzeto</span>
                        <span class="af-booking-legend unavailable">Nedostupno</span>

                        <div id="period-prices-wrapper">
                            <h3>Cene smestaja</h3>
                            <table class="pricesTable" id="period-prices">
                                <thead>
                                <tr>
                                    <th>period boravka</th>
                                    <th>min nocenja</th>
                                    <th>cena od</th>
                                    <th>nedeljno od</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table><!--/.pricesTable-->
                        </div>

                        <div id="af-booking-pricing-wrapper">
                            <h3>Odabir perioda</h3>
                            <table class="pricesTable" id="af-booking-pricing">
                                <tr class="header">
                                    <th class="col-period">period boravka</th>
                                    <th class="col-nights">broj noći</th>
                                    <th class="col-price">cena</th>
                                </tr>
                            </table><!--/.pricesTable-->
                        </div>

                    </div><!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="sideBoxInfo af-booking-cart">

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
                                    <p class="af-display-checkin">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Check Out(od 11h)</p>
                                    <p class="af-display-checkout">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Smestaj</p>
                                    <p class="af-display-nights">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Rentiranje</p>
                                    <p class="af-display-rent">-</p>
                                </div><!--/.sideBoxRow-->
                            </div>

                            <div class="thirdStep">
                                <div class="sideBoxRow successColor af-discount-row">
                                    <p>Popust</p>
                                    <p class="af-display-discount">-</p>
                                </div><!--/.sideBoxRow successColor-->
                                <div class="sideBoxRow bold af-discount-row">
                                    <p>Total Sa popustom</p>
                                    <p class="af-display-rent-discounted">-</p>
                                </div><!--/.sideBoxRow bold-->
                                <div class="sideBoxRow mt-30">
                                    <p>Broj Osoba</p>
                                    <p class="af-display-guests">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Taksa</p>
                                    <p class="af-display-tax">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Turisticka Taksa</p>
                                    <p class="af-display-tourist-tax">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>PDV</p>
                                    <p class="af-display-vat">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow bold infoColor mt-30">
                                    <p>Total</p>
                                    <p class="af-display-total">-</p>
                                </div><!--/.sideBoxRow bold-->
                            </div>

                        </div> <!-- /.sideBoxInfo -->
                    </div><!-- /.col-md-3 -->

                </div>
            </div><!--/.Wizzard__Main-->

            <div class="Wizzard__Footer">
                <div class="next">
                    <a href="#" class="af-booking-next">sledeci korak</a>
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
                                <input type="text" name="promo" autocomplete="off">
                            </div><!--/.withInput-->
                            <div class="statusMessage successBackground af-promo-row">
                                <p>Vaucer je ispravan. Aktivirano je <span class="af-display-promo"></span>% popusta na
                                    celoupan iznos
                                    aranzmana</p>
                            </div><!--/.statusMessage successBackground-->
                        </div><!--/.wizzardSingleBox-->

                        <div class="wizzardSingleBox">

                            <h3>Odaberite broj osoba</h3>

                            <div class="withInput">
                                <p>Broj odraslih:</p>
                                <select name="adults" id="af-booking-adults" class="select2">
									<?php for($i = 1; $i <= 10; $i ++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php endfor; ?>
                                </select>
                            </div><!--/.withInput-->
                            <div class="withInput otherOption" id="af-booking-adults-wrapper">
                                <table id="af-booking-adults-info">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Ime</th>
                                        <th>Godina</th>
                                        <th>Zemlja</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>

                            <div class="withInput">

                                <p>Broj dece:</p>

                                <select name="children" id="af-booking-children" class="select2">
									<?php for($i = 0; $i <= 10; $i ++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php endfor; ?>
                                </select>

                            </div><!--/.withInput-->
                            <div class="withInput otherOption" id="af-booking-children-wrapper">
                                <table id="af-booking-children-info">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Godina</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>

                            <div class="statusMessage failedBackground" style="display:none">
                                <p>Ukupan broj osoba za izabrani apartman ne moze prelaziti 8 osoba.</p>
                            </div><!--/.statusMessage failedBackground-->
                        </div><!--/.wizzardSingleBox-->

                        <div class="wizzardSingleBox">
                            <h3>Odaberite nacin placanja</h3>
                            <div class="withInput">
                                <p>Uplata</p>
                                <select name="payment_option1" class="select2">
                                    <option value="1">30% odmah</option>
                                    <option value="2">100% odmah</option>
                                </select>
                            </div><!--/.withInput-->
                            <div class="withInput otherOption">
                                <p>Ostatak uplate</p>
                                <select name="payment_option2" class="select2">
                                    <option value="1">Bank transfer</option>
                                    <option value="2">Na licu mesta</option>
                                </select>
                            </div><!--/.withInput otherOption-->
                            <div class="statusMessage infoBackground">
                                <p>Ukupno za uplatu:</p>
                                <p>--- evra</p>
                            </div><!--/.statusMessage infoBackground-->
                        </div><!--/.wizzardSingleBox-->

                        <div class="Contact__Form mt-60">
                            <h3>Lične Informacije</h3>


                            <div class='withInput'>
                                <p><?php _e('Ime', 'wpog'); ?></p>
                                <input type="text" name="first_name" id="input_first_name">
                            </div>

                            <div class='withInput'>
                                <p><?php _e('Prezime', 'wpog'); ?></p>
                                <input type="text" name="last_name" id="input_last_name">
                            </div>

                            <div class='withInput'>
                                <p><?php _e('Telefon', 'wpog'); ?></p>
                                <input type="text" name="phone" id="input_phone">
                            </div>

                            <div class='withInput'>
                                <p><?php _e('Email', 'wpog'); ?></p>
                                <input type="text" name="email" id="input_email">
                            </div>

                            <div class='withInput'>
                                <p><?php _e('Adresa', 'wpog'); ?></p>
                                <input type="text" name="address" id="input_address">
                            </div>

                            <div class='withInput'>
                                <p><?php _e('Grad', 'wpog'); ?></p>
                                <input type="text" name="city" id="input_city">
                            </div>

                            <div class='withInput'>
                                <p><?php _e('Zemlja', 'wpog'); ?></p>
<!--                                <div class="Booking__Input_Select">-->

                                    <select name="country" id="input_country" class="select2">
                                        <option value=""></option>
										<?php
										foreach(af_booking()->getCountries() as $cc => $cname) {
											printf('<option value="%s">%s</option>', $cc, $cname);
										}
										?>
                                    </select>
<!--                                </div>-->
                            </div>


                        </div><!-- /.Contact__Form mt-60-->


                        <div class="checkBox">
                            <input type="checkbox" name="tos" value="1" id="input_tos"><span>Prihvatam <a href="#">generalne uslove </a>koriscenja apartmana</span>
                        </div><!--/.checkBox-->
                    </div><!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="sideBoxInfo af-booking-cart">

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
                                    <p class="af-display-checkin">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Check Out(od 11h)</p>
                                    <p class="af-display-checkout">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Smestaj</p>
                                    <p class="af-display-nights">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Rentiranje</p>
                                    <p class="af-display-rent">-</p>
                                </div><!--/.sideBoxRow-->
                            </div>

                            <div class="thirdStep">
                                <div class="sideBoxRow successColor af-discount-row">
                                    <p>Popust</p>
                                    <p class="af-display-discount">-</p>
                                </div><!--/.sideBoxRow successColor-->
                                <div class="sideBoxRow bold af-discount-row">
                                    <p>Total Sa popustom</p>
                                    <p class="af-display-rent-discounted">-</p>
                                </div><!--/.sideBoxRow bold-->
                                <div class="sideBoxRow mt-30">
                                    <p>Broj Osoba</p>
                                    <p class="af-display-guests">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Taksa</p>
                                    <p class="af-display-tax">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Turisticka Taksa</p>
                                    <p class="af-display-tourist-tax">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>PDV</p>
                                    <p class="af-display-vat">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow bold infoColor mt-30">
                                    <p>Total</p>
                                    <p class="af-display-total">-</p>
                                </div><!--/.sideBoxRow bold-->
                            </div>

                        </div> <!-- /.sideBoxInfo -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!--/.Wizzard__Main-->

            <div class="Wizzard__Footer">
                <div class="previous">
                    <a href="#" class="af-booking-prev">prethodni korak</a>
                </div><!--/.previous-->
                <div class="next">
                    <a href="#" class="af-booking-next">sledeci korak</a>
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
                        <div class="sideBoxInfo af-booking-cart">

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
                                    <p class="af-display-checkin">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Check Out(od 11h)</p>
                                    <p class="af-display-checkout">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Smestaj</p>
                                    <p class="af-display-nights">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Rentiranje</p>
                                    <p class="af-display-rent">-</p>
                                </div><!--/.sideBoxRow-->
                            </div>

                            <div class="thirdStep">
                                <div class="sideBoxRow successColor af-discount-row">
                                    <p>Popust</p>
                                    <p class="af-display-discount">-</p>
                                </div><!--/.sideBoxRow successColor-->
                                <div class="sideBoxRow bold af-discount-row">
                                    <p>Total Sa popustom</p>
                                    <p class="af-display-rent-discounted">-</p>
                                </div><!--/.sideBoxRow bold-->
                                <div class="sideBoxRow mt-30">
                                    <p>Broj Osoba</p>
                                    <p class="af-display-guests">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Taksa</p>
                                    <p class="af-display-tax">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>Turisticka Taksa</p>
                                    <p class="af-display-tourist-tax">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow">
                                    <p>PDV</p>
                                    <p class="af-display-vat">-</p>
                                </div><!--/.sideBoxRow-->
                                <div class="sideBoxRow bold infoColor mt-30">
                                    <p>Total</p>
                                    <p class="af-display-total">-</p>
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
                                <p id="display-first-name"></p>
                                <p id="display-last-name"></p>
                                <p id="display-address"></p>
                                <p id="display-city"></p>
                                <p id="display-country"></p>
                                <p id="display-phone"></p>
                                <p id="display-email"></p>
                                <p>-</p>
                                <p>-</p>
                            </div>
                        </div>
                    </div>
                </div><!--/.row-->

            </div><!--/.Wizzard__Main-->

            <div class="Wizzard__Footer">
                <div class="previous">
                    <a href="#" class="af-booking-prev">prethodni korak</a>
                </div><!--/.previous-->
                <div class="next">
                    <a href="#" class="af-booking-next">sledeci korak</a>
                </div><!--/.next-->
            </div><!-- /.Wizzard__Footer -->

        </div><!--/#step-3.Wizzard_Nav-->


        <div id="step-4" class="Wizzard__Content">

            <div class="Wizzard__Main">
                <div class="step-4InfoHolder">
                    <h3>Hvala!</h3>
                    <p>Vaša rezervacija broj <span id="af-booking-id"></span> je primljena!</p>
                </div>
            </div><!--/.Wizzard__Main-->
        </div><!--/#step-4.Wizzard_Nav-->


    </form><!-- #af-booking-form -->

</div><!-- /.Wizzard -->
