<?php 
/**
 * 
 *
 * A Full Width custom page template without sidebar.
 * @package WordPress
 */
get_header(); ?>
<?php if((is_page() || is_single()) && !is_front_page()): ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Inner Banner Start -->

<div class="itshop-single">
  <?php the_post_thumbnail( 'homepage-post-thumb' ); ?>
</div>
<!-- Inner Banner End -->

<?php endwhile; wp_reset_postdata(); ?>
<?php endif;  ?>
<?php get_footer(); ?>
