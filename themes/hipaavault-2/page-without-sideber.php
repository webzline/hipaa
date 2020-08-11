<?php 
/**
Template Name: Template - Without Sideber
 * 
 *
 * A Full Width custom page template without sidebar.
 * @package WordPress
 */
get_header(); ?>
<?php if((is_page() || is_single()) && !is_front_page()): ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Inner Banner Start -->

<div class="main-box">
  <div class="inner_wrp">
    <?php if(get_field('banner_image')){ ?>
    <img src="<?php the_field('banner_image'); ?>" alt="" class="img-responsive" />
    <?php } ?>
  </div>
  <div class="container-fluid">
    <div class="overview-wrp">
      <div class="row">
        <div class="col-xs-12 col-md-10 col-lg-9 col-md-offset-2">
          <div class="header-inside">
            <?php if(get_field('header_icon')){ ?>
            <div class="icon-header"> <img src="<?php the_field('header_icon'); ?>" alt="" class="img-responsive" /> </div>
            <?php } ?>
            <div class="<?php if(get_field('header_icon')){ ?> col-md-9 <?php }else{ ?> col-md-12 <?php } ?>">
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
