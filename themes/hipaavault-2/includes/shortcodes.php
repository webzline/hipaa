<?php
// Add buttons for our shortcodes
function boc_add_buttons() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons_3', 'register_button');  
     add_filter('mce_buttons_4', 'register_button2');  
   }  
}

function register_button($buttons) {
   array_push($buttons, "heading","big_heading","boc_button", "checklist","highlight","boc_tooltip","accordion","tabs","big_title","feat_text","iconed_featured_text","testimonials","posts_carousel","portfolio_carousel","slider","custom_slides","text_box","bar_graphs","counters","counter_circles","clients_section","table","price_table","message","person","image_featured_text","icon","spacing", "youtube","vimeo");    
   return $buttons;
}

function register_button2($buttons) {

   global $tinymce_version;
   if(version_compare( $tinymce_version, '4018' ) >= 0) {
		array_push($buttons, "column_row_new", "column");  
   }else {
		array_push($buttons, "column_row","column");  
   }
  
   return $buttons;
}

// "do_shortcode" but without the wrapping <p> of Shortcodes
function do_shortcode_boc($content) {

	$array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
	$content = strtr($content, $array);
	$content = do_shortcode($content);
    return $content;
}

function add_plugin($plugin_array) {

   $plugin_array['heading'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['big_heading'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['boc_button'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['checklist'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['highlight'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['boc_tooltip'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['accordion'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['tabs'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['big_title'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['feat_text'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['iconed_featured_text'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['posts_carousel'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['portfolio_carousel'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['custom_slides'] = get_template_directory_uri().'/js/customcodes.js';   
   $plugin_array['slider'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['table'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['bar_graphs'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['text_box'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['counters'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['counter_circles'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['clients_section'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['price_table'] = get_template_directory_uri().'/js/customcodes.js'; 
   $plugin_array['spacing'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['message'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['testimonials'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['person'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['image_featured_text'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['icon'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['column_row_new'] = get_template_directory_uri().'/js/customcodes.js';  
   $plugin_array['row_container'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['column'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['column_row'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['youtube'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['vimeo'] = get_template_directory_uri().'/js/customcodes.js';
   return $plugin_array;
}



// Heading
add_shortcode('heading', 'shortcode_heading');
function shortcode_heading( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
			'centered' => 'yes',
			'margin_bottom' => 'no',
			'large' => 'no',
			'background' => 'no',
		), $atts);
		
	$centered = (($atts["centered"]=='yes')||($atts["centered"]=='Yes')) ? "" : 'left_';	
	$margin = (($atts["margin_bottom"]=='yes')||($atts["margin_bottom"]=='Yes')) ? "<div class='h20'></div>" : '';
	$large = (($atts["large"]=='yes')||($atts["large"]=='Yes')) ? " large" : '';
	$background = (($atts["background"]=='yes')||($atts["background"]=='Yes')) ? " title_bgr" : '';
	
	return '<h2 class="'.$centered.'title '.$large.' '.$background.'"><span>'.do_shortcode_boc($content).'</span></h2>'.$margin;
}

// Heading Big
add_shortcode('big_heading', 'shortcode_big_heading');
function shortcode_big_heading( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
			'centered' => 'no',
		), $atts);
		
	$centered = (($atts["centered"]=='yes')||($atts["centered"]=='Yes')) ? "center " : '';	
	
	return '<h2 class="'.$centered.'big_heading">'.do_shortcode_boc($content).'</h2>';
}

// Spacing
add_shortcode('spacing', 'shortcode_spacing');
function shortcode_spacing( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'margin' => 'no',
			'border' => 'no',
		), $atts);
	$margin = (($atts["margin"]=='yes')||($atts["margin"]=='Yes')) ? "<div class='h10'></div>" : '';
	$border = (($atts["border"]=='yes')||($atts["border"]=='Yes')) ? "divider_bgr" : '';
	return $margin.'<div class="h20 '.$border.'"></div>'.$margin;
}

// Message
add_shortcode('message', 'shortcode_message');
function shortcode_message( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
			'type' => 'information',
		), $atts);	
	return '<div class="'.$atts['type'].' closable">'.do_shortcode_boc($content).'</div>';
}

// Button Link
add_shortcode('button', 'shortcode_boc_button');
function shortcode_boc_button($atts, $content = null){

	$atts = shortcode_atts(
			array(
				'css_classes' => '',
				'href' => '',
				'target' => '',
			), $atts);	
	$target = ($atts['target'] ? " target='".$atts['target']."'" : '');
    return '<a href="'.$atts["href"].'" class="button '.$atts["css_classes"].'" '.$target.'>'.do_shortcode_boc($content).'</a>';  
}

// ULists
add_shortcode('checklist', 'shortcode_checklist');
function shortcode_checklist( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'type'	 => 'checked',
			'icon'	 => '',
			'margin_bottom' => 'no'
		), $atts);
		
	$margin = (($atts["margin_bottom"]=='yes')||($atts["margin_bottom"]=='Yes')) ? "<div class='h20'></div>" : '';
		
	 switch ($atts['type']){
    	case 'checked': $type = 'checked'; break;
    	case 'checked2': $type = 'checked2'; break;
    	case 'arrowed': $type = 'arrowed'; break;
    	case 'dotted': $type = 'dotted'; break;
    	case 'custom_list': $type = 'dotted'; break;
    	default : $type = 'checked'; break;
	 }

	return str_replace('<ul class="checked">', '<ul class="'.$type.'">', do_shortcode_boc($content)).$margin;
}

// Highlight
add_shortcode('highlight', 'shortcode_highlight');
function shortcode_highlight( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'dark' => 'no',
		), $atts);
	$dark = (($atts["dark"]=='yes')||($atts["dark"]=='Yes')) ? true : false;
	$content = '<strong class="hilite">'.$content.'</strong>';
	return $dark ? str_replace('class="hilite"', 'class="hilite_dark"', do_shortcode_boc($content)) : do_shortcode_boc($content);
}


// Counter
add_shortcode('counters', 'shortcode_counters');
function shortcode_counters( $atts, $content = null ) {
		
	$atts = shortcode_atts(
		array(
			'centered' => 'no',
		), $atts);
		
	$centered = (($atts["centered"]=='yes')||($atts["centered"]=='Yes')) ? 'centered_digits' : '';
	$str = '<div class="numbers_holder animationBegin '.$centered.'">';
	$str .= do_shortcode_boc($content);
	$str .= '</div>';

	$str .= '
					<script type="text/javascript">
				        
				        jQuery(".numbers_holder.animationBegin").appear({
							once: true,
							forEachVisible: function (i, e) {
								jQuery(e).data("delay", i);
							},
							appear: function () {
								var delay = 400;
			
								jQuery(this).find(".counter").each(function (i, e) {
									jQuery(e).trans(i * delay + "ms", "-delay");

									setTimeout(function(){
										end_nu = jQuery(e).find(".counter_hidden:first").attr("data-end-nu");
										jQuery(e).flipCounter("startAnimation", { end_number: end_nu }).find(".counter_desc").addClass("shown");
									}, i * delay);									
							        
							    
								});
								jQuery(this).removeClass("animationBegin");
							}
						});
				        
				        
				</script>	
	';	
	
	return $str;
}

// Counter
add_shortcode('counter_item', 'shortcode_counter_item');
function shortcode_counter_item( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'id'	 => '',
			'number' => '100',
			'title'	 => '',
		), $atts);
		
	$id = $atts['id'];
	$number = (int)$atts['number'];
	$title = $atts['title'];
	
	$str  = '<div id="counter'.$id.'" class="counter">
					<input type="hidden" class="counter_hidden" data-end-nu="'.$number.'" name="counter'.$id.'-value" value="" />
					<div class="counter_desc">'.$title.'</div>
				</div>';
	return $str;
}


// Counter Circle
add_shortcode('counter_circles', 'shortcode_counter_circles');
function shortcode_counter_circles( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
			'dark_circles' => 'no',
		), $atts);
		
	$dark_circles = (($atts["dark_circles"]=='yes')||($atts["dark_circles"]=='Yes')) ? true : false;	
	$str = '<div class="circ_numbers_holder animationBegin '.($dark_circles ? "dark_circles" : "").'">';
	$str .= do_shortcode_boc($content);
	$str .= '</div>';

	$color = "#07bee5";
	if(($aqua_main_color=get_theme_mod('aqua_main_color'))!="#07bee5"){
		if($aqua_main_color){
			$color = $aqua_main_color;
		}
	}
	
	$str .= '
			<script>
					var opts = {
					  lines: 1, // The number of lines to draw
					  angle: 0.49, // The length of each line
					  lineWidth: 0.05, // The line thickness
					  colorStart: "#ffffff",   // Colors
					  colorStop: "'.$color.'",    // just experiment with them
					  strokeColor: "'.($dark_circles ? "#444444" : "#f5f5f5").'",   // to see which ones work best for you
					  shadowColor: "'.($dark_circles ? "#333" : "#eeeeee").'",
					  generateGradient: true
					};
					
					 jQuery(".circ_numbers_holder.animationBegin").appear({
							once: true,
							forEachVisible: function (i, e) {
								jQuery(e).data("delay", i);
							},
							appear: function () {
								var delay = 800,
									stagger = 1000,
									sequential_delay = stagger * parseInt(jQuery(this).data("delay")) || 0;
			
								jQuery(this).find(".circ_counter").each(function (i, e) {
									jQuery(e).trans(i * delay + sequential_delay + "ms", "-delay");
									
									setTimeout(function(){
										end_nu = parseInt(jQuery(e).find("canvas:first").attr("data-end-nu"));
									
										jQuery(e).find("canvas:first").gauge(opts, end_nu);
										jQuery(e).find(".counter_percent_sign:first").addClass("shown")
										
									}, i * delay + sequential_delay);
									
							       
							    
								});
								jQuery(this).removeClass("animationBegin");
							}
						});
					
					
					
					
					  jQuery.fn.gauge = function(opts, set_to) {
						  this.each(function() {
							var $this = jQuery(this),
								data = $this.data();
					
							if (data.gauge) {
							//  data.gauge.stop();
							  delete data.gauge;
							}
							if (opts !== false) {
							  data.gauge = new Donut(this).setOptions(opts);	  		  
							  data.gauge.setTextField(document.getElementById($this.next(".circ_counter_text_holder").children(".circ_counter_text").attr("id")));
							  
							  data.gauge.maxValue = 100; // set max gauge value
							  data.gauge.animationSpeed = 30; // set animation speed (32 is default value)
							  data.gauge.set(set_to); // set actual value
							
							}
						  });
						  
						  return this;
						};
					  
					  
					  
				</script>
	';	
	
	return $str;
}

// Counter Circle Item
add_shortcode('counter_circle_item', 'shortcode_counter_circle_item');
function shortcode_counter_circle_item( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'id'	 => '',
			'number' => '100',
			'title'	 => '',
		), $atts);
		
	$id = $atts['id'];
	$number = (int)$atts['number'];
	$title = $atts['title'];
	
	
	$str  = '	<div class="circ_counter">
					<canvas width=126 height=126  data-end-nu="'.$number.'"></canvas>
					<div class="circ_counter_text_holder"><span class="circ_counter_text"  id="circ_counter_text'.$id.'"></span><span class="counter_percent_sign">%</span></div>
					<div class="circ_counter_desc">'.$title.'</div>
				</div>';

	return $str;
}



// Accordion
add_shortcode('accordion', 'shortcode_accordion');
function shortcode_accordion( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'title' => '',
			'is_open' => 'no',
			'rounded' => 'no'
		), $atts);
	$is_open = (($atts["is_open"]=='yes')||($atts["is_open"]=='Yes')) ? ' acc_is_open' : '';
	$rounded = (($atts["rounded"]=='yes')||($atts["rounded"]=='Yes')) ? ' rounded' : '';
	
	$content = '<div class="acc_item '.$rounded.'"><h4 class="accordion"><span class="acc_control'.$is_open.'"></span><span class="acc_heading">'.$atts["title"].'</span></h4><div class="accordion_content">'.do_shortcode_boc($content).'</div></div>';
	return $content;
}


// Tooltip
add_shortcode('tooltip', 'shortcode_boc_tooltip');
function shortcode_boc_tooltip( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'title' => '',
		), $atts);
	$content = '<span class="tooltipsy" original-title="'.$atts['title'].'">'.do_shortcode_boc($content).'</span>';
	return $content;
}


// Featured Text
add_shortcode('feat_text', 'shortcode_feat_text');
function shortcode_feat_text( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'title' => '',
			'icon'	=> '',
			'href'	=> '',
			'type'	=> '',
		), $atts);
	
	$link = '';
	$add_link = false;
	if(isset($atts['href']) && $atts['href']){
		$link = '<a href="'.$atts['href'].'">';
		$add_link = true;
	}
	
	if(isset($atts['type']) && $atts['type']){
		$type = (int)$atts['type'];
		if(!$type){
			$type=1;
		}
	}
		
	$content = '<div class="section_featured_texts type'.$type.' animationStart">'.($add_link ? $link : '').'<div class="icon_holder"><div class="icon_bgr"></div><div class="icon_center"><i class="icon '.$atts['icon'].'"></i></div></div>'.($add_link ? '</a>' : '').'<h3>'.($add_link ? $link : '').$atts['title'].($add_link ? '</a>' : '').'</h3><p>'.do_shortcode_boc($content).'</p></div>';
	return $content;
}


// Iconed Featured Text 
add_shortcode('iconed_featured_text', 'shortcode_iconed_featured_text');
function shortcode_iconed_featured_text( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'title' => '',
			'href'	=> '',
			'icon'	=> '',
			'icon_solid' => '',
			'icon_color' => 'dark',
		), $atts);
	
	$icon_solid = (($atts["icon_solid"]=='yes')||($atts["icon_solid"]=='Yes')) ? true : false;
	
	$link = '';
	$add_link = false;
	if(isset($atts['href']) && $atts['href']){
		$link = '<a href="'.$atts['href'].'">';
		$add_link = true;
	}
		
	$content = '<div class="iconed_featured_text"><span class="icon_feat '.($icon_solid ? ' icon_solid': '').' '.$atts["icon_color"].'"><i class="icon '.$atts['icon'].'"></i></span><h3>'.($add_link ? $link : '').$atts['title'].($add_link ? '</a>' : '').'</h3><p class="iconed_featured_text_p">'.do_shortcode_boc($content).'</p></div>';
	return $content;
}


add_shortcode('image_featured_text_holder', 'shortcode_image_featured_text_holder');
function shortcode_image_featured_text_holder( $atts, $content = null ) {

	return '<div class="image_featured_text_holder">'.do_shortcode_boc($content).'</div>';
}

add_shortcode('image_featured_text_holder_row', 'shortcode_image_featured_text_holder_row');
function shortcode_image_featured_text_holder_row( $atts, $content = null ) {

	return '<div class="image_featured_text_holder_row">'.do_shortcode_boc($content).'</div>';
}

// Imaged Featured Text 
add_shortcode('image_featured_text', 'shortcode_image_featured_text');
function shortcode_image_featured_text( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'image_url'	=> '',
			'author'	=> '',
			'position'	=> '',
		), $atts);

	$content = '<div class="image_featured_text">
					<img src="'.$atts['image_url'].'" class="image"/>
					<div class="text">'.do_shortcode_boc($content).'</div>
					<div class="author_position">
						<span class="auth">'.$atts['author'].'</span> / <span class="pos">'.$atts['position'].'</span>
					</div>
				</div>';
	return $content;
}


// Tabs
add_shortcode('tabs', 'shortcode_tabs');
function shortcode_tabs( $atts, $content = null ) {
	
	$atts['type'] = (isset($atts['type'])&&$atts['type']) ? $atts['type'] : 'horizontal';
	$atts['class'] = (isset($atts['class'])&&$atts['class']) ? $atts['class'] : '';
	

	$str = '
	<!--New Tabs-->
	<div class="newtabs '.$atts['type'].'">
		<ul class="resp-tabs-list '.$atts['class'].'">';
		
	foreach ($atts as $key => $tab) {
		if ($key!='type' && $key!='class'){
			$str .= '<li>' . do_shortcode_boc($tab) . '</li>';
		}
	}	
	
	$str .= '
		</ul>
		<div class="resp-tabs-container">
	';
	
	$str .= do_shortcode_boc($content);
	
	$str .= '</div>
			</div>';
		
	return $str;	

	
}

// Tab
add_shortcode('tab', 'shortcode_tab');
function shortcode_tab( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'title'	=> '',
			'icon'	=> '',
		), $atts);	
	
	return '<div class="single_tab_div" rel-title="'.$atts['title'].'" rel-icon="'.$atts['icon'].'">' . do_shortcode_boc($content) . '</div>';	
	
}

