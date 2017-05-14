<section id="apartment-section" class="apartments-section ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php the_field( 'hs2_naslov', 'options' ); ?></h2>
				<?php if ( is_home() ) { ?>
                    <div>
						<?php the_field( 'hs2_opis', 'options' ); ?>
                    </div>
				<?php } ?>
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->

    <div class="apartments-row">
		<?php
		// WP_Query arguments
		$args = array (
			'post_type'      => 'apartman',
			'posts_per_page' => '5',
		);
		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>

                <div class="apartments-box">
                    <div class="apartments-box_img">
						<?php if ( get_the_post_thumbnail() ) {
							the_post_thumbnail();
						} else { ?>
                            <img src="<?php the_field( 'defimg', 'options' ); ?>"/>
						<?php } ?>
                    </div>
                    <div class="apartments-box__content">

                        <p class="apartments-box__content_name">
							<?php $terms = get_the_terms( $post->ID, 'vila' );
							foreach ( $terms as $term ) {
								echo $term->name;
							} ?>
                        </p>

                        <h3><?php the_title(); ?></h3>

                        <div class="apartments-box__content_specification">
                            <p>Karakteristike:</p>
                            <span>max broj osoba: <?php the_field( 'broj_gostiju' ); ?></span>,
                            <span><?php the_field( 'kvadratura' ); ?></span>,
                            <span><?php the_field( 'soba' ); ?> sobe</span>,
                            <span><?php the_field( 'kupaonica' ); ?> kupatila</span>
                        </div><!-- /.apartments-box__content_specification -->

                        <div class="apartments-box__content_links">
                            <a href="<?php the_permalink(); ?>" class="link black">više informacija</a>
                            <a href="#" class="link">rezerviši</a>
                        </div>  <!-- /.apartments-box__content_links -->

                    </div> <!-- /.apartments-box__content -->
                </div> <!-- /.apartments-box -->

			<?php }
		} else { ?>
            Stranica nije dostupna. Vratite se na <a href="<?php echo home_url(); ?>">početnu stranu</a>.
		<?php }
		// Restore original Post Data
		wp_reset_postdata();
		?>
    </div> <!-- /.apartments-row -->
</section>