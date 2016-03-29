jQuery('document').ready(function(){
  // Add pro banner
  if(!WDWT.is_pro){
    upgrade =  
    '<div class="wdwt_pro_banner" style="font-size:16px; margin-top:8px; text-align:left;">'
      +'<a href="'+ WDWT.homepage +'/wordpress-themes/portfolio-gallery.html" target="_blank" style="color:red; text-decoration:none; display:block;">'
        +'<img src="'+WDWT.img_URL +'pro.png" border="0" alt="" width="215" >'
      +'</a>'
    +'</div>';
    jQuery('.preview-notice').append(upgrade);
    // Remove accordion click event
    jQuery('.wdwt_pro_banner').on('click', function(e) {
      e.stopPropagation();
    });
  }
 
});