<?php
class WDWT_typography_page_class{
  
  public $options;
  
  function __construct(){
    $this->options = array(
      /*----- headers -----*/
      'text_headers_font' => array(
        'name' => 'text_headers_font', 
        'title' => __( 'Select Font', "business-elite" ),
        'type' => 'select_style', 
        "sanitize_type" => "sanitize_text_field",
        'valid_options' => $this->fonts_options(),
        'text_preview' => 'text_headers',
        'style_param' => 'font-family',
        'section' => 'text_headers', 
        'tab' => 'typography', 
        'default' => array('OpenSans'),
        'customizer' => array(),
      ),
      'text_headers' => array(
        'name' => 'text_headers', 
        'title' => __( 'Preview', "business-elite" ),
        'type' => 'text_preview', 
        'section' => 'text_headers', 
        'tab' => 'typography', 
        'default' => ''          
      ),
      'text_headers_button' => array(
        'name' =>'text_headers_button',
        'title' => __( 'Edit font styling', "business-elite" ),
        'type' => 'button', 
        'show' => array(
          'text_headers_kern',
          'text_headers_transform',
          'text_headers_variant',
          'text_headers_weight',
          'text_headers_style',
        ),
        'hide' => array(),
        'section' => 'text_headers', 
        'tab' => 'typography', 
        'default' => '',        
      ),
      'text_headers_kern' => array(
        'name' => 'text_headers_kern', 
        'title' => __( 'Letter Spacing', "business-elite" ), 
        'type' => 'select_style', 
        'valid_options' => $this->inputs_kern(),
        'text_preview' => 'text_headers',
        'style_param' => 'letter-spacing',
        'section' => 'text_headers', 
        'tab' => 'typography', 
        'default' => array('0.00em'),
        'customizer' => array(),
      ),
      'text_headers_transform' => array(
        'name' => 'text_headers_transform', 
        'title' => __( 'Text Transform', "business-elite" ),
        'type' => 'select_style', 
        'valid_options' => $this->text_transform(),
        'text_preview' => 'text_headers',
        'style_param' => 'text-transform',
        'section' => 'text_headers', 
        'tab' => 'typography',
        'default' => array('none'),
        'customizer' => array(),
      ),
      'text_headers_variant' => array(
        'name' => 'text_headers_variant', 
        'title' => __( 'Variant', "business-elite" ), 
        'type' => 'select_style', 
        'valid_options' => $this->text_variant(),
        'text_preview' => 'text_headers',
        'style_param' => 'font-variant',
        'section' => 'text_headers', 
        'tab' => 'typography', 
        'default' => array('normal'),
        'customizer' => array(),
      ),
      'text_headers_weight' => array(
        'name' => 'text_headers_weight', 
        'title' => __( 'Weight', "business-elite" ), 
        'type' => 'select_style', 
        'valid_options' => $this->text_weight(),
        'text_preview' => 'text_headers',
        'style_param' => 'font-weight',
        'section' => 'text_headers', 
        'tab' => 'typography', 
        'default' => array('normal'),
        'customizer' => array(),
      ),
      'text_headers_style' => array(
        'name' => 'text_headers_style', 
        'title' => __( 'Style', "business-elite" ),
        'type' => 'select_style', 
        'valid_options' => $this->text_style(),
        'text_preview' => 'text_headers',
        'style_param' => 'font-style',
        'section' => 'text_headers', 
        'tab' => 'typography', 
        'default' => array('normal'),
        'customizer' => array(),
      ),
      /*inputs*/
      'text_inputs_font' => array(
        'name' => 'text_inputs_font', 
        'title' => __( 'Select Font', "business-elite" ), 
        'type' => 'select_style', 
        "sanitize_type" => "sanitize_text_field",
        'valid_options' => $this->fonts_options(),
        'text_preview' => 'text_inputs',
        'style_param' => 'font-family',
        'section' => 'inputs_textareas', 
        'tab' => 'typography',
        'default' => array('OpenSans'),
        'customizer' => array(),
      ),
      'text_inputs' => array(
        'name' => 'text_inputs', 
        'title' => __( 'Preview', "business-elite" ),
        'type' => 'text_preview', 
        'section' => 'inputs_textareas', 
        'tab' => 'typography', 
        'default' => '',
      ),
      'text_inputs_button' => array(
        'name' => 'text_inputs_button', 
        'title' => __( 'Edit font styling', "business-elite" ), 
        'type' => 'button', 
        'show' => array(
          'text_inputs_kern',
          'text_inputs_transform',
          'text_inputs_variant',
          'text_inputs_weight',
          'text_inputs_style',
        ),
        'hide' => array(),
        'section' => 'inputs_textareas', 
        'tab' => 'typography', 
        'default' => ''          
      ),
      
      'text_inputs_kern' => array(
        'name' => 'text_inputs_kern', 
        'title' => __( 'Letter Spacing', "business-elite" ), 
        'type' => 'select_style', 
        'valid_options' => $this->inputs_kern(),
        'text_preview' => 'text_inputs',
        'style_param' => 'letter-spacing',
        'section' => 'inputs_textareas', 
        'tab' => 'typography', 
        'default' => array('0.00em'),
        'customizer' => array(),
      ),
      'text_inputs_transform' => array(
        'name' => 'text_inputs_transform', 
        'title' => __( 'Text Transform', "business-elite" ), 
        'type' => 'select_style', 
        'valid_options' => $this->text_transform(),
        'text_preview' => 'text_inputs',
        'style_param' => 'text-transform',
        'section' => 'inputs_textareas', 
        'tab' => 'typography', 
        'default' => array('none'),
        'customizer' => array(),
      ),
      'text_inputs_variant' => array(
        'name' => 'text_inputs_variant', 
        'title' => __( 'Variant', "business-elite" ),
        'type' => 'select_style', 
        'valid_options' => $this->text_variant(),
        'text_preview' => 'text_inputs',
        'style_param' => 'font-variant',
        'section' => 'inputs_textareas', 
        'tab' => 'typography', 
        'default' => array('normal'),
        'customizer' => array(),
      ),
      'text_inputs_weight' => array(
        'name' => 'text_inputs_weight', 
        'title' => __( 'Weight', "business-elite" ), 
        'type' => 'select_style', 
        'valid_options' => $this->text_weight(),
        'text_preview' => 'text_inputs',
        'style_param' => 'font-weight',
        'section' => 'inputs_textareas', 
        'tab' => 'typography', 
        'default' => array('normal'),
        'customizer' => array(),
      ),
      'text_inputs_style' => array(
        'name' => 'text_inputs_style', 
        'title' => __( 'Style', "business-elite" ), 
        'type' => 'select_style', 
        'valid_options' => $this->text_style(),
        'text_preview' => 'text_inputs',
        'style_param' => 'font-style',
        'section' => 'inputs_textareas', 
        'tab' => 'typography', 
        'default' => array('normal'),
        'customizer' => array(),
      ),
      /*links*/
      'text_primary_font' => array(
        'name' => 'text_primary_font', 
        'title' => __( 'Select Font', "business-elite" ), 
        'type' => 'select_style', 
        "sanitize_type" => "sanitize_text_field",
        'valid_options' => $this->fonts_options(),
        'text_preview' => 'text_primary',
        'style_param' => 'font-family',
        'section' => 'primary_font', 
        'tab' => 'typography', 
        'default' => array('OpenSans'),
        'customizer' => array(),
      ),
      'text_primary' => array(
        'name' => 'text_primary',
        'title' => __( 'Preview', "business-elite" ),
        'type' => 'text_preview',
        'section' => 'primary_font',
        'tab' => 'typography',
        'default' => ''
      ),
      'text_primary_button' => array(
        'name' => 'text_primary_button', 
        'title' => __( 'Edit font styling', "business-elite" ),
        'type' => 'button', 
        'show' => array(
          'text_primary_kern',
          'text_primary_transform',
          'text_primary_variant',
          'text_primary_weight',
          'text_primary_style',
        ),
        'hide' => array(),
        'section' => 'primary_font', 
        'tab' => 'typography', 
        'default' => ''
      ),
      
      'text_primary_kern' => array(
        'name' => 'text_primary_kern', 
        'title' => __( 'Letter Spacing', "business-elite" ),
        'type' => 'select_style', 
        'valid_options' => $this->inputs_kern(),
        'text_preview' => 'text_primary',
        'style_param' => 'letter-spacing',
        'section' => 'primary_font', 
        'tab' => 'typography', 
        'default' => array('0.00em'),
        'customizer' => array(),
      ),
      'text_primary_transform' => array(
        'name' => 'text_primary_transform', 
        'title' => __( 'Text Transform', "business-elite" ),
        'type' => 'select_style', 
        'valid_options' => $this->text_transform(),
        'text_preview' => 'text_primary',
        'style_param' => 'text-transform',
        'section' => 'primary_font', 
        'tab' => 'typography', 
        'default' => array('none'),
        'customizer' => array(),
      ),
      'text_primary_variant' => array(
        'name' => 'text_primary_variant', 
        'title' => __( 'Variant', "business-elite" ),
        'type' => 'select_style', 
        'valid_options' => $this->text_variant(),
        'text_preview' => 'text_primary',
        'style_param' => 'font-variant',
        'section' => 'primary_font', 
        'tab' => 'typography', 
        'default' => array('normal'),
        'customizer' => array(),
      ),
      'text_primary_weight' => array(
        'name' => 'text_primary_weight', 
        'title' => __( 'Weight', "business-elite" ),
        'type' => 'select_style', 
        'valid_options' => $this->text_weight(),
        'text_preview' => 'text_primary',
        'style_param' => 'font-weight',
        'section' => 'primary_font', 
        'tab' => 'typography', 
        'default' => array('normal'),
        'customizer' => array(),
      ),
      'text_primary_style' => array(
        'name' => 'text_primary_style', 
        'title' => __( 'Style', "business-elite" ),
        'type' => 'select_style', 
        'valid_options' => $this->text_style(),
        'text_preview' => 'text_primary',
        'style_param' => 'font-style',
        'section' => 'primary_font', 
        'tab' => 'typography', 
        'default' => array('normal'),
        'customizer' => array(),
      ),
    );
  }
  
