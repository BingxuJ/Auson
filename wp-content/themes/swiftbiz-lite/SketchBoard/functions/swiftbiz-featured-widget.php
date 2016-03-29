<?php

/******************************************** 
WIDGET START
*********************************************/
class SwiftbizFeaturedBox extends WP_Widget {
    
    /**
    * Register widget with WordPress.
    */
    function __construct() {
        global $swiftbiz_lite_shortname;
        $widget_ops = array('classname' => 'mid-box span4','description' => __('Swiftbiz Lite Themes widget for Featured Box','swiftbiz-lite') );
        parent::__construct(
            'SwiftbizFeaturedBox', // Base ID
            __('Featured Box - $swiftbiz_lite_shortname','swiftbiz-lite'), // Name
           $widget_ops ); // Args
    }
    
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
    */

    function widget($args, $instance) {	
		extract( $args );
		$title = esc_attr($instance['title']);
		$fb_icon_class = esc_attr($instance['fb_icon_class']);						
		$fb_content = esc_attr($instance['fb_content']);	
		$fb_link = esc_url($instance['fb_link']);
        ?>
        <?php echo $before_widget; ?>
        					
        <!-- Featured Box  -->  

        <div class="swiftbiz-iconbox iconbox-top">      
            <div class="iconbox-icon ">
                <i class="fa <?php echo esc_html($fb_icon_class); ?>"></i>
                <h4><a href="<?php echo esc_url($fb_link); ?>"><?php if($title) { echo esc_attr($title); } ?></a></h4>
            </div>
            <ul class="horizontal-style"><li></li><li></li><li></li><li></li></ul>
            <div class="iconbox-content"><?php if($fb_content) { echo esc_attr($fb_content); } ?></div>          
            <div class="clearfix"></div>        
        </div>
        <?php echo $after_widget;
    }
    

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
    */

    function update($new_instance, $old_instance) {				
    	$instance = $old_instance;
    	$instance['title'] = strip_tags($new_instance['title']);
    	$instance['fb_icon_class'] = strip_tags($new_instance['fb_icon_class']);
    	$instance['fb_content'] = strip_tags($new_instance['fb_content']);
    	$instance['fb_link'] = strip_tags($new_instance['fb_link']);
        return $instance;
    }
    

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
    */

    function form($instance) {
		if(isset($instance['title'])){ $title = esc_attr($instance['title']); }
		if(isset($instance['fb_icon_class'])){ $fb_icon_class = esc_html($instance['fb_icon_class']);}
		if(isset($instance['fb_content'])){$fb_content = esc_attr($instance['fb_content']);}			
		if(isset($instance['fb_link'])){$fb_link = esc_url($instance['fb_link']);}
        ?>
         <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','swiftbiz-lite'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if(isset($title)){echo $title;} else { echo '';}  ?>" /></label></p>

         <p><label for="<?php echo $this->get_field_id('fb_icon_class'); ?>"><?php _e('Featured Box Icon Class:','swiftbiz-lite'); ?> <input class="widefat" id="<?php echo $this->get_field_id('fb_icon_class'); ?>" name="<?php echo $this->get_field_name('fb_icon_class'); ?>" type="text" value="<?php if(isset($fb_icon_class)){echo $fb_icon_class;} else { echo '';} ?>" /></label></p>

         <p><label for="<?php echo $this->get_field_id('fb_content'); ?>"><?php _e('Featured Box Content:','swiftbiz-lite'); ?> <textarea rows="4" cols="50" class="widefat" id="<?php echo $this->get_field_id('fb_content'); ?>" name="<?php echo $this->get_field_name('fb_content'); ?>"><?php if(isset($fb_content)){echo $fb_content;} else { echo '';} ?></textarea></label></p>

		 <p><label for="<?php echo $this->get_field_id('fb_link'); ?>"><?php _e('Featured Box Link:','swiftbiz-lite'); ?> <input class="widefat" id="<?php echo $this->get_field_id('fb_link'); ?>" name="<?php echo $this->get_field_name('fb_link'); ?>" type="text" value="<?php if(isset($fb_link)){echo $fb_link;} else { echo '';}?>" /></label></p>	

         <?php 
    }
}
add_action('widgets_init', create_function('', 'return register_widget("SwiftbizFeaturedBox");'));

/********************************************
WIDGET END
*********************************************/