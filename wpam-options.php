<div class="wrap">
	<div class="icon32" id="icon-options-general"><br></div>
    <h2>WP Admin Menu</h2>
    <form method="post" action="options.php">
		<?php settings_fields( 'wpam-settings-group' ); ?>
        <h3>General Settings</h3>
        <table class="form-table">
        	<tr valign="top">
        		<th scope="row">Suppress WordPress admin bar</th>
        		<td>
                    <?php
						$wpam_suppress_ab = get_option('wpam_suppress_ab');
						$wpam_suppress_ab_yes = '';
						$wpam_suppress_ab_no = '';
						switch ($wpam_suppress_ab) {
							case 1:
								$wpam_suppress_ab_yes = 'checked';
								break;
							default:
								$wpam_suppress_ab_no = 'checked';
						}
					?>
                    <label><input type="radio" name="wpam_suppress_ab" value="0" <?php print $wpam_suppress_ab_no; ?> /> No</label> &nbsp; &nbsp;
                    <label><input type="radio" name="wpam_suppress_ab" value="1" <?php print $wpam_suppress_ab_yes; ?> /> Yes</label> <br />
        			<span class="description">Enabling this will hide WordPress&rsquo; default admin bar (Introduced in 3.1)</span>
        		</td>
        	</tr>
            <tr valign="top">
                <th scope="row">Suppress WordPress admin menu</th>
                <td>
                    <?php
						$wpam_suppress = get_option('wpam_suppress');
						$wpam_suppress_yes = '';
						$wpam_suppress_no = '';
						switch ($wpam_suppress) {
							case 1:
								$wpam_suppress_yes = 'checked';
								break;
							default:
								$wpam_suppress_no = 'checked';
						}
					?>
                    <label><input type="radio" name="wpam_suppress" value="0" <?php print $wpam_suppress_no; ?> /> No</label> &nbsp; &nbsp;
                    <label><input type="radio" name="wpam_suppress" value="1" <?php print $wpam_suppress_yes; ?> /> Yes</label> <br />
                    <span class="description">Enabling this will hide WordPress&rsquo; default left admin menu</span>
                </td>
            </tr>
            <tr valign="top">
            	<th scope="row">Allow for other roles</th>
                <td>
                    <?php
						$wpam_roles = get_option('wpam_roles');
						$wpam_roles_yes = '';
						$wpam_roles_no = '';
						switch ($wpam_roles) {
							case 1:
								$wpam_roles_yes = 'checked';
								break;
							default:
								$wpam_roles_no = 'checked';
						}
					?>
                    <label><input type="radio" name="wpam_roles" value="0" <?php print $wpam_roles_no; ?> /> No</label> &nbsp; &nbsp;
                    <label><input type="radio" name="wpam_roles" value="1" <?php print $wpam_roles_yes; ?> /> Yes</label> <br />
                    <span class="description">Checking "Yes" will allow all users, contributor and above, to see WP Admin Menu. Subscribers will <strong>not</strong> see it.</span>
                </td>
            </tr>
            <tr valign="top">
            	<th scope="row">Hide WP Admin Menu on the front end</th>
            	<td>
                    <?php
						$wpam_hide_front = get_option('wpam_hide_front');
						$wpam_hide_front_yes = '';
						$wpam_hide_front_no = '';
						switch ($wpam_hide_front) {
							case 1:
								$wpam_hide_front_yes = 'checked';
								break;
							default:
								$wpam_hide_front_no = 'checked';
						}
					?>
                    <label><input type="radio" name="wpam_hide_front" value="0" <?php print $wpam_hide_front_no; ?> /> No</label> &nbsp; &nbsp;
                    <label><input type="radio" name="wpam_hide_front" value="1" <?php print $wpam_hide_front_yes; ?> /> Yes</label> <br />
            		<span class="description">Checking "Yes" will cause the WP Admin Menu to only be displayed in the Admin section of the site.</span>
            	</td>
            </tr>
            <tr valign="top">
            	<th>Hide the WordPress development links</th>
            	<td>
                    <?php
						$wpam_hide_dev = get_option('wpam_hide_dev');
						$wpam_hide_dev_yes = '';
						$wpam_hide_dev_no = '';
						switch ($wpam_hide_dev) {
							case 1:
								$wpam_hide_dev_yes = 'checked';
								break;
							default:
								$wpam_hide_dev_no = 'checked';
						}
					?>
                    <label><input type="radio" name="wpam_hide_dev" value="0" <?php print $wpam_hide_dev_no; ?> /> No</label> &nbsp; &nbsp;
                    <label><input type="radio" name="wpam_hide_dev" value="1" <?php print $wpam_hide_dev_yes; ?> /> Yes</label> <br />
            		<span class="description">Checking "Yes" will remove the links on the right side of the WP Admin Menu</span>
            	</td>
            </tr>
		</table>
        <p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
    </form>
</div>