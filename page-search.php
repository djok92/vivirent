<?php
/**
 * Template Name: Pretraga
 *
 * @package WP_Ogitive
 */
if (!function_exists('af_booking')) {
	return;
}

$max_results = 10;

// Input
$checkin = isset($_REQUEST['checkin']) ? trim($_REQUEST['checkin']) : '';
$nights =  isset($_REQUEST['nights']) ?  intval($_REQUEST['nights']) : 1;
$guests =  isset($_REQUEST['guests']) ?  intval($_REQUEST['guests']) : 1;
$paged = get_query_var('paged', 1);

// Validate and parse checkin date - datepicker format from search box is d. m. Y.
if ($checkin == '') {
	$date_ci = new \DateTime('now');
} else {
	$date_ci = \DateTime::createFromFormat('d. m. Y.', $checkin);
	if ($date_ci === false) {
		$date_ci = new \DateTime('now');
	}
}

$checkin = $date_ci->format('Y-m-d');

// Perform search
$query = af_booking()->search($checkin, $nights, $guests, $paged, $max_results);

get_header(); ?>

<section class="p-100-0">
	<div class="container">

		<?php /* Start the Loop */
		if ($query && $query->have_posts()): ?>
			<?php while ($query->have_posts()): $query->the_post(); ?>

				<div class="Article">
					<div class="row">
						<div class="col-md-5">
							<div class="img-holder">
								<a href="<?php the_permalink(); ?>">
									<?php if ( get_the_post_thumbnail() ) {
										the_post_thumbnail( 'archive-size' );
									} else { ?>
										<img src="<?php the_field( 'defimg', 'options' ); ?>"/>
									<?php } ?>
								</a>
							</div>
						</div> <!-- /.col-md-5 -->
						<div class="col-md-7">
							<div class="archive-content">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div>
									<?php the_excerpt(); ?>
								</div>
								<p><a href="<?php echo add_query_arg(array('checkin' => $checkin, 'nights' => $nights, 'guests' => $guests), get_the_permalink()); ?>" class="link blue"><?php _e('VIŠE INFORMACIJA', 'wpog'); ?></a></p>
								<p><a href="<?php if (function_exists('af_booking')) { echo add_query_arg(array('acm_id' => $post->ID, 'checkin' => $checkin, 'nights' => $nights, 'guests' => $guests), af_booking()->getBookingURL()); } ?>" class="link"><?php _e('rezerviši', 'wpog'); ?></a></p>
							</div>
						</div> <!-- /.col-md-7 -->
					</div> <!-- /.row -->
				</div>

			<?php endwhile; ?>

			<div class="row">
				<div class="col-md-6">
					<?php previous_posts_link(__('&laquo; Prethodna strana', 'wpog')); ?>
				</div>
				<div class="col-md-6" style="text-align: right">
					<?php next_posts_link(__('Sledeća strana &raquo;', 'wpog'), $query->max_num_pages); ?>
				</div>
			</div>

			<?php wp_reset_postdata(); ?>

		<?php else: ?>

			<p><?php _e('Nema rezultata pretrage', 'wpog'); ?></p>

		<?php endif; ?>

	</div> <!-- /.container -->
</section>


<?php get_footer(); ?>
