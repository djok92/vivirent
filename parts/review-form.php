<?php
if(!function_exists('af_booking')) {
	return;
}
?>
<div class="tabCaptionHolder">
    <h3><?php _e('Ostavite utisak za apartman', 'wpog') ?></h3>
</div><!--/.tabCaptionHolder-->

<div class="Contact__Form">
    <div role="form" class="wpcf7">
        <form action="#" method="post" id="review-form">
            <div style="display: none;">
                <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
				<?php wp_nonce_field('af-review', 'af_nonce', false); ?>
            </div>
            <p><label> <span> Ime i prezime </span><br>
                    <span class="wpcf7-form-control-wrap your-name">
            <input type="text" name="your-name" value="" size="40" maxlength="100"
                   class="wpcf7-form-control wpcf7-text">
          </span>
                </label>
            </p>
            <p><label> <span> Email adresa </span><br>
                    <span class="wpcf7-form-control-wrap your-email">
            <input type="email" name="your-email" value="" size="40"
                   class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email">
          </span>
                </label>
            </p>
            <p><label> <span> Naslov </span><br>
                    <span class="wpcf7-form-control-wrap your-subject">
            <input type="text" name="your-subject" value="" size="40" maxlength="200"
                   class="wpcf7-form-control wpcf7-text">
          </span>
                </label>
            </p>
            <p><label> <span> Komentar </span><br>
                    <span class="wpcf7-form-control-wrap your-message">
            <textarea name="your-message" cols="40" rows="10" maxlength="2000"
                      class="wpcf7-form-control wpcf7-textarea"></textarea>
          </span>
                </label>
            </p>
            <p><label> <span> Datum boravka </span><br>
                    <span class="wpcf7-form-control-wrap date">
            <input type="text" name="date" value="" id="review-date">
          </span>
                </label>
            </p>
            <p><label> <span> Zemlja </span><br>
                    <span class="wpcf7-form-control-wrap country">
            <select name="country" id="review-country" class="select2">
              <option value=""></option>
	            <?php
	            foreach(af_booking()->getCountries() as $cc => $cname) {
		            printf('<option value="%s">%s</option>', $cc, $cname);
	            }
	            ?>
            </select>
          </span>
                </label>
            </p>
            <p><label> <span class="ratingLabel"> Ocena </span><br>
                    <span class="Rating">
            <span class="Rating__Star"></span>
            <span class="Rating__Star"></span>
            <span class="Rating__Star"></span>
            <span class="Rating__Star"></span>
            <span class="Rating__Star filled"></span>
          </span>
                    <br>
                    <input name="rating" hidden=""><br>
                </label></p>

            <div class="tabButtonHolder" style="margin-top:20px">
                <a id="submit-review" href="#">posalji utisak</a>
                <span id="review-submit-error"></span>
                <span id="review-submit-loader">Molimo sačekajte...</span>
            </div><!--/.buttonCaptionHolder-->

        </form>

        <div id="review-submit-success"></div>

    </div>
</div>
