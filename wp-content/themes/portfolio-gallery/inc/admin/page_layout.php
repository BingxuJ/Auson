<?php

class WDWT_layout_page_class{
  
  public $options;
  
  
    
  function __construct(){
    
    $this->options = array( 

      'default_menu_layout' => array(
        "name" => "default_menu_layout", 
        "title" => __("Choose Default Menu Layout", "portfolio-gallery"), 
        'type' => 'layout', 
        "description" => __( "Default menu layout for pages and posts on the website.", "portfolio-gallery" ), 
        'valid_options' => array( 
          array('index' => '3', 'title'=>'Left Menu', 'description'=>''),
          array('index' => '2', 'title'=>'Right Menu', 'description'=>''),
        ),
        'img_src' => 'sprite-layouts.png',
        'img_height' => 97,
        'img_width' => 50,
        'section' => 'layouts',
        'tab' => 'layout_editor', 
        'default' => '3',
        'customizer' => array()
      ),
      'menu_width' => array( 
        "name" => "menu_width", 
        "title" => __("Menu width", "portfolio-gallery"), 
        'type' => 'number', 
        "description" => __("Specify the width of the Main Menu", "portfolio-gallery"),
        'input_size' => '2',
        "sanitize_type" => "sanitize_text_field", 
        'unit_symbol' => '%',
        'section' => 'layouts', 
        'tab' => 'layout_editor',
        'step' => '1',
        'min' => '5',
        'max' => '80',
        'default' => 30,
        'customizer' => array()   
      ),
      'fixed_menu' => array( 
        'name' => 'fixed_menu', 
        'title' => __( 'Fix Menu', "portfolio-gallery" ), 
        'type' => 'checkbox', 
        'description' => __( 'Check the box to fix menu.', "portfolio-gallery" ), 
        'section' => 'layouts', 
        'tab' => 'layout_editor', 
        'default' => false,
        'customizer' => array()
      ),

      'default_layout' => array(
        "name" => "default_layout", 
        "title" => __("Choose Default Layout", "portfolio-gallery"), 
        'type' => 'layout_open', 
        "description" => __( "Default content layout for pages and posts on the website.", "portfolio-gallery" ), 
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
        'section' => 'layouts',
        'tab' => 'layout_editor', 
        'default' => '1',
        'customizer' => array()
      ),
      'main_column' => array( 
        "name" => "main_column", 
        "title" => __("Main Column Width", "portfolio-gallery"), 
        'type' => 'text',
        "sanitize_type" => "sanitize_text_field",  
        "description" => __("Specify the width of the Main Column", "portfolio-gallery"),
        'unit_symbol' => '%',
        'input_size' => '2',
        'section' => 'layouts', 
        'tab' => 'layout_editor',
        'default' => 67,
        'customizer' => array()
      ),
      'pwa_width' => array( 
        "name" => "pwa_width", 
        "title" => __("Primary Widget Area width", "portfolio-gallery"), 
        'type' => 'text',
        "sanitize_type" => "sanitize_text_field",  
        "description" => __("Specify the width of the Primary Widget Area", "portfolio-gallery"),
        'unit_symbol' => '%',
        'input_size' => '2',
        'section' => 'layouts', 
        'tab' => 'layout_editor',
        'default' => 16,
        'customizer' => array()
      ),

    );
        
      
  
  }

  
  
}
 