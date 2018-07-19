<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>

<?php get_template_part('parts/booking', 'searchform'); ?>

<?php

$chk = get_field('hs2_vrsta','options'); 

if ($chk == 0) {
	get_template_part('parts/section', 'apartments');	
} else {
	get_template_part('parts/section', 'aselection');
}
?>


<?php get_footer(); ?>