  private function fonts_options(){
    $font_choices[ 'Arial,Helvetica Neue,Helvetica,sans-serif' ] = 'Arial *';
    $font_choices[ 'Arial Black,Arial Bold,Arial,sans-serif' ] = 'Arial Black *';
    $font_choices[ 'Arial Narrow,Arial,Helvetica Neue,Helvetica,sans-serif' ] = 'Arial Narrow *';
    $font_choices[ 'Courier,Verdana,sans-serif' ] = 'Courier *';
    $font_choices[ 'Georgia,Times New Roman,Times,serif' ] = 'Georgia *';
    $font_choices[ 'Times New Roman,Times,Georgia,serif' ] = 'Times New Roman *';
    $font_choices[ 'Trebuchet MS,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Arial,sans-serif' ] = 'Trebuchet MS *';
    $font_choices[ 'Verdana,sans-serif' ] = 'Verdana *';
    $font_choices[ 'American Typewriter,Georgia,serif' ] = 'American Typewriter';
    $font_choices[ 'Andale Mono,Consolas,Monaco,Courier,Courier New,Verdana,sans-serif' ] = 'Andale Mono';
    $font_choices[ 'Baskerville,Times New Roman,Times,serif' ] = 'Baskerville';
    $font_choices[ 'Bookman Old Style,Georgia,Times New Roman,Times,serif' ] = 'Bookman Old Style';
    $font_choices[ 'Calibri,Helvetica Neue,Helvetica,Arial,Verdana,sans-serif' ] = 'Calibri';
    $font_choices[ 'Cambria,Georgia,Times New Roman,Times,serif' ] = 'Cambria';
    $font_choices[ 'Candara,Verdana,sans-serif' ] = 'Candara';
    $font_choices[ 'Century Gothic,Apple Gothic,Verdana,sans-serif' ] = 'Century Gothic';
    $font_choices[ 'Century Schoolbook,Georgia,Times New Roman,Times,serif' ] = 'Century Schoolbook';
    $font_choices[ 'Consolas,Andale Mono,Monaco,Courier,Courier New,Verdana,sans-serif' ] = 'Consolas';
    $font_choices[ 'Constantia,Georgia,Times New Roman,Times,serif' ] = 'Constantia';
    $font_choices[ 'Corbel,Lucida Grande,Lucida Sans Unicode,Arial,sans-serif' ] = 'Corbel';
    $font_choices[ 'Franklin Gothic Medium,Arial,sans-serif' ] = 'Franklin Gothic Medium';
    $font_choices[ 'Garamond,Hoefler Text,Times New Roman,Times,serif' ] = 'Garamond';
    $font_choices[ 'Gill Sans MT,Gill Sans,Calibri,Trebuchet MS,sans-serif' ] = 'Gill Sans MT';
    $font_choices[ 'Helvetica Neue,Helvetica,Arial,sans-serif' ] = 'Helvetica Neue';
    $font_choices[ 'Hoefler Text,Garamond,Times New Roman,Times,sans-serif' ] = 'Hoefler Text';
    $font_choices[ 'Lucida Bright,Cambria,Georgia,Times New Roman,Times,serif' ] = 'Lucida Bright';
    $font_choices[ 'Lucida Grande,Lucida Sans,Lucida Sans Unicode,sans-serif' ] = 'Lucida Grande';
    $font_choices[ 'Palatino Linotype,Palatino,Georgia,Times New Roman,Times,serif' ] = 'Palatino Linotype';
    $font_choices[ 'Tahoma,Geneva,Verdana,sans-serif' ] = 'Tahoma';
    $font_choices[ 'Rockwell, Arial Black, Arial Bold, Arial, sans-serif' ] = 'Rockwell';
    $font_choices[ 'OpenSans' ] = 'OpenSans';     
    $font_choices[ 'Segoe UI' ] = 'Segoe UI';
    return $font_choices;
  }
  
