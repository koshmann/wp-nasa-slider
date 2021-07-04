<?php 

/**
 * Fired everyday to update gallery.
 *
 * @link       https://github.com/koshmann
 * @since      1.0.0
 *
 * @package    nasa_slider
 */


add_action('get_everyday_image', 'update_data_from_external_api');

function schedule_get_everyday_image() {
	if ( ! wp_next_scheduled( 'get_everyday_image' ) ) {
		wp_schedule_event( time(), 'daily', 'get_everyday_image' );
	}
}

function update_data_from_external_api(){

	$response = wp_remote_get('https://api.nasa.gov/planetary/apod?api_key=2vIBTLz1ZZZ3iTj0nQo5NRxo5om3ySJbIdsnOFen');
	$response = json_encode($response); 
	$data = json_decode($response); 
	$body = json_decode($data->body);


	$new_slide = array(
		'post_type'     => 'post-nasa-gallery',
		'post_title'    => $body->date,
		'post_status'   => 'publish',
		'post_author'   => 1,
	);

	require_once(ABSPATH . 'wp-admin/includes/media.php');
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	require_once(ABSPATH . 'wp-admin/includes/image.php');
	
	$new_slide_ID = wp_insert_post( $new_slide );

	$new_slide_img = media_sideload_image( $body->url, $new_slide_ID, null, 'id' );

	set_post_thumbnail( $new_slide_ID, $new_slide_img );

}
