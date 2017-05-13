<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WP_Ogitive
 */
?>
</main>
<footer>
    <?php if (!is_home()) { ?>
        <div class="top-footer">
            <?php get_template_part('parts/section', 'apartments') ?>
        </div>
    <?php } ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bottom-footer__left">
                        <a href="#"><div class="footer-logo"></div></a>
                        <p><?php the_field('f_copy','options'); ?></p>
                    </div> <!-- /.bottom-footer__left -->
                    <div class="bottom-footer__right">
                        <?php the_field('f_kontakt','options'); ?>
                        <div class="social">
                            <a href="<?php the_field('f_fb','options'); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
                            <a href="<?php the_field('f_tw','options'); ?>" target="_blank"><i class="fa fa-twitter-square"></i></a>
                            <a href="<?php the_field('f_ln','options'); ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a>
                        </div>
                    </div> <!-- /.bottom-footer__right -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div><!-- /.bottom-footer -->
</footer>

<?php wp_footer(); ?>

</div> <!-- /#wrapper -->
</body>
</html>
