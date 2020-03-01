<?php 
	class Service_Category_Widget extends WP_Widget{
		public function __construct(){
			parent::__construct('service-category', 'Service Category');
		}

		public function widget( $args, $instance ) {
		?>
		
			<?php echo $args['before_widget']; ?><?php echo $args['before_title']; ?><?php echo $instance['title']; ?><?php echo $args['after_title']; ?>
					
				<div class="prac-sb-list">
					
                       <?php

                       $s_category = 'service_category';
						$terms = get_terms($s_category);

						if ( $terms && !is_wp_error( $terms ) ) :
							?>
							<ul>
								<?php foreach ( $terms as $term ) { ?>
									<li><a href="<?php echo get_term_link($term->slug, $s_category); ?>"><?php echo $term->name; ?></a></li>
								<?php } ?>
							</ul>
						<?php endif;?>
				</div>
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