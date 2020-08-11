<!doctype html>
<html>
<head>

<title><?php	     
	    // Page or Single Post
	    if ( is_page() or is_single() ) {
	        the_title();	 
	    // Category Archive
	    } elseif ( is_category() ) {
	        echo single_cat_title('', false);	 
	    // Tag Archive
	    } elseif ( function_exists('is_tag') and function_exists('single_tag_title') and is_tag() ) {
	        printf( __('Tag: %s','vmracks'), single_tag_title('', false) );	 
		// General Archive
	    } elseif ( is_archive() and !is_post_type_archive('news')) {
	        
				printf( __('Archive: %s','vmracks'), wp_title('', false) );	 
			
	    // Search Results
	    } elseif ( is_search() ) {
	        printf( __('Search: %s','vmracks'), get_query_var('s') );
	    }	else if ( is_post_type_archive('news')) {
				printf( __('%s','vmracks'), wp_title('', false) );	
			}
	    // Insert separator for the titles above
	    if ( !is_home() and !is_404() and !is_front_page() ) {
	        echo " - ";
	    }	
		if ( is_home() ) {
	        wp_title('');
	    }	
	    // If no home page set and default posts listing
	    if ( is_home() && is_front_page() ) {
	        echo "";
	    }elseif ( !is_home() && is_front_page() ) {
	        echo " - ";
	    }     
	    // Finally the blog name
	    bloginfo('name');	 
	    ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php $fquri = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<link rel="alternate" href="<?php echo $fquri; ?>" hreflang="en-us" />
<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.png">		
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- owl carousel CSS -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/owl.theme.css">
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive-style.css" type="text/css">
<!-- Owl Carousel --> 
<?php /*<script src="/wp-content/themes/hipaavault/js/jquery.min.js"></script> */?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script> 

<?php 
	    //manual metatag for front page
	    if (is_page(48)) {
?>

<meta name="description" content="HIPAAVault provides HIPAA Compliant Hosting and Cloud Solutions. We are a Managed Service Provider with HIPAA website compliance and dedicated live support." />
<meta property="og:description" content="HIPAAVault provides HIPAA Compliant Hosting and Cloud Solutions. We are a Managed Service Provider with HIPAA website compliance and dedicated live support." />
<meta name="twitter:description" content="HIPAAVault provides HIPAA Compliant Hosting and Cloud Solutions. We are a Managed Service Provider with HIPAA website compliance and dedicated live support." />

<?php
	    }
	    //manual metatag end
?>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js"></script> 
<!-- Code snippet to speed up Google Fonts rendering: googlefonts.3perf.com -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
<link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto|Raleway" as="fetch" crossorigin="anonymous">
<script type="text/javascript" defer>
!function(e,n,t){"use strict";var o="https://fonts.googleapis.com/css?family=Roboto|Raleway",r="__3perf_googleFonts_65390";function c(e){(n.head||n.body).appendChild(e)}function a(){var e=n.createElement("link");e.href=o,e.rel="stylesheet",c(e)}function f(e){if(!n.getElementById(r)){var t=n.createElement("style");t.id=r,c(t)}n.getElementById(r).innerHTML=e}e.FontFace&&e.FontFace.prototype.hasOwnProperty("display")?(t[r]&&f(t[r]),fetch(o).then(function(e){return e.text()}).then(function(e){return e.replace(/@font-face {/g,"@font-face{font-display:swap;")}).then(function(e){return t[r]=e}).then(f).catch(a)):a()}(window,document,localStorage);
</script>
<!-- End of code snippet for Google Fonts -->

<?php wp_head(); ?>
<script type="text/javascript">
  var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode:"a96f036f1197e1ec66ae95ce0ab81739ca083d8688b929f227179989713e8b85", values:{},ready:function(){$zoho.salesiq.floatbutton.visible('visible');}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);
</script>
</head>

<!-- Global site tag (gtag.js) - Google Analytics -->

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143779642-1');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NRVS3BS');</script>
<!-- End Google Tag Manager -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NRVS3BS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
 <!-- DO NOT MODIFY -->
<script defer>
window.addEventListener('load', function(){
if(window.location.pathname.indexOf('/thank-you') != -1){
ga('send','event','form','submit','contact');
}
jQuery('#zsiq_float').click(function(){
ga('send','event','button','click','chat now');
});
});
</script>


<body <?php body_class(); ?>>
<!-- Header Start -->
<header> 
  <!-- Topber Start -->
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-3 m-logo">
          <div class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/hipaavault-logo.png" alt="<?php bloginfo('name'); ?>" /></a></div>
        </div>
        <div class="col-xs-12 col-sm-9">
          <div class="text-box">
            <div class="top-header"> 
               <span>Questions? Contact Sales:</span> 
               <span class="text">
                 <i class="fa fa-mobile" aria-hidden="true"></i> 
                 <a href="#"><strong>Sales:</strong> <span style="font-weight:300;">760-290-3460</span></a> <a href="#"><strong>Support:</strong> <span style="font-weight:300;">760-290-3477</span></a>
               </span> 
               <?php if ( !is_page_template( 'sales.php' ) ) {?> 
               <span class="text">
                 <i class="fa fa-comments-o" aria-hidden="true"></i> 
                 <a onclick="$zoho.salesiq.floatwindow.visible('show');" href="javascript:void();">Live Chat</a>
               </span>
               <span class="text">
                 <i class="fa fa-envelope-o" aria-hidden="true"></i> 
                 <a href="mailto:support@hipaavault.com" target="_blank">Email</a>
               </span>
               <?php } ?>
             </div>
            <div class="social-icon">
              <ul>
                <li><a href="https://www.facebook.com/HIPAAVault/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com/HIPAAHosting" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://www.linkedin.com/company/vmracks-com---hipaa-web-hosting" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              </ul>
            </div>
           
          </div>
          
								
        </div>
      </div>
    </div>
  </div>
  <!-- Topber End --> 
  <?php if ( !is_page_template( 'sales.php' ) ) {?>
  <!-- Menu Start -->
  <div class="main-menu" id="myHeader">
    <div class="container-fluid">
    <nav id="main-nav" class="navbar navbar-light navbar-expand-lg justify-content-between">
      <?php /*?><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button><?php */?>
      	
				<?php
            wp_nav_menu( array(
                'theme_location'    => 'main_navigation',
                'depth'             => 2,
                'container'         => 'div',
                //'container_class'   => 'collapse navbar-collapse',
                //'container_id'      => 'bs-example-navbar-collapse-1',
                //'menu_class'        => 'nav navbar-nav mr-auto',
                //'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                //'walker'            => new WP_Bootstrap_Navwalker()
								)
            );
        ?>
      	<?php /*?><?php
            wp_nav_menu( array(
                'theme_location'    => 'main_navigation_right',
                'depth'             => 0,
                'container'         => 'div',
                'menu_class'        => 'nav navbar-nav mr-0',
				)
            );
        ?><?php */?>
        
    </nav>
    </div>
  </div>
  <!-- Menu End -->
   <?php } ?>  
</header>
<!-- Header End -->	
<div class="content">
