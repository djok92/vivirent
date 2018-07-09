<?php
/*
 *
 * Template Name: Smestaj
 *
 */

get_header();
?>

    <section id="apartment-section" class="apartments-section">
        <div class="container">
			<?php if(have_rows('objekti_repeater')):
				while(have_rows('objekti_repeater')) : the_row(); ?>
                    <div class="apartments-box">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="apartments-box_img">
									<?php
									$link    = get_sub_field('link');
									$imgVila = get_sub_field('img');
									if($imgVila) { ?>
                                        <a href="<?php the_sub_field('link'); ?>">
                                            <img alt="vilaImage" src="<?php echo $imgVila ?>"/>
                                        </a>
										<?php
									} else { ?>
                                        <a href="<?php the_sub_field('link'); ?>">
                                            <img src="<?php the_sub_field('defimg', 'options'); ?>"/>
                                        </a>
									<?php } ?>
                                </div><!--/."apartments-box_img-->
                            </div><!-- /.col-md-5 -->
                            <div class="col-md-7">
                                <div class="apartments-box__content">
                                    <div class="vilaCaptionAndContent">
                                        <h3>
                                            <a href="<?php echo $link; ?>">
												<?php the_sub_field('naslov'); ?>
                                            </a>
                                        </h3>
                                    </div><!--/.vilaCaptionAndContent-->
                                    <div>
										<?php the_sub_field('opis'); ?>
                                    </div>
                                    <a href="<?php echo $link; ?>"
                                       class="displayInline"><?php _e('Više informacija', 'wpog'); ?></a>
                                </div> <!-- /.apartments-box__content -->
                            </div><!--/.col-md-7-->
                        </div><!-- /.row -->
                    </div> <!-- /.apartments-box -->
				<?php endwhile;
			else :
				echo 'No data';
			endif; ?>
        </div><!-- /.container -->
    </section>
<?php
get_footer();
