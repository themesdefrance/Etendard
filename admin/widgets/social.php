<?php
class EtendardSocial extends WP_Widget{

	private $reseaux = array(
		'facebook'=>'&#xe603;',
		'twitter'=>'&#xe604;',
		'youtube'=>'&#xe60c;',
		'google plus'=>'&#xe602;',
		'vimeo'=>'&#xe606;',
		'linkedin'=>'&#xe607;',
		'viadeo'=>'&#xe60d;',
		'soundcloud'=>'&#xe609;',
		'pinterest'=>'&#xe60a;',
		'instagram'=>'&#xe60b;',
		'rss'=>'&#xe605;',
	);

	private $error = false;
	private $hideAfter = 3;

	public function __construct(){
		parent::__construct(
			'EtendardSocial',
			__('Étendard Social', 'etendard'),
			array('description'=>__('Display links to your social profiles.', 'etendard'),)
		);
	}

	public function widget($args, $instance){
		echo $args['before_widget'];

		if (isset($instance['title'])){
			echo $args['before_title'].apply_filters('widget_title', $instance['title']).$args['after_title'];
		}

		echo '<ul>';
		foreach ($this->reseaux as $reseau=>$icone){
			if (isset($instance[$reseau]) && !empty($instance[$reseau])){
				?>
				<li>
					<a href="<?php echo $instance[$reseau]; ?>" title="<?php echo $reseau; ?>" target="_blank">
						<?php echo $icone; ?>
					</a>
				</li>
				<?php
			}
		}
		echo '</ul>';
		echo $args['after_widget'];
	}

	public function form($instance){

		$fields = array_merge(array('title'), array_keys($this->reseaux));

		echo '<style>';
		include 'widgets.css';
		echo '</style>';
		echo '<script>';
		include 'widgets.js';
		echo '</script>';

		if ($this->error){
			echo '<div class="error">';
			_e('Please enter a valid url', 'etendard');
			echo '</div>';
		}
		?>

		<?php
		//verifie si les reseaux masqués par défaut ont une valeur
		$open = '';
		foreach ($instance as $reseau=>$valeur){
			if (trim($valeur) !== '' && in_array($reseau, array_slice($fields, $this->hideAfter+1))) $open = 'open';
		}

		foreach ($fields as $count=>$field){
			if ($count === $this->hideAfter+1):?>
			<div>
				<a href="#" class="etendardsocial-toggle-link">
				</a>
				<h4>
					<?php _e('More networks', 'etendard'); ?>
				</h4>
			</div>
			<div class="etendardsocial-toggle <?php echo $open; ?>">
			<?php endif; ?>

			<?php $value = (isset($instance[$field])) ? $instance[$field] : ''; ?>
			<p>
				<label for="<?php echo $this->get_field_id($field); ?>">
					<?php echo ($field == 'title' ? __('Title','toutatis') : ucfirst($field) ) . ':'; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($field); ?>" name="<?php echo $this->get_field_name($field); ?>" type="url" value="<?php echo esc_attr($value); ?>" />
			</p>
			<?php
		}
		echo '</div>';//closing more div
	}

	public function update($new_instance, $old_instance){

		foreach ($this->reseaux as $reseau=>$icone){
			if (isset($new_instance[$reseau]) && !empty($new_instance[$reseau]) && !filter_var($new_instance[$reseau], FILTER_VALIDATE_URL)){
				$new_instance[$reseau] = $old_instance[$reseau];
				$this->error = true;
			}
		}

		return $new_instance;
	}
}