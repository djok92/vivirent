<section id="apartment-section" class="apartments-section ">
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-12">-->
    <!--                <h2>--><?php //the_field('hs2_naslov', 'options'); ?><!--</h2>-->
    <!--				--><?php //if(is_home()) { ?>
    <!--                    <div>-->
    <!--						--><?php //the_field('hs2_opis', 'options'); ?>
    <!--                    </div>-->
    <!--				--><?php //} ?>
    <!--            </div> <!-- /.col-md-12 -->
    <!--        </div> <!-- /.row -->
    <!--    </div> <!-- /.container -->

    <div class="container">
        <h2>ostali apartmani</h2>
		<?php
		// WP_Query arguments
		$args = array(
			'post_type'      => 'apartman',
			'posts_per_page' => '5',
		);
		// The Query
		$query = new WP_Query($args);

		// The Loop
		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>
                <div class="apartments-box">
                    <div class="row">
                            <div class="col-md-4">
                                <div class="apartments-box_img">
                                    <?php if(get_the_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else { ?>
                                        <a href="<?php the_permalink(); ?> ">
                                            <img src="<?php the_field('defimg', 'options'); ?>"/>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div><!-- /.col-md-4 -->
                            <div class="col-md-8">
                                <div class="apartments-box__content">

                                    <p class="apartments-box__content_name">
                                        <?php $terms = get_the_terms($post->ID, 'vila');
                                        foreach($terms as $term) {
                                            echo $term->name;
                                        } ?>
                                    </p>

                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

    <!--                                <div class="apartments-box__content_specification">-->
    <!--                                    <p>--><?php //_e('Karakteristike', 'wpog'); ?><!--:</p>-->
    <!--                                    <span>--><?php //_e('max broj osoba', 'wpog'); ?>
    <!--                                        : --><?php //the_field('broj_gostiju'); ?><!--</span>,-->
    <!--                                    <span>--><?php //the_field('kvadratura'); ?><!--</span>,-->
    <!--                                    <span>--><?php //the_field('soba'); ?><!----><?php //_e('sobe', 'wpog'); ?><!--</span>,-->
    <!--                                    <span>--><?php //the_field('kupaonica'); ?><!----><?php //_e('kupatila', 'wpog'); ?><!--</span>-->
    <!--                                </div><!-- /.apartments-box__content_specification -->

                                    <div class="apartments-box__content_links">
                                        <a href="<?php the_permalink(); ?>"
                                        class="link black"><?php _e('više informacija', 'wpog'); ?></a>
                                        <a href="<?php if(function_exists('af_booking')) {
                                            echo add_query_arg(array('acm_id' => $post->ID), af_booking()->getBookingURL());
                                        } ?>" class="link"><?php _e('rezerviši', 'wpog'); ?></a>
                                    </div>  <!-- /.apartments-box__content_links -->

                                </div> <!-- /.apartments-box__content -->
                            </div><!-- /.col-md-8 -->
                    </div><!-- /.row -->
                </div> <!-- /.apartments-box -->
			<?php }
		} else { ?>
			<?php printf(__('Stranica nije dostupna. Vratite se na <a href="%s">početnu stranu</a>.', 'wpog'), home_url()); ?>
		<?php }
		// Restore original Post Data
		wp_reset_postdata();
		?>

    </div><!-- /.container -->
</section>
