<?php
// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';



// Register Navigation
add_theme_support('menus');
register_nav_menu('main_navigation', 'Main Navigation');
register_nav_menu('main_navigation_right', 'Main Navigation - Right');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
add_theme_support( 'post-thumbnails' );
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

function wpb_autolink_featured_images( $html, $post_id, $post_image_id ) {
	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
	return $html;
}
add_filter( 'post_thumbnail_html', 'wpb_autolink_featured_images', 10, 3 );

function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
/**
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */
function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
	return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);

function webzline_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination clearfix'>";
         echo '<div class="links">';
         if($paged > 1){
         	echo "<a class='pagination-prev' href='".get_pagenum_link($paged - 1)."'><span class='page-prev'></span>".__('Previous', 'vmracks')."</a>";
         }
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? " <b>".$i."</b>":" <a href='".get_pagenum_link($i)."'>".$i."</a>";
             }
         }

         if ($paged < $pages) echo " <a class='pagination-next' href='".get_pagenum_link($paged + 1)."'>".__('Next', 'vmracks')."<span class='page-next'></span></a>";  
         echo "</div></div>\n";
     }
}
// Post View
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function custom_register_post_types() {
    $labels = array(
        'name' => _x('IT Shop', 'post type general name'),
        'singular_name' => _x('IT Shop', 'post type singular name'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Comic'),
        'edit_item' => __('Edit Comic'),
        'new_item' => __('New Comic'),
        'view_item' => __('View Comic'),
        'search_items' => __('Search Comic'),
        'not_found' => __('No Comic found'),
        'not_found_in_trash' => __('No Comic found in Trash'),
        'menu_name' => 'IT Shop'
    );
    $rewrite = array(
        'slug' => 'itshop'
    );
    $supports = array('title','editor','thumbnail');
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_menu' => true,
        'query_var' => 'itshop',
        'rewrite' => $rewrite,
        'has_archive' => false,
        'hierarchical' => false,
        'supports' => $supports
    );
    register_post_type('itshop',$args);
}
add_action('init', 'custom_register_post_types', 0);


function custom_podcast() {
    $labels = array(
        'name' => _x('Podcast', 'post type general name'),
        'singular_name' => _x('Podcast', 'post type singular name'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Podcast'),
        'edit_item' => __('Edit Podcast'),
        'new_item' => __('New Podcast'),
        'view_item' => __('View Podcast'),
        'search_items' => __('Search Podcast'),
        'not_found' => __('No Podcast found'),
        'not_found_in_trash' => __('No Podcast found in Trash'),
        'menu_name' => 'Podcast'
    );
    $rewrite = array(
        'slug' => 'podcast'
    );
    $supports = array('title','editor','thumbnail','custom-fields','excerpt');
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_menu' => true,
        'query_var' => 'podcast',
        'rewrite' => $rewrite,
        'has_archive' => false,
        'hierarchical' => false,
        'supports' => $supports
    );
    register_post_type('podcast',$args);
}
add_action('init', 'custom_podcast', 0);


function custom_casestudy() {
    $labels = array(
        'name' => _x('Casestudy', 'post type general name'),
        'singular_name' => _x('Casestudy', 'post type singular name'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Casestudy'),
        'edit_item' => __('Edit Casestudy'),
        'new_item' => __('New Casestudy'),
        'view_item' => __('View Casestudy'),
        'search_items' => __('Search Casestudy'),
        'not_found' => __('No Casestudy found'),
        'not_found_in_trash' => __('No Casestudy found in Trash'),
        'menu_name' => 'Casestudy'
    );
    $rewrite = array(
        'slug' => 'casestudy'
    );
    $supports = array('title','editor','thumbnail','custom-fields','excerpt');
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_menu' => true,
        'query_var' => 'casestudy',
        'rewrite' => $rewrite,
        'has_archive' => false,
        'hierarchical' => false,
        'supports' => $supports
    );
    register_post_type('casestudy',$args);
}
add_action('init', 'custom_casestudy', 0);



function custom_webinars() {
    $labels = array(
        'name' => _x('Webinars', 'post type general name'),
        'singular_name' => _x('Webinars', 'post type singular name'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Webinars'),
        'edit_item' => __('Edit Webinars'),
        'new_item' => __('New Webinars'),
        'view_item' => __('View Webinars'),
        'search_items' => __('Search Webinars'),
        'not_found' => __('No Webinars found'),
        'not_found_in_trash' => __('No Webinars found in Trash'),
        'menu_name' => 'Webinars'
    );
    $rewrite = array(
        'slug' => 'webinars'
    );
    $supports = array('title','editor','thumbnail','custom-fields');
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_menu' => true,
        'query_var' => 'webinars',
        'rewrite' => $rewrite,
        'has_archive' => false,
        'hierarchical' => false,
        'supports' => $supports
    );
    register_post_type('webinars',$args);
}
add_action('init', 'custom_webinars', 0);

// Register widgetized locations
if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Blog Default Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="left_title"><span>',
		'after_title' => '</span></h4>',
	));
	
	register_sidebar(array(
		'name' => 'Page Default Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'Footer Widget 1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'Footer Widget 2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'Footer Widget 3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'Footer Widget 4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'Footer Widget 5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	
	
	register_sidebar(array(
		'name' => 'Contact Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="left_title"><span>',
		'after_title' => '</span></h4>',
	));	
}

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
add_filter('widget_text', 'do_shortcode');
add_post_type_support( 'page', 'excerpt' );


// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#s').val() },
        success: function(data) {
            jQuery('#datafetch').html( data ).fadeIn();
        }
    });

}
</script>

<?php
}
// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['s'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <h2><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></h2>

        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}
//Logo
//add_amp_theme_support('AMP-logo');
//Sidebar
//add_amp_theme_support('AMP-sidebar');
