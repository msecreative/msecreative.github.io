<?php 
/*
Plugin Name:Imgra Custom Widget.

/*

/**
 * Register Custom Widget For Imagra Theme
 *
 * 
 */


	require dirname(__FILE__).'/widgets/service_category_widget.php';
	require dirname(__FILE__).'/widgets/service_area_widget.php';
	require dirname(__FILE__).'/widgets/opening_time_widget.php';
	require dirname(__FILE__).'/widgets/contact_info_widget.php';
	//require dirname(__FILE__).'/widgets/subscribe_widget.php';
	require dirname(__FILE__).'/widgets/sidebar_subscribe_widget.php';
	require dirname(__FILE__).'/widgets/imara_about_widget.php';
	require dirname(__FILE__).'/widgets/footer_contact_info_widget.php';
	require dirname(__FILE__).'/widgets/category_widget.php';
	require dirname(__FILE__).'/widgets/imgra_author_widget.php';
	require dirname(__FILE__).'/widgets/popular_post_widget.php';
	require dirname(__FILE__).'/ajax.php';


	function imgra_custom_widgets_init() {
	//Sidebar One
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'imgra' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
		'before_widget' => '<div class="widget-subscribe">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Service Sidebar', 'imgra' ),
		'id'            => 's-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
		'before_widget' => '<div class="practice-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="wid-heading"><p>',
		'after_title'   => '</div></p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Service Single Sidebar', 'imgra' ),
		'id'            => 's-single-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
		'before_widget' => '<div class="sin-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="wid-heading"><p>',
		'after_title'   => '</div></p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Twitter Feed Widget', 'imgra' ),
		'id'            => 'twitter_feed',
		'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
		'before_widget' => '<h5>',
		'after_widget'  => '</h5>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'imgra' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
		'before_widget' => '<div class="footer-widget-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'imgra' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
		'before_widget' => '<div class="footer-widget-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'imgra' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
		'before_widget' => '<div class="footer-widget-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'imgra' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
		'before_widget' => '<div class="footer-widget-item subscribe-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );


	//Footer Info Sidebar

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Info Widget', 'imgra' ),
		'id'            => 'footerinfo',
		'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
		'before_widget' => '<div class="row footer-icon-area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	

	register_widget('Service_Category_Widget');
	register_widget('Service_Area_Widget');
	register_widget('Contact_Info_Widget');
	register_widget('Opening_Time_Widget');
	//register_widget('Imgra_Subscribe_Widget');
	register_widget('Imgra_Sidebar_Subscribe_Widget');
	register_widget('Imgra_About_Widget');
	register_widget('Footer_Contact_Info_Widget');
	register_widget('Category_Widget');
	register_widget('Imgra_Author_Widget');
	register_widget('Popular_Post');
}
add_action( 'widgets_init', 'imgra_custom_widgets_init' );