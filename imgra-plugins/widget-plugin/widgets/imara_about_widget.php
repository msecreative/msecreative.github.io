<?php 
	class Imgra_About_Widget extends WP_Widget{
		public function __construct(){
			parent::__construct('imgra-about', 'About Imgra');
		}

		public function widget( $args, $instance ) {
		?>
		<?php if (function_exists('cs_get_option')): 
			$website_title = cs_get_option('website_title1');
			$s_info = cs_get_option('header_social_info');
			?>
	
            <div class="footer-logo">
            	<?php $img = wp_get_attachment_image_src($website_title, 'full'); ?>
                <a href="#"><img src="<?php echo esc_url($img[0]); ?>" alt=""></a>
                <p><?php echo $instance['desc']; ?></p>
                <ol class="flat-list">
                	<?php foreach($s_info as $item): ?>
                    <li><a href="<?php echo esc_url($item['social_address']); ?>"><i class="<?php echo esc_attr($item['social_icon']); ?>"></i></a></li>
                    <?php endforeach; ?>
                </ol>
            </div>
         <?php endif ?>
		<?php
		}


				public function form( $instance ) {
			?>
				<p>
					<label for="<?php echo $this->get_field_id('title')?>">About Description</label>

					<input id="<?php echo $this->get_field_id('desc')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('desc'); ?>"  value="<?php echo $instance['desc']?>">
				</p>
				
			<?php
		}

	}

 ?>