<?php
/* Plugin Name: Simple Popup Widget
Plugin URI: http://wordpress.org/plugins/simple-popup-widget/
Description: Simple Popup Widget Plugin lets you easily embed and promote anything on your website. You can easily promote any ads like adsence, amazon banner, facebook page etc.
Version: 1.0
Author: MonjurulHoque
Author URI: http://monjurulhoque.com
*/

class SimplePopupWidget extends WP_Widget{
    
    public function __construct() {
        $params = array(
            'description' => 'Simple Popup Widget Plugin lets you easily embed and promote anything on your website. You can easily promote any ads like adsence, amazon banner, facebook page etc.',
            'name' => 'Simple Popup Widget'
        );
        parent::__construct('SimplePopupWidget','',$params);
    }
    
    public function form($instance) {
        extract($instance);
        
        ?>


<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('title');?>"
	name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo !empty($title) ? $title : "Simple Popup Widget"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('popUp_code');?>">Simple Popup Text/Code : </label>
	<textarea class="widefat" id="<?php echo $this->get_field_id('popUp_code');?>" name="<?php echo $this->get_field_name('popUp_code');?>"><?php echo !empty($popUp_code) ? $popUp_code : "Please add your banner code, welcome text, facebook or google plus page code or anything you want to show!"; ?></textarea>
</p>
<p>
    <label for="<?php echo $this->get_field_id('width');?>">Popup Width : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('width');?>"
	name="<?php echo $this->get_field_name('width');?>"
        value="<?php echo !empty($width) ? $width : "300"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('bgcolor');?>">Popup Bckground Color : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('bgcolor');?>"
	name="<?php echo $this->get_field_name('bgcolor');?>"
        value="<?php echo !empty($bgcolor) ? $bgcolor : "#FFF"; ?>" />
</p>



<?php
    }
    
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
		if(empty($title)) $title = "Simple Popup Widget";
        if(empty($popUp_code)) $popUp_code = "Please add your banner code, welcome text, facebook or google plus page code or anything you want to show!";
        if(empty($width)) $width = "300";
        if(empty($bgcolor)) $bgcolor = "#FFF";
        
        
        echo $before_widget;
            //echo $before_title . $title . $after_title;
            
            ?>

			<style type="text/css">
			a.popup-link {
			padding:17px 0;
			text-align: center;
			margin:10% auto;
			position: relative;
			width: <?php echo $width;?>px;
			color: #fff;
			text-decoration: none;
			background-color: #FFBA00;
			border-radius: 3px;
			box-shadow: 0 5px 0px 0px #eea900;
			display: block;
			}
			a.popup-link:hover {
			background-color: #ff9900;
			box-shadow: 0 3px 0px 0px #eea900;
			-webkit-transition:all 1s;
			transition:all 1s;
			}
			
			@-webkit-keyframes autopopup {
			from {opacity: 0;margin-top:-200px;}
			to {opacity: 1;}
			}
			@-moz-keyframes autopopup {
			from {opacity: 0;margin-top:-200px;}
			to {opacity: 1;}
			}
			@keyframes autopopup {
			from {opacity: 0;margin-top:-200px;}
			to {opacity: 1;}
			}
			#popup {
			background-color: rgba(0,0,0,0.8);
			position: fixed;
			top:0;
			left:0;
			right:0;
			bottom:0;
			margin:0;
			-webkit-animation:autopopup 2s;
			-moz-animation:autopopup 2s;
			animation:autopopup 2s;
			z-index:99999;
			}
			#popup:target {
			-webkit-transition:all 1s;
			-moz-transition:all 1s;
			transition:all 1s;
			opacity: 0;
			visibility: hidden;
			}
			
			@media (min-width: 768px){
			.popup-container {
			width:<?php echo $width;?>px;
			}
			}
			@media (max-width: 767px){
			.popup-container {
			width:100%;
			}
			}
			.popup-container {
			position: relative;
			margin:7% auto;
			padding:30px 50px;
			background-color: <?php echo $bgcolor;?>;
			color:#333;
			border-radius: 3px;
			text-align:center;
			}
			
			a.popup-close {
			position: absolute;
			top:3px;
			right:3px;
			background-color: #333;
			padding:7px 10px;
			font-size: 20px;
			text-decoration: none;
			line-bgcolor: 1;
			color:#fff;
			}
			/* end style popup */
			
			
			</style>
			
			
			<div class="popup-wrapper" id="popup">
			<div class="popup-container">
			
			<?=$popUp_code;?>
			
			<a class="popup-close" href="#popup">X</a>
			</div>
			</div>
			

	<?php
        echo $after_widget;
    }
}

add_action('widgets_init','register_SimplePopupWidget');
function register_SimplePopupWidget(){
    register_widget('SimplePopupWidget');
}