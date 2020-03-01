<?php 

add_shortcode( 'imgra_contact_us', 'imgra_contact_us_function' );
function imgra_contact_us_function( $atts ) {
	 $result = shortcode_atts( array(
		'contact_type' => 'one',
		'title'        => '',
		'c_title'      => '',
    'desc'         => '',
    'social_info'  => '',


	), $atts ) ;
	 extract($result);

ob_start();
  
?>
<?php if ($contact_type == 'one'): ?>
    

<div class="google-map">
  <div class="gmap3-area" data-lat="24.592631" data-lng="88.269891" data-mrkr="images/bg/map-marker.png">
  </div><!-- /.google-map -->
 </div><!-- /#map -->
    
    <!-- Map Area end -->
    
    <!-- Contact-info area Start -->
    <section class="contact-info">
        <div class="container-fluid no-pad">
           <div class="contact-info-inner">
               <div class="row no-gutters">
                <?php if (function_exists('cs_get_option')) :
                            $phone_one = cs_get_option('phone_1');
                            $phone_two = cs_get_option('phone_');
                            $companey_email = cs_get_option('companey_email');
                            $contact_address = cs_get_option('contact_address');
                         ?>
                  <div class="col-md-4">
                      
                       <div class="email-info sin-cont-info d-flex align-items-center">
                          <div class="center-wrap">
                           <i class="flaticon-at"></i>
                           <h3>Email Us</h3>
                           <p>Mail:<a href="mailto:<?php echo esc_html($companey_email); ?>"> <?php echo esc_html($companey_email); ?></a></p>
                           <a href="mailto:<?php echo esc_html($companey_email); ?>"> <?php echo esc_html($companey_email); ?></a>
                           </div>
                           
                       </div>
                   </div>
                   <div class="col-md-4">
                        <div class="office-location sin-cont-info d-flex align-items-center">
                           <div class="center-wrap">
                            <i class="flaticon-map-pin-marked"></i>
                            <h3>office location</h3>
                            <p><?php echo esc_html($contact_address); ?></p>
                           </div> 
                        </div>
                    </div>
                   <div class="col-md-4">
                        <div class="call-us sin-cont-info d-flex align-items-center">
                            <div class="center-wrap">
                                <i class="flaticon-telephone-of-old-design"></i>
                                <h3>call Us</h3>
                                <p>Phone: <a href="tel:<?php echo esc_html($phone_one); ?>"> <?php echo esc_html($phone_one); ?></a></p>
                                <a href="tel:<?php echo esc_html($phone_two); ?>"> <?php echo esc_html($phone_two); ?></a>
                            </div>
                        </div>
                   </div>
               <?php endif; ?>
                
               </div>
           </div>
        </div>
    </section>
    <!-- Contact-info area End -->
     
    
    <!-- Contact bottom area Start -->
    <section class="contuct-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                   <div class="con-bottom-inner">
                       <h4><?php echo esc_html($title); ?> <span><?php echo esc_html($c_title); ?></span></h4>
                       <div class="per-social">
                           <ul>
                               <?php $value = vc_param_group_parse_atts($atts['social_info']);
                                    foreach ($value as $item): ?>
                               <li><a href="<?php echo esc_url($item['s_add']); ?>"><i class="<?php echo esc_attr($item['s_icon']); ?>"></i></a></li>
                               <?php endforeach; ?>
                           </ul>
                        </div>
                        <p><?php echo esc_html($desc); ?></p>
                        <?php echo do_shortcode( $contact_f_sc ); ?>
                      
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Contact bottom area end -->
    <?php endif ?>

    <?php if ($contact_type == 'two'): ?>
        
 


 <div class="google-map">
  <div class="gmap3-area" data-lat="24.592631" data-lng="88.269891" data-mrkr="images/bg/map-marker.png">
  </div><!-- /.google-map -->
 </div><!-- /#map -->
    <!-- Contact bottom area Start -->
    <section class="contuct-bottom style-two">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                   <div class="con-bottom-inner">
                       <h4><?php echo esc_html($title); ?> <span><?php echo esc_html($c_title); ?></span></h4>
                       <div class="per-social">
                           <ul>
                             <?php $value = vc_param_group_parse_atts($atts['social_info']);
                                    foreach ($value as $item): ?>
                               <li><a href="<?php echo esc_url($item['s_add']); ?>"><i class="<?php echo esc_attr($item['s_icon']); ?>"></i></a></li>
                               <?php endforeach; ?>
                           </ul>
                        </div>
                        <p><?php echo esc_html($desc); ?></p>
                        <?php if (function_exists('cs_get_option')) :
                            $phone_one = cs_get_option('phone_1');
                            $phone_two = cs_get_option('phone_');
                            $companey_email = cs_get_option('companey_email');
                            $contact_address = cs_get_option('contact_address');
                         ?>

                            <p><span>Address:</span> <?php echo $contact_address; ?></p>
                        <p><span>Phone:</span><a href="tel:<?php echo esc_html($phone_one); ?>"> <?php echo esc_html($phone_one); ?></a></p>
                        <p><span>Mail: </span> <a href="email:<?php echo esc_html($companey_email); ?>"> <?php echo esc_html($companey_email); ?></a></p>

                        <?php endif; ?>

                   </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Contact bottom area end -->
<?php endif ?>

<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'imgra_contact_us_el' );
function imgra_contact_us_el() {
	vc_map( array(
		"name" => esc_html( "Imgra Contact Us", "imgra" ),
		"base" => "imgra_contact_us",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(

			array(
				'type'          => 'dropdown',
				'heading'       =>  esc_html( 'Select Contact Us Style', 'imgra' ),
				'param_name'    => 'contact_type',
				'value'         => array(
                    'Normal Style' => 'one',
                    'Bottom Style' => 'two',
      				),

			),

			array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Page Title', 'imgra' ),
                'param_name'    => 'title',

                    ),

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Page Color Title', 'imgra' ),
                'param_name'    => 'c_title',

                    ),

            array(
                'type'          => 'textarea',
                'heading'       =>  esc_html( 'Enter Description', 'imgra' ),
                'param_name'    => 'desc',

                    ),

            array(
                'type' => 'param_group',
                'param_name' => 'social_info',
                'params' => array(

            array(
                'type'          => 'iconpicker',
                'heading'       =>  esc_html( 'Choose Social Icon', 'imgra' ),
                'param_name'    => 's_icon',

                    ),

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Social Address', 'imgra' ),
                'param_name'    => 's_add',

                    ),
                )
            ),//group end

			
		)
	) 
);

}


 ?>