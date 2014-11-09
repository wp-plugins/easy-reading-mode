<?php

class ERM_Widget {

	function erm_add_scripts(){

		if( is_single() && ( get_post_type() == "post" || get_post_type() == "page" ) ) {
			// Adding the plugin javascript file
			$handle = 'erm_script';
			$src = ERM__PLUGIN_URL.'js/erm.js';
			wp_register_script( $handle , $src , array( 'jquery' ) , null , true );
			wp_enqueue_script( $handle );

			// Adding the popup dependency Script
			$handle = 'erm_magnific_popup_script';
			$src = ERM__PLUGIN_URL.'js/jquery.magnific-popup.min.js';
			wp_register_script( $handle , $src, array( 'jquery' ) , null , true );
			wp_enqueue_script( $handle );
		

			// Adding the popup Script
			$handle = 'erm_popup_script';
			$src = ERM__PLUGIN_URL.'js/erm_popup.js';
			wp_register_script( $handle , $src, array( 'jquery' ) , null , true );
			wp_enqueue_script( $handle );

			// Adding the CSS
			$handle = 'erm_style_css';
			$src = ERM__PLUGIN_URL.'css/erm-style.css';
			wp_enqueue_style( $handle , $src );
		
			// Adding popup css file
			$handle = 'erm_popup_style_css';
			$src = ERM__PLUGIN_URL.'css/magnific-popup.css';
			wp_enqueue_style( $handle , $src );
		}
	}


	function erm_add_button($content){
		if ( is_single() && ( get_post_type() == "post" || get_post_type() == "page" ) ) {
			$button_text = esc_attr( get_option('erm_button_text') );
			if( $button_text != "" ) {
				$new_content = '<button class="erm-btn"><a class="erm-popup-btn" href="#erm-popup-link"><span>'.$button_text.'</span></a></button>'.$content;
			} else {
				$new_content = '<button class="erm-btn"><a class="erm-popup-btn" href="#erm-popup-link"><span>Reading Mode</span></a></button>'.$content;
			}
				return $new_content;
		}
	
		return $content;
		
	}

	function erm_content_div($content){
		if ( is_single() && ( get_post_type() == "post" || get_post_type() == "page" ) ) {
			$new_content = '<div class="erm-content-wrapper">'.$content.'</div>';
			return $new_content;
		}
		return $content;
		
	}

	function erm_title_div($title,$id=null){
		if ( is_single() && ( get_post_type() == "post" || get_post_type() == "page" ) ) {
			if(in_the_loop()){
				$new_title = '<div class="erm-title-wrapper">'.$title.'</div>';
				return $new_title;
			}
		}

		return $title;
	}

	function erm_add_custom_design_css(){
		
    	$button_text_color = esc_attr( get_option('erm_button_text_color') );
    	$button_text_size = esc_attr( get_option('erm_button_text_size') );
    	

    	$background_color = esc_attr( get_option( 'erm_button_background_color' ) );
    	$border = esc_attr( get_option( 'erm_button_border' ) );
    	$button_padding = esc_attr( get_option('erm_button_padding') );
    	$button_margin = esc_attr( get_option('erm_button_margin'));

    	$hover_background_color = esc_attr( get_option('erm_hover_button_background_color') );
    	$hover_text_color = esc_attr( get_option('erm_hover_text_color') );

?>
		<style>
			a.erm-popup-btn span{
				color: #<?php echo $button_text_color; ?>;
				/*size: <?php echo $button_text_size; ?>px;*/
				
				border: none;
			}

			button.erm-btn{
				background: #<?php echo $background_color; ?>;
				border: <?php echo $border; ?>;
				padding: <?php echo $button_padding ?>;
				margin: <?php echo $button_margin; ?>;
			}

			/*button.erm-btn:hover{
				background: #<?php echo $hover_background_color; ?>;
				color: #<?php echo $hover_text_color; ?> !important;
			}*/
			
		</style>

<?php	}


}