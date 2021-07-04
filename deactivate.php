<?php 

/**
 * Fired when the plugin is deactivated.
 *
 * @link       https://github.com/koshmann
 * @since      1.0.0
 *
 * @package    nasa_slider
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

function remove_schedule_get_everyday_image() {
	wp_clear_scheduled_hook( 'get_everyday_image' );
}
