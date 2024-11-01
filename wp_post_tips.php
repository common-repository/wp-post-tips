<?php
/*
Plugin Name: wp_post_tips
Plugin URI: http://www.jsndks.com/wp-post-tips/
Description: This plugin displays tooltips on the links widget and displays the link description.
Version: 1.4.3
Author: Jason Dicks
Author URI: http://www.jtdportfolio.com
License: GPL2
*/

/*
Copyright 2010  Jason Dicks  (email : jtd361@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//---Include the script into the page
wp_enqueue_script('wp_post_tips', WP_PLUGIN_URL . '/wp-post-tips/wp_post_tips.js', array('jquery'));

function addHeaderCode() {
	if(get_option('bubbleStyle')){
		echo '<link type="text/css" rel="stylesheet" href="' . WP_PLUGIN_URL . '/wp-post-tips/'.get_option('bubbleStyle').'.css" />' . "\n";
	}else{
		echo '<link type="text/css" rel="stylesheet" href="' . WP_PLUGIN_URL . '/wp-post-tips/bubble1.css" />' . "\n";
	}
}
// Hook for adding plugin front-end
add_action('wp_head', 'addHeaderCode');

//--------------------------------------

// Hook for adding admin menus
add_action('admin_menu', 'add_pages');

function add_pages() {
    // Add a new submenu under Options:
    add_options_page('wp-post-tips', 'wp-post-tips', 'administrator', 'wp-post-tips', 'options_page');
    
    //call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
	//register our settings
	register_setting( 'wppt-opions-group', 'bubbleStyle' );
}


function options_page() {
?>
	
    <div class="wrap">
		<h2>WP-POST-TIPS</h2>
	
		<form method="post" action="options.php">
		<?php settings_fields( 'wppt-opions-group' ); ?>
		
		<?php
		$bubbleStyle = get_option('bubbleStyle');
		$opt1 = 'bubble1';
		$opt2 = 'bubble2';
		$opt3 = 'bubble3';
		$opt4 = 'bubble4';
		$opt5 = 'bubble5';
		?>
		
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Bubble Styles</th>
			</tr>
			<tr valign="top">
				<th scope="row">option-1</th>
				<td><input type="radio" name="bubbleStyle" value="<?=$opt1?>" <?php if($bubbleStyle == $opt1){echo 'checked';}?> /></td>
				<td><img src="<?=WP_PLUGIN_URL . '/wp-post-tips/images/bubbles/bubble1.png'?>"  /></td>
			</tr>
			<tr valign="top">
				<th scope="row">option-2</th>
				<td><input type="radio" name="bubbleStyle" value="<?=$opt2?>" <?php if($bubbleStyle == $opt2){echo 'checked';}?> /></td>
				<td><img src="<?=WP_PLUGIN_URL . '/wp-post-tips/images/bubbles/bubble2.png'?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">option-3</th>
				<td><input type="radio" name="bubbleStyle" value="<?=$opt3?>" <?php if($bubbleStyle == $opt3){echo 'checked';}?> /></td>
				<td><img src="<?=WP_PLUGIN_URL . '/wp-post-tips/images/bubbles/bubble3.png'?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">option-4</th>
				<td><input type="radio" name="bubbleStyle" value="<?=$opt4?>" <?php if($bubbleStyle == $opt4){echo 'checked';}?> /></td>
				<td><img src="<?=WP_PLUGIN_URL . '/wp-post-tips/images/bubbles/bubble4.png'?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">option-5</th>
				<td><input type="radio" name="bubbleStyle" value="<?=$opt5?>" <?php if($bubbleStyle == $opt5){echo 'checked';}?> /></td>
				<td><img src="<?=WP_PLUGIN_URL . '/wp-post-tips/images/bubbles/bubble5.png'?>" /></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="bubbleStyle" />
		<p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>

	</form>
	</div>
<?php }?>
