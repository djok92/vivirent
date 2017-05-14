<section class="section_bkg">
    <div id="region-slider" class="region-holder with-bkg royalSlider rsUni">
		<?php
		// check if the repeater field has rows of data
		if ( have_rows( 'hs3_lokacija', 'options' ) ):
			// loop through the rows of data
			while ( have_rows( 'hs3_lokacija', 'options' ) ) : the_row(); ?>
                <div> <!-- Slide -->
                    <div class="img-holder">
                        <img alt="img"
                             src="<?php the_sub_field( 'bkg' ); ?>"/>
                        <div class="gradient"></div>
                    </div>
                    <div class="front-part">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <img alt="slider-map"
                                         src="<?php the_sub_field( 'img' ); ?>"/>
                                </div> <!-- /.col-md-4 -->
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="tabs-holder">
                                        <div class="rsTmb"><?php the_sub_field( 'naslov' ); ?></div>
                                    </div>
                                    <h2><?php the_sub_field( 'naslov' ); ?></h2>
                                    <div>
										<?php the_sub_field( 'opis' ); ?>
                                    </div>
                                    <div class="thumbs-holder">
										<?php
										$images = get_sub_field( 'gallery' );
										if ( $images ): ?>
											<?php foreach ( $images as $image ): ?>

                                                <a href="<?php echo $image['url']; ?>">
                                                    <img alt="<?php echo $image['alt']; ?>"
                                                         src="<?php echo $image['sizes']['thumbnail']; ?>"/>
                                                </a>
											<?php endforeach; ?>
										<?php endif; ?>
                                    </div> <!-- /.thumbs-holder -->
                                    <a href="<?php the_sub_field( 'link' ); ?>" class="link white">više informacija</a>
                                </div> <!-- /.col-md-6 -->
                            </div> <!-- /.row -->
                        </div> <!-- /.container -->
                    </div><!-- /.front-part -->
                </div> <!-- Slide -->
			<?php endwhile;
		else :
			echo 'Materijal nije dostupan.';
		endif;
		?>
    </div>
</section>