<?php 

add_shortcode( 'service_title_section', 'service_title_section_function' );
function service_title_section_function( $atts ) {
	 $result = shortcode_atts( array(
		'color_title' 	=> '',
		'title' 		=> '',
		'desc' 			=> ''
	), $atts ) ;
	 extract($result);

ob_start();
?>

			<div class="section-head-3-1 text-center">
				<h2><?php echo esc_html($color_title); ?> <span><?php echo esc_html($title); ?></span></h2>
				<p><?php echo esc_html($desc); ?></p>
			</div>


<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'service_title_section_el' );
function service_title_section_el() {
	vc_map( array(
		"name"		=> esc_html( "Service Title Section", "imgra" ),
		"base"		=> "service_title_section",
		"category" 	=> esc_html( "Imgra Helper", "imgra"),
		"params" 	=> array(
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html( "Service Color Title", "imgra" ),
				"param_name" 	=> "color_title",
				"description" 	=> esc_html( "Enter Service Color Title", "imgra" )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html( "Service Title", "imgra" ),
				"param_name" 	=> "title",
				"description" 	=> esc_html( "Enter Service Section Title", "imgra" )
			),
			array(
				"type" 			=> "textarea",
				"heading" 		=> esc_html( "Service Description", "imgra" ),
				"param_name" 	=> "desc",
				"description" 	=> esc_html( "Enter Service Section Description", "imgra" )
			),
		)
	) 
);

}


 ?>