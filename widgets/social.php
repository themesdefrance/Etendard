<?php
class EtendardSocial extends WP_Widget{
	
	private $reseaux = array(
		'facebook'=>'&#xe003;',
		'twitter'=>'&#xe004;',
		'google plus'=>'&#xe002;',
		'youtube'=>'&#xe006;',
		'vimeo'=>'&#xe007;',
		'linkedin'=>'&#xe008;',
		'skype'=>'&#xe009;',
		'soundcloud'=>'&#xe00a;',
		'pinterest'=>'&#xe00b;',
	);
	
	public function __construct(){
		parent::__construct(
			'EtendardSocial',
			__('Icones Réseaus Sociaux', TEXT_TRANSLATION_DOMAIN),
			array('description'=>__('Les liens vers vos comptes sur différents réseaux sociaux.', TEXT_TRANSLATION_DOMAIN),)
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
					<a href="<?php echo $instance[$reseau]; ?>" title="<?php echo $reseau; ?>">
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
		
		foreach ($fields as $field){
			$value = (isset($instance[$field])) ? $instance[$field] : '';
			?>
			<p>
				<label for="<?php echo $this->get_field_id($field); ?>">
					<?php _e(ucfirst($field).':'); ?>
				</label> 
				<input class="widefat" id="<?php echo $this->get_field_id($field); ?>" name="<?php echo $this->get_field_name($field); ?>" type="text" value="<?php echo esc_attr($value); ?>" />
			</p>
			<?php
		}
	}
	
	public function update($new_instance, $old_instance){
		foreach ($this->reseaux as $reseau=>$icone){
			if (isset($new_instance[$reseau]) && !empty($new_instance[$reseau]) && !filter_var($new_instance[$reseau], FILTER_VALIDATE_URL)){
				$new_instance[$reseau] = $old_instance[$reseau];
			}
		}
		
		return $new_instance;
	}
}