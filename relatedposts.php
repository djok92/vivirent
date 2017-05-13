<div id="related-posts">
    <p>ostale aktualnosti</p>
    <div class="row">
        <?php
        $currentID = get_the_ID();
        $args = [
            'post_type' => 'aktualnosti',
            'posts_per_page' => 4,
            'post__not_in' => [$currentID]
        ];
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <div class="col-md-3">
                <div>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail('archive-size'); ?>
                    </a>
                </div>
                <div>
                    <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                </div>
            </div>
        <?php endwhile; ?>
        <!-- related posts -->
    </div>
</div> <!-- #related_posts -->