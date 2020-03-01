<?php 

class Opening_Time_Widget extends WP_Widget{
	public function __construct(){
		parent::__construct('opening-time-widget', 'Imgra Opening Time Widget');
	}

	public function widget( $args, $instance ) {
		?>
		<?php echo $args['before_widget'] ?>
			<?php echo $args['before_title']; ?><?php echo $instance['title']; ?><?php echo $args['after_title']; ?>
			<?php if (function_exists('cs_get_option')):
				$work_details 	= cs_get_option('working_hours_details');
				$vacation 		= cs_get_option('vacation');
				?>
			
			<ul class="footer-widget-office-time">
				<li>
					<p>Opening Day:</p>
					<?php foreach($work_details as $w_value): ?>
							<p><?php echo esc_html($w_value['working_detail']); ?></p>
                    <?php endforeach; ?>
				</li>
				<li>
					<p>Vacation:</p>
					<p><?php echo wp_kses_post($vacation); ?></p>
				</li>
			</ul>
		<?php endif ?>
		<?php echo $args['after_widget']; ?>


		<?php
	}



	public function form( $instance ) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title')?>">Title</label>

			<input id="<?php echo $this->get_field_id('title')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $instance['title']?>">
		</p>

		<?php
	}


}

 ?>