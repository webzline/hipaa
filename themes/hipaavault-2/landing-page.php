<?php 
/**
Template Name: Template - Landing Page
 * 
 *
 * A Full Width custom page template without sidebar.
 * @package WordPress
 */
get_header(); ?>

<?php if((is_page() || is_single()) && !is_front_page()): ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Inner Banner Start -->

<div class="main-box bg-gray">
	<div class="banner-inside landing" style="background-image:url(<?php the_field('banner_image'); ?>)">
  	<div class="container">
      <div class="row">
        <div class="col-md-8">
        	<div class="banner-inside-content">
            <div class="header-content <?php if(!get_field('header_icon')){ ?>full<?php } ?>">
              <?php the_field('header_content'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
	
  <div class="overview-box pt-0 lp">
    
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
</div><!-- .content -->
<?php get_footer(); ?>
