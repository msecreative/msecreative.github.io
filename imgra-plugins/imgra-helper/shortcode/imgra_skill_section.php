<?php 

add_shortcode( 'imgra_skill', 'imgra_skill_function' );
function imgra_skill_function( $atts ) {
	 $result = shortcode_atts( array(
		'consultant_section_head'       => '',
		'consultant_section_color_head' => '',
        'consultant_section_color_head' => '',
        'consultant_section_desc'       => '',
        'skill_section_head'            => '',
        'skill_section_color_head'      => '',
        'skill_section_desc'            => '',
        'select_skill'                  => '',



	), $atts ) ;
	 extract($result);

ob_start();
  
?>
<?php 
    $skill_class = ' ';
    $skill = $select_skill;
    if (true == $skill) {
        $skill_class = 'light_bg';
    }
?>
<!-- Skill Part Start -->
<section class="skill-part section-p <?php echo esc_attr($skill_class); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="skill-contact-form">
                    <div class="section-head-2">
                        <h2><?php echo esc_html($consultant_section_head); ?> <span><?php echo esc_html($consultant_section_color_head); ?></span></h2>
                        <p><?php echo esc_html($consultant_section_desc); ?></p>
                    </div>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-12">
                                <label>Free Consultation</label>
                            </div>
                            <div class="col-12 col-lg-12">
                                <input class="form-control" type="text" placeholder="Name*" required>
                            </div>
                            <div class="col-12 col-lg-12">
                                <input class="form-control" type="email" placeholder="Email*" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn-1">SEND US</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-xl-5 offset-xl-1">
                <div class="skill-box">
                    <div class="section-head-2">
                        <h2><?php echo esc_html($skill_section_head); ?> <span><?php echo esc_html($skill_section_color_head); ?></span></h2>
                        <p><?php echo esc_html($skill_section_desc); ?></p>
                    </div>
                    <div class="progressbar-box">
                         <?php if (function_exists('cs_get_option')) :
                          $pro_bar = cs_get_option('progress_bar');
                         ?>
                        <!-- Single Skill -->
                        <?php foreach($pro_bar as $pro_value): ?>
                        <div class="progressbar-wrapper">
                            <div class="progress vertical bottom">
                                <?php $p_img = wp_get_attachment_image_src($pro_value['progress_image'], 'full'); ?>
                                <div class="progress-bar six-sec-ease-in-out" data-bg-image="<?php echo esc_url($p_img[0]); ?>" role="progressbar" data-transitiongoal="<?php echo esc_attr($pro_value['percent']) ?>"></div>
                            </div>
                            <h5 class="font-size-16"><?php echo esc_html($pro_value['progress_title']) ?></h5>
                            <span><?php echo esc_html($pro_value['percent']) ?>%</span>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                     
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Skill Part End -->

<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'imgra_skill_el' );
function imgra_skill_el() {
	vc_map( array(
		"name" => esc_html( "Imgra Skill Section", "imgra" ),
		"base" => "imgra_skill",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(

        //Consultant Part

            array(
                'type'          => 'checkbox',
                'heading'       =>  esc_html( 'Select Light Background Section', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Light Background'),
                'param_name'    => 'select_skill',

            ),
            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Consultant Heading', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Consultant Heading'),
                'param_name'    => 'consultant_section_head',
                'group'         => esc_html('Consultant Option', 'imgra')

            ),

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Consultant Color Heading', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Consultant Color Heading'),
                'param_name'    => 'consultant_section_color_head',
                'group'         => esc_html('Consultant Option', 'imgra')

            ),

            array(
                'type'          => 'textarea',
                'heading'       =>  esc_html( 'Enter Consultant Description', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Consultant Description'),
                'param_name'    => 'consultant_section_desc',
                'group'         => esc_html('Consultant Option', 'imgra')

            ),

            // Skill Section

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Skill Heading', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Skill Heading'),
                'param_name'    => 'skill_section_head',
                'group'         => esc_html('Skill Option', 'imgra')

            ),

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Skill Color Heading', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Skill Color Heading White/Black'),
                'param_name'    => 'skill_section_color_head',
                'group'         => esc_html('Skill Option', 'imgra')

            ),

            array(
                'type'          => 'textarea',
                'heading'       =>  esc_html( 'Enter Skill Description', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Skill Description'),
                'param_name'    => 'skill_section_desc',
                'group'         => esc_html('Skill Option', 'imgra')

            ),    






			
		)
	) 
);

}


 ?>