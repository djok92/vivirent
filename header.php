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
                            <a href="/"><div class="header-logo"></div></a>
                        </div>
                    <?php }
                    ?>
                    <div class="menu-holder">
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
                <?php if (is_singular('apartman') || is_home()) { ?>
                    <div class="hero-holder">
                        <?php if (is_home()) { ?>
                            <a id="scroll-btn" href="#apartment-section"><i class="fa fa-chevron-down  fa-2x" aria-hidden="true"></i></a>
                            <?php get_template_part('parts/booking', 'form'); ?>
                            <div class="hero-holder__content">
                                <div class="hero-holder__content_logo"></div> <!-- /.home-logo -->
                                <div class="hero-holder__content_text">
                                    <h1> Nam condimentum augue ut tortor cursus varius <b>Villa Fasana</b> massa, sit amet tincidunt nunc euismod quis in pharetra sem, at facilisis libero. </h1>
                                    <a href="#" class="more-info">VIŠE INFORMACIJA</a>
                                </div>
                            </div> <!-- /.hero-holder__content -->
                            <?php get_template_part('slider'); ?>
                            <?php
                        }
                        if (is_singular('apartman')) {
                            get_template_part('parts/slider', "apartman");
                        }
                        ?>
                    </div> <!-- /.hero-holder -->
                <?php } else { ?>



                    <div class="header-img">
                        <div class="header-gradient"></div>
                        <div class="bottom-gradient"></div>
                        <?php
                        $page_id = get_queried_object_id();
                        if (has_post_thumbnail($page_id)) :
                            $image_array = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'full-width');
                            $image = $image_array[0];
                        else :
                            $image = get_template_directory_uri() . '/dist/images/header-img.jpg';
                        endif;
                        ?>
                        <img alt="header-img" src="<?php echo $image ?>" />
                        <h1>
                            <?php
                            $post_type = get_post_type_object(get_post_type($post));

                            if (is_page_template()) {
                                echo get_the_title($page_id);
                            } elseif (is_singular()) {
                                echo get_the_title($page_id);
                            } else {
                                echo $post_type->label;
                            }
                            ?>
                        </h1>
                    </div>



                <?php }
                ?>

            </header>

            <main>


