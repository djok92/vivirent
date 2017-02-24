<section id="apartment-section" class="apartments-section ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>vivi rent</h2>
                <?php if (is_home()) { ?>
                    <div>
                        Nam condimentum augue ut tortor cursus varius. Vestibulum convallis tincidunt massa, sit amet tincidunt nunc euismod quis. Vivamus in pharetra sem, at facilisis libero. 
                        Curabitur bibendum est sed est convallis, sed gravida lacus pellentesque. Etiam nec volutpat mi, eu tincidunt est. Cras tempus turpis nibh, ut imperdiet libero auctor at. 
                        Vestibulum fermentum ante vel lectus feugiat suscipit.
                        Vestibulum venenatis ullamcorper diam, sit amet elementum risus consectetur at. Aenean et porttitor enim.
                    </div>
                <?php } ?>
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
    <div class="apartments-row">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="apartments-box">
                <div class="apartments-box_img">
                    <img alt="apartment-img" src="<?php echo get_template_directory_uri(); ?>/dist/images/apartments-img<?php echo $i ?>.jpg" />
                </div>
                <div class="apartments-box__content">
                    <p class="apartments-box__content_name">Villa Fasana</p>
                    <h3>apartman 1</h3>
                    <div class="apartments-box__content_specification">
                        <p>Karakteristike:</p>
                        <span>max 6 osoba</span>,
                        <span>98 kvadrata</span>,
                        <span>3 sobe</span>,
                        <span>2 kupaonice</span>
                    </div><!-- /.apartments-box__content_specification -->
                    <div class="apartments-box__content_links">
                        <a href="#" class="link black">vise informacija</a>
                        <a href="#" class="link">rezervisi</a>
                    </div>  <!-- /.apartments-box__content_links -->
                </div> <!-- /.apartments-box__content -->
            </div> <!-- /.apartments-box -->
        <?php } ?>
    </div> <!-- /.apartments-row -->
</section>