<?php 
/**
  Template Name: Template - Rignt Sidebar
 *
 * Template with sidebar.
 * @package WordPress
 */
get_header(); ?>
<?php if((is_page() || is_single()) && !is_front_page()): ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Inner Banner Start -->

<div class="main-box bg-gray">
  <div class="inner_wrp"> <img src="<?php the_field('banner_image'); ?>" alt="" class="img-responsive" /> </div>
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
