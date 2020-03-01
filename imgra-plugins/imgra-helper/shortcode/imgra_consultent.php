<?php 

add_shortcode( 'imgra_consultent', 'imgra_consultent_function' );
function imgra_consultent_function( $atts ) {
	 $result = shortcode_atts( array(
		'consultent_type' => 'one',
		'view_post'   => '',
		'btn_text'   => '',
        'btn_target'   => '_blank',


	), $atts ) ;
	 extract($result);

ob_start();
  
?>
<?php if ($consultent_type == 'one'): ?>
<!--  Team Part Start  -->
<section class="team-part">
        <div class="row">
            <!-- Single Team-->
            <?php $consultent_q = new WP_Query(array(
                'post_type' => 'consultent',
                'posts_per_page' => $view_post
            )); ?>
            <?php while($consultent_q->have_posts()): $consultent_q->the_post(); ?>

                         <!-- Single Team-->
            <div class="col-12 col-sm-6 col-lg-4 pb-5">
                <div class="team-item">
                    <div class="team-img">
                        <?php the_post_thumbnail(); ?>
                        <div class="team-member-name">
                            <h2><?php the_title(); ?></h2>
                            <div class="team-member-des">
                    <?php $consultent_meta = get_post_meta(get_the_ID(), 'imgra_consultent_meta_options', true);
                    $desg = isset($consultent_meta['consultent_desg']) ? $consultent_meta['consultent_desg'] : array();
                    $social = isset($consultent_meta['consultent_social_info']) ? $consultent_meta['consultent_social_info'] : array();
                        ?>
                                <p><?php echo esc_html($desg); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="team-social">
                        <ul class="flat-list">
                            <?php foreach ($social as $value): ?>
                            <li><a href="<?php echo esc_url($value['social_address']); ?>"><i class="<?php echo esc_attr($value['social_icon']); ?>"></i></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Team-->

            <?php endwhile; ?>

        </div>
   
</section>
<!--  Team Part End  -->
<?php endif; ?>


<?php if ($consultent_type == 'two'): ?>
<!-- Team-2 Part Start -->
<section class="team-2-part">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="swiper-container team-3-slider" data-swiper-config='{"loop": true, "effect": "slide", "speed": 800, "autoplay": 5000, "paginationClickable": true,"slidesPerView" : 3 ,"spaceBetween": 30,"breakpoints": { "500": { "slidesPerView": 1},"768": { "slidesPerView": 2 }}}'>
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <?php $consultent_q = new WP_Query(array(
                    'post_type' => 'consultent',
                    'posts_per_page' => $view_post
                    )); ?>
            <?php while($consultent_q->have_posts()): $consultent_q->the_post(); ?>
                        <!-- Single Exprt Slider  -->
                        <div class="swiper-slide">
                            <div class="team-2-item text-center">
                                <div class="team-2-img">
                                    <?php the_post_thumbnail(); ?>
                                    <div class="team-2-social">
                                        <ul>
                <?php 
                $consultent_meta = get_post_meta(get_the_ID(), 'imgra_consultent_meta_options', true);
                $social = isset($consultent_meta['consultent_social_info']) ? $consultent_meta['consultent_social_info'] : array();
                ?>
                  <?php foreach($social as $item): ?>
                    <li><a href="<?php echo esc_url($item['social_address']); ?>"><i class='<?php echo esc_attr($item['social_icon']); ?>'></i></a></li>
                    <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-2-des">
                                    <h4><?php the_title(); ?></h4>
                    <?php 
                    $consultent_meta = get_post_meta(get_the_ID(), 'imgra_consultent_meta_options', true);
                    $desg = isset($consultent_meta['consultent_desg']) ? $consultent_meta['consultent_desg'] : array(); ?>
                                    <p><?php echo esc_html( $desg ); ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Exprt Slider  -->
                        
                        <?php endwhile; ?>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team-2 Part End -->

<?php endif; ?>

<?php if ($consultent_type == 'three'): ?>
    <!-- Team-2 Part End -->
    <section class="team-2-part pad-bot-30">
        <div class="container">
            <div class="row">
            <?php $consultent_q = new WP_Query(array(
                    'post_type' => 'consultent',
                    'posts_per_page' => $view_post
                    )); ?>
            <?php while($consultent_q->have_posts()): $consultent_q->the_post(); ?>
                <div class="col-12 col-sm-6 col-lg-4 text-center">
                    <div class="team-2-item">
                        <div class="team-2-img">
                           <?php the_post_thumbnail(); ?>
                            <div class="team-2-social">
                                <ul>
                    <?php $consultent_meta = get_post_meta(get_the_ID(), 'imgra_consultent_meta_options', true);
                    $desg = isset($consultent_meta['consultent_desg']) ? $consultent_meta['consultent_desg'] : array();
                    $social = isset($consultent_meta['consultent_social_info']) ? $consultent_meta['consultent_social_info'] : array();
                        ?>
                                <?php foreach($social as $item): ?>
                                    <li><a href="<?php echo esc_url($item['social_address']); ?>"><i class='<?php echo esc_attr($item['social_icon']); ?>'></i>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="team-2-des">
                            <h4><?php the_title(); ?></h4>
                            <p><?php echo esc_html($desg); ?></p>
                        </div>
                    </div>
                </div>
             <?php endwhile; ?>


            </div>
        </div>
    </section>
    <!-- Team-2 Part End -->
<?php endif; ?>

<?php if ( $consultent_type == 'four' ): ?>

    <!-- Team-3 Part End -->
    <!-- Team-3 Part End -->
    <section class="team-3-part">
        <div class="container">
            <div class="row">
  
                <!-- Single Team style three -->
                <?php $consultent_q = new WP_Query(array(
                    'post_type' => 'consultent',
                    'posts_per_page' => $view_post
                    )); ?>
            <?php while($consultent_q->have_posts()): $consultent_q->the_post(); ?>
                <div class="col-12 col-sm-6 col-lg-4 text-center">
                    <div class="team-3-item">
                        <div class="team-3-img">
                            <?php the_post_thumbnail(); ?>
                            <div class="team-3-social">
                                <ul>
                    <?php $consultent_meta = get_post_meta(get_the_ID(), 'imgra_consultent_meta_options', true);
                    $desg = isset($consultent_meta['consultent_desg']) ? $consultent_meta['consultent_desg'] : array();
                    $social = isset($consultent_meta['consultent_social_info']) ? $consultent_meta['consultent_social_info'] : array();
                        ?>
                        <?php foreach($social as $item): ?>
                                  <li><a href="<?php echo esc_attr($item['social_address']); ?>"><i class='<?php echo esc_attr($item['social_icon']); ?>'></i></a></li>
                           <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="team-3-des">
                            <h4><?php the_title(); ?></h4>
                            <p><?php echo esc_html($desg); ?></p>
                        </div>
                        <div class="team-3-details">
                            <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>" target="<?php echo esc_attr($btn_target); ?>"><?php echo esc_html($btn_text); ?></a>
                    </div>
                </div>

            <?php endwhile; ?>

            </div>
        </div>
    </section>
    <!-- Team-2 Part End -->
	
<?php endif ?>

<?php if ( $consultent_type == 'five' ): ?>
    <!-- Team four area start -->
    <section class="team-4-part">
        <div class="container">
            <div class="row">
                <!-- Single team -->
                 <?php $consultent_q = new WP_Query(array(
                    'post_type' => 'consultent',
                    'posts_per_page' => $view_post
                    )); ?>
            <?php while($consultent_q->have_posts()): $consultent_q->the_post(); ?>
                <div class="col-md-6 col-xl-4">
                    <div class="attorneys-4-item text-center">
                        <div class="item-img">
                            <?php the_post_thumbnail(); ?>
                            <span class="border-big"></span>
                            <div class="hover-content">
                                <div class="team-4-details">
                                    <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                </div>
                                <div class="team-4-social">
                                    <ul>
                    <?php $consultent_meta = get_post_meta(get_the_ID(), 'imgra_consultent_meta_options', true);
                    $desg = isset($consultent_meta['consultent_desg']) ? $consultent_meta['consultent_desg'] : array();
                    $social = isset($consultent_meta['consultent_social_info']) ? $consultent_meta['consultent_social_info'] : array();
                        ?>
                        <?php foreach($social as $item): ?>
                                  <li><a href="<?php echo esc_attr($item['social_address']); ?>"><i class='<?php echo esc_attr($item['social_icon']); ?>'></i></a></li>
                           <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="team-4-des">
                            <h4><?php the_title(); ?></h4>
                            <p><?php echo esc_html($desg); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
                
            </div>
        </div>
    </section>
    <!-- Team four area end -->
<?php endif; ?>
<?php
return ob_get_clean();
}

add_action( 'vc_before_init', 'imgra_consultent_el' );
function imgra_consultent_el() {
	vc_map( array(
		"name" => esc_html( "Imgra Consultent", "imgra" ),
		"base" => "imgra_consultent",
		"category" => esc_html( "Imgra Helper", "imgra"),
		"params" => array(
			array(
				'type'          => 'textfield',
				'heading'       =>  esc_html( 'Enter Consultent Post No', 'imgra' ),
				'param_name'    => 'view_post',

					),

			array(
				'type'          => 'dropdown',
				'heading'       =>  esc_html( 'Select Consultent Style', 'imgra' ),
				'param_name'    => 'consultent_type',
				'value'         => array(
                    'Bottom Social Icon Style'=> 'one',
                    'Carousel Style'          => 'two',
                    'Left Social Icon Style'  => 'three',
			        'About Me Button Style'   => 'four',
                    'Text Hover Style'   	  => 'five'
      				),

			),

			array(
                'type'          => 'textfield',
                'heading'       =>  esc_html( 'Enter Button Text', 'imgra' ),
                'param_name'    => 'btn_text',
                'dependency' => array('element' => 'consultent_type', 'value' => 'four')

                    ),
			
		)
	) 
);

}


 ?>