<?php
/**
 * The slider for our theme.
 *
 * @package WP_Ogitive
 */
?>

<div class="apartmenHolder">
    <div id="galleryWithThumbs" class="flexslider">
        <ul class="slides">
			<?php $images = get_field('galerija');

			if($images): ?>

				<?php foreach($images as $image): ?>

                    <li class="slide" data-thumb="<?php echo $image['url']; ?>">
                        <div class="header-gradient"></div>
                        <img alt="slider-img" src="<?php echo $image['url']; ?>"/>
                    </li>

				<?php endforeach; ?>

			<?php endif; ?>
        </ul>
    </div>

    <div class="apartmentNameHolder">
        <div class="container">
            <p class="apartment-name">
				<?php $term = get_the_terms($post->ID, 'vila');
				echo $term[0]->name; ?>
            </p>
            <h1><?php the_title(); ?></h1>
        </div><!-- /.container -->
    </div><!-- /.apartmentNameHolder -->

</div>
