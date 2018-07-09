<?php
/**
 * The slider for our theme.
 *
 * @package WP_Ogitive
 */
?>
<div id="home-slider" class="flexslider">
    <!-- Additional required wrapper -->
    <ul class="slides">
        <!-- Slides -->
		<?php
		$images = get_field('hs1_slider', 'options');
		if($images):
			foreach($images as $image): ?>
                <li class="slide">
                    <img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>"/>
                </li>
			<?php endforeach; ?>
		<?php endif; ?>
    </ul>

    <div class="homeSliderPrev swiper-button-prev swiper-button-white"></div>
    <div class="homeSliderNext swiper-button-next swiper-button-white"></div>
</div>

<!--<div class="full-height-slider royalSlider rsUni">-->
<!---->
<!---->
<!--</div>-->
