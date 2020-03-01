<?php 

class Imgra_Sidebar_Subscribe_Widget extends WP_Widget{
	public function __construct(){
		parent::__construct('imgra-sidebar-subscribe', 'Imgra Sidebar Subscriber');
	}

	public function widget( $args, $instance ) {
		?>

		<?php echo $args['before_widget'] ?>
			<?php echo $args['before_title']; ?><?php echo $instance['title']; ?><?php echo $args['after_title']; ?>
			<form action="" method="POST">
				<input placeholder="Email address" type="email" name="email">
				<button class="btn-2" name="imgra_subscribe">Subscribe</button>
			</form>
		<?php echo $args['after_widget']; ?>
		<?php
			if (function_exists('cs_get_option')){ 
				$companey_email = cs_get_option('companey_email');
		if (isset($_POST['imgra_subscribe'])){
			$email = $_POST['email'];
			if(wp_mail($companey_email,'One Subscribe Added','Email : '.$email)){
				echo '<div class="alert alert-success">Your email added to the subscribe list</div>';
			}
		}
	}
	}



	public function form( $instance ) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title')?>">Heading</label>

			<input id="<?php echo $this->get_field_id('title')?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $instance['title']?>">
		</p>

		<?php
	}


}

 ?>