// Section Big Title
add_shortcode('big_title', 'shortcode_big_title');
function shortcode_big_title( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'small_margin'	=> '',
		), $atts);	
		
	$atts["small_margin"] = isset($atts["small_margin"]) ? $atts["small_margin"] : false;
	$small_margin = (($atts["small_margin"]=='yes')||($atts["small_margin"]=='Yes')) ? ' section_big_no_m' : '';  
	
//	$content = str_replace("<p>", "", $content);
//	$content = str_replace("</p>", "", $content);
	return '<div class="section_big_title '.$small_margin.'">' . do_shortcode_boc($content) . '</div>';	
	
}



// Row
add_shortcode('row_container', 'shortcode_row_container');
function shortcode_row_container( $atts, $content = null ) {

	extract(shortcode_atts(
		array(
        'full_width' => 'no',
		'dark'		=> 'no',
		'padded' 	=> 'yes',
		'bgr_url'  		=> '',
		'bgr_parallax' => 'no',
		'css_class' => '',
		'start_now' => '',
		), $atts));
    
	$full_width = (($full_width=='yes')||($full_width=='Yes')) ? true : false;
	$dark = (($dark=='yes')||($dark=='Yes')) ? true : false;
	$padded = (($padded=='yes')||($padded=='Yes')) ? true : false;
	$bgr_exists = $bgr_url ? true : false;
	$bgr_parallax = (($bgr_parallax=='yes')||($bgr_parallax=='Yes')) ? true : false;
	$start_now = (($start_now=='yes')||($start_now=='Yes')) ? true : false;
		
    $str = '<!-- Container Row -->'.
    ($full_width ? '<div '.($bgr_parallax ? ' data-stellar-background-ratio="0.5"' : '').' class="full_container '.($bgr_parallax ? 'parallax_bgr' : '').' '.($padded ? '' : 'no_padding').' '.($bgr_exists ? "no_border_container" : "").'"' .($bgr_exists ? ' style="background:url('.$bgr_url.') center center no-repeat; '.($bgr_parallax ? 'background-attachment: fixed; background-size: cover;' : '').'"' : '').'>' : '').'<div class="container animationStart '.($start_now ? 'startNow' : '').'">
		<div class="row '.$css_class.' '.($padded ? '' : 'no_margin').' '.($dark ? 'dark_container_white_text' : '').'">
			<div class="sixteen columns">
			'. do_shortcode_boc($content) .'
			</div>			
    	</div>
	</div>
	'.($full_width ? '</div>' : '').
	'<!-- Container Row :: END -->
	';

    return $str;
}


