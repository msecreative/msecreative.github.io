<?php 

add_shortcode( 'call_to_action', 'call_to_action_section_function' );
function call_to_action_section_function( $atts ) {
	 $result = shortcode_atts( array(
		'select_type' 	=> 'one',
		'title' 		=> '',
		'desc' 			=> '',
		'btn_text' 		=> '',
		'btn_link' 		=> '',

	), $atts ) ;
	 extract($result);

ob_start();
  
?>
<?php $href = vc_build_link($btn_link); ?>
<?php if ($select_type == 'one'): ?>
	

<!-- Call to Action Start -->
<div class="call_to_action">
    <div class="container">
        <div class="request-content">
            <div class="row d-flex align-items-center">
                <div class="col-xl-9 col-md-8 col-sm-7">
                    <h4><?php echo esc_html($title); ?></h4>
                    <p><?php echo esc_html($desc); ?></p>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-5 text-center text-sm-right">
                	
                    <a target="<?php echo esc_attr( $href['target'] ); ?>" href="<?php echo esc_url( $href['url'] ); ?>" class="btn-1"><?php echo esc_html($btn_text); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->
<?php endif ?>

<?php if ($select_type == 'two'): ?>
	<!-- Call to action Part Start -->
<div class="request section-p">
    <div class="container">
        <div class="request-content">
            <div class="row d-flex align-items-center">
                <div class="col-xl-9 col-md-8 col-sm-7">
                    <h4><?php echo esc_html($title); ?></h4>
                    <p><?php echo esc_html($desc); ?></p>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-5 text-center text-sm-right">
                    <a target="<?php echo esc_attr( $href['target'] ); ?>" href="<?php echo esc_url( $href['url'] ); ?>" class="btn-1"><?php echo esc_html($btn_text); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call to action Part End -->
<?php endif; ?>

<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'call_to_action_section_el' );
function call_to_action_section_el() {
	vc_map( array(
		"name" => esc_html( "Call To Action", "imgra" ),
		"base" => "call_to_action",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(
		
			array(
				'type' 			=> 'dropdown',
				'heading' 		=>  esc_html( 'Select Call To Action Type', 'imgra' ),
				'param_name' 	=> 'select_type',
				'value'      	=> array(

                    'With Background'  	=> 'one',
                    'Without Background'=> 'two',
      				),
			),

			array(
				'type' => 'textfield',
				'heading' =>  esc_html( 'Enter Call To Action Heading', 'imgra' ),
				'param_name' => 'title',
			),

			array(
				'type' => 'textarea',
				'heading' =>  esc_html( 'Enter Call To Action Description', 'imgra' ),
				'param_name' => 'desc',
			),

			array(
				'type' => 'textfield',
				'heading' =>  esc_html( 'Enter Call To Action Button Text', 'imgra' ),
				'param_name' => 'btn_text',
			),

			array(
				'type' => 'vc_link',
				'heading' =>  esc_html( 'Enter Call To Action Button Link', 'imgra' ),
				'param_name' => 'btn_link',
			),

		)
	) 
);

}


 ?>