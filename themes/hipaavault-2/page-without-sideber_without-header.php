<?php 
/**
Template Name: Template - Without Sideber Without Header
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
          <?php if(get_field('page_title')){ ?>
          <h2>
            <?php the_field('page_title'); ?>
          </h2>
          <?php } ?>
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