// Columns
add_shortcode('column', 'shortcode_column');
function shortcode_column( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
        'width' => 'sixteen columns',
        'position' => '',
        'custom_class' => ''
        ), $atts);
        
    switch ($atts['width']){
    	case 'full':
    	
    	case 'sixteen columns':	
    		$width = "sixteen columns";
    		break;
    	
        case "3/4" :
        	$width = "twelve columns";
        	break; 
        	
    	case "1/2":
    		$width = "eight columns";
    		break;

        case "1/3" :
        	$width = "column one-third";
        	break;

        case "2/3" :
        	$width = "column two-thirds";
       		break;

        case "1/4" :
        	$width = "four columns";
        	break;   
			
        case "1/5" :
        	$width = "column one-fifth";
        	break;   	
        		    	
        case "one" : $width = "one columns"; break;
        case "two" : $width = "two columns"; break;
        case "three" : $width = "three columns"; break;
        case "four" : $width = "four columns"; break;
        case "five" : $width = "five columns"; break;
        case "six" : $width = "six columns"; break;
        case "seven" : $width = "seven columns"; break;
        case "eight" : $width = "eight columns"; break;
        case "nine" : $width = "nine columns"; break;
        case "ten" : $width = "ten columns"; break;
        case "eleven" : $width = "eleven columns"; break;
        case "twelve" : $width = "twelve columns"; break;
        case "thirteen" : $width = "thirteen columns"; break;
        case "fourteen" : $width = "fourteen columns"; break;
        case "fifteen" : $width = "fifteen columns"; break;
        case "sixteen" : $width = "sixteen columns"; break;        	
        	
        	
    	default :
        	$width = "sixteen columns";
    }   
    
	switch ($atts['position']) {
        case "last" :
	        $position = "omega";
	        break;

        case "center" :
	        $position = "alpha omega";
	        break;

        case "" :
	        $position = "";
	        break;

        case "first" :
	        $position = "alpha";
	        break;
        default :
	        $position = 'alpha';
    }
        
    $content ='<div class="'.$width.' '.$atts["custom_class"].' '. $position.'">'.do_shortcode_boc($content).'</div>';
    
    if($atts['position']=='last'){
    	$content .= '<br class="h10 clear"/>';
    } 
    
    return $content;
}




