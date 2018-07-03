<?php
/*
Plugin Name: Headache With Pictures
Plugin URI: http://www.contutto.com/blog/software/quick-notes-on-the-wp-dashboard/
Description: "I'm having one of those things... A headache with pictures..."
Author: Alex G&uuml;nsche
Version: 0.1
Author URI: http://www.contutto.com/
*/

/*
	Headache With Pictures -- WP plugin to quickly note things on the dashboard.
	Copyright (C) 2006 Alex Guensche <ag@zirona.com>
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation in the Version 2.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
*/

// set a capability a user must have in order to be able to MODIFY the notes
// see http://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table

$cth_write_cap = 'publish_posts';

// set a capability a user must have in order to SEE the notes
$cth_read_cap = 'read';

// set the CSS styling of your textbox (for the HTML style tag of the textarea)
$cth_style = 'border: 1px solid #444; width: 100%; background: #ffd;';


// ----------- no more editing from here, unless you know what you do ----------


function cth_notes() {
	global $cth_read_cap, $cth_write_cap, $cth_style;
	if ( current_user_can($cth_write_cap) ) {
		add_option('cth_notes', 'Enter here whatever is on your mind.');
		if ( !empty($_POST['cth_submit']) ) {
			$cth_notes = $_POST['cth_notes'];
			update_option('cth_notes', $cth_notes);
		} else {
			$cth_notes = get_option('cth_notes');
		}
		$cth_notes = str_replace( array("\\\\", "\\", 'df1bZjR7hI8'), array('df1bZjR7hI8', '', "\\"), $cth_notes );
		echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><h3><label for="cth_notes">'.__('Notes').'</label></h3>';
		echo '<p><textarea id="cth_notes" name="cth_notes" rows="15" cols="40" style="'.$cth_style.'">'. $cth_notes.'</textarea></p><br /><input type="submit" value="' . __('Save') . '"><input type="hidden" name="cth_submit" value="true" /></form>';

	} elseif ( current_user_can($cth_read_cap) ) {
		$cth_notes = get_option('cth_notes');
		$cth_notes = str_replace( array("\\\\", "\\", 'df1bZjR7hI8'), array('df1bZjR7hI8', '', "\\"), $cth_notes );
		echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><h3><label for="cth_notes">'.__('Notes').'</label></h3>';
		echo '<p><textarea id="cth_notes" name="cth_notes" rows="15" cols="40" style="'.$cth_style.'" readonly="readonly">'. $cth_notes.'</textarea></p></form>';
	} else {
		return false;
	}
}

add_action('activity_box_end', 'cth_notes');
?>