  private function font_sizes(){
    $font_sizes = array(
        '0.8em' => '0.8em',
        '0.9em' => '0.9em',
        '1em' => '1em',
        '1.1em' => '1.1em',
        '1.2em' => '1.2em',
        '1.5em' => '1.5em',
        '1.8em' => '1.8em',
        '2em' => '2em',
        '2.5em' => '2.5em',
        '3em' => '3em',
        '4em' => '4em',
        '5em' => '5em',
    );
    return $font_sizes;
  }
  
  /***********************************/
  /*    ADMIN REQUERID FUNCTIONS     */
  /***********************************/
  private function inputs_kern($start=-0.3,$trichqy=0.0500001,$count_of_select=26){
    $array_of_kern=array();
    for($i=0;$i<$count_of_select;$i++){
      $array_of_kern[number_format($start,2).'em']=number_format($start,2).'em';
      $start=$start+$trichqy;
    }
    return $array_of_kern;
  }
  private function text_transform(){
    return array('none'=>'None','uppercase'=>'Uppercase ','capitalize'=>'Capitalize ','lowercase'=>'Lowercase  ');
  }
  private function text_variant(){
    return array('normal'=>'Normal ','small-caps'=>'Small-Caps ');
  }
  private function text_weight(){
    return array('normal'=>'Normal ','bold'=>'Bold ','lighter'=>'Light  ');
  }
  private function text_style(){
    return array('normal'=>'Normal ','italic'=>'Italic ');
  }
}
 