<?php
/*
 * PluginManager
 */

class MaintenanceWP_PluginManager {

   public static function init() {
      $options = get_option('maintenance_wp_options');

      if ($options !== FALSE) {
         new MaintenanceWP_Maintenance($options);
      }
   }

   public static function setDefaultOptions() {
      $defaults = array(
         'text-first-line' => 'This website is temporarily not available due to maintenance.',
         'text-second-line' => 'Please come back later.'
      );

      if (get_option('maintenance_wp_options') === FALSE) {
         update_option('maintenance_wp_options', $defaults);
      }

      return;
   }

}
