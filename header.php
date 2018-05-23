<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WP_Ogitive
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="wrapper">

    <header>
        <div class="top-header">
			<?php if(!is_home()) { ?>
                <div class='left-holder'>
                    <a href="/">
                        <div class="header-logo"></div>
                    </a>
                </div>
			<?php }
			?>
            <div class="menu-holder">
                <nav class="main-nav">
					<?php get_template_part('navigation'); ?>
                </nav><!-- /.main-nav -->
                <span id="menu-button"><i class="fa fa-bars"></i></span>

            </div> <!-- /.menu-holder -->
            <div class="right-holder">
                <div class="search">
                    <i class="fa fa-search"></i>
					<?php get_template_part('searchform'); ?>
                </div>
                <div class="language">

                </div>
            </div> <!-- /.right-holder -->
        </div> <!-- /.top-header -->


		<?php if(is_singular('apartman') || is_home()) { ?>
            <div class="hero-holder">
				<?php if(is_home()) { ?>
                    <a id="scroll-btn" href="#apartment-section"><i class="fa fa-chevron-down  fa-2x"
                                                                    aria-hidden="true"></i></a>
					<?php get_template_part('parts/booking', 'form'); ?>

                    <div class="hero-holder__content">
                        <div class="hero-holder__content_logo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo.png"
                                 alt="Logo ViviRent"
                                 srcset="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo@2x.png x2">
                        </div> <!-- /.home-logo -->
                        <div class="hero-holder__content_text">
                            <h1><?php the_field('hs1_slider_txt', 'options') ?></h1>
                            <a href="<?php the_field('hs1_slider_btnlink', 'options') ?>" class="more-info">
								<?php the_field('hs1_slider_btntxt', 'options') ?>
                            </a>
                        </div>
                    </div> <!-- /.hero-holder__content -->

					<?php get_template_part('slider'); ?>
					<?php
				}
				if(is_singular('apartman')) {
					get_template_part('parts/slider', "apartman");
				}
				?>
            </div> <!-- /.hero-holder -->


		<?php } elseif(is_archive()) { ?>

            <div class="header-img">
                <div class="header-gradient"></div>
                <div class="bottom-gradient"></div>


				<?php // povlacanje acf slike iz kategorije
				$catimg         = '';
				$queried_object = get_queried_object();
				$taxonomy       = $queried_object->taxonomy;
				$term_id        = $queried_object->term_id;
				$catimg         = get_field('catimg', $taxonomy . '_' . $term_id);
				?>



				<?php if($catimg) { ?>
                    <img alt="header-img" src="<?php echo $catimg; ?>"/>
				<?php } else { ?>
                    <img alt="header-img" src="<?php the_field('defimg', 'options'); ?>"/>
				<?php } ?>


				<?php
				the_archive_title('<h1>', '</h1>');
				the_archive_description('<div>', '</div>');
				?>

            </div>


		<?php } else { ?>


            <div class="header-img">
                <div class="header-gradient"></div>
                <div class="bottom-gradient"></div>
				<?php
				$image    = get_field('headimg'); // u slucaju
				$defimage = get_field('defimg', 'options');

				if($image) : ?>
                    <img alt="header-img" src="<?php echo $image ?>"/>
				<?php else : ?>
                    <img alt="header-img" src="<?php echo $defimage ?>"/>
				<?php endif;
				?>

                <h1>
					<?php
					$post_type = get_post_type_object(get_post_type($post));

					if(is_page_template()) {
						echo get_the_title($page_id);
					} elseif(is_singular()) {
						echo get_the_title($page_id);
					} else {
						echo $post_type->label;
					}
					?>
                </h1>
            </div>


		<?php } ?>

    </header>

    <main>
