<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>

<!-- sekcija - lista 5 apartmana -->
<?php get_template_part( 'parts/section', 'apartments' ) ?>

<!-- sekcija - lokacija -->
<?php get_template_part( 'parts/section', 'location' ) ?>

<!-- sekcija - lokacija -->
<?php get_template_part( 'parts/section', 'news' ) ?>


<?php get_footer(); ?>