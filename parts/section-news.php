<section class="post section">
        <div class="container">
            <div class="row">

            <?php 
            // WP_Query arguments
            $args = array (
                'category_name'          => 'aktualnosti',
                'posts_per_page'         => '1',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>


                            <div class="col-md-7">
                                <div class="post__content">
                                    <span><a href="<?php the_field('hs4_link','options'); ?>">Aktualnosti</a></span>

                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="post__content_text">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <div class="post__content_links">
                                        <a href="<?php the_permalink(); ?>" class="link black">više informacija</a>
                                        <a href="<?php the_field('hs4_link','options'); ?>" class="link">arhiva aktualnosti</a>
                                    </div>          

                                    
                                </div>
                            </div> <!-- /.col-md-7 -->


                            <div class="col-md-5">
                                <div class="post__img">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ( get_the_post_thumbnail() ) {
                                               the_post_thumbnail('archive-size');
                                            } else { ?>
                                                <img src="<?php the_field('defimg','options'); ?>"/>
                                            <?php }?>
                                    </a>
                                </div>
                            </div> <!-- /.col-md-5 -->


                            <?php }
                } else { ?>
                    
                    Stranica nije dostupna. Vratite se na <a href="<?php echo home_url(); ?>">početnu stranu</a>.

                <?php }

                // Restore original Post Data
                wp_reset_postdata();
            ?>


            </div> <!-- /.row -->
        </div> <!-- /.container -->
</section>