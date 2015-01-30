<?php
class EtendardAppelAction extends WP_Widget{
	
	private $error = false;
	
	public function __construct(){
		parent::__construct(
			'EtendardAppelAction',
			__('Etendard - Call to action', 'etendard'),
			array('description'=>__('Add a call to action in the sidebar.', 'etendard'),)
		);
	}
	
	public function widget($args, $instance){
		echo $args['before_widget'];
		?>
		
		<div class="cta-widget">
		
			<?php if (isset($instance['title'])){
					echo $args['before_title'].apply_filters('widget_title', $instance['title']).$args['after_title'];
			} ?>
			
			<p class="cta-text"><?php if (isset($instance['desc']) && $instance['desc']!=""){ echo $instance['desc'];} ?></p>
			<p>
				<a href="<?php if (isset($instance['lien']) && $instance['lien']!=""){ echo $instance['lien'];}else{echo esc_url( home_url() );} ?>" class="cta-button">
				<?php if (isset($instance['libelle']) && $instance['libelle']!=""){
						echo $instance['libelle'];
					}else{
						_e( 'Click here', 'etendard');
					} ?>
				</a>
			</p>
		</div>
		<?php
		echo $args['after_widget'];
	}
	
	public function form($instance){
		
		$fields = array("title" => "", "lien" => "", "desc" => "", "libelle" => "");
		
		if ( isset( $instance[ 'title' ] ) ) {
			$fields['title'] = $instance[ 'title' ];
		}
	
		if ( isset( $instance[ 'lien' ] ) ) {
			$fields['lien'] = $instance[ 'lien' ];
		}
		
		if ( isset( $instance[ 'desc' ] ) ) {
			$fields['desc'] = $instance[ 'desc' ];
		}		
		if ( isset( $instance[ 'libelle' ] ) ) {
			$fields['libelle'] = $instance[ 'libelle' ];
		}
		
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'etendard' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $fields['title'] ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'lien' ); ?>"><?php _e( 'Call to action destination (url):', 'etendard' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'lien' ); ?>" name="<?php echo $this->get_field_name( 'lien' ); ?>" type="url" value="<?php echo esc_attr( $fields['lien'] ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Call to action incentive:', 'etendard' ); ?></label> 
			<textarea  class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo esc_attr( $fields['desc'] ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'libelle' ); ?>"><?php _e( 'Button\'s label:' , 'etendard' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'libelle' ); ?>" name="<?php echo $this->get_field_name( 'libelle' ); ?>" type="text" value="<?php echo esc_attr( $fields['libelle'] ); ?>">
		</p>
		<?php
		
	}
	
	public function update($new_instance, $old_instance){
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['lien'] = ( ! empty( $new_instance['lien'] ) ) ? strip_tags( $new_instance['lien'] ) : '';
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
		$instance['libelle'] = ( ! empty( $new_instance['libelle'] ) ) ? strip_tags( $new_instance['libelle'] ) : '';
		return $instance;
		
	}
}