<?php
/*
Plugin Name: WP Admin Menu
Plugin URI: http://jeremyhixon.com/wordpress-admin-menu
Description: A convenient method for navigating into administration from any place in your site. Page, post, archive or otherwise. A more in-depth description, installation instructions and questions/comments can be found <a href="http://jeremyhixon.com/wordpress-admin-menu" title="WP Admin menu - Jeremy Hixon">on my site</a>.
Version: 1.8
Author: Jeremy Hixon
Author URI: http://jeremyhixon.com
License: GPL2

Copyright 2010  Jeremy Hixon  (email : jeremy@jeremyhixon.com)

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
	if (get_option('wpam_suppress_ab') == 1) {
		add_filter('show_admin_bar', '__return_false'); // remove the WordPress 3.1 admin bar for all users
	}

	add_action('admin_menu','wpam_menu');
	function wpam_menu() {
		add_options_page(__('WP Admin Menu'), __('WP Admin Menu'), 'administrator', 'wpam', 'wpam_options');
		add_action( 'admin_init', 'register_wpam_settings' );
	}
	function register_wpam_settings() {
		register_setting('wpam-settings-group', 'wpam_suppress_ab');	
		register_setting('wpam-settings-group', 'wpam_suppress');	
		register_setting('wpam-settings-group', 'wpam_roles');	
		register_setting('wpam-settings-group', 'wpam_hide_front');	
		register_setting('wpam-settings-group', 'wpam_hide_dev');	
		register_setting('wpam-settings-group', 'wpam_hide');	
	}
	function wpam_options() {
		include('wpam-options.php');
	}
	
	add_action('wp_head', 'wpam_style');
	add_action('admin_head', 'wpam_style');
	function wpam_style() {
		print '<link href="'.get_bloginfo('wpurl').'/wp-content/plugins/wp-admin-menu/style.css" rel="stylesheet" type="text/css" />'."\n\r";
	}
	add_action('wp_footer', 'wp_admin_menu');
	add_action('admin_footer', 'wp_admin_menu');
	function wp_admin_menu() {
			$wpam_hide_front = get_option('wpam_hide_front');
			$wpam_roles = get_option('wpam_roles');
			if ( current_user_can('manage_options') || ($wpam_roles==1&&current_user_can('edit_posts'))) {
				if (is_admin() || (!is_admin() && (!$wpam_hide_front || $wpam_hide_front != 1))) {
					$wpam_suppress = get_option('wpam_suppress');
					$wpam_hide_dev = get_option('wpam_hide_dev');
					$wpam_fluency = (class_exists('WP_Fluency_Admin')) ? 1 : 0;
					$wpam_admin = (is_admin() && $_REQUEST['page'] == 'wpam') ? 1 : 0;
?>
<script>!window.jQuery && document.write('<script src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/wp-admin-menu/jquery-1.4.3.min.js"><\/script>')</script>
<script type="text/javascript">
	var baseUrl	= '<?php bloginfo('wpurl'); ?>';
	var suppress = <?php print (is_admin()&&$wpam_suppress==1) ? '1' : '0'; ?>;
	var wpamHideDev = <?php print ($wpam_hide_dev||$wpam_hide_dev==1) ? '1' : '0'; ?>;
	var showEdit = <?php print (is_single()||is_page()) ? '1' : '0'; ?>;	
	var editPostLink = '<?php edit_post_link('Edit', '', ''); ?>';
	var fluencyInstalled = <?php print $wpam_fluency; ?>;
	var admin = <?php print $wpam_admin; ?>;
</script>
<script src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/wp-admin-menu/scripts.js"></script>
<?php
			}
		}
	}
	function add_settings_link($links, $file) {
		static $this_plugin;
		if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
		
		if ($file == $this_plugin){
			$settings_link = '<a href="options-general.php?page=wpam">'.__("Settings", "wp-admin-menu").'</a>';
			array_unshift($links, $settings_link);
		}
		return $links;
	}
	add_filter('plugin_action_links', 'add_settings_link', 10, 2 );
?>
