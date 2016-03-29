<?php
class Portfolio_gallery_meta_layout_view{
   
  private $model;

  public function __construct($model){
    $this->model = $model;
  }

  public function view(){
    global $post;
    global $wdwt_options;

    $meta = get_post_meta($post->ID, WDWT_META , true);
    
    foreach ($this->model->params as $key => $value) {
      if(!isset($meta[$key])){
        if(isset($wdwt_options[$key])){
          $meta[$key] = $wdwt_options[$key];    
        }
        else{
          $meta[$key] = $value['default'];
        }
      }
    }
    ?>
  <h3 id="wdwt_meta_layout_title"> <?php esc_html_e('Layout', "portfolio-gallery"); ?> </h3>
  <table class="wdwt_meta" id="wdwt_meta_layout">
  <tbody>
    <?php
    foreach ($this->model->params as $key => $option) :
      ?>
      <tr><td>
        <?php
        wdwt_field_callback( $option, $context = 'meta', $meta[$key], $meta );
        ?>
      </td></tr>
    <?php
    endforeach;
    ?>
    </tbody>
    </table>
    <div class="clear"></div>
    <?php
  
  }

}
