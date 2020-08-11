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
      <article class="post pr-4">
        <div class="post-content-holder">
          <div class="post-content">
            <div class="post-text clearfix">
              <div class="content pb-4">
              	<div class="video-wrp">
                	<h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </div>
                <?php //the_post_thumbnail( 'homepage-post-thumb' ); ?>
                <?php
                    if($video_url = get_post_meta($post->ID, 'video_url', true)) {
                      echo "<div class='video_max_scale'>";
											echo do_shortcode('[KGVID]'.$video_url.'[/KGVID]' );
                      echo "</div>";
                    }	
				?>
                
                
                <?php 
				if(get_field('post_image')){
					$image = wp_get_attachment_image_src(get_field('post_image'), 'full'); 
				?>
                	<a href="<?php the_permalink() ?>"><img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('post_image')) ?>" class="attachment-large" /></a>
                <?php }else{ 
					echo get_the_post_thumbnail( $page->ID, 'large' ); 
				} ?>
                
                
                <div class="video-wrp">
                	<div class="post-date">By <?php $author_id=$post->post_author; the_author_meta( 'display_name' , $author_id ); ?>, Date: <?php echo get_the_date('M'); ?> <?php echo get_the_date('d'); ?>, <?php echo get_the_date('Y'); ?></div>
                   	<div class="pt-4">
                    	<?php
						if(get_field('post_title'))
						{
							echo '<h4 class="post-custom-title">' . get_field('post_title') . '</h4>';
						}
						if(get_field('content_beside_image'))
						{
							echo get_field('content_beside_image');
						}else{
							
							echo content(60);
						}
						?>
                    </div>
                  	<a href="<?php the_permalink() ?>" class="btn btn-primary btn-sm mb-5">Read more</a> 
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
      <p>
        <?php _e('Sorry, no posts matched your criteria.','vmracks'); ?>
      </p>
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
