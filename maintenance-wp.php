<?php
/*
Plugin Name: Maintenance WP
Plugin URI: https://github.com/operat/maintenance-wp
GitHub Plugin URI: https://github.com/operat/maintenance-wp
Description: Show visitors a clean temporary website when undergoing maintenance.
Version: 1.0
Author: Operat
Author URI: https://www.operat.de
License: MIT
License URI: https://opensource.org/licenses/MIT
*/

if (!defined('WPINC')) { die; }

define('MAINTENANCE_WP_MESSAGE', '<b>The temporary website is active.</b> Anyone who\'s not a logged in user with admin rights won\'t see the proper website.');

require_once 'MaintenanceWP.Maintenance.php';

add_action('wp_loaded', array('MaintenanceWP_Maintenance', 'showTemporaryWebsite'));
add_action('admin_notices', array('MaintenanceWP_Maintenance', 'showAdminMessage'));
