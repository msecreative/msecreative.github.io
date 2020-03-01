<?php 

add_shortcode( 'imgra_exprience', 'imgra_exprience_function' );
function imgra_exprience_function( $atts ) {
	 $result = shortcode_atts( array(
		'select_exprence' 	=> 'one',
		'title'				=> '',
		'color_title' 		=> '',
		'desc' 				=> '',
		'button_text' 		=> '',
		'button_link' 		=> '',
		'video_link' 		=> '',
		'title1' 			=> '',
		'desc1' 			=> '',

	), $atts ) ;
	 extract($result);

ob_start();
  
?>
<?php if ( $select_exprence == 'one' ): ?>
	
<!-- Experience  Part Start -->
<section class="experience-part section-p">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="section-head-2">
                    <h2><?php echo esc_html($title); ?> <span class="white"><?php echo esc_html($color_title); ?></span></h2>
                    <p class="white"><?php echo esc_html($desc); ?></p>
                    <?php $href = vc_build_link($button_link); ?>
                    <a target="<?php echo esc_attr( $href['target'] ); ?>" href="<?php echo esc_url($href['url']); ?>" class="btn-1"><?php echo esc_html($button_text); ?></a>
                </div>
            </div>
            <div class="col-md-5 text-center text-lg-left">
                <div class="video_popup_two">
                    <div class="video-pop-inner">


                        <a class="video-btn venobox pop-up" data-autoplay="true" data-vbtype="video" href="<?php echo esc_html($video_link); ?>"> <i class="fa fa-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Experience  Part End -->
<?php endif ?>

<?php if ($select_exprence == 'two'): ?>

<section class="counter-3-part section-p">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-head light">
                    <h2><?php echo esc_html($title1); ?></h2>
                    <p><?php echo esc_html($desc1); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Counter -->
    	<?php if (function_exists('cs_get_option')) :
    	$counter = cs_get_option('counter_box_set');
				foreach ($counter as $item): ?>
            <div class="col-md-3 col-6 text-center">
                <div class="counter-3-item">
                    <div class="number-box">
                        <i class="<?php echo esc_attr($item['counterbox_icon']); ?>"></i>
                    </div>
                    <h2 class="white counter"><?php echo esc_html($item['counter_no']); ?></h2>
                    <h3 class="font-size-16"><?php echo esc_html($item['counter_title']); ?></h3>
                </div>
            </div>
            	<?php endforeach; ?>
        	<?php endif; ?>
        </div>
    </div>
</section>

<?php endif ?>

<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'imgra_exprience_el' );
function imgra_exprience_el() {
	vc_map( array(
		"name" => esc_html( "Imgra Exprience", "imgra" ),
		"base" => "imgra_exprience",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(

			array(
				'type' => 'dropdown',
				'heading' =>  esc_html( 'Select Exprience Type', 'imgra' ),
				'param_name' => 'select_exprence',
				 'value' => array(
    				esc_html( 'My Exprience With Video', 'imgra'  )		=> 'one',
    				esc_html( 'My Exprience With Counter Box', 'imgra'  ) 	=> 'two',
  						),
					),

			// Exprience Part With Video Section
			array(
				'type' => 'textfield',
				'heading' =>  esc_html( 'Enter Heading', 'imgra' ),
				'param_name' => 'title',
				'dependency' => array('element' => 'select_exprence', 'value' => 'one')
					),

			array(
				'type' => 'textfield',
				'heading' =>  esc_html( 'Enter Color Heading', 'imgra' ),
				'param_name' => 'color_title',
				'dependency' => array('element' => 'select_exprence', 'value' => 'one')
					),
			array(
				'type' => 'textarea',
				'heading' =>  esc_html( 'Enter Description', 'imgra' ),
				'param_name' => 'desc',
				'dependency' => array('element' => 'select_exprence', 'value' => 'one')
					),

			array(
				'type' => 'textfield',
				'heading' =>  esc_html( 'Enter Button Text', 'imgra' ),
				'param_name' => 'button_text',
				'dependency' => array('element' => 'select_exprence', 'value' => 'one')
					),
			array(
				'type' => 'vc_link',
				'heading' =>  esc_html( 'Enter Button Text', 'imgra' ),
				'param_name' => 'button_link',
				'dependency' => array('element' => 'select_exprence', 'value' => 'one')
					),

			array(
				'type' => 'textfield',
				'heading' =>  esc_html( 'Enter Enter Video Link Address', 'imgra' ),
				'param_name' => 'video_link',
				'dependency' => array('element' => 'select_exprence', 'value' => 'one')
					),

			// My Exprence With Counter Part
			
			array(
				'type' => 'textfield',
				'heading' =>  esc_html( 'Enter Exprence Heading', 'imgra' ),
				'param_name' => 'title1',
				'dependency' => array('element' => 'select_exprence', 'value' => 'two')
					),
			array(
				'type' => 'textarea',
				'heading' =>  esc_html( 'Enter Exprence Description', 'imgra' ),
				'param_name' => 'desc1',
				'dependency' => array('element' => 'select_exprence', 'value' => 'two')
					)
		)
	) 
);

}


 ?>