<?php 
/**
 *
 * A Full Width custom page template without sidebar.
 * @package WordPress
 */


get_header(); ?>



	<?php if((is_page() || is_single()) && !is_front_page()): ?>
    
    <div class="single-fluid" style="background-image:url(<?php echo get_the_post_thumbnail_url( $page->ID, 'full' );  ?>)"> 
       <div class="single-con">
         <div class="container">
         <div class="single-wrp"> 
               <div class="row">
                 <?php /*?><div class="col-md-2">
               	   <div class="date orange"><span class="date-size"><?php echo get_the_date('d'); ?></span><br><span class="month-size"><?php echo get_the_date('M'); ?></span><br/> <?php echo get_the_date('Y'); ?></div> 
                 </div><?php */?>
                 <div class="col-md-9">
                    <div class="single-details">
                    <h1 class="post-title"><?php the_title(); ?></h1>              
                    <div class="author-wrp"> <?php $author_id=$post->post_author; ?>
                    By <?php the_author_meta( 'display_name' , $author_id ); ?>
                    </div>
                   </div>
                 </div>
                </div>
              </div>
      </div>
       </div>
    </div>
		
  <div class="container-fluid pt-5 pb-5 main">		
    <div class="row">
       <div class="col-xs-9 col-md-9">
      	
      	<?php while (have_posts()) : the_post(); ?>
        	<?php setPostViews(get_the_ID()) ?>
          
          <div class="post-text clearfix">
            <div class="content">              
              <?php
							if($video_url = get_post_meta($post->ID, 'video_url', true)) {
								echo "<div class='video_max_scale'>";
								if ( in_category( 'hipaa-video-blog' )) {
									echo do_shortcode('[KGVID]'.$video_url.'[/KGVID]' );
									echo "<h4 class='title-mid'>Video Transcription</h4>";
								}
								echo "</div>";
							}	
							?>
               
               
              
              <p><?php the_content(); ?></p>
							<?php //echo do_shortcode( '[wpusb]' ); ?>                 
              
            </div>
              
          </div>
          
        
        <?php  endwhile;?>
        
        <?php
				$tags = wp_get_post_tags($post->ID);
				if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				 
				$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'showposts'=>4,  // Number of related posts that will be shown.
				'caller_get_posts'=>1
				);
				 
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) {
				echo '<div id="relatedposts"><h3>Related Posts</h3><ul>';
				while ($my_query->have_posts()) {
				$my_query->the_post();
				?>
					
				<?php
				if ( has_post_thumbnail() ) { ?>
				<li><div class="relatedthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?><?php the_title(); ?></a></div></li>
				<?php } else { ?>
				<li><div class="relatedthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo get_post_meta($post->ID, 'Image',true) ?>" width="196" height="110" alt="<?php the_title_attribute(); ?>" /><?php the_title(); ?></a></div></li>
				<?php }
				?>
					
				<?php
				}
				echo '</ul></div>';
				}
				}
				$post = $backup;
				wp_reset_query();
				?>
        <?php // comments_template('', true); ?>
        
      </div> 
       <div class="col-xs-3 col-md-3">
       <div class="side-wrp sidebar-panel">
      	 <?php echo get_sidebar(); ?>
        </div>
      </div>
    </div>
  </div>
		
	<?php endif; ?>
	



<?php get_footer(); ?>	
