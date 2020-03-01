<?php 

add_shortcode( 'client_logo_section', 'client_logo_section_function' );
function client_logo_section_function( $atts ) {
	 $result = shortcode_atts( array(
		'client_logo' => ''

	), $atts ) ;
	 extract($result);

ob_start();
  
?>

			<!-- Clint-Logo Part start -->
<section class="clint-logo-part">
    <div class="swiper-container clint-logo-slider"  data-swiper-config='{"loop": true, "effect": "slide", "speed": 900, "autoplay": 1500,"spaceBetween": 15, "paginationClickable": true, "slidesPerView" : 5 ,"breakpoints": { "320": { "slidesPerView": 1},"768": { "slidesPerView": 3 }}}'>
        <div class="swiper-wrapper">
        	<?php $values = vc_param_group_parse_atts($atts['client_logo']);
				foreach ($values as $item): ?>
            <div class="swiper-slide clint-logo-item" >
            	<?php $c_img = wp_get_attachment_image_src($item['img'], 'full'); ?>
            	<?php $href = vc_build_link($item['img_link']); ?>

                <a target="<?php echo esc_attr( $href['target'] ); ?>" href="<?php echo esc_url($href['url']); ?>"><img src="<?php echo esc_url($c_img[0]); ?>" alt=""></a>
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>

</section>


<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'client_logo_section_el' );
function client_logo_section_el() {
	vc_map( array(
		"name" => esc_html( "Client Logo", "imgra" ),
		"base" => "client_logo_section",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(
			
			array(
				'type' => 'param_group',
				'param_name' => 'client_logo',
				'params' => array(

					array(
						'type' => 'attach_image',
						'heading' =>  esc_html( 'Select Client Logo', 'imgra' ),
						'param_name' => 'img',
					),

					array(
						'type' => 'vc_link',
						'heading' =>  esc_html( 'Select Image Link', 'imgra' ),
						'param_name' => 'img_link',
					)
				)
			)
		)
	) 
);

}


 ?>