<section class="section_bkg">

    <div id="region-slider" class="swiper-container region-holder with-bkg">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
			<?php
			$i      = 1;
			$titles = '';
			// check if the repeater field has rows of data
			if(have_rows('hs3_lokacija', 'options')):
				while(have_rows('hs3_lokacija', 'options')) : the_row();

					$titleSlide = get_sub_field('naslov'); ?>
                    <div class="swiper-slide" data-slide-title="<?php the_sub_field('naslov'); ?>">
                        <div class="img-holder">
                            <img alt="img"
                                 src="<?php the_sub_field('bkg'); ?>"/>
                        </div>
                        <div class="gradient"></div>
                        <div class="front-part">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img alt="slider-map"
                                             src="<?php the_sub_field('img'); ?>"/>
                                    </div> <!-- /.col-md-4 -->
                                    <div class="col-md-6 col-md-offset-1">
                                        <div class="navButtons">
											<?php ?>
                                        </div><!-- /.navButtons -->
                                        <h2><?php echo $titleSlide; ?> </h2>
                                        <div>
											<?php the_sub_field('opis'); ?>
                                        </div>
                                        <div class="thumbs-holder">
											<?php
											$images = get_sub_field('gallery');
											if($images): ?>
												<?php foreach($images as $image): ?>

                                                    <a href="<?php echo $image['url']; ?>"
                                                       data-lightbox="gallery-img-<?php echo $i; ?>">
                                                        <img alt="<?php echo $image['alt']; ?>"
                                                             src="<?php echo $image['sizes']['thumbnail']; ?>"/>
                                                    </a>
												<?php endforeach; ?>
											<?php endif; ?>
                                        </div> <!-- /.thumbs-holder -->
                                        <a href="<?php the_sub_field('link'); ?>"
                                           class="link white"><?php _e('više informacija', 'wpog'); ?></a>
                                    </div> <!-- /.col-md-6 -->
                                </div> <!-- /.row -->
                            </div> <!-- /.container -->
                        </div><!-- /.front-part -->
                    </div>
					<?php

				endwhile;
				$i ++;
			else :
				_e('Materijal nije dostupan.', 'wpog');
			endif;
			?>
        </div>
    </div>
</section>
