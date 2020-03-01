<?php 

add_shortcode( 'color_section_title', 'imgra_color_section_function' );
function imgra_color_section_function( $atts ) {
	 $result = shortcode_atts( array(
		'title' 		=> '',
		'color_title' 	=> '',
		'select_color' 	=> '',
		'desc' 			=> ''
	), $atts ) ;
	 extract($result);

ob_start();
?>
	<div class="<?php echo esc_attr($select_color); ?>">
		<div class="section-head-2 mb-3">
			<h2><?php echo esc_html($color_title); ?> <span><?php echo esc_html($title); ?></span></h2>
			<p><?php echo esc_html($desc); ?></p>
		</div>
	</div>


<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'imgra_color_title_section_el' );
function imgra_color_title_section_el() {
	vc_map( array(
		"name" => __( "Color Title Section", "imgra" ),
		"base" => "color_section_title",
		"category" => __( "Imgra Helper", "imgra"),
		"params" => array(
			
			array(
				"type" => "textfield",
				"heading" => __( "Color Section Title", "imgra" ),
				"param_name" => "color_title",
				"description" => __( "Enter Color Section Title", "imgra" )
			),
			array(
				"type" => "textfield",
				"heading" => __( "Section Title", "imgra" ),
				"param_name" => "title",
				"description" => __( "Enter Section Title", "imgra" )
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( "Select Color", "imgra" ),
				"param_name" 	=> "select_color",
				"description" 	=> __( "Enter Section Title", "imgra" ),
				"value"			=> array(
					'Black' =>'',
					'White' =>'testimonial-box'
				)
			),
			array(
				"type" => "textarea",
				"heading" => __( "Section Description", "imgra" ),
				"param_name" => "desc",
				"description" => __( "Enter Section Description", "imgra" )
			),
		)
	) 
);

}


 ?>