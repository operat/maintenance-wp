<?php
/*
Plugin Name: Maintenance WP
Plugin URI: https://github.com/operat/maintenance-wp
GitHub Plugin URI: https://github.com/operat/maintenance-wp
Description: Show visitors a clean temporary website when undergoing maintenance.
Version: 1.1
Author: Operat
Author URI: https://www.operat.de
License: GNU GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

if (!defined('WPINC')) { die; }

define('MAINTENANCE_WP_MESSAGE', '<b>The temporary website is active.</b> Anyone who\'s not a logged in user with admin rights won\'t see the proper website.');

require_once 'MaintenanceWP.Maintenance.php';

add_action('wp_loaded', array('MaintenanceWP_Maintenance', 'showTemporaryWebsite'));
add_action('admin_notices', array('MaintenanceWP_Maintenance', 'showAdminMessage'));