// Testimonials
add_shortcode('testimonials', 'shortcode_testimonials');
function shortcode_testimonials($atts, $content = null) {

	$atts = shortcode_atts(
		array(
        'heading' => '',
		'auto_scroll' => 'yes',
        ), $atts);
	
    $auto_scroll = (($atts["auto_scroll"]=='yes')||($atts["auto_scroll"]=='Yes')) ? ' auto_scroll' : '';    
        
    $str='';        
	$str .= '<h2 class="left_title"><span>'.$atts['heading'].'</span></h2>';
	$str .= '<div class="h20"></div>';
	$str .= '<!-- Testimonials -->
				<div class="testimonials">
					<ul class="testimonials_carousel'.$auto_scroll.'">';
	$str .= do_shortcode_boc($content);
	$str .= '</ul>
				</div>
				<!-- Testimonials::END -->';
	return $str;
}


// Testimonial
add_shortcode('testimonial', 'shortcode_testimonial');
function shortcode_testimonial($atts, $content = null) {
	
	$atts = shortcode_atts(
		array(
        'author' => '',
        'author_title' => '',
		'width' => '1/2',
		'picture_url' => ''
        ), $atts);
        		
        
    switch ($atts['width']){
    	case 'full':
    	
    	case 'sixteen columns':	
    		$width = "sixteen columns";
    		break;
    	
        case "3/4" :
        	$width = "twelve columns";
        	break; 
        	
    	case "1/2":
    		$width = "eight columns";
    		break;

        case "1/3" :
        	$width = "column one-third";
        	break;

        case "2/3" :
        	$width = "column two-thirds";
       		break;

        case "1/4" :
        	$width = "four columns";
        	break;   	
        		    	
        case "one" : $width = "one columns"; break;
        case "two" : $width = "two columns"; break;
        case "three" : $width = "three columns"; break;
        case "four" : $width = "four columns"; break;
        case "five" : $width = "five columns"; break;
        case "six" : $width = "six columns"; break;
        case "seven" : $width = "seven columns"; break;
        case "eight" : $width = "eight columns"; break;
        case "nine" : $width = "nine columns"; break;
        case "ten" : $width = "ten columns"; break;
        case "eleven" : $width = "eleven columns"; break;
        case "twelve" : $width = "twelve columns"; break;
        case "thirteen" : $width = "thirteen columns"; break;
        case "fourteen" : $width = "fourteen columns"; break;
        case "fifteen" : $width = "fifteen columns"; break;
        case "sixteen" : $width = "sixteen columns"; break;        	
        	        	
    	default :
        	$width = "eight columns";
    }           
        
        
    $img = $atts['picture_url'] ? $atts['picture_url'] : '';
	$str = '';
	$str .= '<li class="'.$width.'" style="margin-left: 2px;">
							<div class="testimonial_quote">
	                            <div class="quote_content">
	                                <p>'.$content.'</p>
	                                <span class="quote_arrow"></span>
	                            </div>
	                            <div class="quote_author '.($img?'quote_author_img':'').'">'.($img?'<img src="'.$img.'">':'').'<div class="icon_testimonial">'.$atts['author'].'</div><span class="quote_author_description">'.$atts['author_title'].'</span>
	                            </div>
	                        </div>
	                    </li>';

	return $str;
}



