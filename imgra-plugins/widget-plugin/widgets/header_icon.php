<?php 
	class social_icon extends WP_Widget{
		public function __construct(){
			parent::__construct('social-icon', 'Social Icon');
		}

		public function widget( $args, $instance ) {
		?>

		
		<div class="header-icon">
			<a href="contact-2.html" class="btn-1 d-none d-md-inline-block">Get A Quote</a>
			<ul class="flat-list social-icon d-inline-block">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				<li><a href="#"><i class="fa fa-google"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			</ul>
		</div>
               
		<div class="about-content">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/post/widget/about/about.jpg" alt="">
			<p>This is a minimal, modern & poweful blog & magazine template. We are always
			serve our client...</p>
			<a href="#" class="cameo-color-text">Read More...</a>
			<div class="about-social">
				<a href="<?php echo $instance['facebook'];?>"><i class="fab fa-facebook-f"></i></a>
				<a href="<?php echo $instance['twitter'];?>"><i class="fab fa-twitter"></i></a>
				<a href="<?php echo $instance['google-plus'];?>"><i class="fab fa-google-plus-g"></i></a>
				<a href="<?php echo $instance['linkedin'];?>"><i class="fab fa-linkedin-in"></i></a>
				<a href="<?php echo $instance['instagram'];?>"><i class="fab fa-instagram"></i></a>
			</div>
		</div>

		<?php
		}


				public function form( $instance ) {
			?>
				<p>
					<label for="<?php echo $this->get_field_id('title')?>">Heading</label>

					<input id="<?php echo $this->get_field_id('title')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $instance['title']?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('facebook')?>">Facebook</label>

					<input id="<?php echo $this->get_field_id('facebook')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('facebook'); ?>"  value="<?php echo $instance['facebook']?>">
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('twitter')?>">Twitter</label>

					<input id="<?php echo $this->get_field_id('twitter')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('twitter'); ?>"  value="<?php echo $instance['twitter']?>">
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('google-plus')?>">Google-Plus</label>

					<input id="<?php echo $this->get_field_id('google-plus')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('google-plus'); ?>"  value="<?php echo $instance['google-plus']?>">
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('linkedin')?>">Prentest</label>

					<input id="<?php echo $this->get_field_id('linkedin')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('linkedin'); ?>"  value="<?php echo $instance['linkedin']?>">
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('instagram')?>">Instagram</label>

					<input id="<?php echo $this->get_field_id('instagram')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('instagram'); ?>"  value="<?php echo $instance['instagram']?>">
				</p>

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$new = array();
			$new['title'] 		= esc_html($new_instance['title']);
			$new['facebook'] 	= esc_url(strip_tags($new_instance['facebook']));
			$new['twitter'] 	= esc_url(strip_tags($new_instance['twitter']));
			$new['google-plus'] = esc_url(strip_tags($new_instance['google-plus']));
			$new['prentest'] 	= esc_url(strip_tags($new_instance['linkedin']));
			$new['instagram'] 	= esc_url(strip_tags($new_instance['instagram']));

			return $new;
		}
	}

 ?>