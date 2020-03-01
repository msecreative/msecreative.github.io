<?php 

add_shortcode( 'imgra_testimonial', 'imgra_testimonial_function' );
function imgra_testimonial_function( $atts ) {
	 $result = shortcode_atts( array(
		'testi_section_head'        => '',
        'testi_section_color_head'  => '',
        'testi_section_desc'        => '',
        'testi_client_rating'       => '',
        'testi_client_sign'         => '',
        'stories_section_head'      => '',
        'stories_section_color_head'=> '',
        'stories_section_desc'      => '',
        'stories'                   => '',
        'testi_type'                => '',

	), $atts ) ;
	 extract($result);

ob_start();
?>
<?php 
    $testi_class = ' ';
    $testi = $testi_type;
    if (true == $testi) {
        $testi_class = 'light_bg';
    }
?>
<!-- Testiminial Part Start -->
<section class="testimonial-part section-p <?php echo esc_attr($testi_class); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 col-lg-6 mb-5 mb-lg-0">
                <div class="testimonial-box">
                    <div class="section-head-2">
                        <h2><?php echo esc_html($testi_section_head); ?> <span><?php echo esc_html($testi_section_color_head); ?></span></h2>
                        <p><?php echo esc_html($testi_section_desc); ?></p>
                    </div>
                    <div class="swiper-container testimonial-slider" data-swiper-config='{"loop": true, "effect": "slide", "speed": 800, "autoplay": 5000, "paginationClickable": true, "spaceBetween": 25 }' >
                        <div class="swiper-wrapper">

                            <!-- Single Testimonial -->
                        <?php if (function_exists('cs_get_option')): 
                            $testi_set = cs_get_option('testimonial_set'); ?>
                            
                            <?php foreach($testi_set as $testi_item): ?>
                            <div class="swiper-slide testimonial-item">
                                <div class="row">
                                    <div class="col-8 offset-2 col-sm-5 col-xl-4 offset-sm-0 mb-3 mb-sm-0">
                                        <div class="person-detail">
                                            <div class="person-img">
                                                <?php $c_img = wp_get_attachment_image_src($testi_item['client_img'], 'full'); ?>
                                                <img src="<?php echo esc_url($c_img[0]); ?>" alt="Image">
                                            </div>
                                            <h3><?php echo esc_html($testi_item['client_name']); ?></h3>
                                            <p><?php echo esc_html($testi_item['client_desg']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-7 col-xl-8">
                                        <div class="person-comment">
                                            <h4><?php echo esc_html($testi_item['review_heading']); ?></h4>
                                            <ul class="flat-list star">
                                                 <?php $rate = vc_param_group_parse_atts($atts['testi_client_rating']); ?>
                                                 <?php foreach ($rate as $item): ?>
                                                <li><i class="<?php echo esc_attr($item['rating_icon']); ?>"></i></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <div class="mains-comment">
                                                <p><i class="fa fa-quote-left"></i> <?php echo esc_html(wp_trim_words($testi_item['client_review']),23); ?><i class="fa fa-quote-right"></i> </p>
                                            </div>
                                            <?php $w_img = wp_get_attachment_image_src($testi_item['client_w_sign'], 'full'); ?>

                                            <?php $b_img = wp_get_attachment_image_src($testi_item['client_b_sign'], 'full'); ?>
                                            <?php if ($testi_type == true){ ?>
                                         <img src="<?php echo esc_url($b_img[0]); ?>" alt="">
                                    <?php }else{ ?>
                                            <img src="<?php echo esc_url($w_img[0]); ?>" alt="">
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;//end testimonial set ?>
                    <?php endif; ?>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="  col-12 col-xl-5 col-lg-6 offset-xl-1">
                <div class="section-head-2 mb-3">
                    <h2><?php echo esc_html($stories_section_head); ?> <span><?php echo esc_html($stories_section_color_head); ?></span></h2>
                    <p><?php echo esc_html($stories_section_desc); ?></p>
                </div>
                <div class="story-box">
                    <div class="row no-gutters justify-content-center">

                        <?php $st = vc_param_group_parse_atts($atts['stories']);
                            foreach ($st as $s_item):?>

                        <!-- Single Success Story -->

                        <div class="story-item d-sm-flex align-items-sm-center">
                            <div class="year text-center text-sm-right">
                                <div class="years year-left"><?php echo esc_html($s_item['year']); ?></div>
                            </div>
                            <div class="comment-box">
                                <div class="story-comment story-comment-right text-left mt-0">
                                    <p><?php echo esc_html($s_item['details']); ?></p>
                                    <?php $stories_img = wp_get_attachment_image_src($s_item['img'], 'full'); ?>
                                    <img src="<?php echo esc_url($stories_img[0]); ?>" alt="">
                                </div>
                            </div>
                        </div>
                         <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Testiminial Part End -->
<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'imgra_testimonial_el' );
function imgra_testimonial_el() {
	vc_map( array(
		"name" => esc_html( "Imgra Testimonial", "imgra" ),
		"base" => "imgra_testimonial",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(

            array(
                'type'          => 'checkbox',
                'heading'       =>  esc_html( 'Choose Light Background Testimonial', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Testimonial Select Testimonial Type'),
                'param_name'    => 'testi_type',

            ),

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Testimonial Heading', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Testimonial Heading'),
                'param_name'    => 'testi_section_head'

            ),

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Testimonial Color Heading', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Testimonial Color Heading White/Black'),
                'param_name'    => 'testi_section_color_head',

            ),

            array(
                'type'          => 'textarea',
                'heading'       =>  esc_html( 'Enter Testimonial Description', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Testimonial Description'),
                'param_name'    => 'testi_section_desc',

            ),    

            array(
                'type' => 'param_group',
                'param_name' => 'testi_client_rating',
                'params' => array(

                    array(
                        'type' => 'iconpicker',
                        'heading' =>  esc_html( 'Enter Ratting Icon', 'imgra' ),
                        'param_name' => 'rating_icon',
                    ),
                )
            ),

            //Stories Part

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Stories Heading', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Stories Heading'),
                'param_name'    => 'stories_section_head',
                'group'         => esc_html('Stories Option', 'imgra')

            ),

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Stories Color Heading', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Stories Color Heading'),
                'param_name'    => 'stories_section_color_head',
                'group'         => esc_html('Stories Option', 'imgra')

            ),

            array(
                'type'          => 'textarea',
                'heading'       =>  esc_html( 'Enter Stories Description', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Stories Description'),
                'param_name'    => 'stories_section_desc',
                'group'         => esc_html('Stories Option', 'imgra')

            ),

            array(
                'type' => 'param_group',
                'param_name' => 'stories',
                'group'   => esc_html('Stories Option', 'imgra'),
                'params' => array(

                    array(
                        'type' => 'textfield',
                        'heading' =>  esc_html( 'Enter Year of Stories', 'imgra' ),
                        'param_name' => 'year',
                    ),

                    array(
                        'type' => 'attach_image',
                        'heading' =>  esc_html( 'Choose Stories Single Image', 'imgra' ),
                        'param_name' => 'img',
                    ),

                    array(
                        'type' => 'textarea',
                        'heading' =>  esc_html( 'Choose Stories Details', 'imgra' ),
                        'param_name' => 'details',
                    ),
                )
            ),


			
		)
	) 
);

}


 ?>