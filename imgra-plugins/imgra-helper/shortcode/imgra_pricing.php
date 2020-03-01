<?php 

add_shortcode( 'pricing', 'pricing_section_function' );
function pricing_section_function( $atts ) {
	 $result = shortcode_atts( array(
		'order_now' => '',

	), $atts ) ;
	 extract($result);

ob_start();
  
?>

<!-- Pricing table start -->
<section class="picing-table">
	<div class="container">
		<div class="row">
			<?php if (function_exists('cs_get_option')): 
				$price = cs_get_option('price_set');
				foreach($price as $item):
				?>
			
			<!-- Single table start -->
			<div class="col-12 col-sm-6 col-lg-3">
				<div class="single-table">
					<h6><?php echo esc_html($item['plan']); ?></h6>
					<div class="table_price">
						<span class="t-price"><?php echo esc_html($item['price']); ?></span>
						<?php if ($item['time'] == 'day') { ?>
							<span class="duration">Daily</span>
						<?php }elseif($item['time'] == 'week'){ ?>
							<span class="duration">Weekly</span>
						<?php }elseif($item['time'] == 'month'){ ?>
							<span class="duration">Monthly</span>
						<?php }else{ ?>
						<span class="duration">Yearly</span>
						<?php } ?>
						
					</div>
					<div class="list-part">
						<?php echo wp_kses_post($item['detail']); ?>
					</div>
					<?php $href = vc_build_link($order_now); ?>
					<a target="<?php echo esc_attr( $href['target'] ); ?>" href="<?php echo esc_url($href['url']); ?>"><?php echo esc_html($item['button_text']); ?></a>
				</div>
			</div>
		<?php endforeach; ?>
		<?php endif ?>

		</div> <!-- Row end -->
	</div> <!--Container end -->
</section>
<!-- Pricing table end -->

<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'pricing_section_el' );
function pricing_section_el() {
	vc_map( array(
		"name" => esc_html( "Imgra Pricing Table", "imgra" ),
		"base" => "pricing",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(
			array(
				'type' => 'vc_link',
				'heading' =>  esc_html( 'Pricing Item Control', 'imgra' ),
				'param_name' => 'order_now',
					),
		)
	) 
);

}


 ?>