// Youtube shortcode
add_shortcode('youtube', 'shortcode_youtube');
function shortcode_youtube($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 600,
			'height' => 360
		), $atts);
	
		return '<div class="video-shortcode video_max_scale"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . (strpos($atts['id'],'?') ? '&wmode=opaque' : '?wmode=opaque'). '" frameborder="0" allowfullscreen></iframe></div>';
}
	
// Vimeo shortcode
add_shortcode('vimeo', 'shortcode_vimeo');
function shortcode_vimeo($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 600,
			'height' => 360
		), $atts);
	
		return '<div class="video-shortcode video_max_scale"><iframe src="http://player.vimeo.com/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div>';
}


// Slider
add_shortcode('slider', 'shortcode_slider');
function shortcode_slider($atts, $content = null) {

	$atts = shortcode_atts(
		array(
			'animation' => '',
			'speed' => '7000',
			
		), $atts);
		
	$animation = $atts['animation'] ? $atts['animation'] : '';
	$speed = $atts['speed'] ? $atts['speed'] : 7000;
	
	$str = '';
	$str .= '<div class="flexslider" rel="'.$animation.'" rel-speed="'.$speed.'">';
	$str .= '<ul class="slides">';
	$str .= do_shortcode_boc($content);
	$str .= '</ul>';
	$str .= '</div>';

	return $str;
}

// Slide
add_shortcode('slide', 'shortcode_slide');
function shortcode_slide($atts, $content = null) {
	
	$atts = shortcode_atts(
		array(
			'title' => '',
			'type'  => '',
			'link'	=> ''
		), $atts);
		
	$title = $atts['title'] ? " title='".$atts['title']."'" : '';
	$str = '';
	if(isset($atts['type']) && $atts['type'] == 'video') {
		$str .= '<li class="video">';
	} else {
		$str .= '<li class="pic">';
	}
	if($atts['link']):
	$str .= '<a href="'.$atts['link'].'"'.$title.' rel="prettyPhoto[gal]">';
	endif;
	if(isset($atts['type']) && $atts['type'] == 'video') {
		$str .= $content;
	} else {
		$str .= '<img src="'.$content.'" alt="" /><span class="img_overlay_zoom"></span>';
	}
	if($atts['link']):
	$str .= '</a>';
	endif;
	$str .= '</li>';

	return $str;
}


add_shortcode('posts_carousel', 'shortcode_posts_carousel');
function shortcode_posts_carousel($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'heading' => 'Latest Posts',
			'light_heading' => 'no',
			'large_heading' => 'no',
			'display_type' => 1,
			'post_type'=> 'post',
			'show_pic'=>'yes',
			'show_read_more'=>'no',
			'category_slug'=> '',
			'centered_heading' => 'yes',
			'heading_bottom_margin' => 'yes',
			'order_by'=> 'date',
			'order' => 'DESC',
			'limit' => 10,
			'show_date' => "yes",
			'excerpt' => "yes",
			'excerpt_char_limit' => 64,
		/*	'width' => "four columns",*/
			'exclude_current' =>'yes',
			'scroll_by'	=> 2,
		), $atts));
	
	$light_heading = (($light_heading=='yes')||($light_heading=='Yes')) ? true : false;	
	$large_heading = (($large_heading=='yes')||($large_heading=='Yes')) ? true : false;
	$show_pic = (($show_pic=='yes')||($show_pic=='Yes')) ? true : false;	
	$show_read_more = (($show_read_more=='yes')||($show_read_more=='Yes')) ? true : false;	
	$show_date = (($show_date=='yes')||($show_date=='Yes')) ? true : false;	
	$show_excerpt = (($excerpt=='yes')||($excerpt=='Yes')) ? true : false;	
	$centered_heading = (($centered_heading=='yes')||($centered_heading=='Yes')) ? true : false;	
	$heading_bottom_margin = (($heading_bottom_margin=='yes')||($heading_bottom_margin=='Yes')) ? true : false;	
	
	$display_type = (int)$display_type;
	if(!$display_type){ 
		$display_type = 1;
	}
	$portfolio_style = 'type'.$display_type;

	
	$exclude_post = 0;
	if(($atts["exclude_current"]=='yes')||($atts["exclude_current"]=='Yes')){
		$exclude_post = get_the_ID();
	}	
	
	$wp_query = new WP_Query(
	    array(
	        'post_type' => array($post_type),
	    	'category_name' => ($category_slug ? $category_slug : null),  
	    	'orderby'	=> $order_by,
	    	'order'		=> $order,
	        'showposts' => $limit,
	    	'post__not_in' => array($exclude_post),
	        )
	    );
 	$str = '';

	if ( $wp_query->have_posts() ):
	 	
		// generate checksum of $atts array
		$carousel_id = md5(serialize($atts));
	  	
		$str = (!$show_pic ? "<style>.carousel_section_".$carousel_id." .jcarousel-prev-horizontal, .carousel_section_".$carousel_id." .jcarousel-next-horizontal{ top: -55px; }</style>" : "").'
		  	<h2 class="'.(!$centered_heading ? 'left_' : '').'title '.($light_heading ? 'light_heading' : '').' '.($large_heading ? 'large_heading' : '').'"><span>'.$heading.'</span></h2>
			<div class="clear h20"></div>
	  		<div class="carousel_section carousel_section_'.$carousel_id.' section_featured_posts" '.(!$show_pic ? "style=\"margin-top: -10px;\"" : "").'>
				<ul id="posts_carousel_'.$carousel_id.'">';
	  	
	    while( $wp_query->have_posts() ) : $wp_query->the_post();
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($wp_query->post->ID), 'portfolio-medium'); 
			$excerpt = get_the_excerpt();
			$short_excerpt = limitString($excerpt,$excerpt_char_limit);
			$str .='<li class="four columns '.($heading_bottom_margin ? 'margined_top' : '').'">';
			$id = $wp_query->post->ID;

			if((( function_exists( 'get_post_format' ) && get_post_format( $wp_query->post->ID ) != 'video')) && ($show_pic)){
				$str .='<div class="pic"><a href="'. get_permalink().'">'.get_the_post_thumbnail($wp_query->post->ID,'portfolio-medium').'<div class="img_overlay_zoom"><span class="icon_plus"></span></div></a></div>'; 
			}
			// IF Post type is Video 
			elseif ((( function_exists( 'get_post_format' ) && get_post_format( $wp_query->post->ID ) == 'video')  ) && ($show_pic)) {	
				$str .='<div class="pic"><a href="'. get_permalink().'">'.get_the_post_thumbnail($wp_query->post->ID,'portfolio-medium').'<div class="img_overlay_zoom"><span class="icon_plus"></span></div></a></div>';
														
			} // IF Post type is Video :: END 

			$str .= ($show_date ? '<div class="small_post_list_left">
									<div class="small_day">'.get_the_date('j').'</div>
									<div class="small_month">'.get_the_date('M').'</div>
								</div>' : '');

			$str .= ($show_date ? '<div class="small_post_list_right">' : '');			
			
			$str .='<h4><a href="'. get_permalink().'">'.get_the_title().'</a></h4>';
			$str .= ($show_excerpt ? '<p>'.$short_excerpt.'</p>': '');
			$str .= ($show_read_more ? '<a href="'. get_permalink().'" class=\'more-link\'>'.__('Read more','vmracks').'</a>' : '');			
			$str .= ($show_date ? '</div>' : '');

			$str .='</li>';
	    endwhile;  // close the Loop
	            
	    $str .='</ul></div>
	            
	            		<script type="text/javascript">
																			
							jQuery(document).ready(function($) {							
								$("#posts_carousel_'.$carousel_id.'").jcarousel({
								   	scroll: ($(window).width() > 768 ? '.$scroll_by.' : 1),
								   	easing: "easeInOutExpo",
								   	animation: 700
								});
							});
				
							// Reload carousels on window resize to scroll only 1 item if viewport is small if Responsive Mode is enabled				   
						   jQuery(window).resize(function() {
								   var el = jQuery("#posts_carousel_'.$carousel_id.'"), carousel = el.data("jcarousel"), win_width = jQuery(window).width();									   
								   var visibleItems = (win_width > 768 ? '.$scroll_by.' : 1);
								   carousel.options.visible = visibleItems;
								   carousel.options.scroll = visibleItems;
								   carousel.reload();
							}); 
						</script>
						<!-- Posts Carousel :: END -->	            
	            ';
	            
	            endif;
	            wp_reset_postdata();
	            return $str;
}


