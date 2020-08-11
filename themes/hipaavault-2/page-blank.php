<?php 
/**
Template Name: Template - Blank Page
 * 
 *
 * A Full Width custom page template without sidebar.
 * @package WordPress
 */
get_header(); ?>

<?php if((is_page() || is_single()) && !is_front_page()): ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Inner Banner Start -->

<div class="main-box">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
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
