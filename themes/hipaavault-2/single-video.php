<?php 
/**
 *
 * A Full Width custom page template without sidebar.
 * @package WordPress
 */


get_header(); ?>
<?php if((is_page() || is_single()) && !is_front_page()): ?>

<div class="container-fluid pt-5 pb-5 main">
  <div class="row">
    <div class="col-xs-9 col-md-9">
      <?php while (have_posts()) : the_post(); ?>
      <?php setPostViews(get_the_ID()) ?>
      <div class="post-text clearfix">
        <div class="content pr-5"> 
          
          
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
          <h1 class="page-title"><?php the_title(); ?></h1>
          <h4 class='title-mid'>Video Transcription</h4>
          <?php the_content(); ?>
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
				echo '<div id="relatedposts" class="pt-5"><h4>Related Videos</h4><ul>';
				while ($my_query->have_posts()) {
				$my_query->the_post();
				?>
                  <li>
                    <div class="relatedthumb">
                      <?php the_post_thumbnail(); ?>
                      <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?>
                      </a></div>
                  </li>
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
      <div class="side-wrp sidebar-panel" style="top:0"> <?php echo get_sidebar(); ?> </div>
    </div>
  </div>
</div>
<?php endif; ?>
<div style="clear:both;" />
&nbsp;
</div>
<?php get_footer(); ?>