// Portfolio Items
add_shortcode('portfolio_carousel', 'shortcode_portfolio_carousel');
function shortcode_portfolio_carousel($atts, $content = null) {
	
		extract(shortcode_atts(
			array(
				'heading' => __("Portfolio Items", "vmracks"),
				'display_type' => 1,
				'max_items' => (isset($atts['limit']) ? (int)$atts['limit'] : 10),
				'order_by'=> 'date',
				'category_name' => '',
				'centered_heading' => 'yes',
				
			), $atts));
	
		$projects = get_portfolio_items($max_items, $order_by, $category_name); 
		wp_reset_query();
		
		$str = '';
		
		$display_type = (int)$display_type;
		if(!$display_type){ 
			$display_type = 1;
		}
		$portfolio_style = 'type'.$display_type;
		$centered_heading = (($centered_heading=='yes')||($centered_heading=='Yes')) ? true : false;	
			
		if($projects->have_posts()){
		
			$carousel_id = md5(serialize($atts));
		
			$str.='	
			<div class="info_block animationStart">
				<h2 class="'.(!$centered_heading ? 'left_' : '').'title"><span>'.$heading.'</span></h2>
				<div class="carousel_section">
					<ul id="portfolio_carousel_'.$carousel_id.'">';
						while($projects->have_posts()): $projects->the_post(); 
						if(has_post_thumbnail()): 
						
							$taxonomy = 'portfolio_category';
							$terms = get_the_terms( $projects->post->ID , $taxonomy );
							$cats = array();
							
							if (! empty( $terms ) ) :
								foreach ( $terms as $term ) {
									
									$link = get_term_link( $term, $taxonomy );
									if ( !is_wp_error( $link ) )
										$cats[] = $term->name;
								}
							endif;
								
							$str.=	
								'
								<li class="one-third column info_item">
									<a href="'.get_permalink().'" title="" class="pic_info_link_'.$portfolio_style.'">
										<div class="pic_info '.$portfolio_style.'">
											<div class="pic_holder"><div class="plus_overlay"></div><div class="plus_overlay_icon"></div>'.get_the_post_thumbnail($projects->post->ID, 'portfolio-medium').'<div class="img_overlay_icon"><span class="portfolio_icon icon_'.getPortfolioItemIcon($projects->post->ID).'"></span></div></div>
											<div class="info_overlay">
												<div class="info_overlay_padding">
													<div class="info_desc">
														<span class="portfolio_icon icon_'.getPortfolioItemIcon($projects->post->ID).'"></span>
														<h3>'.get_the_title().'</h3>
														<p>'.implode(' / ', $cats).'</p>
													</div>
												</div>
											</div>
										</div>
									</a>
								</li>
								';
							
							
						endif; endwhile;
						$str.='
					</ul>
				</div>
			</div>

			<div class="h20 clear"></div>
						
			<script type="text/javascript">
				jQuery(document).ready(function() {				
					jQuery("#portfolio_carousel_'.$carousel_id.'").jcarousel({
						scroll: (jQuery(window).width() > 768 ? 3 : 1),
						easing: "easeInOutExpo",
						animation: 700
					});
				});	
				
				
				// Reload carousels on window resize to scroll only 1 item if viewport is small
				jQuery(window).resize(function() {
					 var el = jQuery("#portfolio_carousel_'.$carousel_id.'"), carousel = el.data("jcarousel"), win_width = jQuery(window).width();
					   var visibleItems = (win_width > 768 ? 3 : 1);
					   carousel.options.visible = visibleItems;
					   carousel.options.scroll = visibleItems;
					   carousel.reload();
				});
			</script>';
		}
		
		return $str;

}




