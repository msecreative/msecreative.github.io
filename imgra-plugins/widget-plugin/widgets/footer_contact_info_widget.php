<?php 
	class Footer_Contact_Info_Widget extends WP_Widget{
		public function __construct(){
			parent::__construct('footer-contact-info-widget', 'Imgra Footer Contact Info Widget');
		}

		public function widget( $args, $instance ) {
		?>
				<?php echo $args['before_widget']; ?>
						<?php if ('cs_get_option') {
							$companey_address = cs_get_option('contact_address');;
							$companey_phone = cs_get_option('phone_1');
							$companey_email = cs_get_option('companey_email');
				 		?>



			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="sin-footer-icon">
                    <div class="footer-icon">
                        <a href="#"><i class="fa fa-phone"></i></a>
                    </div>
                    <div class="footer-icon-text">
                        <h4>call us</h4>
                        <span><?php echo esc_html($companey_phone); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="sin-footer-icon">
                    <div class="footer-icon">
                        <a href="#"><i class="fa fa-envelope"></i></a>
                    </div>
                    <div class="footer-icon-text">
                        <h4>Email Us</h4>
                        <span><?php echo esc_html($companey_email); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4">
                <div class="sin-footer-icon">
                    <div class="footer-icon">
                        <a href="#"><i class="fa fa-home"></i></a>
                    </div>
                    <div class="footer-icon-text">
                        <h4>Location</h4>
                        <span><?php echo wp_kses_post($companey_address); ?></span>
                    </div>
                </div>
            </div>
				<?php } ?>
					
					<?php echo $args['after_widget']; ?>

		<?php
		}// end Instance and arg Function


	}// End Class