
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
  </head>

<header class="site-header" role="banner">
  <!-- NAVBAR
================================================== -->
  <body <?php body_class(); ?>>
    <div class="navbar-wrapper">
      <div class="navbar navbar-default" role="navigation">
        <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <?php if(has_custom_logo()) : ?>
                  <?php the_custom_logo(); ?>
                <?php else : ?>
                  <h1><?php bloginfo('name'); ?></h1>
                <?php endif; ?>
              </div><!-- navbar-header -->




                <h3><a href="#" class="showroom">Showroom 317.843-1204</a></h3>
               


             <!--  We cannot leave the below as-is, we need to set the menu in the WordPress dashboard -->
              <?php

                wp_nav_menu( array(
                
                      'theme_location'  => 'primary',
                      'container'       => 'nav',
                      'container_class' => 'navbar-collapse collapse',
                      'menu_class'      => 'nav navbar-nav navbar-right',
                      'fallback'        =>  'wp_bootstrap_navwalker::fallback',
                      'walker'          =>  new wp_bootstrap_navwalker()
                  ));

              ?>

              
        </div>
      </div>
    </div>
</header>