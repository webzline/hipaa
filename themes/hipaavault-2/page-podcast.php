<?php 
/**
  Template Name: Template - Podcast
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
        <div class="col-md-12">
        	<div class="banner-inside-content">
          	 <div class="header-content full">
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
        
        <div class="podcast-wrp">
          <?php 
              $cpt_query_args = array(
                  'post_type' => 'podcast',
									'post_status' => 'publish',
                  'posts_per_page' => '-1',
                  //'rewrite' => array( 'slug' => 'podcast'),
                  'has_archive' => true
              );
              $cpt_query = new WP_Query( $cpt_query_args );
    
              
              if ( $cpt_query->have_posts() ) : while ( $cpt_query->have_posts() ) : $cpt_query->the_post(); ?>
          
          <!-- Single post -->
           <h2><?php the_title(); ?></h2> 
           
           <?php $podcast_url_value = get_post_meta( get_the_ID(), 'podcast_url', true );
						// Check if the custom field has a value.
						if ( ! empty( $podcast_url_value ) ) { ?>
            	<audio controls>
                <source src="<?php echo $podcast_url_value; ?>" type="audio/mpeg">
              </audio>
						<?php } ?>
          <?php the_excerpt(); ?> 
          <a class="btn btn-orange btn-sm" href="<?php the_permalink(); ?> ">Continue reading</a>         
          
					<?php 
              endwhile; wp_reset_postdata();
              webzline_pagination($pages = '', $range = 2);
              
              ?>
          <?php else: ?>
          <p>
            <?php _e('Sorry, no posts matched your criteria.','vmracks'); ?>
          </p>
          <?php endif; // Loop End  ?>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- Inner Banner End -->

<?php endwhile; wp_reset_postdata(); ?>
<?php endif;  ?>
<?php get_footer(); ?>
