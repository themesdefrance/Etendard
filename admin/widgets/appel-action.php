<?php
class EtendardAppelAction extends WP_Widget{
	
	private $error = false;
	
	public function __construct(){
		parent::__construct(
			'EtendardAppelAction',
			__('Étendard - Appel à l\'action', TEXT_TRANSLATION_DOMAIN),
			array('description'=>__('Insérez un appel à l\'action dans une barre latérale.', TEXT_TRANSLATION_DOMAIN),)
		);
	}
	
	public function widget($args, $instance){
		echo $args['before_widget'];
		
		if (isset($instance['title'])){
			echo $args['before_title'].apply_filters('widget_title', $instance['title']).$args['after_title'];
		} ?>
		
		<div class="cta-widget">
			<p class="cta-text"><?php echo $instance['desc']; ?></p>
			<p>
				<a href="<?php echo $instance['lien']; ?>" class="cta-button"><?php echo $instance['libelle']; ?></a>
			</p>
		</div>
		<?php
		/*
		
			Afficher le contenu du widget avec des echo
		
		*/
		
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
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titre:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="url" value="<?php echo esc_attr( $fields['title'] ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'lien' ); ?>"><?php _e( 'Destination de l\'appel à l\'action (lien):' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'lien' ); ?>" name="<?php echo $this->get_field_name( 'lien' ); ?>" type="url" value="<?php echo esc_attr( $fields['lien'] ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Texte accompagnant l\'appel à l\'action:' ); ?></label> 
			<textarea  class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo esc_attr( $fields['desc'] ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'libelle' ); ?>"><?php _e( 'Libellé du bouton:' ); ?></label> 
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