<?php

/**
 * Fired when the plugin is activated to get initial 5pcs gallery.
 *
 * @link       https://github.com/koshmann
 * @since      1.0.0
 *
 * @package    nasa_slider
 */

function get_first_data_for_slider(){

	if (!get_option( 'nasa_slider_activated' )) {

		$today = date("Y-m-d");  
		$five_day_ago = date("Y-m-d",  strtotime('-5 days'));
	
		$response = wp_remote_get('https://api.nasa.gov/planetary/apod?api_key=2vIBTLz1ZZZ3iTj0nQo5NRxo5om3ySJbIdsnOFen&start_date=' . $five_day_ago . '&end_date=' . $today);
		$response = json_encode($response);
		$data = json_decode($response);
		$body = json_decode($data->body);

		require_once(ABSPATH . 'wp-admin/includes/media.php');
		require_once(ABSPATH . 'wp-admin/includes/file.php');
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		foreach ($body as $slide_data) {

			$new_slide = array(
				'post_type'     => 'post-nasa-gallery',
				'post_title'    => $slide_data->date,
				'post_status'   => 'publish',
				'post_author'   => 1,
			);
			
			$new_slide_ID = wp_insert_post( $new_slide );

			$new_slide_img = media_sideload_image( $slide_data->url, $new_slide_ID, null, 'id' );
			
			set_post_thumbnail( $new_slide_ID, $new_slide_img );
		}
	}

	add_option( 'nasa_slider_activated', time() ); 
}
