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
            <?php get_template_part('apartments-related') ?>
        </div>
    <?php } ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bottom-footer__left">
                        <a href="#"><div class="footer-logo"></div></a>
                        <p>All rights reserved by Vivi Rent 2016&copy;</p>
                    </div> <!-- /.bottom-footer__left -->
                    <div class="bottom-footer__right">
                        <p>Ulica Marsala Broza Tita 212, 11000 Istra, Hrvatska</p>
                        <p><a href="tel:+3851234567">+385 123 4567</a>, <a href="tel:+3851234567">+385 123 4567</a></p>
                        <p><a href="mailto:info@vivirent.com">info@vivirent.com</a></p>
                        <div class="social">
                            <a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin-square"></i></a>
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
