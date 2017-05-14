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
    </ul>

    <div class="social-share">
        Social share ide ovde
    </div>

</div>
