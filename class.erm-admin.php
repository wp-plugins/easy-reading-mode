<?php

class ERM_Admin{

	// Function to add admin menu
	function erm_admin_menu_options(){
		add_options_page( 'Easy Reading Mode | Options Page' , 'Reading Mode' , 'manage_options' , 'reading-mode-options-page' , array( 'ERM_Admin' , 'admin_page_content' ) );
		
		// Registering Plugin Options
		register_setting( 'erm-settings-group', 'erm_is_activated' );
		register_setting( 'erm-settings-group', 'erm_background_url' );
	}

	// Admin page content
	function admin_page_content(){
		echo '<form method="post" action="options.php" class="erm-options-form">';
		settings_fields( 'erm-settings-group' );
    	do_settings_sections( 'erm-settings-group' );
	
		// Fetching Current Option Settings
    	$background_url = esc_attr( get_option( 'erm_background_url' ) );
    	$activated = esc_attr( get_option('erm_is_activated') );

    	// 1. Activation Option
		echo '<label>Reading Mode Active</label>';
		if($activated == 'yes'){
			echo '<input type="radio" name="erm_is_activated" value="yes" checked="checked">Yes';
			echo '<input type="radio" name="erm_is_activated" value="no">No<br>';
		}else{
			echo '<input type="radio" name="erm_is_activated" value="yes">Yes';
			echo '<input type="radio" name="erm_is_activated" value="no" checked="checked">No<br>';
		}

		// 2. Background Option
		echo '<label>Background url</label><input type="text" name="erm_background_url" value="'.$background_url.'"/>';
		
		// 3. Submit Button
		submit_button();
		
		echo '</form>';
		
	}

}