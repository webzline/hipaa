</div><!-- .content -->


<!-- Our Certifications Start -->
<div class="certifications">
  <div class="container">
   <h2>Our certifications</h2>
    <div class="certifications-panel">
      <div id="certifications-wrp" class="owl-carousel owl-theme">
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-1.png" alt="certifications-1" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-2.png" alt="certifications-2" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-3.png" alt="certifications-3" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-4.png" alt="certifications-4" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-5.png"  alt="certifications-5" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-6.png" alt="certifications-6" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-7.png"  alt="certifications-7" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-1.png" alt="certifications-1" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-2.png" alt="certifications-2" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-3.png" alt="certifications-3" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-4.png" alt="certifications-4" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-5.png"  alt="certifications-5" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-6.png" alt="certifications-6" />
        </div>
        <div class="item">
             <img src="<?php bloginfo('template_url'); ?>/images/certifications-7.png"  alt="certifications-7" />
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

<!-- Footer Start -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <ul id="sidebar">
            <?php dynamic_sidebar( 'Footer Widget 1' ); ?>
        </ul>
      </div>
      <div class="col-sm-2">
        <h2>Government</h2>
        <?php
            wp_nav_menu( array(
                'menu'    => 'Government',
                'depth'             => 1
				)
            );
        ?>
        <div class="footer-menu">
          <h2>Partners</h2>
          <?php
            wp_nav_menu( array(
									'menu'    => 'Partners',
									'depth'             => 1
					)
							);
					?>
          <ul>
            <li><img src="<?php bloginfo('template_url'); ?>/images/google.png" alt="google" /></li>
            <li><img src="<?php bloginfo('template_url'); ?>/images/microsoft.png" alt="microsoft" /></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-2">
        <h2>Certifications</h2>
        <ul>
          <li>Etica, Inc. Calif. Corp.</li>
          <li>NAICS 518210</li>
          <li>SBA 8(a) 306508</li>
          <li>CAGE 6KKB2</li>
          <li>DUNS 847209848</li>
          <li>CA DBE 42400</li>
          <li>CA SBE 6699</li>
        </ul>
      </div>
      <div class="col-sm-2">
        <h2>Contact Us</h2>        
        <div class="footer-text">
          <h4>Corporate Headquarters</h4>
          <ul>
            <li>950 Boardwalk</li>
            <li>San Marcos, CA 92078</li>
            <li>(760) 705-4022</li>
          </ul>
        </div>        
        <div class="social-panel">
          <h2>Follow Us</h2>
          <ul>
            <li><a href="https://www.facebook.com/HIPAAVault/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/HIPAAHosting" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://www.linkedin.com/company/vmracks-com---hipaa-web-hosting" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <?php dynamic_sidebar( 'Footer Widget 5' ); ?>
      </div>
      
    </div>
    <div class="footer-con">
      <p>&copy; HIPAA Vault is a trademark of Etica, Inc. 2019 - <?php echo date("Y"); ?>. All other trademarks are acknowledged.</p>
    </div>
  </div>
</footer>
<!-- Footer End --> 
<?php wp_footer(); ?>

<script>
$(document).ready(function () {
	//$('p:empty').remove();
$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
});

</script>
 
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
<?php /* <script type="text/javascript" src="https://crm.zoho.com/crm/javascript/zcga.js"> </script> */ ?>
</body>
</html>
