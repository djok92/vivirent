<?php
/**
 * The slider for our theme.
 *
 * @package WP_Ogitive
 */
?>

<div id="apartman-slider" class="full-height-slider royalSlider rsUni">

    <?php 

    $images = get_field('galerija');

    if( $images ): ?>

            <?php foreach( $images as $image ): ?>

                <div>
                    <div class="header-gradient"></div>
                    <img alt="slider-img" src="<?php echo $image['url']; ?>" />
                    <div class="rsTmb"><img alt="slider-img" src="<?php echo $image['sizes']['thumbnail']; ?>" /></div>
                </div>
             
            <?php endforeach; ?>

    <?php endif; ?>

</div>