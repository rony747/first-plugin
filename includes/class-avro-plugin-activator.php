<?php

/**
 * Fired during plugin activation
 *
 * @link       https://avrotech.net
 * @since      1.0.0
 *
 * @package    Avro_Plugin
 * @subpackage Avro_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Avro_Plugin
 * @subpackage Avro_Plugin/includes
 * @author     t.i.rony <touhid_rony@yahoo.com>
 */
class Avro_Plugin_Activator
{

  /**
   * Short Description. (use period)
   *
   * Long Description.
   *
   * @since    1.0.0
   */
  public static function activate()
  {

    // Register custom post types
    require_once AVRO_PLUGIN_BASE_DIR. 'includes/class-avro-plugin-post-types.php';
    $plugin_post_types = new Avro_Plugin_Post_types(AVRO_PLUGIN_NAME, AVRO_PLUGIN_VERSION);
    $plugin_post_types->init();

    // flush permalinks
    flush_rewrite_rules();
  }

}
