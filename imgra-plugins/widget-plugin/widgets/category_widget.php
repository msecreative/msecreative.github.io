<?php 
	class Category_Widget extends WP_Widget{
		public function __construct(){
			parent::__construct('category', 'Imgra Category Widget');
		}

		public function widget( $args, $instance ) {
		?>
		
			<?php echo $args['before_widget']; ?><?php echo $args['before_title']; ?><?php echo $instance['title']; ?><?php echo $args['after_title']; ?>
					
                     <?php

                       $cate = 'category';
						$terms = get_terms($cate);

						if ( $terms && !is_wp_error( $terms ) ) :
							?>
							<ul class="blog-catogory">
								<?php foreach ( $terms as $term ) { ?>
									<li><a href="<?php echo get_term_link($term->slug, $cate); ?>"><?php echo $term->name; ?><span>{<?php echo $term->count; ?>}</span></a></li>
								<?php } ?>
							</ul>
						<?php endif;?>
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