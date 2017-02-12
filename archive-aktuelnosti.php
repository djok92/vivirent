<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Ogitive
 */
get_header();
?>


<section class="p-100-0">
    <div class="container">
        <?php
        $args = array('post_type' => 'aktuelnosti', 'posts_per_page' => -1);
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <div class="single-post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="img-holder">
                            <?php the_post_thumbnail('archive-size'); ?>
                        </div>
                    </div> <!-- /.col-md-5 -->
                    <div class="col-md-7">
                        <div class="archive-content">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div>
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="link blue">VIŠE INFORMACIJA</a>
                        </div>
                    </div> <!-- /.col-md-7 -->
                </div> <!-- /.row -->
            </div> 
        <?php endwhile; ?>
    </div> <!-- /.container -->
</section>




<?php get_footer(); ?>
