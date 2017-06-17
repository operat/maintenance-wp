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

define('MAINTENANCE_WP_NAME', 'Maintenance WP');
define('MAINTENANCE_WP_DESCRIPTION', 'Show visitors a clean temporary website when undergoing maintenance.');
define('MAINTENANCE_WP_URL', 'https://github.com/operat/maintenance-wp');

require_once 'MaintenanceWP.Maintenance.php';

add_action('wp_loaded', array('MaintenanceWP_Maintenance', 'showTemporaryWebsite'));
add_action('admin_notices', array('MaintenanceWP_Maintenance', 'showAdminMessage'));
