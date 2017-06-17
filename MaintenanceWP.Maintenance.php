<?php
/*
 * Maintenance
 */

class MaintenanceWP_Maintenance {

   // Show temporary website to anyone who's not a logged in user with admin rights
   public static function showTemporaryWebsite() {
      global $pagenow;

      if ($pagenow !== 'wp-login.php' && !current_user_can('manage_options') && !is_admin()) {
         header($_SERVER["SERVER_PROTOCOL"] . ' 503 Service Temporarily Unavailable', true, 503);
         header('Status: 503 Service Temporarily Unavailable');
         header('Retry-After: 3600');
         header('Content-Type: text/html; charset=utf-8');

         if (file_exists(plugin_dir_path(__FILE__) . 'temporary.php')) {
            require_once(plugin_dir_path(__FILE__) . 'temporary.php');
         }

         die();
      }
   }

   // Show message in WP admin
   public static function showAdminMessage() {
      $message = 'The temporary website is active. Anyone who\'s not a logged in user with admin rights won\'t see the proper website.';

      echo '<div class="notice notice-warning"><p>' . $message . '</p></div>';
   }

}
