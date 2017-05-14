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
	<?php if ( ! is_home() ) { ?>
        <div class="top-footer">
			<?php get_template_part( 'parts/section', 'apartments' ) ?>
        </div>
	<?php } ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bottom-footer__left">
                        <a href="#">
                            <div class="footer-logo"></div>
                        </a>
                        <p><?php the_field( 'f_copy', 'options' ); ?></p>
                    </div> <!-- /.bottom-footer__left -->
                    <div class="bottom-footer__right">
						<?php the_field( 'f_kontakt', 'options' ); ?>
                        <div class="social">
                            <a href="<?php the_field( 'f_fb', 'options' ); ?>" target="_blank"><i
                                        class="fa fa-facebook-square"></i></a>
                            <a href="<?php the_field( 'f_tw', 'options' ); ?>" target="_blank"><i
                                        class="fa fa-twitter-square"></i></a>
                            <a href="<?php the_field( 'f_ln', 'options' ); ?>" target="_blank"><i
                                        class="fa fa-linkedin-square"></i></a>
                        </div>
                    </div> <!-- /.bottom-footer__right -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div><!-- /.bottom-footer -->
</footer>
<div class="locations">
	<?php
	$args  = [
		'post_type'  => 'page',
		'fields'     => 'ids',
		'nopaging'   => true,
		'meta_key'   => '_wp_page_template',
		'meta_value' => 'page-location.php'
	];
	$pages = get_posts( $args );
	foreach ( $pages as $page ) {
		// check if the repeater field has rows of data
		$i = 1;
		if ( have_rows( 'sekcije_repeater', $page ) ):
			// loop through the rows of data
			while ( have_rows( 'sekcije_repeater' ) ) : the_row(); ?>
                <div class="modal fade" id="modal<?php echo $i; ?>" tabindex="-1" role="dialog"
                     aria-labelledby="modal<?php echo $i; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
								<?php the_sub_field( 'opis' ); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Zatvori
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
				$i ++; ?>

			<?php endwhile;
		else :
			echo 'Materijal nije trenutno dostupan.';
		endif;
		echo $page . '</br>';
	}


	?>
</div>
<?php wp_footer(); ?>

</div> <!-- /#wrapper -->
</body>
</html>
