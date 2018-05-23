<?php
/**
 * The slider for our theme.
 *
 * @package WP_Ogitive
 */
?>
<div id="home-slider" class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
		<?php
		$images = get_field('hs1_slider', 'options');
		if($images):
			foreach($images as $image): ?>
                <div class="swiper-slide">
                    <div class="header-gradient"></div>
                    <img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>"/>

                </div>
			<?php endforeach; ?>
		<?php endif; ?>
    </div>

    <div class="homeSliderPrev swiper-button-prev swiper-button-white"></div>
    <div class="homeSliderNext swiper-button-next swiper-button-white"></div>
</div>

<!--<div class="full-height-slider royalSlider rsUni">-->
<!---->
<!---->
<!--</div>-->
