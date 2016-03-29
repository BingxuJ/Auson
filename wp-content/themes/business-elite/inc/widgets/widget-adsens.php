<?php 
class Business_elite_adsens extends WP_Widget {
    function __construct(){
		$widget_ops = array('description' => __('Displays Adsense', "business-elite"));
		$control_ops = array('width' => 400, 'height' => 500);
		parent::__construct(false,$name='Adsense',$widget_ops,$control_ops);
	}
	/* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title =  esc_html( $instance['title']);
		$adsenseCode = empty( $instance['adsenseCode'] ) ? '' : $instance['adsenseCode'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title; ?>
		<div style="overflow: hidden;">
			<?php echo $adsenseCode; ?>
		</div> 
		<?php
		echo $after_widget;
	}
	/*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['adsenseCode'] = wp_filter_post_kses( addslashes($new_instance['adsenseCode']));
		return $instance;
	}
	/*Creates the form for the widget in the back-end. */
    function form($instance){
		/* Defaults */
		$instance = wp_parse_args( (array) $instance, array( 'title'=>__('Adsense',"business-elite"), 'adsenseCode'=>'' ) );

		$title = esc_attr( $instance['title'] );
		$adsenseCode = esc_textarea( $instance['adsenseCode'] );
		
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';		
		
		echo '<p><label for="' . $this->get_field_id('adsenseCode') . '">' . __('Adsense Code',"business-elite") . ':</label><textarea cols="20" rows="12" class="widefat" id="' . $this->get_field_id('adsenseCode') . '" name="' . $this->get_field_name('adsenseCode') . '" >'. $adsenseCode .'</textarea></p>';
	}
}
/* end web_buis_adv class */
add_action('widgets_init', create_function('', 'return register_widget("Business_elite_adsens");'))
?>