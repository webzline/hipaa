<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

<div class="container padding-top-bottom-40">
    <!-- Page Content -->
    <div class="row">
      <div class="col-md-9">
      <p>Vigilance in the face of increasing cyber attacks is crucial, and involves both knowledge of the types of data breaches that are taking place, and a strategy to combat them. As an effort to help inform health organizations and covered entities regarding the ways that HIPAA breaches of protected health information (PHI) are occurring, as well as the measures being taken to prevent them, HIPAA Vault provides the following summaries of recent data breaches:
</p>
      	
        <?php 
					//Protect against arbitrary paged values
					
					if ( have_posts() ) : while ( have_posts() ) : the_post(); 
					
					
					
					$current_month = get_the_date('F');

					if( $wp_query->current_post === 0 ) { 
						
					?>
						
					   <h4 class="title-dark" ><strong><?php the_date( 'F Y' ); ?> HIPAA Data Breaches</strong></h4> 
					
					<?php }else{ 
					
						$f = $wp_query->current_post - 1;       
						$old_date =   mysql2date( 'F', $wp_query->posts[$f]->post_date ); 
					
						if($current_month != $old_date) {?>
					
							<h4 class="title-dark"><strong><?php the_date( 'F Y' );?> HIPAA Data Breaches</strong></h4> 
					
						<?php }
					
					}
					?>
        	
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
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>                        
                    <?php the_content(); ?>
                  </div>
                    
                </div>
              </div>
            </div>
        </article>
        <?php 
        endwhile;
				// boc_pagination($pages = '', $range = 2);
        
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
