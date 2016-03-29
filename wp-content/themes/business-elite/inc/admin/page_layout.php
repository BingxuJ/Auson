<?php
class WDWT_layout_page_class {
	public $options;
    
	function __construct(){
		$this->options = array( 
			'default_layout' => array(
				"name" => "default_layout", 
				"title" => __( "Choose Default Layout", "business-elite"), 
				'type' => 'layout_open', 
				"description" => __("Select the default layout for pages and posts on the website.", "business-elite"),
				'valid_options' => array( 
					array('index' => '1', 'title'=>'No Sidebar', 'description'=>''),
					array('index' => '2', 'title'=>'Right Sidebar', 'description'=>''),
					array('index' => '3', 'title'=>'Left Sidebar', 'description'=>''),
					array('index' => '4', 'title'=>'Two Right Sidebars', 'description'=>''),
					array('index' => '5', 'title'=>'Two Left Sidebars', 'description'=>''),
					array('index' => '6', 'title'=>'One Right One Left Sidebars', 'description'=>''),
				),
				'show' => array(
					'2'=>'main_column',
					'3'=>'main_column',
					'4'=>array('main_column', 'pwa_width'),
					'5'=>array('main_column', 'pwa_width'),
					'6'=>array('main_column', 'pwa_width'),
				),
				'hide' => array(),
				'img_src' => 'sprite-layouts.png',
				'img_height' => 289,
				'img_width' => 50,
				'section' => 'layout_editor',
				'tab' => 'layout_editor', 
				'default' => '1',
				'customizer' => array()
			),
			'full_width' => array( 
				"name" => "full_width", 
				"title" => __( "Full Width", "business-elite"),
				'type' => 'checkbox', 
				"description" => __("You can choose full width for pages and posts on the website.", "business-elite"),
				'section' => 'layout_editor', 
				'tab' => 'layout_editor',
				'default' => false,
				'customizer' => array()
			),			
			'content_area' => array( 
				"name" => "content_area", 
				"title" => __( "Content Area Width", "business-elite"),
				'type' => 'text', 
				"description" =>  __("Specify the width of the Content Area", "business-elite"),
				'unit_symbol' => 'px',
				'input_size' => '2',
				"sanitize_type" => "sanitize_text_field", 
				'section' => 'layout_editor', 
				'tab' => 'layout_editor',
				'default' => 1025,
				'customizer' => array()
			),			
			'main_column' => array( 
				"name" => "main_column", 
				"title" => __( "Main Column Width", "business-elite"), 
				'type' => 'text', 
				"description" =>  __("Specify the width of the Main Column", "business-elite"),
				'unit_symbol' => '%',
				'input_size' => '2',
				"sanitize_type" => "sanitize_text_field", 
				'section' => 'layout_editor', 
				'tab' => 'layout_editor',
				'default' => 64,
				'customizer' => array()
			),			
			'pwa_width' => array( 
				"name" => "pwa_width", 
				"title" => __( "Primary Widget Area width", "business-elite"),
				'type' => 'text', 
				"description" => __("Specify the width of the Primary Widget Area", "business-elite"),
				'unit_symbol' => '%',
				'input_size' => '2',
				"sanitize_type" => "sanitize_text_field", 
				'section' => 'layout_editor', 
				'tab' => 'layout_editor',
				'default' => 18,
				'customizer' => array()
			),
		);
	}
}