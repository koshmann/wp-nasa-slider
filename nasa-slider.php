<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              https://github.com/koshmann
 * @since             1.0.0
 * @package           nasa_slider
 *
 * @wordpress-plugin
 * Plugin Name:       NASA Slider
 * Plugin URI:        https://github.com/koshmann
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            koshmann
 * Author URI:        https://github.com/koshmann
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hp-cpt
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'nasa_slider_VERSION', '1.0.0' );


require_once plugin_dir_path( __FILE__ ) . 'inc/slider-cpt.php';

require_once plugin_dir_path( __FILE__ ) . 'inc/slides-from-api.php';
register_activation_hook( __FILE__, 'schedule_get_everyday_image' );

require_once plugin_dir_path( __FILE__ ) . 'inc/first-batch.php';
register_activation_hook( __FILE__, 'get_first_data_for_slider' );

require_once plugin_dir_path( __FILE__ ) . 'deactivate.php';
register_deactivation_hook( __FILE__, 'remove_schedule_get_everyday_image' );


require_once plugin_dir_path( __FILE__ ) . 'inc/slider-shortcode.php';
