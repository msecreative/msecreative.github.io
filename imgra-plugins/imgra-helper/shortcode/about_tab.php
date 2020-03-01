<?php 

add_shortcode( 'about_tab', 'about_tab_section_function' );
function about_tab_section_function( $atts ) {
	 $result = shortcode_atts( array(
		'tab_1_name' => '',
		'tab_2_name' => '',
		'tab_3_name' => '',
		'tab_1_img' => '',
		'tab_2_img' => '',
		'tab_3_img' => '',
		'tab_1_title' => '',
		'tab_2_title' => '',
		'tab_3_title' => '',
		'tab_1_desc' => '',
		'tab_2_desc' => '',
		'tab_3_desc' => '',
		'tab_1_item_title' => '',
		'tab_2_item_title' => '',
		'tab_3_item_title' => '',
		'about_items_1' => '',
		'about_items_2' => '',
		'about_items_3' => '',


	), $atts ) ;
	 extract($result);

ob_start();
  
?>
    <!-- About-4 Part Start -->

    <!-- About-4 Part End -->
    		    <div class="about-tab">
                <div class="row about-tab-inner " >
                <div class="col-lg-2 col-xl-2">
                    <div class="about-tab-button">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="flaticon-heart-broken-in-half"></i><p><?php echo esc_html($tab_1_name); ?></p></a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="flaticon-loan"></i><p><?php echo esc_html($tab_2_name); ?></p></a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="flaticon-family"></i><p><?php echo esc_html($tab_3_name); ?></p></a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-10 col-xl-10">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active inner-ab-tab" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-md-6 col-lg-7 col-xl-7 pl-0">
                                    <div class="ab-tab-l">
                                        <h3><?php echo esc_html($tab_1_title); ?></h3>
                                        <p><?php echo esc_html($tab_1_desc); ?></p>
                                        <h4><?php echo esc_html($tab_1_item_title); ?></h4>
                                        <ul>
                                        	<?php
				                                $items1 = vc_param_group_parse_atts($atts['about_items_1']);
				                                 foreach($items1 as $item1) :?>
	                                            <li><p><?php echo esc_html($item1['item_1']) ?></p></li>
                                          <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-5 col-xl-5 pl-0">
                                    <div class="about-tab-img">
                                    	<?php $img1 = wp_get_attachment_image_src($tab_1_img, 'full' ); ?>
                                        <img src="<?php echo esc_url($img1[0]); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade inner-ab-tab" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-lg-7 col-xl-7 pl-0">
                                    <div class="ab-tab-l">
                                        <h3><?php echo esc_html($tab_2_title); ?></h3>
                                        <p><?php echo esc_html($tab_2_desc); ?></p>
                                        <h4><?php echo esc_html($tab_2_item_title); ?></h4>
                                        <ul>
                                            <?php
				                                $items2 = vc_param_group_parse_atts($atts['about_items_2']);
				                                 foreach($items2 as $item2) :?>
	                                            <li><p><?php echo esc_html($item2['item_2']) ?></p></li>
                                          <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-5 pl-0">
                                    <div class="about-tab-img">
                                        <?php $img2 = wp_get_attachment_image_src($tab_2_img, 'full' ); ?>
                                        <img src="<?php echo esc_url($img2[0]); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade inner-ab-tab" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="row">
                                <div class="col-lg-7 col-xl-7 pl-0">
                                    <div class="ab-tab-l">
                                        <h3><?php echo esc_html($tab_3_title); ?></h3>
                                        <p><?php echo esc_html($tab_3_desc); ?></p>
                                        <h4><?php echo esc_html($tab_3_item_title); ?></h4>
                                        <ul>
                                            <?php
				                                $items3 = vc_param_group_parse_atts($atts['about_items_3']);
				                                 foreach($items3 as $item3) :?>
	                                            <li><p><?php echo esc_html($item3['item_3']) ?></p></li>
                                          <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-5 pl-0">
                                    <div class="about-tab-img">
                                        <?php $img3 = wp_get_attachment_image_src($tab_3_img, 'full' ); ?>
                                        <img src="<?php echo esc_url($img3[0]); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'about_tab_section_el' );
function about_tab_section_el() {
	vc_map( array(
		"name" => esc_html( "About Tab", "imgra" ),
		"base" => "about_tab",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(

		    array(
                'type'			=> 'textfield',
                'heading'		=>  esc_html( 'Enter About Tab Name', 'imgra' ),
                'param_name'	=> 'tab_1_name',
                'group'      	=> esc_html('Tab One', 'imgra')

            ),

            array(
                'type'			=> 'attach_image',
                'heading'		=>  esc_html( 'About Tab Image', 'imgra' ),
                'param_name'	=> 'tab_1_img',
                'group'      	=> esc_html('Tab One', 'imgra')

            ),

            array(
                'type'			=> 'textfield',
                'heading'		=>  esc_html( 'About Tab Title', 'imgra' ),
                'param_name'	=> 'tab_1_title',
                'group'      	=> esc_html('Tab One', 'imgra')

            ),   

            array(
                'type'			=> 'textarea',
                'heading'		=>  esc_html( 'About Tab Description', 'imgra' ),
                'param_name'	=> 'tab_1_desc',
                'group'      	=> esc_html('Tab One', 'imgra')

            ),            

            array(
                'type'			=> 'textfield',
                'heading'		=>  esc_html( 'About Tab Item title', 'imgra' ),
                'param_name'	=> 'tab_1_item_title',
                'group'      	=> esc_html('Tab One', 'imgra')

            ),

			array(
				'type'			=> 'param_group',
				'param_name'	=> 'about_items_1',
				'group'      	=> esc_html('Tab One', 'imgra'),
				'params'		=> array(
				array(
					'type'		=> 'textfield',
					'heading'	=>  esc_html( 'Enter About Item', 'imgra' ),
					'param_name'=> 'item_1',
				),
            ),
		),



			array(
                'type'			=> 'textfield',
                'heading'		=>  esc_html( 'Enter About Tab Name', 'imgra' ),
                'param_name'	=> 'tab_2_name',
                'group'      	=> esc_html('Tab Two', 'imgra')

            ),

            array(
                'type'			=> 'attach_image',
                'heading'		=>  esc_html( 'About Tab Image', 'imgra' ),
                'param_name'	=> 'tab_2_img',
                'group'      	=> esc_html('Tab Two', 'imgra')

            ),

            array(
                'type'			=> 'textfield',
                'heading'		=>  esc_html( 'About Tab Title', 'imgra' ),
                'param_name'	=> 'tab_2_title',
                'group'      	=> esc_html('Tab Two', 'imgra')

            ),

            array(
                'type'			=> 'textarea',
                'heading'		=>  esc_html( 'About Tab Description', 'imgra' ),
                'param_name'	=> 'tab_2_desc',
                'group'      	=> esc_html('Tab Two', 'imgra')

            ),            

            array(
                'type'			=> 'textfield',
                'heading'		=>  esc_html( 'About Tab Item title', 'imgra' ),
                'param_name'	=> 'tab_2_item_title',
                'group'      	=> esc_html('Tab Two', 'imgra')

            ),

			array(
				'type'			=> 'param_group',
				'param_name'	=> 'about_items_2',
				'group'      	=> esc_html('Tab Two', 'imgra'),
				'params'		=> array(
				array(
					'type'		=> 'textfield',
					'heading'	=>  esc_html( 'Enter About Item', 'imgra' ),
					'param_name'=> 'item_2',
				),
            ),
		),

            array(
                'type'			=> 'textfield',
                'heading'		=>  esc_html( 'Enter About Tab Name', 'imgra' ),
                'param_name'	=> 'tab_3_name',
                'group'      	=> esc_html('Tab Three', 'imgra')

            ),

            array(
                'type'			=> 'attach_image',
                'heading'		=>  esc_html( 'About Tab Image', 'imgra' ),
                'param_name'	=> 'tab_3_img',
                'group'      	=> esc_html('Tab Three', 'imgra')

            ),

            array(
                'type'			=> 'textfield',
                'heading'		=>  esc_html( 'About Tab Title', 'imgra' ),
                'param_name'	=> 'tab_3_title',
                'group'      	=> esc_html('Tab Three', 'imgra')

            ),

            array(
                'type'			=> 'textarea',
                'heading'		=>  esc_html( 'About Tab Description', 'imgra' ),
                'param_name'	=> 'tab_3_desc',
                'group'      	=> esc_html('Tab Three', 'imgra')

            ),            

            array(
                'type'			=> 'textfield',
                'heading'		=>  esc_html( 'About Tab Item title', 'imgra' ),
                'param_name'	=> 'tab_3_item_title',
                'group'      	=> esc_html('Tab Three', 'imgra')

            ),

			array(
				'type'			=> 'param_group',
				'param_name'	=> 'about_items_3',
				'group'      	=> esc_html('Tab Three', 'imgra'),
				'params'		=> array(
				array(
					'type'		=> 'textfield',
					'heading'	=>  esc_html( 'Enter About Item', 'imgra' ),
					'param_name'=> 'item_3',
				),
            ),
		),

		)
	) 
);

}


 ?>