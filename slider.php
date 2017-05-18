<?php
/**
 * The slider for our theme.
 *
 * @package WP_Ogitive
 */
?>

<div id="home-slider" class="full-height-slider royalSlider rsUni">
	<?php
	$images = get_field( 'hs1_slider', 'options' );
	if ( $images ): ?>
		<?php foreach ( $images as $image ): ?>
            <div>
                <div class="header-gradient"></div>
                <img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>"/>
                <div class="rsTmb"><?php echo $image['name'] ?></div>
            </div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>