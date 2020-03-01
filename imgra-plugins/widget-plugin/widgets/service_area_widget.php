<?php 
	class Service_Area_Widget extends WP_Widget{
		public function __construct(){
			parent::__construct('service-area', 'Service Areas');
		}

		public function widget( $args, $instance ) {
		?>
		
			<?php echo $args['before_widget']; ?><?php echo $args['before_title']; ?><?php echo $instance['title']; ?><?php echo $args['after_title']; ?>
					
                       <?php

                       $s_area = new WP_Query(array(
                       	'post_type'		=>'service',
                       	'posts_per_page'=>$instance['item'],
                       ));?>

						<ul class="footer-widget-link">
							<?php while($s_area->have_posts()):$s_area->the_post(); ?>
                            	<li><a href="<?php the_permalink();; ?>"><i class="fa fa-angle-double-right"></i> <?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
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
					<label for="<?php echo $this->get_field_id('title')?>">Show Item</label>

					<input id="<?php echo $this->get_field_id('item')?>" class="widefat" type="number" name="<?php echo $this->get_field_name('item'); ?>"  value="<?php echo $instance['item']?>">
				</p>

				

			<?php
		}

	}

 ?>