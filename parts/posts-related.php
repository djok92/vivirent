<div id="related-posts">
    <p><?php _e('ostali članci iz', 'wpog'); ?><?php single_cat_title('asd'); ?></p>
    <div class="row">
		<?php
		$args  = [
			'category__in' => wp_get_post_categories($post->ID),
			'post__not_in' => [$post->ID],
			'numberposts'  => 4
		];
		$posts = get_posts($args);
		if($posts) {
			foreach($posts as $post) {
				setup_postdata($post); ?>
                <div class="col-md-3 col-sm-6">
                    <div class="related-post">
                        <div class="img-holder">
                            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail('archive-size'); ?>
                            </a>
                        </div> <!-- /.img-holder -->
                        <div>
                            <h4><a href="<?php the_permalink() ?>" rel="bookmark"
                                   title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                        </div>
                    </div>
                </div> <!-- /.col-md-3 -->
				<?php
			}
		}
		wp_reset_postdata();
		?>
        <!-- related posts -->
    </div>
</div> <!-- #related_posts -->
