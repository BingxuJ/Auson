<?php


class WDWT_homepage_page_class{
	

	public $options;
	
	function __construct(){

		$this->options = array(

			/*featured post*/

			"home_middle_description_post_enable" => array(
				"name" => "home_middle_description_post_enable",
				"title" => __("Enable Featured Post", "portfolio-gallery"),
				'type' => 'checkbox',
				"description" => __( "Check box to display a featured post at the homepage", "portfolio-gallery" ),
				'section' => 'homepage_featured', 
        'tab' => 'homepage', 
        'default' => true,
        'customizer'=>array()
			),
			"home_middle_description_post" => array(
				"name" => "home_middle_description_post",
				"title" => "", 
				'type' => 'select',
				"valid_options" => $this->get_posts(),
				"sanitize_type" => "sanitize_text_field",
				"description" => __("Select the featured post. Pages selection is available in PRO version", "portfolio-gallery" ),
				'section' => 'homepage_featured', 
        'tab' => 'homepage', 
        'default' => $this->last_post(),
        'customizer' => array()
			),

			'home_middle_image_maxwidth' => array( 
        "name" => "home_middle_image_maxwidth", 
        "title" => "", 
        'type' => 'text', 
        "description" => __("Specify the maximum width of featured post image", "portfolio-gallery"),
        'input_size' => '4',
        "sanitize_type" => "sanitize_text_field", 
        'unit_symbol' => 'px',
        'section' => 'homepage_featured', 
        'tab' => 'homepage',
        'default' => 600,
        'customizer' => array()   
      ),
      'home_middle_description_pos' => array( 
        "name" => "home_middle_description_pos", 
        "title" => "", 
        'type' => 'number', 
        "description" => __("Row where featured post should be shown. Enter integer from 1.", "portfolio-gallery"),
        'input_size' => '4',
        "sanitize_type" => "sanitize_text_field", 
        'section' => 'homepage_featured', 
        'tab' => 'homepage',
        'default' => 2,
        'customizer' => array()   
      ),	
      /*content posts*/	
			"content_posts_enable" => array( 
				"name" => "content_posts_enable",
				"title" => __("Enable Content Posts", "portfolio-gallery"),
				'type' => 'checkbox',  
				"description" => __("Check the box to display posts only from specific categories. If unchecked, all posts are shown.", "portfolio-gallery"),
				'section' => 'homepage_content', 
        'tab' => 'homepage', 
        'default' => false,
        'customizer'=>array()
			),
			"content_post_order" => array(
				"name" => "content_post_order",
				"title" => "",
				'type' => 'select',
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => array('asc'=>__("Ascending", "portfolio-gallery"), 'desc'=>__("Descending", "portfolio-gallery")),
				"description" => __("Order of posts", "portfolio-gallery"),
				'section' => 'homepage_content',
				'tab' => 'homepage',
				'default' => array('desc'),
				'customizer'=>array()
			),
			"content_post_orderby" => array(
				"name" => "content_post_orderby",
				"title" => "",
				'type' => 'select',
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => array('date'=>__("Date", "portfolio-gallery"), 'name'=>__("Name", "portfolio-gallery")),
				"description" => __("Order by", "portfolio-gallery"),
				'section' => 'homepage_content',
				'tab' => 'homepage',
				'default' => array('date'),
				'customizer'=>array()
			),
			"content_post_categories" => array(
				"name" => "content_post_categories",
				"title" => "",
				'type' => 'select',
				'multiple' => "true",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->get_categories(),
				"description" => __("Select categories of posts. Pages are available in PRO version.","portfolio-gallery"),
				'section' => 'homepage_content',
				'tab' => 'homepage',
				'default' => $this->get_categories(),
				'customizer'=>array()
			),
			'content_posts_noimage' => array(
		    'name' => 'content_posts_noimage', 
		    'title' => '', 
		    'type' => 'upload_single', 
		    "sanitize_type" => "esc_url_raw", 
		    'description' => __( 'Placeholder for Content Post if there is no thumb. Or leave blank and edit Post Thumb Background Color.', "portfolio-gallery" ), 
		    'section' => 'homepage_content', 
		    'tab' => 'homepage', 
		    'default' => '',
		    'customizer' => array()           
		  ),
		);
	
	}


	



	private function get_posts(){
		$args= array(
				'posts_per_page'   => 3000,
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
				 );

		$posts_array_custom=array();
		$posts_array = get_posts( $args );

		foreach($posts_array as $post){
			$key = $post->ID;
		  $posts_array_custom[$key] = $post->post_title;
		}
		return $posts_array_custom;
	}

	private function get_categories(){
		$args= array(
				'hide_empty' => 0,
				'orderby' => 'name',
				'order' => 'ASC',
			);
		
		$categories_array_custom=array();
		$categories_array = get_categories( $args );

		foreach($categories_array as $category){
		  $categories_array_custom[$category->term_id] = $category->name;
		}
		return $categories_array_custom;
	}
	
	private function get_categories_ids(){
		$args= array(
				'hide_empty' => 0,
				'orderby' => 'name',
				'order' => 'ASC',
			);
		
		$categories_array_custom=array();
		$categories_array = get_categories( $args );
		foreach($categories_array as $category){
		  array_push($categories_array_custom,$category->term_id);
		}
		return $categories_array_custom;
	}

	private function get_pages(){
		$args= array(
				'posts_per_page'   => 3000,
				'hierarchical'     => 0,
				 );

		$pages_array_custom=array();
		$pages_array = get_pages( $args );

		foreach($pages_array as $page){
			$key = $page->ID;
		  $pages_array_custom[$key] = $page->post_title;
		}
		return $pages_array_custom;
	}

	private function last_post(){
		$last_post=array();
		$post_in_array=get_posts( array('posts_per_page' => 1));
		if($post_in_array)
			$last_post=array($post_in_array[0]->ID);
		else
			$last_post=array();

		return $last_post;
	}

	private function last_page(){
		$last_post=array();
		$post_in_array=get_pages( array('posts_per_page' => 1));
		if($post_in_array)
			$last_post=array($post_in_array[0]->ID);
		else
			$last_post=array();

		return $last_post;
	}

	
}
 