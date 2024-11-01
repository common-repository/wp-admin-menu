=== Plugin Name ===
Contributors: jeremyHixon
Donate link: http://jeremyhixon.com/wordpress-admin-menu#donate
Tags: administration, menu
Requires at least: 2.9.2
Tested up to: 3.1.3
Stable tag: 1.8

A convenient method for navigating into administration from any place in your site. Page, post, archive or otherwise.

== Description ==

WP Admin Menu creates a convenient copy of the Administration menu of your site at the top of every page in your WordPress installation. It is intended to create a more convenient means of navigating your administration options from any point in your website. It uses AJAX to fetch a copy of the administration menu of your website and formats it to fit along the top of your website.

* Tested and working in most modern browsers including Firefox, Chrome, Safari, Opera and IE8 on WordPress 2.9.2 & 3.0.3.
* Update notification for out of date browsers.
* Shows pending updates for "Comments" and "Plugins".
* Updates itself to match whatever plugins you have active.
* Provides you with a convenient "Edit" button on posts and pages for those who don't have them in their themes.
* Can suppress the default WordPress administration menu as well as the admin bar introduced in v3.1
* Supports administrators, editors, authors and contributors.
* Can be hidden on the front end.
* Links to development pages on WordPress can be hidden.
* In theory, the plugin should copy whatever is located in your administration menu. That being said it should automatically be "internationalized". If your administration menu is in the correct language this plugin should also reflect the correct language.

Information on this plugin can also be found on my site. [Jeremy Hixon](http://jeremyhixon.com/ "User Experience Designer and Developer :: Jeremy Hixon")

== Installation ==

1. Download the plugin
2. Extract the contents of the zip file to your /wp-content/plugins/ folder
3. Navigate to your Administration > Plugins page and activate "WP Admin Menu"
4. That's it, you should be good to go

Note: If your browser is out of date, click one of the links provided to update your browser.

== Screenshots ==

1. Illustrating the location
2. The drop-down effect
3. It will tell you if your browser is out-of-date

== Changelog ==

= 1.8 =
* Option to suppress the default WordPress admin bar added in v3.1.
* Option to hide menu on the "front end" of the site.
* Option to hide the WordPress development links.
* Fixed a minor conflict with "Fluency Admin".

= 1.7 =
* New for the new year! Tweaking the code to reduce the "footprint" left in the source code of the page by the plugin.

= 1.6 =
* Added an "Edit" button into the bar.

= 1.5 =
* Added a link to the plugin settings on the "Administration > Plugins" page.
* Fixing some incorrect links in the plugin description and readme.txt file.
* Added support for contributors, authors and editors.
* Added a setting for the above change.

= 1.4 =
* Editing the code to lessen conflicts with other javascript libraries.
* Adding plugin settings page with an option to supress the default wordpress menu in order to free up some space.

= 1.3 =
* The navigation items were being affected by some styles outside of wp-admin-menu defaults, those have been corrected.
* Added in some links to the WordPress Codex for those of us that often need the reference.

= 1.2 =
* Removed the queueing of jquery from wp_head. Instead we pull a version of jQuery from the plugin directory only if jQuery is not already defined.

= 1.1 =
* Added screenshots and the readme.txt file.