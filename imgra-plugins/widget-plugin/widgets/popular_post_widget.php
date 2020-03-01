<?php 
	class Popular_Post extends WP_Widget{
		public function __construct(){
			parent::__construct('popular-post', 'Imgra Popular Post');
		}

		public function widget( $args, $instance ) {
		?>

        <?php echo $args['before_widget']; ?>
            <?php echo $args['before_title']; ?><?php echo $instance['title']; ?><?php echo $args['after_title']; ?>
            <div class="widget-blog">
            	<?php $p_post = new WP_Query(array(
            		'post_type' 	=> 'post',
            		'posts_per_page'=> $instance['control'],
            		'meta_key'		=> 'post_view',
            		'orderby'		=> 'meta_value_num'
            	)); ?>
            	<?php while($p_post->have_posts()) : $p_post->the_post(); ?>
                <div class="widget-blog-item d-flex">
                    <div class="widget-blog-img"><?php the_post_thumbnail(); ?></div>
                    <div class="widget-blog-des">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <span><?php the_time('F d, Y'); ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        <?php echo $args['after_widget']; ?>

		<?php
		}


				public function form( $instance ) {
			?>
				<p>
					<label for="<?php echo $this->get_field_id('title')?>">Heading</label>

					<input id="<?php echo $this->get_field_id('title')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $instance['title']?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('control')?>">Popular Post Control</label>

					<input id="<?php echo $this->get_field_id('control')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('control'); ?>"  value="<?php echo $instance['control']?>">
				</p>
				

			<?php
		}

	}

 ?>