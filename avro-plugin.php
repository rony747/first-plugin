<?php

/**
 *
 * @link              https://avrotech.net
 * @since             1.0.0
 * @package           Avro_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       avro plugin
 * Plugin URI:        https://avrotech.net
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            t.i.rony
 * Author URI:        https://avrotech.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       avro-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('AVRO_PLUGIN_VERSION', '1.0.0');

define('AVRO_PLUGIN_NAME', 'avro-plugin');

// Plugin Directory Path
define('AVRO_PLUGIN_BASE_DIR', plugin_dir_path(__FILE__));

// Plugin Directory URL
define('AVRO_PLUGIN_BASE_URL', plugin_dir_url(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-avro-plugin-activator.php
 */
function activate_avro_plugin()
{
  require_once plugin_dir_path(__FILE__) . 'includes/class-avro-plugin-activator.php';
  Avro_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-avro-plugin-deactivator.php
 */
function deactivate_avro_plugin()
{
  require_once plugin_dir_path(__FILE__) . 'includes/class-avro-plugin-deactivator.php';
  Avro_Plugin_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_avro_plugin');
register_deactivation_hook(__FILE__, 'deactivate_avro_plugin');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-avro-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_avro_plugin()
{

  $plugin = new Avro_Plugin();
  $plugin->run();
}
run_avro_plugin();


