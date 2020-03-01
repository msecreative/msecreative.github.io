<?php 

add_shortcode( 'counter_box', 'counter_box_section_function' );
function counter_box_section_function( $atts ) {
	 $result = shortcode_atts( array(
		'counter_box' => ''

	), $atts ) ;
	 extract($result);

ob_start();
  
?>
			<section class="counter-part section-p">
				<div class="container">
					<div class="counter-box">
						<div class="row">
							<!-- Single Counter -->
							<?php 
							$values = vc_param_group_parse_atts($atts['counter_box']);
							foreach ($values as $item): ?>
							<div class="col-6 col-sm-6 col-lg-3 d-flex justify-content-center justify-content-lg-start">
								<div class="counter-item">
									<div class="count-des">
										<i class="<?php echo esc_attr($item['icon']); ?>"></i>
									</div>
									<div class="count-des">
										<h2 class="counter"><?php echo esc_html($item['counter_no']); ?></h2>
										<p><?php echo esc_html($item['counter_title']); ?></p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

						</div>
					</div>
				</div>
			</section>


<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'counter_box_section_el' );
function counter_box_section_el() {
	vc_map( array(
		"name" => esc_html( "Counter Box", "imgra" ),
		"base" => "counter_box",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(
			
			array(
				'type' => 'param_group',
				'param_name' => 'counter_box',
				'params' => array(


					array(
						'type' => 'iconpicker',
						'heading' =>  esc_html( 'Select Icon For Counter Box', 'imgra' ),
						'param_name' => 'icon',
					),

					array(
						'type' => 'textfield',
						'heading' =>  esc_html( 'Enter Counter Number', 'imgra' ),
						'param_name' => 'counter_no',
					),

					array(
						'type' => 'textfield',
						'heading' =>  esc_html( 'Enter Counter Title', 'imgra' ),
						'param_name' => 'counter_title',
					)
				)
			)
		)
	) 
);

}


 ?>