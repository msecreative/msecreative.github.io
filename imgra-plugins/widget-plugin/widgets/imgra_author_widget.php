<?php 
	class Imgra_Author_Widget extends WP_Widget{
		public function __construct(){
			parent::__construct('imgra-author', 'Imgra Author Widget');
		}

		public function widget( $args, $instance ) {
		?>
	        <?php echo $args['before_widget']; ?><?php echo $args['before_title']; ?><?php echo $instance['title']; ?><?php echo $args['after_title']; ?>
	            <p><?php the_author_meta('description'); ?></p>
	            <div class="author-img">
	                <?php echo get_avatar( 'user_url' ); ?>
	            </div>
	            <div class="author-detail">
	                <h5><?php the_author_meta('first_name'); ?></h5>
	                <p><?php echo $instance['desg']; ?></p>
	                <ul class="flat-list">
	                    <li><a href="<?php echo $instance['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
	                    <li><a href="<?php echo $instance['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
	                    <li><a href="<?php echo $instance['linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li>
	                    <li><a href="<?php echo $instance['instagram']; ?>"><i class="fa fa-instagram"></i></a></li>
	                </ul>
	            </div>
	        <?php echo $args['after_widget']; ?>
		<?php
		}


				public function form( $instance ) {
			?>
				<p>
					<label for="<?php echo $this->get_field_id('title')?>">Title</label>

					<input id="<?php echo $this->get_field_id('title')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $instance['title']; ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('desg')?>">Designation</label>

					<input id="<?php echo $this->get_field_id('desg')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('desg'); ?>"  value="<?php echo $instance['desg']; ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('facebook')?>">Facebook</label>

					<input id="<?php echo $this->get_field_id('facebook')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('facebook'); ?>"  value="<?php echo $instance['facebook']; ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('twitter')?>">Twitter</label>

					<input id="<?php echo $this->get_field_id('twitter')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('twitter'); ?>"  value="<?php echo $instance['twitter']; ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('linkedin')?>">LinkedIn</label>

					<input id="<?php echo $this->get_field_id('linkedin')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('linkedin'); ?>"  value="<?php echo $instance['linkedin']; ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('instagram')?>">Instagram</label>

					<input id="<?php echo $this->get_field_id('instagram')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('instagram'); ?>"  value="<?php echo $instance['instagram']; ?>">
				</p>
				
			<?php
		}

		public function update($new_instance, $old_instance){
			$instance = array();
			$instance['title'] 		= strip_tags($new_instance['title']);
			$instance['desg'] 		= strip_tags($new_instance['desg']);
			$instance['facebook'] 	= esc_url(strip_tags($new_instance['facebook']));
			$instance['twitter'] 	= esc_url(strip_tags($new_instance['twitter']));
			$instance['linkedin'] 	= esc_url(strip_tags($new_instance['linkedin']));
			$instance['instagram'] 	= esc_url(strip_tags($new_instance['instagram']));

			return $instance;
		}

	}

 ?>