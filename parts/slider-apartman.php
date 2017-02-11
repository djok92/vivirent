<?php
/**
 * The slider for our theme.
 *
 * @package WP_Ogitive
 */
?>

<div id="apartman-slider" class="full-height-slider royalSlider rsUni">
    <?php for ($i = 0; $i < 2; $i++) { ?>
        <div>
            <div class="header-gradient"></div>
            <img alt="slider-img" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/slider-apartman-single-img.jpg" />
            <div class="rsTmb"><img alt="slider-img" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/slider-apartman-single-img.jpg" /></div>
        </div>
        <div>
            <div class="header-gradient"></div>
            <img alt="slider-img" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/slider-apartman-single-img.jpg" />
            <div class="rsTmb"><img alt="slider-img" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/slider-apartman-single-img.jpg" /></div>
        </div>
    <?php } ?>
</div>