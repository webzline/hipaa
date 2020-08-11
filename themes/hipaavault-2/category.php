<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

<div class="container padding-top-bottom-40">
    <!-- Page Content -->
    <div class="row">
      <div class="col-md-9">
      
        <?php 
					//Protect against arbitrary paged values
					
					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        	
          <!-- Single post --> 
          <article class="post">
            <div class="post-content-holder">
              <div class="post-content">
                <div class="post-text clearfix">
                  <div class="data-column">
                    <div class="date orange"><span><?php echo get_the_date('d'); ?></span><?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></div>
                    <?php /*?><div class="data-entry"><a href="<?php comments_link(); ?>"><span class="fa fa-commenting-o fa-2" ></span><br> <?php comments_number( 'no comment', 'one comment', '% comments' ); ?></a></div>
                    <div class="data-entry"><span class="fa fa-eye" ></span><br> <?php echo getPostViews(get_the_ID()); ?></div><?php */?>
                  </div>
                  
                  <div class="content">
                    <?php //the_post_thumbnail( 'homepage-post-thumb' ); ?>
                    <?php
                    if($video_embed_code = get_post_meta($post->ID, 'video_embed_code', true)) {
                      echo "<div class='video_max_scale'>";
                      echo $video_embed_code;
                      echo "</div>";
                    }	
										?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>                        
                    <h3 class="lead"><?php echo content(25); ?></h3>
                    
                    
                    <a href="<?php the_permalink() ?>" class="btn btn-primary btn-sm">Read more</a>
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
      
      	
        
      	<?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
<?php get_footer(); ?>
