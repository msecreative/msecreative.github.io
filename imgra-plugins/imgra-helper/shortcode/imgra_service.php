<?php 

add_shortcode( 'imgra_service', 'imgra_service_function' );
function imgra_service_function( $atts ) {
	 $result = shortcode_atts( array(
		'service_type'  => 'one',
		'view_post'     => '',
        'icon'          => '',
        'img'           => '',


	), $atts ) ;
	 extract($result);

ob_start();
  
?>
 <?php if ($service_type == 'one'): ?>

<!-- Practise Part Start -->
    <section class="practise-part">
        <div class="container">
            <div class="row">
                <?php 

                $service = new WP_Query(array(
                    'post_type'         => 'service',
                    'posts_per_page'    => $view_post 
                )); ?>
                <!-- Single Practice -->
                <?php while($service->have_posts()): $service->the_post();
                    $service_meta = get_post_meta(get_the_ID(), 'imgra_service_meta_options', true);
                    $service_icon = isset($service_meta['service_icon']) ? $service_meta['service_icon'] : array();
                ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="practise-item">
                        
                        <div class="icon-box"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        	</h2>
                        <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                    </div>
                </div>
                
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- Practise Part End -->
      <?php endif ?>

    <?php if ($service_type == 'two'): ?>
            <!-- Service Part Start -->
<section class="practise-5-part pad-bot-50">
        <div class="container">

            <div class="row">
            	<?php 

                $service = new WP_Query(array(
                    'post_type'         => 'service',
                    'posts_per_page'    => $view_post 
                )); ?>
                <!-- Single Practice -->
                <?php while($service->have_posts()): $service->the_post();
                    $service_meta = get_post_meta(get_the_ID(), 'imgra_service_meta_options', true);
                    $service_icon = isset($service_meta['service_icon']) ? $service_meta['service_icon'] : array();
                ?>

                <div class="col-lg-4 col-sm-6">
                    <div class="practise-3-item practice-5-item">
                        <div class="icon-box"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                    </div>
                </div>
			<?php endwhile; ?>
            </div>

        </div>
    </section>
    <!-- Service Part End -->

    <?php endif ?>
     <!-- Service Icon with hover with Readmore Button Part Start -->
 <?php if ($service_type == 'three'): ?>

    <section class="practise-3-part pad-bot-50">
        <div class="container">
                <div class="row">
				<?php $service = new WP_Query(array(
                    'post_type'         => 'service',
                    'posts_per_page'    => $view_post 
                )); ?>
                <!-- Single Practice -->
                <?php while($service->have_posts()): $service->the_post();
                ?>
                <?php  
                $service_meta = get_post_meta(get_the_ID(), 'imgra_service_meta_options', true);
                $service_icon = isset($service_meta['service_icon']) ? $service_meta['service_icon'] : array();
                $service_read_icon = isset($service_meta['service_readmore_icon']) ? $service_meta['service_readmore_icon'] : array(); 
                ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="practise-3-item">
                            <div class="icon-box"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                            <a href="<?php the_permalink(); ?>">→</a>
                        </div>
                    </div>
				<?php endwhile; ?>
                </div>
      
        </div>
    </section>
<?php endif; ?>

<!-- Prictise area Part End -->

 <?php if ($service_type == 'four'): ?>

            <!-- Prictise area Part start -->
        <section class="practise-4-part pad-bot-50">
            <div class="container">
                <div class="row">
                    <?php $service = new WP_Query(array(
                    'post_type'         => 'service',
                    'posts_per_page'    => $view_post 
                )); ?>
                <?php while($service->have_posts()): $service->the_post();?>
              <!-- Single team -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="sin-practice-4">
                            <?php the_post_thumbnail(); ?>
                            <span>1</span>
                            <div class="pra-four-inner">
                             <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                             <p><?php echo wp_trim_words(get_the_content(), 25); ?></p>
                            
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
    </div>
    </div>
    </section>
<!-- Prictise area Part End -->
<?php endif ?>

<?php if ( $service_type == 'five' ): ?>

        <!-- Prictise area Part start -->
    <section class="practise-4-part pad-bot-30">
        <div class="container">
            <div class="row">
                <?php $service = new WP_Query(array(
                    'post_type'         => 'service',
                    'posts_per_page'    => $view_post 
                )); ?>
                <?php 

                while($service->have_posts()): $service->the_post();

                $service_meta = get_post_meta(get_the_ID(), 'imgra_service_meta_options', true);
                $service_btn_txt = isset($service_meta['service_button_text']) ? $service_meta['service_button_text'] : array();?>
                <!-- Single team -->
                <div class="col-sm-6 col-lg-4">
                    <div class="sin-practice-4">
                        <?php the_post_thumbnail(); ?>
                        <div class="pra-four-inner">
                         <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                         <p><?php echo wp_trim_words(get_the_content(), 25); ?></p>
                         <div class="read-more4">
                            <a href="<?php the_permalink(); ?>" class="line-style"><?php echo esc_html($service_btn_txt); ?></a>
                        </div>

                    </div>
                </div>
            </div>


    <?php endwhile; ?>

</div>
</div>
</section>
<!-- Prictise area Part End -->
    
<?php endif ?>

<?php if ($service_type == 'six'): ?>
    <!-- Feature area Start -->

<div class="feature-part section-p">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xl-7">
                <div class="feature-inner-wraper">
                    <?php $service = new WP_Query(array(
                    'post_type'         => 'service',
                    'posts_per_page'    => $view_post 
                )); ?>
                <?php 

                while($service->have_posts()): $service->the_post();

                $service_meta = get_post_meta(get_the_ID(), 'imgra_service_meta_options', true);
                $service_icon = isset($service_meta['service_icon']) ? $service_meta['service_icon'] : array();?>

                    <div class="single-feature l-box ">
                        <div class="show">
                            <div class="icon-box"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                        <div class="hide">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo wp_trim_words(get_the_content(), 6); ?></p>
                            <a href="<?php the_permalink(); ?>"><i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i></a>
                        </div>
                    </div>
                <?php endwhile; ?>

                </div>
            </div>
            <div class="col-lg-5 col-xl-5">
                <div class="feature-img-box">
                    <?php $s_img = wp_get_attachment_image_src($img, 'full'); ?>
                    <img src="<?php echo esc_url($s_img[0]); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feature area End -->
<?php endif; ?>




<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'imgra_service_el' );
function imgra_service_el() {
	vc_map( array(
		"name" => esc_html( "Imgra Service", "imgra" ),
		"base" => "imgra_service",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(
			array(
				'type'          => 'textfield',
				'heading'       =>  esc_html( 'Enter Service Post No', 'imgra' ),
				'param_name'    => 'view_post',

					),

			array(
				'type'          => 'dropdown',
				'heading'       =>  esc_html( 'Select Service Type', 'imgra' ),
				'param_name'    => 'service_type',
				'value'         => array(
                    'Icon Without Hover'   				=> 'one',
                    'Icon With Hover'   				=> 'two',
			        'Icon Hover With Readmore Button'  	=> 'three',
                    'Imgae Without Readmore Button'   	=> 'four',
                    'Imgae With Readmore Button'   	    => 'five',
                    'With Hover and Readmore Icon'      => 'six',
      				),
			),

            array(
                'type'          => 'iconpicker',
                'heading'       =>  esc_html( 'Enter Service Post Readmore Icon', 'imgra' ),
                'param_name'    => 'icon',
                'dependency' => array('element' => 'service_type', 'value' => 'six')

                    ),

            array(
                'type'          => 'attach_image',
                'heading'       =>  esc_html( 'Select Service Right Box Image', 'imgra' ),
                'param_name'    => 'img',
                'dependency' => array('element' => 'service_type', 'value' => 'six')

                    ),
			
		)
	) 
);

}


 ?>