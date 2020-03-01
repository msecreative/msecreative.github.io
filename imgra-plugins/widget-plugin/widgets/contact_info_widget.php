<?php 
	class Contact_Info_Widget extends WP_Widget{
		public function __construct(){
			parent::__construct('contact-info-widget', 'Imgra Contact Info Widget');
		}

		public function widget( $args, $instance ) {
		?>
				<?php echo $args['before_widget']; ?><?php echo $args['before_title']; ?><?php echo $instance['title']; ?><?php echo $args['after_title']; ?>
				
					<div class="address-widget">
						<p><?php echo $instance['desc'];?></p>
						<?php if ('cs_get_option') {
							$companey_address = cs_get_option('contact_address');;
							$companey_phone = cs_get_option('phone_1');
							$companey_email = cs_get_option('companey_email');
							$work_details = cs_get_option('working_hours_details');
				 		?>

						<h6><i class="fa fa-map-marker" aria-hidden="true"></i>address</h6>
						<span><?php echo wp_kses_post($companey_address); ?></span>
						<h6><i class="fa fa-clock-o" aria-hidden="true"></i>WORKING HOURS</h6>
						<?php foreach($work_details as $w_value): ?>
							<span><?php echo esc_html($w_value['working_detail']); ?></span>
                            
                        <?php endforeach; ?>
						<h6 class="sb-phone"><i class="fa fa-phone" aria-hidden="true"></i>PHONE <span><?php echo esc_html($companey_phone); ?></span></h6>
						<h6 class="sb-email"><i class="fa fa-envelope" aria-hidden="true"></i>EMAIL<span><?php echo esc_html($companey_email); ?></span></h6>


					</div>
				<?php } ?>
					
					<?php echo $args['after_widget']; ?>

		<?php
		}


				public function form( $instance ) {
			?>
				<p>
					<label for="<?php echo $this->get_field_id('title')?>">Title</label>

					<input id="<?php echo $this->get_field_id('title')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $instance['title']?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('desc')?>">Description</label>

					<input id="<?php echo $this->get_field_id('desc')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('desc'); ?>"  value="<?php echo $instance['desc']?>">
				</p>

			<?php
		}

	}

 ?>