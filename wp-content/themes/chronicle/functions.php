<?php        
/*	*Theme Name	: Chronicle
	*Theme Core Functions and Codes
*/
	/**Includes required resources here**/
	require( get_template_directory() . '/core/menu/default_menu_walker.php' ); // for Default Menus
	require( get_template_directory() . '/core/menu/chronicle_nav_walker.php' ); // for Custom Menus	
	require( get_template_directory() . '/core/comment-function.php' );
	require( get_template_directory() . '/customizer.php' );
	
	if (is_admin()) {
	require_once('core/admin/admin.php');
	}	
	/*After Theme Setup*/
	add_action( 'after_setup_theme', 'chronicle_setup' ); 	
	function chronicle_setup()
	{	
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 630; //px
	
		// Load text domain for translation-ready
		load_theme_textdomain('chronicle', get_template_directory() . '/core/lang' );	
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'chronicle' ) );
		// theme support 	
		add_theme_support( 'automatic-feed-links'); 
		$args = array('default-color' => 'fff',);
		add_theme_support( 'custom-background', $args);
		$args_h = array('uploads'       => true);
		add_theme_support( 'custom-header', $args_h );
		add_editor_style( 'custom-editor-style.css' );
		
	/*==================
	* Crop image for blog
	* ==================*/			
		//Blogs thumbs
		add_image_size('chronicle_home_post_thumb',360,180,true);
		add_image_size('chronicle_small_thumbs',1170,520,true);
		add_image_size('chronicle_recent_blog_img',64,64,true);
		
		require( get_template_directory() . '/chronicle_default_options.php' );	
	}
	// Read more tag to formatting in blog page 
	function chronicle_content_more($more)
	{ 						
	   return '<a href="'.get_permalink().'">"'.__('read more...','chronicle').'"</a>';
	}   
	add_filter( 'the_content_more_link', 'chronicle_content_more' );
	
	
	// Replaces the excerpt "more" text by a link
	function chronicle_excerpt_more($more) {
    
	return '';
	}
	add_filter('excerpt_more', 'chronicle_excerpt_more');	
	/*
	* chronicle widget area
	*/
	add_action( 'widgets_init', 'chronicle_widgets_init');	
	function chronicle_widgets_init() {
	
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'chronicle' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'chronicle' ),
			'before_widget' => '<div class="sidebar_widget">',
			'after_widget' => '</div><div class="clearfix margin_top3"></div>',
			'before_title' => '<div class="sidebar_title"><h4>',
			'after_title' => '</h4></div>'
		) );
	/** footer widget area **/
	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'chronicle' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'chronicle' ),
			'before_widget' => '<div class="one_fourth animate fadeInUp" data-anim-type="fadeInUp"><div class="qlinks">',
			'after_widget' => '</div></div>',
			'before_title' => '<h4 class="lmb">',
			'after_title' => '</h4>',
		) );             
	}
	
	/*==================
	* Guardian theme css and js
	* ==================*/
	function chronicle_scripts()
	{
		wp_enqueue_style('chronicle-style-sheet', get_stylesheet_uri());		
		wp_enqueue_style('chronicle-reset', get_template_directory_uri() . '/css/chronicle-reset.css');
		wp_enqueue_style('chronicle-font-awesome', get_template_directory_uri() . '/css/font-awesome-4.5.0/css/font-awesome.css');	
		wp_enqueue_style('chronicle-lightbox', get_template_directory_uri() . '/css/chronicle-lightbox.css');
		wp_enqueue_style('chronicle-animations', get_template_directory_uri() . '/css/chronicle-animations.css');		
		wp_enqueue_style('chronicle-sticky-two', get_template_directory_uri() . '/css/chronicle-stickytwo.css');
		wp_enqueue_style('chronicle-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('chronicle-menu', get_template_directory_uri() . '/css/chronicle-menu.css');
		wp_enqueue_style('chronicle-slider-pro', get_template_directory_uri() . '/css/chronicle-slider-pro.css');
		wp_enqueue_style('chronicle-pink-color', get_template_directory_uri() . '/css/colors/chronicle-pink.css');		
		wp_enqueue_style('chronicle-responsive-leyouts', get_template_directory_uri() . '/css/chronicle-responsive-leyouts.css');
		// Js
		wp_enqueue_script('chronicle-bootstrap-js', get_template_directory_uri() .'/js/bootstrap.js',array('jquery'));
		wp_enqueue_script('chronicle-animations-js', get_template_directory_uri() .'/js/chronicle-animations.js');
		wp_enqueue_script('chronicle-totop-js', get_template_directory_uri() .'/js/chronicle-totop.js');
		wp_enqueue_script('chronicle-sticky-js', get_template_directory_uri() .'/js/chronicle-sticky.js');
		wp_enqueue_script('chronicle-menu-js', get_template_directory_uri() . '/js/chronicle-menu.js');
		wp_enqueue_script('chronicle-modernizr.custom.75180-js', get_template_directory_uri() .'/js/chronicle-modernizr.custom.75180.js');
		wp_enqueue_script('chronicle-lightbox-2.6.min-js', get_template_directory_uri() .'/js/chronicle-lightbox-2.6.min.js');
			
		//if(is_home()) {
		wp_enqueue_script('chronicle-jquery.sliderPro-js', get_template_directory_uri() .'/js/chronicle-jquery.sliderPro.js');	
		wp_enqueue_script('chronicle-homeslide-js', get_template_directory_uri() .'/js/chronicle-homeslide.js');	
		//}
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
	add_action('wp_enqueue_scripts', 'chronicle_scripts');

/*  Font Family */	
 add_action('wp_enqueue_scripts', 'chronicle_font_family');
 function chronicle_font_family()
   {
	 wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Rock+Salt|Neucha|Sans+Serif|Indie+Flower|Shadows+Into+Light|Dancing+Script|Kaushan+Script|Tangerine|Pinyon+Script|Great+Vibes|Bad+Script|Calligraffitti|Homemade+Apple|Allura|Megrim|Nothing+You+Could+Do|Fredericka+the+Great|Rochester|Arizonia|Astloch|Bilbo|Cedarville+Cursive|Clicker+Script|Dawning+of+a+New+Day|Ewert|Felipa|Give+You+Glory|Italianno|Jim+Nightshade|Kristi|La+Belle+Aurore|Meddon|Montez|Mr+Bedfort|Over+the+Rainbow|Princess+Sofia|Reenie+Beanie|Ruthie|Sacramento|Seaweed+Script|Stalemate|Trade+Winds|UnifrakturMaguntia|Waiting+for+the+Sunrise|Yesteryear|Zeyada|Warnes|Verdana|Abril+Fatface|Advent+Pro|Aldrich|Alex+Brush|Amatic+SC|Antic+Slab|Candal');
     
	 wp_enqueue_style ('googleFonts');
    }
	//code for image resize for according to image layout
	add_filter( 'intermediate_image_sizes', 'chronicle_image_presets');
	function chronicle_image_presets($sizes){
		$type = get_post_type($_REQUEST['post_id']);	
		foreach($sizes as $key => $value){
			if($type=='post' && $value != 'chronicle_home_post_thumb' && $value != 'chronicle_small_thumbs' && $value != 'chronicle_recent_blog_img' )
			{ unset($sizes[$key]);  }
			elseif($type=='page' && $value != 'about_post_thumb')
			{ unset($sizes[$key]);  }
		}
		return $sizes;	 
	}
	
	/*==================
	* Add Class Gravtar
	* ==================*/
	add_filter('get_avatar','chronicle_gravatar_class');
	function chronicle_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='author_detail_img", $class);
    return $class;
	}
	
	
	/*===================================================================================
	* Paginated Posts
	* =================================================================================*/
	function chronicle_link_pages($args = '') {
        $defaults = array(
			'before' => '' . __('Pages:','chronicle'), 'after' => '',
			'link_before' => '', 'link_after' => '',
			'next_or_number' => 'number', 'nextpagelink' => __('Next page','chronicle'),
			'previouspagelink' => __('Previous page','chronicle'), 'pagelink' => '%',
			'echo' => 1
        );

        $r = wp_parse_args( $args, $defaults );
        $r = apply_filters( 'wp_link_pages_args', $r );
        extract( $r, EXTR_SKIP );

        global $page, $numpages, $multipage, $more, $pagenow;
        $output = '';
        if ( $multipage ) {
			if ( 'number' == $next_or_number ) {
				$output .= $before;
				for ( $i = 1; $i < ($numpages+1); $i = $i + 1 ) {
					$j = str_replace('%',$i,$pagelink);
					$output .= ' ';
					if ( ($i != $page) || ((!$more) && ($page==1)) ) {
						$output .= _wp_link_page($i);
					} elseif ( $i == $page ) {
						$output .= '<a class="active" href="#">';
					}
					$output .= $link_before . $j . $link_after;
					if ( ($i != $page) || ( $i == $page ) || ((!$more) && ($page==1)) )
					$output .= '</a>';
				}
			$output .= $after;
			} else {
				if ( $more ) {
					$output .= $before;
					$i = $page - 1;
					if ( $i && $more ) {
						$output .= _wp_link_page($i);
						$output .= $link_before. $previouspagelink . $link_after . '</a>';
					}
					$i = $page + 1;
					if ( $i <= $numpages && $more ) {
						$output .= _wp_link_page($i);
						$output .= $link_before. $nextpagelink . $link_after . '</a>';
					}
					$output .= $after;
				}
			}
        }

        if ( $echo )
                echo $output;

        return $output;
	}
	/****--- Navigation for Author, Category , Tag , Archive ---***/	
	function chronicle_navigation() { ?>
	<nav id="wblizar_nav"> 
		<span class=""><?php posts_nav_link(' -- ', __('Newer Posts','chronicle'), __('Older Posts','chronicle')); ?></span> 
	</nav><?php
	}	
	
	/****--- Navigation for Single ---***/
	function chronicle_navigation_posts(){ ?>	
	<nav id="wblizar_nav">
		<span class="nav-previous"><?php previous_post_link('&laquo; %link'); ?></span>
		<span class="nav-next"><?php next_post_link('%link &raquo;'); ?></span> 
	</nav><?php 
	}
	/* Breadcrumbs  */
	function chronicle_breadcrumbs() {
    $delimiter = '';
    $home = __('Home', 'chronicle' ); // text for the 'Home' link
    $before = '<li>'; // tag before the current crumb
    $after = '</li>'; // tag after the current crumb
    echo '<ul class="breadcrumb">';
    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a> / </li>' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . single_cat_title('', false) . '' . $after;
    } elseif (is_day()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
		
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . _e("Search results for","chronicle")  . get_search_query() . '"' . $after;

    } elseif (is_tag()) {        
		echo $before . _e('Tag','chronicle') . single_tag_title('', false) . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . _e("Articles posted by","chronicle") . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . _e("Error 404","chronicle") . $after;
    }
    
    echo '</ul>';
	}
	
	
	//PAGINATION
	function chronicle_pagination($pages = '', $range = 2)
	{  
     $showitems = ($range * 2)+1;
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {	global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        { $pages = 1;  }
     }
     if(1 != $pages)
     {	echo "<div class='pagination center'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."' class='navlinks'>&lt; __('Previous','chronicle')</a>";
        if($paged > 1 && $showitems < $pages) echo "<a class='navlinks' href='".get_pagenum_link($paged - 1)."'>&lt; __('Previous','chronicle');</a>";
		for ($i=1; $i <= $pages; $i++)
        {	if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
				echo ($paged == $i)? "<a class='navlinks current'>".$i."</a>":"<a class='navlinks' href='".get_pagenum_link($i)."'>".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a class='navlinks' href='".get_pagenum_link($paged + 1)."'>Next ></a>";  
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='navlinks' href='".get_pagenum_link($pages)."'>Next ></a>";
        echo "</div>";
     }
}
?>