<?php
add_action( 'init', 'post_nasa_gallery_register_post_type' );

function post_nasa_gallery_register_post_type() {
	$args = [
		'label'  => esc_html__( 'NASA Slides', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'NASA Slides', 'post-nasa-gallery' ),
			'name_admin_bar'     => esc_html__( 'NASA Slide', 'post-nasa-gallery' ),
			'add_new'            => esc_html__( 'Add NASA Slide', 'post-nasa-gallery' ),
			'add_new_item'       => esc_html__( 'Add new NASA Slide', 'post-nasa-gallery' ),
			'new_item'           => esc_html__( 'New NASA Slide', 'post-nasa-gallery' ),
			'edit_item'          => esc_html__( 'Edit NASA Slide', 'post-nasa-gallery' ),
			'view_item'          => esc_html__( 'View NASA Slide', 'post-nasa-gallery' ),
			'update_item'        => esc_html__( 'View NASA Slide', 'post-nasa-gallery' ),
			'all_items'          => esc_html__( 'All NASA Slides', 'post-nasa-gallery' ),
			'search_items'       => esc_html__( 'Search NASA Slides', 'post-nasa-gallery' ),
			'parent_item_colon'  => esc_html__( 'Parent NASA Slide', 'post-nasa-gallery' ),
			'not_found'          => esc_html__( 'No NASA Slides found', 'post-nasa-gallery' ),
			'not_found_in_trash' => esc_html__( 'No NASA Slides found in Trash', 'post-nasa-gallery' ),
			'name'               => esc_html__( 'NASA Slides', 'post-nasa-gallery' ),
			'singular_name'      => esc_html__( 'NASA Slide', 'post-nasa-gallery' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-star-filled',
		'supports' => [
			'title',
			'thumbnail',
		],
		
		'rewrite' => true
	];

	register_post_type( 'post-nasa-gallery', $args );

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'nasa-thumb', 500, 300 );
	}
}