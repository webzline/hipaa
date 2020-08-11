<?php 
/**
 * 
Template Name: Template - Goverment Partner
 * A Full Width custom page template with sidebar.
 * @package WordPress
 */
get_header(); ?>
<?php if((is_page() || is_single()) && !is_front_page()): ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Inner Banner Start -->
<div class="main-box">
	
  <div class="inner_wrp header-inside" <?php if(get_field('banner_image')){ ?>style="background-image:url('<?php the_field('banner_image'); ?>')" <?php } ?>> 
  	<div class="header-inside-con">
      <div class="container-tight">
        <h2>
          <?php the_title(); ?>
        </h2>
        <?php if(get_field('page_banner_title')){ ?>
        <h1>
          <?php the_field('page_banner_title'); ?>
        </h1>
        <?php } ?>
        <?php if(get_field('page_banner_sub_title')){ ?>
        <h4>
          <?php the_field('page_banner_sub_title'); ?>
        </h4>
        <?php } ?>
      </div>
    </div>
  </div>
  
  
    <div class="container-tight">
    <div class="overview-wrp">
      <div class="row">
        <div class="col-md-12">
        	<div class="row header-inside">
						
            
              
             
           </div>
          </div>
         </div>
         </div>
         <div class="row">
           <div class="col-md-12">
              <div class="portfolio-panel">
                <?php if(get_field('page_title')){ ?>
                <h2>
                  <?php the_field('page_title'); ?>
                </h2>
                <?php } ?>
              
                <?php the_content(); ?>
              </div>
          </div>
          
          
       </div>
        
        
      </div>
    </div>
    
  

<!-- Inner Banner End -->

<?php endwhile; wp_reset_postdata(); ?>
<?php endif;  ?>
<?php get_footer(); ?>

