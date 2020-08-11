<?php 
/**
Template Name: Template - Sales Page
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
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="portfolio-panel">
          
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Inner Banner End -->

<?php endwhile; wp_reset_postdata(); ?>
<?php endif;  ?>
</div><!-- .content -->
<!-- Our Certifications Start -->
<div class="certifications">
  <div class="container-fluid">
   <h2>Our certifications</h2>
    <div class="certifications-panel">
      <div id="certifications-wrp" class="owl-carousel owl-theme">
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-1.png" alt="A logo of HIPAA compliant cloud" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-2.png" alt="A logo of GSA" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-3.png" alt="A logo of HITECH Omnibus Compliance" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-4.png" alt="A logo of HIPAA seal of compliance" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-5.png" alt="A logo of NIST" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-6.png" alt="A logo of AICPA" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-7.png" alt="A logo of SOC1,2,3" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-1.png" alt="A logo of HIPAA compliant cloud" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-2.png" alt="A logo of GSA" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-3.png" alt="A logo of HITECH Omnibus Compliance" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-4.png" alt="A logo of HIPAA seal of compliance" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-5.png" alt="A logo of NIST" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-6.png" alt="A logo of AICPA" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-7.png" alt="A logo of SOC1,2,3" />
        </div>

      </div>
      <div class="customNavigation">
        <a class="btn prev4">Previous</a>
        <a class="btn next4">Next</a>          
      </div>
    </div>
  </div>
</div>
<!-- Our Certifications End -->
<footer class="bg_wrp">
  <div class="container-fluid">
      <h2>Corporate Headquarters</h2>
      <p>334 Via Vera Cruz San Marcos CA 92078</p>
      <p>(760) 705-4022</p>
      <div class="social-wrp">
        <ul>
          <li><a href="https://www.facebook.com/VMracks" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="https://twitter.com/HIPAAHosting" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="https://www.linkedin.com/company/vmracks-com---hipaa-web-hosting" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        </ul>
     </div>
  </div>
</footer>
<!-- Footer End --> 
<?php wp_footer(); ?>


<script src="<?php bloginfo('template_url'); ?>/js/parallax.min.js"></script>

 
<script>
$(document).ready(function() { 
	  var owl = $("#testimonial-wrp");
	  owl.owlCarousel({
		  items : 1,
		  itemsDesktop : [1000,1],
		  itemsDesktopSmall : [900,1],
		  itemsTablet: [600,1],
		  itemsMobile : false,
		  autoPlay : true,
		  pagination : false,
		  loop:true,
   		  nav:true,
	  });
});
	
</script> 
<script>
$(document).ready(function() {
 
  var owl2 = $("#technology-wrp");
  owl2.owlCarousel({
      items : 4, //10 items above 1000px browser width
      itemsDesktop : [1000,4], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
  // Custom Navigation Events
  $(".next2").click(function(){
    owl2.trigger('owl.next');
  })
  $(".prev2").click(function(){
    owl2.trigger('owl.prev');
  })  
 
});
	
</script>
<script>
$(document).ready(function() {
 
  var owl3 = $("#help-wrp");
  owl3.owlCarousel({
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
 
  // Custom Navigation Events
  $(".next3").click(function(){
    owl3.trigger('owl.next');
  })
  $(".prev3").click(function(){
    owl3.trigger('owl.prev');
  })  
 
});
	
</script>
<script>
$(document).ready(function() {
 
  var owl4 = $("#certifications-wrp");
  owl4.owlCarousel({
      items : 7, //10 items above 1000px browser width
      itemsDesktop : [1000,7], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
  // Custom Navigation Events
  $(".next4").click(function(){
    owl4.trigger('owl.next');
  })
  $(".prev4").click(function(){
    owl4.trigger('owl.prev');
  })  
 
});
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}	
</script>
<script type="text/javascript" src="https://crm.zoho.com/crm/javascript/zcga.js"> </script>
</body>
</html>
