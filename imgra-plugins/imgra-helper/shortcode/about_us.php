<?php 

add_shortcode( 'about_us', 'about_us_function' );
function about_us_function( $atts ) {
	 $result = shortcode_atts( array(
		'img' 			=> '',
		'title' 		=> '',
		'subtitle' 		=> '',
		'desc' 			=> '',
		'progress_bar' 	=> ''

	), $atts ) ;
	 extract($result);

ob_start();
  $bg = wp_get_attachment_image_src($img, 'full');
?>
    <section class="about_us section-p bg_dark" style="background-image:url(<?php echo esc_url($bg[0]); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <h2><?php echo esc_html($title); ?></h2>
                    <h6><?php echo esc_html($subtitle); ?> </h6>
                    <p><?php echo esc_html($desc); ?></p>

                  <div class="progress_bar_wrap">
                  <?php $value = vc_param_group_parse_atts($atts['progress_bar']);
					foreach ($value as $item): ?>
                     <div class=" progress_bar">
                        <span class="dial" data-number="<?php echo esc_attr($item['progress_no']); ?>"></span>
                        <span class="pro-num"><?php echo esc_html($item['progress_no']); ?>%</span>
                        <p><?php echo esc_html($item['progress_title']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>





<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'about_us_el' );
function about_us_el() {
	vc_map( array(
		"name" => esc_html( "About us", "imgra" ),
		"base" => "about_us",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(
			array(
				'type' => 'attach_image',
				'heading' =>  esc_html( 'Select Image For Background', 'imgra' ),
				'param_name' => 'img',
			),
			array(
				'type' => 'textfield',
				'heading' =>  esc_html( 'Enter Title', 'imgra' ),
				'param_name' => 'title',
			),

			array(
				'type' => 'textfield',
				'heading' =>  esc_html( 'Enter Subtitle', 'imgra' ),
				'param_name' => 'subtitle',
			),
			array(
				'type' => 'textarea',
				'heading' =>  esc_html( 'Enter Description', 'imgra' ),
				'param_name' => 'desc',
			),
			
			array(
				'type' => 'param_group',
				'param_name' => 'progress_bar',
				'params' => array(

					array(
						'type' => 'textfield',
						'heading' =>  esc_html( 'Enter Progress Number', 'imgra' ),
						'param_name' => 'progress_no',
					),

					array(
						'type' => 'textfield',
						'heading' =>  esc_html( 'Enter Progress Title', 'imgra' ),
						'param_name' => 'progress_title',
					)
				)
			)
		)
	) 
);

}


 ?>