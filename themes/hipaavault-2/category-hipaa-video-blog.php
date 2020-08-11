<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

<div class="container-fluid pt-5 pb-5 videos">


	<div class="row">
  	<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="col-xs-12 col-md-6">
      <div class="video-box">
      <?php
			if(get_field('choose_video_source')){
				$field = get_field_object('choose_video_source');
				$value = $field['value'];
		  		$video_url = get_field('upload_video');
				
				if($value == 'youtube'){ 
					echo get_field('youtube_iframe_code');
				}else{
					
					echo "<div class='video_max_scale'>";
					if ( in_category( 'hipaa-video-blog' )) {
						echo do_shortcode('[KGVID]'.$video_url.'[/KGVID]' );
						
					}
					echo "</div>";
					
				}
			}	
			?> 
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <small class="text-muted"><?php echo get_the_date('M'); ?> <?php echo get_the_date('d'); ?>, <?php echo get_the_date('Y'); ?></small>
      </div>
    </div>
    <?php 
		endwhile;
		global $wp_query;
		webzline_pagination($pages = $wp_query->max_num_pages, $range = 2);
		
		?>
		<?php else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.','vmracks'); ?></p>
    <?php endif; // Loop End  ?>
    
  </div>
    
    
  </div>
<?php get_footer(); ?>
