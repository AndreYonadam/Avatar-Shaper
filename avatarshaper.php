<?php
/*
Plugin Name: Avatar Shaper
Plugin URI: http://andreyonadam.com
Description: Customize how to display user profile images.
Version: 1.0
Author: Andre Yonadam
Author URI: http://andreyonadam.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
// hook that runs the ashaper_uninstall when the plug-in is deactivated 
register_deactivation_hook(__FILE__, 'ashaper_uninstall');

/* includes */
include('includes/avataroptions.php'); //Saves the avatar options (i.e. selected shapes)
include('includes/classreplace.php'); //Replaces the class of the called avatar
include('includes/styles.php'); //Outputs custom styles

// function that runs when the plug-in is deactivated
// deletes all the information stored in the plug-in
function ashaper_uninstall(){
				$page    = 'avatar-shaper';
				$section = 'ashaper_section';
				// IDs of the options
				$idholder   = array(
								'shapeid',
								'customslider',
								'shadowenable',
								'shadowcolor',
								'gloss',
								'custommeathod'
				);
				// for loop that deletes all the options
				for ($i = 0; $i < count($idholder); $i++) {

delete_option( $idholder[$i]);
}
}

?>