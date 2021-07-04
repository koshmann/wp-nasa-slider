<?php 

/**
 * Add gallery shortcode + scripts and styles.
 *
 * @link       https://github.com/koshmann
 * @since      1.0.0
 *
 * @package    nasa_slider
*/


function nasa_gallery() {

	wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true );
	wp_enqueue_script('nasa-slider', plugin_dir_url( __FILE__ ) . 'assets/nasa-slider.js', array('jquery'), null, true );
	wp_enqueue_style( 'slick', plugin_dir_url( __FILE__ ) . 'assets/slick.css' );

	$slides = get_posts( array(
		'numberposts' => 5,
		'orderby'     => 'date',
		'post_type'   => 'post-nasa-gallery',
	) );
	?>
	<div class="nasa-slider">

		<?php
			foreach( $slides as $slide ){?>
				<div class="nasa-slide">
					<?php echo get_the_post_thumbnail( $slide, 'full');?>
				</div>
			<?php }
		?>
		
	</div>
	<div class="nasa-slider-nav"></div>
	
	<?php
	wp_reset_postdata();
}

add_shortcode( 'nasa-gallery' , 'nasa_gallery' );
