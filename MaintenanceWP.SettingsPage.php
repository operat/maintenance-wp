<?php
/*
 * SettingsPage
 */

class MaintenanceWP_SettingsPage {

   public function __construct() {
      add_action('admin_menu', array($this, 'addPage'));
      add_action('admin_init', array( $this, 'initPage'));
   }

   public function addPage() {
      add_options_page(
         MAINTENANCE_WP_NAME,
         MAINTENANCE_WP_NAME,
         'manage_options',
         'maintenance-wp',
         array($this, 'createPage')
      );
   }

   public function createPage() {
      $this->options = get_option('maintenance_wp_options');

      ?>
         <div class="wrap">
            <h1><?php echo MAINTENANCE_WP_NAME; ?></h1>
            <p>
               <b><?php echo MAINTENANCE_WP_DESCRIPTION; ?></b><br>
               Find information, report issues and make contributions on <a href="<?php echo MAINTENANCE_WP_URL; ?>" title="<?php echo MAINTENANCE_WP_NAME; ?>" target="_blank">GitHub</a>.
            </p>
            <form method="post" action="options.php">
            <?php
               settings_fields('maintenance_wp');
               do_settings_sections('maintenance-wp');
               submit_button();
            ?>
            </form>
         </div>
      <?php
   }

   public function initPage() {
      register_setting(
         'maintenance_wp',
         'maintenance_wp_options'
      );

      add_settings_section(
         'general-settings',
         'General Settings',
         array(
            $this,
            'printGeneralInfo'
         ),
         'maintenance-wp'
      );

      add_settings_field(
         'text-first-line',
         'Text (first line)',
         array(
            $this,
            'printTextinput'
         ),
         'maintenance-wp',
         'general-settings',
         array( // $args
            $this,
            'field' => 'text-first-line'
         )
      );

      add_settings_field(
         'text-second-line',
         'Text (second line)',
         array(
            $this,
            'printTextinput'
         ),
         'maintenance-wp',
         'general-settings',
         array( // $args
            $this,
            'field' => 'text-second-line'
         )
      );

   }

   public function printGeneralInfo() {
      // print '';
   }

   public function printTextinput($args) {
      $field = $args['field'];
      $value = esc_attr($this->options[$field]);

      echo '<input type="text" id="'. $field .'" name="maintenance_wp_options[' . $field . ']" value="' . $value . '" size="50">';
   }

}
