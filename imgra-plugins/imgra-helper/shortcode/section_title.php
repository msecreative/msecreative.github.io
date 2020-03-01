<?php 

add_shortcode( 'title_section', 'imgra_helper_function' );
function imgra_helper_function( $atts ) {
	 $result = shortcode_atts( array(
		'title' 		=> '',
		'desc' 			=> '',
		'text_color' 	=> ''
	), $atts ) ;
	 extract($result);

ob_start();
?>
		<div class="section-head <?php echo esc_attr($text_color); ?>">
			<h2><?php echo esc_html($title); ?></h2>
			<p><?php echo esc_html($desc); ?></p>
		</div>


<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'imgra_title_section_el' );
function imgra_title_section_el() {
	vc_map( array(
		"name"		=> esc_html( "Title Section", "imgra" ),
		"base"		=> "title_section",
		"category" 	=> esc_html( "Imgra Helper", "imgra"),
		"params" 	=> array(
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html( "Section Title", "imgra" ),
				"param_name" 	=> "title",
				"description" 	=> esc_html( "Enter Section Title", "imgra" )
			),
			array(
				"type" 			=> "textarea",
				"heading" 		=> esc_html( "Section Description", "imgra" ),
				"param_name" 	=> "desc",
				"description" 	=> esc_html( "Enter Section Description", "imgra" )
			),

			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html( "Select Text Color", "imgra" ),
				"param_name" 	=> "text_color",
				"value" 		=> array(
					'Black'		=>'',
					'White'		=>'light'
					
				)
			),
		)
	) 
);

}


 ?>