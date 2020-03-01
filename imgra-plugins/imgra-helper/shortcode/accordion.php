<?php 

add_shortcode( 'accordion', 'accordion_section_function' );
function accordion_section_function( $atts ) {
	 $result = shortcode_atts( array(
		'accordion_type' => 'one',
        'acc_img'        => '',
        'accordion'      => '',


	), $atts ) ;
	 extract($result);

ob_start();
  
?>

<?php if ($accordion_type == 'one'): ?>

    <!-- About-4 Part Start -->
    <div class="about-4-part">
            <div class="row justify-content-center">
 

                <div class="col-md-8 col-xl-6">
                    <div class="about-4-img">
                        <?php $a_img = wp_get_attachment_image_src($acc_img, 'full'); ?>
                        <img src="<?php echo esc_url($a_img[0]); ?>" alt="">
                    </div>
                </div>
               
                <div class="col-md-8 col-xl-6">
                    <div class="about-4-des active">
                        <div id="accordion-4" class="about-4-accodian">
                        <?php $acc = vc_param_group_parse_atts($atts['accordion']);
                            foreach($acc as $value): ?>
                            <div class="accodian-4-item">
                                <div class="accodian-4-head" data-toggle="collapse" data-target="#collapse-4-One" >
                                    <h5 class="bold"><?php echo esc_html($value['title']); ?></h5>
                                </div>
                                <div id="collapse-4-One" class="accodian-4-result collapse" data-parent="#accordion-4">
                                    <p><?php echo esc_html($value['desc']); ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
                 
            </div>
           </div>
    <!-- About-4 Part End -->
<?php endif; ?>


<?php if ($accordion_type == 'two'): ?>
<!-- About Part Start -->
<section class="about-3-part">
    <div class="container">

        <div class="row">
           <div class="col-md-12 col-lg-5 col-xl-6">
            <div id="accordion" class="about-accodian">
            <?php $acc = vc_param_group_parse_atts($atts['accordion']);
                            foreach($acc as $value): ?>
                <!-- Single Accordion -->
                <div class="accodian-item">
                    <div class="accodian-head active d-flex align-items-center" >
                        <h5><a class="" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" ><?php echo esc_html($value['title']); ?></a></h5>
                    </div>
                    <div id="collapseOne" class="accodian-result collapse" data-parent="#accordion">
                        <p><?php echo esc_html($value['desc']); ?></p>
                    </div>
                </div>
                <!-- Single Accordion -->
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-5  col-xl-6">
            <div class="about-3">
                <div class="about-3-1">
                    <div data-relative-input="true" id="about-3-1">
                        <div data-depth="0.4"><?php $a_img = wp_get_attachment_image_src($acc_img, 'full'); ?>
                        <img src="<?php echo esc_url($a_img[0]); ?>" alt=""></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</section>
<!-- About Part End -->
<?php endif; ?>

<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'accordion_section_el' );
function accordion_section_el() {
	vc_map( array(
		"name" => esc_html( "Accordion", "imgra" ),
		"base" => "accordion",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(
			
				    array(
                        'type'          => 'dropdown',
                        'heading'       =>  esc_html( 'Select Service Type', 'imgra' ),
                        'param_name'    => 'accordion_type',
                        'value'         => array(
                            'Accordion With Right Side Image' => 'one',
                            'Accordion With Left Side Image'  => 'two',
                            ),
                    ),

                    array(
                        'type' => 'attach_image',
                        'heading' =>  esc_html( 'Select Accordion Image For Left/Right Side', 'imgra' ),
                        'param_name' => 'acc_img',

                    ),

                    array(
                        'type' => 'param_group',
                        'heading' =>  esc_html( 'Enter Accordion', 'imgra' ),
                        'param_name' => 'accordion',
                        'params' => array(

                    array(
                        'type' => 'textfield',
                        'heading' =>  esc_html( 'Enter Accordion Title', 'imgra' ),
                        'param_name' => 'title',

                    ),

                    array(
                        'type' => 'textarea',
                        'heading' =>  esc_html( 'Enter Accordion Description', 'imgra' ),
                        'param_name' => 'desc',

                    ),

                 ),
            )

		)
	) 
);

}


 ?>