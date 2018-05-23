<?php
/**
 * Breadcrumbs for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WP_Ogitive
 */
?>

<div class="breadcrumbs">

    <ul>
    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<li>','</li>'); } ?>
		<!-- <li><a href="#">Home</a></li>
        <li><a href="#">Aktuelnosti</a></li>
        <span>Lorem ipsum dolor sit amet discipui</span> -->
    </ul>

    <div class="social-share">
        <!-- Social share ide ovde -->
    </div>

</div>
