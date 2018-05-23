<?php
/**
 * The slider for our theme.
 *
 * @package WP_Ogitive
 */
?>

<div class="apartmenHolder">
    <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
			<?php $images = get_field('galerija');

			if($images): ?>

				<?php foreach($images as $image): ?>

                    <div class="swiper-slide">
                        <div class="header-gradient"></div>
                        <img alt="slider-img" src="<?php echo $image['url']; ?>"/>
                    </div>

				<?php endforeach; ?>

			<?php endif; ?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
			<?php $images = get_field('galerija');

			if($images): ?>

				<?php foreach($images as $image): ?>

                    <div class="swiper-slide">
                        <img alt="slider-img" src="<?php echo $image['url']; ?>"/>
                    </div>

				<?php endforeach; ?>

			<?php endif; ?>
        </div>
    </div>
</div>
