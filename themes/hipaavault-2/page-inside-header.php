<?php 
/**
  Template Name: Template - Inside Header
 *
 * Template with sidebar.
 * @package WordPress
 */
get_header(); ?>
<?php if((is_page() || is_single()) && !is_front_page()): ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Inner Banner Start -->

<div class="main-box">
	<div class="banner-inside" style="background-image:url(<?php the_field('banner_image'); ?>)">
  	<div class="container">
      <div class="row">
        <div class="col-md-9">
        	<div class="banner-inside-content">
          	<?php if(get_field('header_icon')){ ?>
            <div class="icon-header">
              <img src="<?php the_field('header_icon'); ?>" alt="" class="img-responsive" /> 
            </div>
            <?php } ?>
            <div class="header-content <?php if(!get_field('header_icon')){ ?>full<?php } ?>">
              <h1><?php the_title(); ?></h1>
              <?php the_field('header_content'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="overview-box">
    
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="portfolio-panel">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- Inner Banner End -->

<?php endwhile; wp_reset_postdata(); ?>
<?php endif;  ?>

<?php get_footer(); ?>
