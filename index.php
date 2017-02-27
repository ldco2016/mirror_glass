<?php

// Advanced Custom Fields
// this is a bunch of variables with our fields to echo out in PHP
$images_feature_title = get_field('images_feature_title');
$images_feature_body = get_field('images_feature_body');
$indianapolis_feature_title = get_field('indianapolis_feature_title');
$indianapolis_feature_body = get_field('indianapolis_feature_body');
$social_media_image = get_field('social_media_image');
$social_media_title = get_field('social_media_title');
$social_media_images = get_field('social_media_images');

?>

<?php get_header(); ?>




    <!-- Carousel
    ================================================== -->
    
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">

        <?php 

        $notun = new WP_Query(array(
            'post_type' => 'bcarousel'
        ));

        $indicator = -1;

        while($notun->have_posts()) : $notun->the_post(); $indicator++ ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo $indicator; ?>"<?php if($indicator == 0) : ?> class="active" <?php endif; ?>></li>
        <?php endwhile; ?>
         
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

        <?php 

        $carousel = new WP_Query(array(
           'post_type' => 'bcarousel',   
        ));

        $korim = 0;

        while($carousel ->have_posts()) : $carousel ->the_post(); $korim ++ ?>

        <?php if($korim == 1) : ?>
          <div class="item active">

        <?php else : ?>
          <div class="item">
        <?php endif; ?>

          
            <div class="carousel-image">
             <?php the_post_thumbnail(); ?>
             <div class="carousel-caption">
               <h1><?php the_title(); ?></h1>
               <h2><?php the_content(); ?></h2>
             </div>
            </div>
            
            
          </div>

        <?php endwhile; ?>
        </div>

        <!-- Left and right Carousel Arrows -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!-- /.carousel -->
    


    <!-- Images Feature Section
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <!-- <div class="container marketing"> -->

      <!-- Three columns of text below the carousel -->
      <section class="row content-region-1 pt40 pb40">
        <div class="container">

          <?php $loop = new WP_Query(array('post_type' => 'images_feature','orderby' => 'post_id', 'order' => 'ASC')); ?>
          <?php while($loop->have_posts()) : $loop->the_post(); ?>
          <div class="col-xl-2 col-centered">
            <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail();
              }
            ?>
            <p><a href="#" class="link"><?php the_title(); ?> &raquo;</a></p>

          <?php endwhile; ?>
          </div><!-- /.col-lg-2 -->
          
        </div>
      </section><!-- /.row -->


       <!-- Indianapolis Feature Section
    ================================================== -->
      <section class="row" id="indy-glass">
        <div class="container">
          <div class="col-md-12">
              <h2><?php echo $indianapolis_feature_title; ?></h2>
              <hr />
              <p class="lead"><?php echo $indianapolis_feature_body; ?></p>
          </div>
          <div class="col-md-12 text-center">
            <p><a class="btn btn-danger" href="#" role="button">Learn More &raquo;</a></p>
          </div>
        </div>
      </section>


      <section class="row content-region-2 pt40 pb40" id="customer-testimonial">
        <div class="container">
          <div class="col-md-12">
              <h1>What Our Customers Are Saying...</h1>
              <p class="lead">We love Mirror Concepts! The team is professional and courteous and the new weightroom
              mirrors look awesome!</p>
              <cite>~ Jeff and Cindy Kivett</cite>
              <p><a href="#" id="gallery">Read More &raquo;</a></p>
            </div>
          </div>
      </section>


      <!-- Social Media Section
    ================================================== -->
      <section class="row content-region-3 pt40 pb40" id="indy-glass">
        <div class="container">
          <div class="col-md-12 facebook-page">

            <!-- If user uploaded an image -->
            <?php if(!empty($social_media_image)) : ?>

              <img src="<?php echo $social_media_image['url']; ?>" alt="<?php echo $social_media_image['alt']; ?>">

            <?php endif; ?>
            
          </div>
              <h2><?php echo $social_media_title; ?></h2>
              <hr />
              <?php $loop = new WP_Query(array('post_type' => 'social_media_images','orderby' => 'post_id', 'order' => 'ASC')); ?>
              <?php while($loop->have_posts()) : $loop->the_post(); ?>
              <div class="col-lg-2 col-centered">
                <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail();
                  }
                ?>
              </div><!-- /.col-lg-2 -->
              <?php endwhile; ?>
              <p><a href="#" class="link">See more on Facebook &raquo;</a></p>
          </div>
      </section>

<?php get_footer(); ?>