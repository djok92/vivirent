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
$dest =     isset($_REQUEST['dest']) ?     (int) $_REQUEST['dest'] : 0;
$checkin =  isset($_REQUEST['checkin']) ?  trim($_REQUEST['checkin']) : '';
$checkout = isset($_REQUEST['checkout']) ? trim($_REQUEST['checkout']) : '';
$guests =   isset($_REQUEST['guests']) ?   (int) $_REQUEST['guests'] : 0;
$paged = get_query_var('paged', 1);

// Validate and parse checkin date - datepicker format from search box is d. m. Y.
$d1 = \DateTime::createFromFormat('d. m. Y.', $checkin);
$d2 = \DateTime::createFromFormat('d. m. Y.', $checkout);

if (!$d1 || !$d2 || $guests < 1) {

  // reset if input is wrong

  $d1 = new \DateTime('now');
  $d2 = clone $d1;

  $d2->modify('+7 day');
  $guests = 1;
}

// Transform to Y-m-d style date
$checkin = $d1->format('Y-m-d');
$checkout = $d2->format('Y-m-d');

// Get destination post list
$include = get_posts([
  'post_type' => 'apartman',
  'tax_query' => [
    [
      'taxonomy' => 'vila',
      'terms'    => $dest,
    ]
  ],
  'fields' => 'ids',
]);

// Perform search
$query = af_booking()->search($checkin, $checkout, $guests, $paged, $max_results, $include);

get_header(); ?>

<section class="p-100-0">
	<div class="container">

		<?php /* Start the Loop */
		if ($query && $query->have_posts()): ?>
			<?php while ($query->have_posts()): $query->the_post(); ?>

				<div class="apartments-box">
					<div class="row">

            <div class="col-md-5">
							<div class="apartments-box_img">
								<a href="<?php the_permalink(); ?>">
									<?php if ( get_the_post_thumbnail() ) {
										the_post_thumbnail( 'archive-size' );
									} else { ?>
										<img src="<?php the_field( 'defimg', 'options' ); ?>"/>
									<?php } ?>
								</a>
                <?php if (get_field('popust_text')): ?>
                  <div class="discountBanner">
                    <p><?php the_field('popust_text'); ?></p>
                  </div><!--/.discountBanner-->
                <?php endif; ?>
							</div><!--/."apartments-box_img-->
						</div> <!-- /.col-md-5 -->

						<div class="col-md-7">
							<div class="apartments-box__content">
                <div class="col-sm-12">
                  <div class="vilaCaptionAndContent">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  </div><!--/.vilaCaptionAndContent-->
                </div><!--/.col-sm-12-->
                <div class="col-sm-7">
                  <div>
                    <?php the_excerpt(); ?>
                  </div>
                </div><!--/.col-sm-7-->
                <div class="col-sm-5">
                  <div class="pricesBoxHolder">
                    <?php echo do_shortcode('[afb-prices]'); ?>
                    <?php echo do_shortcode('[afb-reserve]'); ?>
                  </div>
                </div><!--/.col-sm-5-->
							</div><!-- /.apartments-box__content -->
						</div> <!-- /.col-md-7 -->
					</div> <!-- /.row -->
				</div><!-- /.apartments-box -->

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
