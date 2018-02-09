<?php
/*
Plugin Name: Maintenance WP
Plugin URI: https://github.com/operat/maintenance-wp
GitHub Plugin URI: https://github.com/operat/maintenance-wp
Description: Show visitors a clean temporary website when undergoing maintenance.
Version: 1.3
Author: Operat
Author URI: https://www.operat.de
License: GNU GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

if (!defined('WPINC')) { die; }

define('MAINTENANCE_WP_NAME', 'Maintenance WP');
define('MAINTENANCE_WP_DESCRIPTION', 'Show visitors a clean temporary website when undergoing maintenance.');
define('MAINTENANCE_WP_URL', 'https://github.com/operat/maintenance-wp');
define('MAINTENANCE_WP_MESSAGE', '<b>The temporary website is active.</b> Anyone who\'s not a logged in user with admin or editor rights won\'t see the proper website.');

require_once 'MaintenanceWP.Maintenance.php';
require_once 'MaintenanceWP.PluginManager.php';

add_action('wp_loaded', array('MaintenanceWP_Maintenance', 'showTemporaryWebsite'));
add_action('admin_notices', array('MaintenanceWP_Maintenance', 'showAdminMessage'));
add_action('init', array('MaintenanceWP_PluginManager', 'init'));
register_activation_hook(__FILE__, array('MaintenanceWP_PluginManager', 'setDefaultOptions'));

if (is_admin()) {
   require_once 'MaintenanceWP.SettingsPage.php';
   $settingsPage = new MaintenanceWP_SettingsPage();
}
