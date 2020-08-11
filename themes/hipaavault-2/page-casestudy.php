<?php 
/**
  Template Name: Template - Casestudy
 *
 * Template with sidebar.
 * @package WordPress
 */
get_header(); ?>
<?php if((is_page() || is_single()) && !is_front_page()): ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Inner Banner Start -->

<div class="main-box">
  <div class="overview-box">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        
        <div class="podcast-wrp">
          <?php 
              $cpt_query_args = array(
                  'post_type' => 'casestudy',
									'post_status' => 'publish',
                  'posts_per_page' => '-1',
                  //'rewrite' => array( 'slug' => 'casestudy'),
                  'has_archive' => true
              );
              $cpt_query = new WP_Query( $cpt_query_args );
    
              
              if ( $cpt_query->have_posts() ) : while ( $cpt_query->have_posts() ) : $cpt_query->the_post(); ?>
          
              <article class="post">
            <div class="post-content-holder">
              <div class="post-content">
                <div class="post-text clearfix">
                  
                  <div class="content">
                   <?php //the_post_thumbnail( 'homepage-post-thumb' ); ?>
                    <?php
                    if($video_url = get_post_meta($post->ID, 'video_url', true)) {
                      echo "<div class='video_max_scale'>";
											echo do_shortcode('[KGVID]'.$video_url.'[/KGVID]' );
                      echo "</div>";
                    }	
										?>
                    <?php echo get_the_post_thumbnail( $page->ID, 'large' ); ?>
                   <div class="video-wrp">
                    <h2 class="bb"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
                    <?php /*?><div class="date orange"><span><?php echo get_the_date('d'); ?></span><?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></div><?php */?>
                    <div class="author-wrp"><?php $author_id=$post->post_author; ?>
                    By <?php the_author_meta( 'display_name' , $author_id ); ?>  
                    </div>                     
                    <h3 class="lead">                      
					<?php echo content(100); ?>
                    </h3>
                    <a href="<?php the_permalink() ?>" class="btn btn-primary btn-sm">Read more</a>
                    </div>
                  </div>
                    
                </div>
              </div>
            </div>
        </article>   
          
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
      <aside class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="side-wrp">
      	   <?php get_sidebar(); ?>
        </div>
      </aside>
      
    </div>
  </div>
</div>
<!-- Inner Banner End -->

<?php endwhile; wp_reset_postdata(); ?>
<?php endif;  ?>
<?php get_footer(); ?>
