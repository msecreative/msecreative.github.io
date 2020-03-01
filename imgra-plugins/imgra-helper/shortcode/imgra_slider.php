<?php 

add_shortcode( 'imgra_slider', 'imgra_slider_function' );
function imgra_slider_function( $atts ) {
	 $result = shortcode_atts( array(
		'slider_type' => '1',
		'view_post'   => '',
        'booking'     => ''


	), $atts ) ;
	 extract($result);

ob_start();
?>

<?php if ($slider_type == '1'){ ?>
	<section class="banner-part">
        <div class="swiper-container banner-slider home-one" data-swiper-config='{"loop": true, "effect": "fade", "speed": 800, "autoplay": 5000, "paginationClickable": true }'>
        	<?php $sl = new WP_Query(array(
            		'post_type'       =>'slider',
                    'posts_per_page'  => $view_post
            	)); ?>
            <div class="swiper-wrapper">
            	
	<?php while ($sl->have_posts()):$sl->the_post(); ?>
	<?php 
		$slider_meta 		= get_post_meta(get_the_ID(), 'imgra_slider_meta_options', true);
		$slider_big_title 	= isset($slider_meta['slider_big_title']) ? $slider_meta['slider_big_title'] : array();
		$slider_btn_txt 	= isset($slider_meta['slider_button_text']) ? $slider_meta['slider_button_text'] : array(); 
	?>
                <div class="swiper-slide banner-item" data-bg-image="<?php the_post_thumbnail_url(); ?>">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-12 banner-caption">
                                <h2 class="brand-color animated" data-animate="fadeInUp"><?php the_title(); ?></h2>
                                <h1 data-animate="fadeInUp"><?php echo esc_html($slider_big_title); ?></h1>
                                <div class="banner-line"></div>
                                <p data-animate="fadeInUp"><?php the_content(); ?></p>

                                <a href="<?php the_permalink(); ?>" class="btn-1" data-animate="fadeInUp"><?php echo esc_html($slider_btn_txt); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endwhile; ?>
 
            </div>
            <div class="swiper-pagination"></div>
        </div>
</section>
    	
    <?php }elseif($slider_type == '2'){ ?>

<!-- Banner Part Start -->
<section class="banner-3-part">
    <div class="swiper-container banner-slider-3" data-swiper-config='{"loop": true, "effect": "fade", "speed": 800, "autoplay": 5000, "paginationClickable": true ,"crossFade" : true }'>
        <div class="swiper-wrapper">
        	<?php $sl = new WP_Query(array(
            		'post_type'=>'slider',
                    'posts_per_page'  => $view_post
            	)); ?>
            <!-- Single Slider -->

    <?php while ($sl->have_posts()):$sl->the_post(); ?>
	<?php 
		$slider_meta 		= get_post_meta(get_the_ID(), 'imgra_slider_meta_options', true);
		$slider_big_title 	= isset($slider_meta['slider_big_title']) ? $slider_meta['slider_big_title'] : array();
		$slider_btn_txt 	= isset($slider_meta['slider_button_text']) ? $slider_meta['slider_button_text'] : array(); 
	?>
            <div class="swiper-slide banner-3-item" data-bg-image="<?php the_post_thumbnail_url(); ?>">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-xl-7 col-md-6">
                            <div class="banner-caption text-left">
                                <h2  class="brand-color"><?php the_title(); ?></h2>
                                <h1 class="text-left"><?php echo esc_html($slider_big_title); ?></h1>
                                <p><?php echo wp_trim_words(get_the_content(),10); ?></p>
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html($slider_btn_txt); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    		<?php endwhile ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div>


<div class="banner-overlay-form">
    <div class="container">
        <div class="row">
            <div class="banner-contact">
                <h2 class="brand-color"><span class="secondary-color">FREE</span>CONSULTATION</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <form>
                    <input type="text" placeholder="Your Name*">
                    <input type="text" placeholder="Your email*">
                    <input type="text" placeholder="phone number">
                    <button class="btn-1">BOOK NOW</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Banner Part End -->
        <?php } ?>    






<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'imgra_slider_el' );
function imgra_slider_el() {
	vc_map( array(
		"name" => esc_html( "Imgra Slider", "imgra" ),
		"base" => "imgra_slider",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(
			array(
				'type'          => 'textfield',
				'heading'       =>  esc_html( 'Enter Post No', 'imgra' ),
				'param_name'    => 'view_post',

					),

            array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Email Get Booking Info', 'imgra' ),
                'description'   =>  esc_html('This Field is use for Client Info'),
                'param_name'    => 'booking',
                'group'         => esc_html('Booking Option', 'imgra')

                    ),

			array(
				'type'          => 'dropdown',
				'heading'       =>  esc_html( 'Select Slider Type', 'imgra' ),
				'param_name'    => 'slider_type',
				'value'         => array(
			        'Slider One'   => '1',
			        'Slider Two'   => '2',
      				),



			),
			
		)
	) 
);

}


 ?>