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
        <div class="page-content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A corporis dolore ea hic magni nulla officia
            repellat soluta voluptas? Cum delectus distinctio ducimus fuga id labore praesentium quae, rerum totam.
        </div><!-- /.page-content -->
		<?php if(have_rows('galerija_repeater')):
			while(have_rows('galerija_repeater')) : the_row(); ?>
                <h3>
					<?php the_sub_field('naslov'); ?>
                </h3>

                <div class="flexslider GallerySlider">
                    <ul class="slides">
						<?php $images = get_sub_field('fotografije');

						if($images): ?>
							<?php foreach($images as $image): ?>
                                <li class="slide">
                                    <img alt="slider-img" src="<?php echo $image['url']; ?>"/>
                                </li>
							<?php endforeach; ?>

						<?php endif; ?>
                    </ul>
                </div>
			<?php endwhile;
		endif; ?>

    </div><!-- /.container -->
</section><!-- /.GallerySection -->
<?php get_footer(); ?>
