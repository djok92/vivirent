<?php
/**
 * The template for displaying all single posts.
 *
 * @package WP_Ogitive
 */
get_header();
?>
<section class="p-100-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-content">
                    <!-- start the loop -->
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                    <!-- end the loop -->
                </div> <!-- /.page-content -->
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
        <div class="row"> 
            <div class="col-md-12">
                <?php get_template_part('breadcrumbs'); ?>
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div id="related-posts">
                    <p>Preporucujemo</p>
                    <div class="row">
                        <?php
                        $currentID = get_the_ID();
                        $args = [
                            'post_type' => 'aktuelnosti',
                            'posts_per_page' => -1,
                            'post__not_in' => [$currentID]
                        ];
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <div class="col-md-3">
                                <div>
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-size'); ?></a>
                                </div>
                                <div>
                                    <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <!-- related posts -->
                    </div>
                </div> <!-- #related_posts -->
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
    </div>
</div> <!-- /.container -->
</section>

<?php get_footer(); ?>
