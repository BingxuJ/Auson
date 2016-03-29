<?php
/**
 * Sanitization for textarea field
 */
function NovelLite_sanitize_textarea( $input ) {
    global $allowedposttags;
    $output = wp_kses( $input, $allowedposttags );
    return $output;
}

/**
 * Returns a sanitized filepath if it has a valid extension.
 */
function NovelLite_sanitize_upload( $upload ) {
    $return = '';
    $fype = wp_check_filetype( $upload );
    if ( $fype["ext"] ) {
        $return = esc_url_raw( $upload );
    }
    return $return;
}

/**
 * vaild int.
 */
function NovelLite_sanitize_int( $input ) {
$return = absint($input);
    return $return;
}

// Multiple Checkbox Show
    function NovelLite_checkbox_explode( $values ) {
    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;
    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

add_action('customize_register','NovelLite_custom_customize_register');
function NovelLite_custom_customize_register( $wp_customize ) {
    
class TH_Customize_Sort_List extends WP_Customize_Control {


    /**
     * The type of customize control being rendered.
     */
    public $type = 'sort-list';

    public function enqueue() {
       
    }
    public function render_content() {
          if ( empty( $this->choices ) ){
            return;
               }
            ?>
      <?php if ( !empty( $this->label ) ) : ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php endif; ?>
        <?php if ( !empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo $this->description; ?></span>
        <?php endif;
		$sort_arr = $this->value();
        $default_arr = explode( ',',implode(',',array_keys($this->choices)));
        $new_arr =  array_unique(array_merge($sort_arr,$default_arr));

        $multi_values = (!empty($sort_arr)) ? explode( ',',implode(',',$new_arr )) : explode( ',',implode(',',array_keys($this->choices)));  ?>
        <ul id="sortable">
        <?php foreach ( $multi_values as $value => $label ) :
         ?>
            <li class="ui-state-default" id='<?php echo $label; ?>' ><label><?php echo $this->choices[$label]; ?></label></li>
          <?php endforeach; ?>
        </ul>
                <input type="hidden" <?php $this->link(); ?> value="v" />
            <?php }
        }
}


function NovelLite_registers() {

    wp_enqueue_script( 'NovelLite_customizer_script', get_template_directory_uri() . '/js/customizer.js', array("jquery"), '', true  );
    
    wp_localize_script( 'NovelLite_customizer_script', 'NovelLiteCustomizerObject', array(
        
        'documentation' => __( 'View Documentation', 'novellite' ),
        'pro' => __('View PRO version','novellite')

    ) );
}
add_action( 'customize_controls_enqueue_scripts', 'NovelLite_registers' );

function NovelLite_customizer_styles() {

    wp_enqueue_style('NovelLite_customizer_styles', get_template_directory_uri() . '/css/customizer_styles.css');

}
add_action('customize_controls_print_styles', 'NovelLite_customizer_styles');
?>