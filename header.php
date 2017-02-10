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
        <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>
        <div id="wrapper">

            <header>
                <div class="top-header">
                    <?php if (!is_home()) { ?>
                        <div class='left-holder'>
                            <a href="#"><div class="header-logo"></div></a>
                        </div>
                    <?php }
                    ?>
                    <div class="menu-holder">
                        <!--                        <nav>
                                                    <ul>
                                                        <li><a href="#">pocetna</a></li>
                                                        <li><a href="#">lokacija</a></li>
                                                        <li><a href="#">galerija</a></li>
                                                        <li><a href="#">aktuelnosti</a></li>
                                                        <li><a href="#">zdrav zivot</a></li>
                                                        <li><a href="#">gurme</a></li>
                                                        <li><a href="#">rezervacije</a></li>
                                                        <li><a href="#">kontakt</a></li>
                                                    </ul>
                                                </nav>-->
                        <?php get_template_part('navigation'); ?>
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
                <?php if (is_home() || is_page_template('page-apartmani.php')) { ?>
                    <div class="hero-holder">
                        <?php if (is_home()) { ?>
                            <?php get_template_part('booking-form'); ?>
                            <div class="hero-holder__content">
                                <div class="hero-holder__content_logo"></div> <!-- /.home-logo -->
                                <div class="hero-holder__content_text">
                                    <h1> Nam condimentum augue ut tortor cursus varius <b>Villa Fasana</b> massa, sit amet tincidunt nunc euismod quis in pharetra sem, at facilisis libero. </h1>
                                    <a href="#" class="more-info">VIŠE INFORMACIJA</a>
                                </div>
                            </div> <!-- /.hero-holder__content -->
                            <?php get_template_part('slider'); ?>
                            <?php
                        } else if (is_page_template('page-apartman.php')) {
                            get_template_part('slider-apartman');
                        }
                        ?>
                    </div> <!-- /.hero-holder -->
                <?php } else { ?>
                    <div class="header-img">
                        <div class="header-gradient"></div>
                        <img alt="header-img" src="<?php echo get_template_directory_uri(); ?>/dist/images/header-img.jpg" />
                    </div>
                <?php }
                ?>
            </header>

            <main>


