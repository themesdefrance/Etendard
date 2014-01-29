<?php
class EtendardNewsletter extends WP_Widget{
	
	private $defaults = array(
		'title'=>'',
		'description'=>'',
		'cta'=>"S'abonner"
	);
	
	public function __construct(){
		parent::__construct(
			'EtendardNewsletter',
			__('Étendard Newsletter', TEXT_TRANSLATION_DOMAIN),
			array('description'=>__('Inscription à une newsletter', TEXT_TRANSLATION_DOMAIN),)
		);
		
		if(isset($_POST['etendard-nl-submit'])) {
			add_action('init', array($this, 'process'));
		}
	}
	
	public function widget($args, $instance){
		$cta = (isset($instance['cta'])) ? $instance['cta'] : __($this->defaults['cta'], TEXT_TRANSLATION_DOMAIN);
		
		echo $args['before_widget'];
		
		if (isset($instance['title'])){
			echo $args['before_title'].apply_filters('widget_title', $instance['title']).$args['after_title'];
		}
		?>
		
		<?php if (isset($instance['description'])){ ?>
		<p>
			<?php echo $instance['description']; ?>
		</p>
		<?php } ?>
		<form action="" method="post">
			<input type="hidden" name="etendard-nl-nonce" value="<?php echo wp_create_nonce('register-newsletter'); ?>" />
			<span class="form-email">
				<input type="email" name="etendard-nl-email" />
			</span>
			<span class="form-submit">
				<input type="submit" name="etendard-nl-submit" value="<?php echo $cta; ?>" />
			</span>
		</form>
		<?php
		echo $args['after_widget'];
	}
	
	public function process(){
		$email = (isset($_POST['etendard-nl-email'])) ? $_POST['etendard-nl-email'] : '';
		$nonce = (isset($_POST['etendard-nl-nonce'])) ? $_POST['etendard-nl-nonce'] : '';
		
		if (wp_verify_nonce($nonce, 'register-newsletter') && filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
			var_dump('register '.$email);
		}
	}
	
	public function form($instance){
		$title = (isset($instance['title'])) ? $instance['title'] : '';
		$description = (isset($instance['description'])) ? $instance['description'] : '';
		$cta = (isset($instance['cta'])) ? $instance['cta'] : __($this->defaults['cta'], TEXT_TRANSLATION_DOMAIN);
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">
			<?php _e('Title:'); ?>
		</label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('description'); ?>">
			<?php _e('Description:'); ?>
		</label>
		<textarea class="widefat" name="<?php echo $this->get_field_name('description'); ?>" type="text"><?php echo esc_attr($description); ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('cta'); ?>">
			<?php _e('Call to action:'); ?>
		</label> 
		<input class="widefat" id="<?php echo $this->get_field_id('cta'); ?>" name="<?php echo $this->get_field_name('cta'); ?>" type="text" value="<?php echo esc_attr($cta); ?>" />
		</p>
		<?php 
	}
	
	public function update($new_instance, $old_instance){
		return $new_instance;
	}
}