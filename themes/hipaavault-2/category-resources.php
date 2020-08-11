<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

<div class="container pt-5">
    <!-- Page Content -->
    <div class="row">
      <div class="col-md-9 pagination-wrp">
        <?php 
					//Protect against arbitrary paged values
					
					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        	
          <!-- Single post --> 
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
                    <div class="date orange"><span><?php echo get_the_date('d'); ?></span><?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></div>
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
        endwhile;
				webzline_pagination($pages = '', $range = 2);
        
        ?>
				<?php else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.','vmracks'); ?></p>
					<?php endif; // Loop End  ?>

      </div>
      
      <aside class="col-md-3">
        <div class="side-wrp">
      	   <?php get_sidebar(); ?>
        </div>
      </aside>
    </div>
  </div>
<?php get_footer(); ?>
