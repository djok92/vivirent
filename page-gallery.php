<?php
/*
 *
 * Template Name: Gallery
 *
 */

get_header();
?>
<section class="GallerySection">
    <div class="container">
		<?php if(have_rows('galerija_repeater')):
			while(have_rows('galerija_repeater')) : the_row(); ?>
                <h3>
					<?php the_sub_field('naslov'); ?>
                </h3>

                <div class="swiper-container GallerySlider GallerySlider-1">
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
</section><!-- /.GallerySection -->
<?php get_footer(); ?>