// Person
add_shortcode('person', 'shortcode_person');
function shortcode_person($atts, $content = null) {
	
	extract(shortcode_atts(
		array(
			'picture_url' => '',
			'circled' => 'yes',
			'link' => '',
			'name'=> '',
			'title' => '',
			'description'=>'',
			'twitter' => '',
			'facebook'=> '',
			'googleplus'=>'',
			'linkedin'=>'',
			'pinterest'=>'',
			
		), $atts));
				
	$circled = (($circled=='yes')||($circled=='Yes')) ? true : false;
	$str='	<div class="team_block_content animationStart">
				<div class="pic">
					'.($link?'<a href="'.$link.'">':'').'
					<div class="team_image '.(!$circled ? 'boxed' : '').'" style="background-image: url('.( $picture_url ? $picture_url : get_template_directory_uri() .'/images/user.png').');">
						<img src="'.( $picture_url ? $picture_url : get_template_directory_uri() .'/images/user.png').'">
					</div>
					'.($link?'</a>':'').'
					
					
					<div class="team_block">
						<h4>'.($link?'<a href="'.$link.'">':'').$name.($link?'</a>':'').'</h4>
						<p class="team_desc">'.$title.'</p>
						<p class="team_text">'.$description.'</p>
					'.($twitter ? '<a target="_blank" href="'.$twitter.'" class="header_soc_twitter" title="Twitter">Twitter</a>': '').'
					'.($facebook ? '<a target="_blank" href="'.$facebook.'" class="header_soc_facebook" title="Facebook">Facebook</a>': '').'
					'.($googleplus ? '<a target="_blank" href="'.$googleplus.'" class="header_soc_google" title="Google+">Google+</a>': '').'
					'.($linkedin ? '<a target="_blank" href="'.$linkedin.'" class="header_soc_linkedin" title="LinkedIn">LinkedIn</a>': '').'
					'.($pinterest ? '<a target="_blank" href="'.$pinterest.'" class="header_soc_pinterest" title="Pinterest">Pinterest</a>': '').'
					</div>
				</div>
			</div>
		';

	return $str;
}

// Icon
add_shortcode('icon', 'shortcode_icon');
function shortcode_icon($atts, $content = null) {
	
	extract(shortcode_atts(
		array(
			'icon' => 'thumbs-up',
			'color'=> '',		
			'size'=> '',
			'icon_solid' => 'no',
		), $atts));
	
	$icon_solid = (($icon_solid=='yes')||($icon_solid=='Yes')) ? true : false;
	$str='<div class="shortcode_icon '.$size.' '.$color.' '.($icon_solid ? ' shortcode_icon_solid': 'shortcode_icon_simple').'"><i class="icon '.$icon.'"></i></div>';
	return $str;
}



// Clients Section
add_shortcode('clients_section', 'shortcode_clients_section');
function shortcode_clients_section($atts, $content = null) {
	
	extract(shortcode_atts(
		array(
			'heading' => '',
			'subheading'=> '',		
			'text'=> '',
		), $atts));
			
	$str='<div class="clients_section">	
			<div class="five columns client_info_intro alpha">
				<h1>'.$heading.'</h1>
				<h2>'.$subheading.'</h2>
				'.$text.'
			</div>
			<div class="ten columns client_info_holder animationStart omega">				
				'.do_shortcode_boc($content).'
			</div>
			<div class="clear"></div>
		</div>';
	return $str;
}

