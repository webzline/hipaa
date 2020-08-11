<?php 
/**
 * 
 *
 * A Full Width custom page template with sidebar.
 * @package WordPress
 */


get_header(); ?>
<?php if((is_page() || is_single()) && !is_front_page()): ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Inner Banner Start -->

<div class="main-box bg-gray arrow-field">
  <div class="inner_wrp"> <img src="<?php the_field('banner_image'); ?>" alt="" class="img-responsive" /> </div>
  <div class="overview-box">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
          <div class="orange-bg">
          	<ul>
            	<li class="active">Overview</li>
            </ul>
            <?php
            wp_nav_menu( array(
										'menu'    => 'Managed Cloud Products',
										'depth'             => 1
						)
								);
						?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
          <h2>
            <?php the_title(); ?>
          </h2>
          <?php if(get_field('page_title')){ ?>
          <h1>
            <?php the_field('page_title'); ?>
          </h1>
          <?php } ?>
          <div class="portfolio-panel">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
          <div class="quote-wrp">
          	<?php dynamic_sidebar( 'Page Default Sidebar' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Inner Banner End -->

<?php endwhile; wp_reset_postdata(); ?>
<?php endif;  ?>
<div class="container-full text-white">
  <div class="row row-eq-height"> 
    <!-- HIPAA Compliant Hosting Start -->
    <?php
		$the_query = new WP_Query( 'pagename=/cloud-products/managed-container-hosting/' );
		while ( $the_query->have_posts() ) :
		$the_query->the_post(); ?>
    <div class="col-md-6 bg-orange">
      <div class="p-5">
        
        <h2 class="bb">
          <?php the_title(); ?>
        </h2>
        <?php the_field('short_data'); ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-white">
        <?php esc_html_e( 'LEARN MORE', 'textdomain' ); ?>
        </a>
        
      </div>
    </div>
    <?php endwhile;
          wp_reset_postdata();
        ?>
    <!-- HIPAA Compliant Hosting End --> 
    
    <!-- HIPAA Compliant sFTP Server Start -->
    <?php
			$the_query = new WP_Query( 'pagename=/cloud-products/managed-cloud-load-balancer/' );
			while ( $the_query->have_posts() ) :
			$the_query->the_post(); 
		?>
    <div class="col-md-6 bg-cover" style="background-image: url(<?php the_field('background_image'); ?>)">
      <div class="p-5">
        
        <h2 class="bb">
          <?php the_title(); ?>
        </h2>
        <?php the_field('short_data'); ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-orange">
        <?php esc_html_e( 'LEARN MORE', 'textdomain' ); ?>
        </a>
      </div>
    </div>
    <?php endwhile;
          wp_reset_postdata();
    ?>
    <!-- HIPAA Compliant sFTP Server End --> 
  </div>
  
  
  <div class="row row-eq-height"> 
    <!-- HIPAA Compliant Cloud Drive Start -->
    <?php
		$the_query = new WP_Query( 'pagename=/cloud-products/cloud-hosting/' );
		while ( $the_query->have_posts() ) :
		$the_query->the_post(); ?>
    <div class="col-md-6" style="background-image: url(<?php the_field('background_image'); ?>)">
      <div class="p-5">
        
        <h2 class="bb">
          <?php the_title(); ?>
        </h2>
        <?php the_field('short_data'); ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-orange">
        <?php esc_html_e( 'LEARN MORE', 'textdomain' ); ?>
        </a>
        
      </div>
    </div>
    <?php endwhile;
          wp_reset_postdata();
        ?>
    <!-- HIPAA Compliant Cloud Drive End --> 
    
    <!-- HIPAA Compliant Email Start -->
    <?php
			$the_query = new WP_Query( 'pagename=/cloud-products/disaster-recovery-hosting/' );
			while ( $the_query->have_posts() ) :
			$the_query->the_post(); 
		?>
    <div class="col-md-6 bg-teal" >
      <div class="p-5">
        
        <h2 class="bb">
          <?php the_title(); ?>
        </h2>
        <?php the_field('short_data'); ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-white">
        <?php esc_html_e( 'LEARN MORE', 'textdomain' ); ?>
        </a>
      </div>
    </div>
    <?php endwhile;
          wp_reset_postdata();
    ?>
    <!-- HIPAA Compliant Email End --> 
    
  </div>
  
  
  
</div>
<?php get_footer(); ?>
