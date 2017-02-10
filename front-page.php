<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>



<?php get_template_part('apartments-related') ?>


<section class="section_bkg">
    <!--    <div class="slider-nav">
            <li class="slide-nav _1">Istra</li>
            <li class="slide-nav _2">Brioni</li>
        </div>-->
    <div id="region-slider" class="region-holder royalSlider rsUni">
        <?php for ($i = 1; $i < 5; $i++) { ?>
            <div>
                <div class="img-holder">
                    <img alt="img" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/slider-home-1.jpg" />
                    <div class="gradient"></div>
                </div>
                <div class="front-part">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <img alt="slider-map" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/slider-map.png"/>
                            </div> <!-- /.col-md-4 -->
                            <div class="col-md-6 col-md-offset-1">
                                <h2>Hrvatska Istra <?php echo $i; ?></h2>
                                <div>
                                    Vestibulum ultrices justo id lobortis vulputate. Nam ullamcorper, nulla et adipiscing laoreet, urna odio volutpat jccccusto, vitae pulvinar nisi leo in turpis.
                                    Sed sodales porttitor magna. Morbi in justo quis nunc interdum feugiat.
                                </div>
                                <div class="thumbs-holder">
                                    <a href="#"><img alt="thumb-img" src="<?php echo get_template_directory_uri() ?>/dist/images/thumb-img.jpg" /></a>
                                    <a href="#"><img alt="thumb-img" src="<?php echo get_template_directory_uri() ?>/dist/images/thumb-img.jpg" /></a>
                                    <a href="#"><img alt="thumb-img" src="<?php echo get_template_directory_uri() ?>/dist/images/thumb-img.jpg" /></a>
                                </div> <!-- /.thumbs-holder -->
                                <a href="#" class="link white">više informacija</a>
                            </div> <!-- /.col-md-6 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </div><!-- /.front-part -->
            </div> <!-- Slide -->
        <?php } ?>
    </div>
</section>

<section class="post section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="post__content">
                    <span><a href="#">Aktuelnosti</a></span>
                    <h2><a href="#">Fusce nec odio consectetur fermentum nisi eget, pellentesque </a></h2>
                    <div class="post__content_text">
                        Vestibulum ultrices justo id lobortis vulputate. Nam ullamcorper, nulla et adipiscing laoreet, urna odio volutpat justo, vitae pulvinar nisi leo in turpis. Sed sodales porttitor magna. Morbi in justo quis nunc interdum feugiat.
                    </div>
                    <div class="post__content_links">
                        <a href="#" class="link black">vise informacija</a>
                        <a href="#" class="link">arhiva aktuelnosti</a>
                    </div>
                </div>
            </div> <!-- /.col-md-7 -->
            <div class="col-md-5">  
                <div class="post__img">
                    <img alt="post-img" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/post-img.jpg" />
                </div>
            </div> <!-- /.col-md-5 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<?php
get_footer();