// Clients Section Logo
add_shortcode('logo', 'shortcode_logo');
function shortcode_logo($atts, $content = null) {
	
	extract(shortcode_atts(
		array(
			'img_url' => '',
			'text'=> '',
			'href'=>''
		), $atts));
				
	
	$str= ($img_url ? '<div class="three columns client_info">
			<a href="'.$href.'" target="_blank" class="tooltipsy" original-title="'.($text ? $text : '').'"><img src="'.$img_url.'"></a>
		  </div>': '');
	
	return $str;
}





// Price table
add_shortcode('price_table', 'shortcode_price_table');
function shortcode_price_table($atts, $content = null) {

	$atts = shortcode_atts(
		array(
		'columns' => 3
        ), $atts);
		
	$str = '';
	$str .= '<div class="row price_table_holder col_'.$atts['columns'].'">';
	$str .= do_shortcode_boc($content);
	$str .= '</div>';

	return $str;
}


// Price column
add_shortcode('price_column', 'shortcode_price_column');
function shortcode_price_column($atts, $content = null) {

	$atts = shortcode_atts(
		array(
		'title' => '',
		'type'  => '',
        ), $atts);
		
	$featured_class = '';
	if($atts['type'] == 'featured'){
		$featured_class = 'price_column_featured';
	}
	
	$str = '<div class="price_column '.$featured_class.'">';
	$str .= '<ul>';
	if($atts['title']){
		$str .= '<li class="price_column_title">'.$atts['title'].'</li>';
	}
	$str .= do_shortcode_boc($content);
	$str .= '</ul>';
	$str .= '</div>';

	return $str;
}


// Price Amount
add_shortcode('price_amount', 'shortcode_price_amount');
function shortcode_price_amount($atts, $content = null) {
	$str = '';
	$str .= '<li class="price_amount">';
	$str .= do_shortcode_boc($content);
	$str .= '</li>';

	return $str;
}

// Price Description
add_shortcode('price_desc', 'shortcode_price_desc');
function shortcode_price_desc($atts, $content = null) {
	$str = '';
	$str .= '<li class="price_desc">';
	$str .= do_shortcode_boc($content);
	$str .= '</li>';

	return $str;
}


// Price Footer
add_shortcode('price_footer', 'shortcode_price_footer');
	function shortcode_price_footer($atts, $content = null) {
		$str = '';
		$str .= '<li class="price_footer">';
		$str .= do_shortcode_boc($content);
		$str .= '</li>';

		return $str;
	}
	
	
	
	
	
	
// Custom Slides
add_shortcode('custom_slides', 'shortcode_custom_slides');
	function shortcode_custom_slides($atts, $content = null) {
	
	extract(shortcode_atts(
		array(
        'heading' => '',
        'height' => '500',
		'auto_scroll' => 'yes',
		'auto_time' => '5',
		'icon_type' => 1
        ), $atts));
	
	$auto_scroll = (($auto_scroll=='yes')||($auto_scroll=='Yes')) ? true : false;	
	$height = (int)$height;
	if(!$height){
		$height = 500;
	}

	$auto_time = (int)$auto_time;
	if(!$auto_time){
		$auto_time = 5;
	}
	$str = '';
	$str .= '<div class="custom_slides icon_type'.$icon_type.'" data-height="'.$height.'" data-auto="'.($auto_scroll?'1':'0').'"  data-time="'.$auto_time.'" data-unique_id="'.rand(1,10000).'">';
	$str .= do_shortcode_boc($content);
	$str .= '</div>';	

	
	return $str;		
}	
	

// Custom Slides Holder
add_shortcode('custom_slides_holder', 'shortcode_custom_slides_holder');
function shortcode_custom_slides_holder($atts, $content = null) {
	
	$str = '<div class="custom_slides_holder">';		
	$str .= do_shortcode_boc($content);
	$str .= '</div>';
	$str .= '<h3 class="custom_slides_title"></h3>';	

	return $str;
}
	
// Custom Slides Controls
add_shortcode('custom_slides_controls', 'shortcode_custom_slides_controls');
function shortcode_custom_slides_controls($atts, $content = null) {
	
	$str = '<div class="custom_slides_controls_holder">
				<ul class="custom_slides_controls">';		
	$str .= do_shortcode_boc($content);
	$str .= '	</ul>
			</div>';				

	return $str;
}	
	
// Custom Slide
add_shortcode('custom_slide', 'shortcode_custom_slide');
function shortcode_custom_slide($atts, $content = null) {
	
	$atts = shortcode_atts(
		array(
        'id' => '',
		'picture_url' => ''
        ), $atts);     
        
        
    $img = $atts['picture_url'] ? $atts['picture_url'] : '';
	$str = '';
	$str .= '<div class="custom_slide hidden" id="custom_slide'.$atts['id'].'">'.do_shortcode_boc($content).'</div>';
				

	return $str;
}	

// Custom Slide Button
add_shortcode('custom_slide_button', 'shortcode_custom_slide_button');
function shortcode_custom_slide_button($atts, $content = null) {
	
	$atts = shortcode_atts(
		array(
        'id' => '',
        'width' => 'two',
		'icon' => 'briefcase',
		'title' => '',
		'picture_url' => ''
        ), $atts);
        		
        
    switch ($atts['width']){
    	case 'full':
    	
    	case 'sixteen columns':	
    		$width = "sixteen columns";
    		break;
    	
        case "3/4" :
        	$width = "twelve columns";
        	break; 
        	
    	case "1/2":
    		$width = "eight columns";
    		break;

        case "1/3" :
        	$width = "column one-third";
        	break;

        case "2/3" :
        	$width = "column two-thirds";
       		break;

        case "1/4" :
        	$width = "four columns";
        	break;   	
        		    	
        case "one" : $width = "one columns"; break;
        case "two" : $width = "two columns"; break;
        case "three" : $width = "three columns"; break;
        case "four" : $width = "four columns"; break;
        case "five" : $width = "five columns"; break;
        case "six" : $width = "six columns"; break;
        case "seven" : $width = "seven columns"; break;
        case "eight" : $width = "eight columns"; break;
        case "nine" : $width = "nine columns"; break;
        case "ten" : $width = "ten columns"; break;
        case "eleven" : $width = "eleven columns"; break;
        case "twelve" : $width = "twelve columns"; break;
        case "thirteen" : $width = "thirteen columns"; break;
        case "fourteen" : $width = "fourteen columns"; break;
        case "fifteen" : $width = "fifteen columns"; break;
        case "sixteen" : $width = "sixteen columns"; break;        	
        	        	
    	default :
        	$width = "eight columns";
    }           
        
        
    $img = $atts['picture_url'] ? $atts['picture_url'] : '';
	$str = '';
	$str .= '<li data-for="#custom_slide'.$atts['id'].'" data-title="'.$atts['title'].'" class="'.$width.'"><div class="icon_big"><div class="icon_bgr"></div><div class="icon_center"><i class="icon '.$atts['icon'].'"></i></div></div></li>';
				

	return $str;
}	



//bar garph
add_shortcode('bar_graphs', 'bar_graphs');
function bar_graphs($atts, $content = null) {  
    return '<ul class="bar_graph">'.  do_shortcode_boc( $content ) .'</ul>';
}


add_shortcode('bar_graph', 'bar_graph');	
function bar_graph($atts, $content = null) {
	extract(shortcode_atts(array("title" => 'Title', "percent" => '1', 'id' => '', 'color'=>'blue'), $atts));  
	
	
	$bar = '
	<li class="animationBegin">
		<p>' . $title . '</p>
		<div class="bar_container ' . $color . '"><span data-width="' . $percent . '"> <strong>' . $percent . '%</strong> </span></div>
	</li>';
    return $bar;
}


// Text box
add_shortcode('text_box', 'shortcode_text_box');
function shortcode_text_box( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'title' 			=> '',
			'text' 				=> '',
			'margined'			=> 'yes',
			'no_bgr'			=> 'no'
		), $atts);
		
	$margin = (($atts["margined"]=='yes')||($atts["margined"]=='Yes')) ? "" : 'no_mar';
	$no_bgr = (($atts["no_bgr"]=='yes')||($atts["no_bgr"]=='Yes')) ? 'box_no_bgr' : '';
	
	$title = $atts['title'];
	$text = $atts['text'];

	$str  = '	<div class="text_box '.$margin.' '.$no_bgr.'">
					'.do_shortcode_boc($content).'
					<h2>'.$title.'</h2>
					<p>'.$text.'</p>
				</div>';

	return $str;
}