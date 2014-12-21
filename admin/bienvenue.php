<?php

/* Etendard Welcome Class thanks to Easy Digital Downloads */

// Exit if loaded directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Etendard_Welcome {

	// Minimum role to see this page
	public $minimum_capability = 'manage_options';

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus') );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_init', array( $this, 'welcome'    ) );
	}

	// Page registering
	public function admin_menus() {
		// Update
		add_dashboard_page(
			__('Etendard was updated', 'etendard'),
			__('Etendard was updated', 'etendard'),
			$this->minimum_capability,
			'etendard-update',
			array( $this, 'update_screen' )
		);

		// First Installation
		add_dashboard_page(
			__('Welcome to Etendard', 'etendard'),
			__('Welcome to Etendard', 'etendard'),
			$this->minimum_capability,
			'etendard-bienvenue',
			array( $this, 'bienvenue_screen' )
		);
	}

	// Hide those pages
	public function admin_head() {
		remove_submenu_page( 'index.php', 'etendard-update' );
		remove_submenu_page( 'index.php', 'etendard-bienvenue' );

		// Badge for welcome page
		$badge_url = get_template_directory_uri() . '/admin/img/badge.png';
		?>
		<style type="text/css" media="screen">
		/*<![CDATA[*/
		.etendard-badge {
			padding-top: 150px;
			height: 52px;
			width: 185px;
			color: #666;
			font-weight: bold;
			font-size: 14px;
			text-align: center;
			text-shadow: 0 1px 0 rgba(255, 255, 255, 0.8);
			margin: 0 -5px;
			background: url('<?php echo $badge_url; ?>') no-repeat;
		}

		.about-wrap .etendard-badge {
			position: absolute;
			top: 0;
			right: 0;
		}

		.etendard-screenshots {
			float: right;
			margin-left: 10px!important;
		}
		
		.etendard-merci{
			font-style:italic;
		}
		
		.feature-section img{
			border:1px solid rgba(0,0,0,.1);
			margin:1.4em 0 0 0;
		}
		
		.feature-section ul li{
			list-style-type:disc;
			margin-left:20px;
		}
		
		/*]]>*/
		</style>
		<?php
	}

	// Tabs
	public function tabs() {
		$selected = isset( $_GET['page'] ) ? $_GET['page'] : 'etendard-update';
		?>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php echo $selected == 'etendard-update' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'etendard-update' ), 'index.php' ) ) ); ?>">
				<?php _e( "What's new ?", 'etendard' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'etendard-bienvenue' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'etendard-bienvenue' ), 'index.php' ) ) ); ?>">
				<?php _e( 'Welcome', 'etendard' ); ?>
			</a>
		</h2>
		<?php
	}

	// Onglet Mise à jour
	public function update_screen() {
		list( $display_version ) = explode( '-', ETENDARD_THEME_VERSION );
		?>
		<div class="wrap about-wrap">
			<h1><?php printf( __( 'Welcome to Etendard %s', 'etendard' ), $display_version ); ?></h1>
			<div class="about-text"><?php printf( __( 'Thanks for updating Etendard, here are the good stuff we added in order to improve your website.', 'etendard' ), $display_version ); ?></div>
			<div class="etendard-badge"><?php printf( __( 'Version %s', 'etendard' ), $display_version ); ?></div>

			<?php $this->tabs(); ?>

			<div class="changelog">
				<h3>Étendard 1.015 bénéficie des améliorations suivantes :</h3>

				<div class="feature-section">
				
					<ul>
						<li>Meilleur affichage du menu principal</li>
						<li>Ajout d'un onglet pour introduire les modules</li>
						<li>Ajout d'un widget vidéo</li>
						<li>Optimisation pour WordPress 4.1</li>
						<li>Optimisation des extraits</li>
						<li>Ajout d'actions (pour les développeurs)</li>
						<li>Correction d'autres bugs (merci à Benoit et Magali)</li>
					</ul>
	
				</div>
			</div>
			
			<div class="changelog">
				<h3>Que pensez-vous d'Étendard ?</h3>

				<div class="feature-section">
					
					<p>Prenez quelques instants pour nous faire un retour sur Étendard, cela nous aiderait beaucoup à améliorer la prochaine version.</p>
					<p><a href="https://www.themesdefrance.fr/temoignage/?produit=Etendard&utm_source=Etendard&utm_medium=bouton&utm_content=Etendard_Quoideneuf&utm_campaign=EtendardAdmin" class="button button-primary">Écrire un témoignage</a></p>
				</div>
			</div>
		</div>
		<?php
	}

	// Onglet Bienvenue
	
	public function bienvenue_screen() {
		list( $display_version ) = explode( '-', ETENDARD_THEME_VERSION );
		?>
		<div class="wrap about-wrap">
			<h1><?php _e( 'Thanks for using Etendard', 'etendard' ); ?></h1>
			<div class="about-text"><?php printf( __( 'Browse this page to discover how to set up your new theme.', 'etendard' ), $display_version ); ?></div>
			<div class="etendard-badge"><?php printf( __( 'Version %s', 'etendard' ), $display_version ); ?></div>

			<?php $this->tabs(); ?>

			<div class="changelog">
				<h3><?php _e( 'The 3 first steps', 'etendard' );?></h3>

				<div class="feature-section">

					<img src="<?php echo get_template_directory_uri() . '/admin/img/premieres-etapes.png'; ?>" class="etendard-screenshots"/>

					<h4><?php  _e( 'Enter your licence key', 'etendard' ); ?></h4>
					<p><?php  _e( 'To get updates, you have to enter your license key. We sent it to your inbox right after your purchase. Then, go to "Etendard settings" &rarr; "General" and paste your licence key in the input field.', 'etendard' ); ?></p>

					<h4><?php _e( 'Choose the main color', 'etendard' );?></h4>
					<p><?php _e( 'Etendard can wear the color of your choice. Go to the "Appearence" tab to choose your site main color with the color picker.', 'etendard' );?></p>

					<h4><?php _e( 'Upload your logo', 'etendard' );?></h4>
					<p><?php _e( 'Still in the "Appearence" tab, you can add your logo to your site. Click on select to upload a picture as a logo.', 'etendard' );?></p>

				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'What you can do next', 'etendard' );?></h3>

				<div class="feature-section col three-col">

					<div>
						<h4><?php _e( 'Set up the homepage', 'etendard' ); ?></h4>
						<p><?php _e( 'Choose the elements to display in "Etendard Setting" &rarr; "General". Don\'t forget to define a page as homepage (some other options will show up on this page).', 'etendard' ); ?></p>
					</div>

					<div>
						<h4><?php _e( 'Add some projects to your portfolio', 'etendard' );?></h4>
						<p><?php _e( 'Once you defined a portfolio page, add some projects to show the world what you do.', 'etendard' );?></p>
					</div>
					
					<div class="last-feature">
						<h4><?php _e( 'And don\'t forget the ...', 'etendard' );?></h4>
						<p><?php _e( 'Footer optimization, sidebar position or the "Etendard Social" widget.', 'etendard' );?></p>
					</div>
					
				</div>
			</div>
			
			<div class="return-to-dashboard">
				<a href="<?php echo admin_url( 'themes.php?page=etendard_options') ?>" class="button button-primary"><?php _e( 'All right, I\'m ready to  set up Etendard', 'etendard' ); ?></a>
			</div>
			
			<div class="changelog">
				<h3><?php _e( 'Need help with Etendard ?', 'etendard' );?></h3>

				<div class="feature-section col two-col">
					
					<div>
						<h4><?php _e( 'Check the documentation', 'etendard' ); ?></h4>
						<p><?php _e( 'When you <a href="https://www.themesdefrance.fr/documentation/manuel-etendard/&utm_source=Etendard&utm_medium=lien&utm_content=Etendard_Bienvenue&utm_campaign=EtendardAdmin" target="_blank">login to Themes de France</a>, you will access videos and tutorials to help you to setup Etendard.', 'etendard' ); ?></p>
					</div>
					
					<div class="last-feature">
						<h4><?php _e( 'Get support', 'etendard' ); ?></h4>
						<p><?php _e( 'Themes de France team is here to help you to have your site up and running.', 'etendard' ); ?></p>
						<p><a href="https://www.themesdefrance.fr/support/&utm_source=Etendard&utm_medium=bouton&utm_content=Etendard_Bienvenue&utm_campaign=EtendardAdmin" target="_blank" class="button">Contacter le support</a></p>
					</div>
				</div>
				
			</div>
			
		</div>
		<?php
	}

	// Redirect to the First Install or Update Page
	public function welcome() {

		// Bail if no activation redirect
		if ( ! get_transient( '_etendard_activation_redirect' ) )
			return;

		// Delete the redirect transient
		delete_transient( '_etendard_activation_redirect' );

		// Bail if activating from network, or bulk
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) )
			return;
		
		// Code adapté de EDD
		$lastv = get_option( 'etendard_precedente_version' );
		$currentv = get_option( 'etendard_version' );
		
		if( ! $lastv && $_GET['page'] !== 'etendard-bienvenue' ) { // Première installation
			update_option( 'etendard_precedente_version', $currentv );
			wp_safe_redirect( admin_url( 'index.php?page=etendard-bienvenue' ) ); exit;
		} else if ((float)$lastv < (float)$currentv && $_GET['page'] !== 'etendard-update') { 			
			// Mise à jour
			update_option( 'etendard_precedente_version', $currentv );
			wp_safe_redirect( admin_url( 'index.php?page=etendard-update' ) ); exit;
		}
		
		

	}
}
new Etendard_Welcome();
