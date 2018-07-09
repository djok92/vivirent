<?php
/*
 *
 * Template Name: Gallery
 *
 */

get_header();
?>
<div class="container">


	<?php if(have_rows('galerija_repeater')):
		while(have_rows('galerija_repeater')) : the_row(); ?>
            <h2>
				<?php the_sub_field('naslov'); ?>
            </h2>

            <div class="swiper-container GallerySlider">
                <div class="swiper-wrapper">
					<?php $images = get_sub_field('fotografije');

					if($images): ?>
						<?php foreach($images as $image): ?>
                            <div class="swiper-slide">
                                <img alt="slider-img" src="<?php echo $image['url']; ?>"/>
                            </div>
						<?php endforeach; ?>

					<?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>
                <!-- /.swiper-pagination -->
            </div>

		<?php endwhile;
	endif; ?>

</div><!-- /.container -->

<?php get_footer(); ?>
