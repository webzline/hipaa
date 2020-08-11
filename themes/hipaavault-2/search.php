<?php
/**
 *
 * A Full Width custom page template without sidebar.
 * @package WordPress
 */
get_header(); 
?>
<div class="container-fluid pt-5 pb-5">
    <!-- Page Content -->
    <div class="row">
      <div class="col-md-9">
        <?php if ( have_posts() ) : ?>
        	<header class="page-header results-wrp">
            <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
          </header><!-- .page-header -->

                

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
          <!-- Single post --> 
          <article class="post">
            <div class="post-content-holder">
              <div class="post-content">
                <div class="post-text clearfix">
                  <div class="content">
                    
                     <?php echo get_the_post_thumbnail( $page->ID, 'large' ); ?>
                    <div class="video-wrp">
                    <h2 class="bb"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>                        
                    <h3 class="lead">
					 <div class="date orange"><span><?php echo get_the_date('d'); ?></span><?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></div>
					 <?php echo content(110); ?></h3>
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