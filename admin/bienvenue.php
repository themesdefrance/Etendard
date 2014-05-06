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
			__('Étendard a été mis à jour', 'etendard'),
			__('Étendard a été mis à jour', 'etendard'),
			$this->minimum_capability,
			'etendard-update',
			array( $this, 'update_screen' )
		);

		// First Installation
		add_dashboard_page(
			__('Bienvenue sur Étendard', 'etendard'),
			__('Bienvenue sur Étendard', 'etendard'),
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
		
		.etendard-video {
			float: right;
			margin-left: 10px!important;
		}
		
		.etendard-merci{
			font-style:italic;
		}
		
		.feature-section img{
			border:1px solid rgba(0,0,0,.1);
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
				<?php _e( "Quoi de neuf ?", 'etendard' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'etendard-bienvenue' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'etendard-bienvenue' ), 'index.php' ) ) ); ?>">
				<?php _e( 'Bienvenue', 'etendard' ); ?>
			</a>
		</h2>
		<?php
	}

	// Onglet Mise à jour
	public function update_screen() {
		list( $display_version ) = explode( '-', EDD_SL_THEME_VERSION );
		?>
		<div class="wrap about-wrap">
			<h1><?php printf( __( 'Bienvenue sur Étendard %s', 'etendard' ), $display_version ); ?></h1>
			<div class="about-text"><?php printf( __( 'Merci d\'avoir procédé à la mise à jour, vous allez pouvoir découvrir ce que nous avons amélioré pour que votre site web soit encore plus performant.', 'etendard' ), $display_version ); ?></div>
			<div class="etendard-badge"><?php printf( __( 'Version %s', 'etendard' ), $display_version ); ?></div>

			<?php $this->tabs(); ?>

			<div class="changelog">
				<h3><?php _e( 'Présentation des nouveautés', 'etendard' );?></h3>

				<div class="feature-section">

					<div class="etendard-video">
						<iframe width="550" height="309" src="//www.youtube.com/embed/_sgtKI2GNu4?rel=0" frameborder="0" allowfullscreen></iframe>
					</div>
					
					<p>Comme d'habitude, nous avons réalisé une vidéo afin de vous présenter les améliorations que contient cette nouvelle version.</p>
					
					<p>Nous en profitons pour remercier toutes les personnes qui nous ont apporté des suggestions et permis de résoudre des bugs, vous allez pouvoir profiter de tout cela :)</p>
					
					<p>Un article a également été publié sur le blog de Thèmes de France pour revenir plus en détails sur cette version 1.011 d'Étendard.</p>
					<p>
						<a href="#" class="button button-primary button-large">Lire l'article sur Thèmes de France</a>
					</p>
	
				</div>
			</div>

			<hr>
			
			<div class="changelog">
			
			<h2 class="about-headline-callout">Les 3 améliorations majeures d'Étendard 1.011</h2>
			
				<div class="feature-section col three-col">

					<div class="col-1">
					
						<img src="<?php echo get_template_directory_uri() . '/admin/img/formats-articles.jpg'; ?>" alt="Formats articles" />
						
						<h4>Publiez des articles au format vidéo, citation et lien</h4>
						
						<p>Cette fonctionnalité nous a été beaucoup demandé, c'est désormais chose faite. Il est désormais possible d'associer une vidéo Youtube, Dailymotion ou Vimeo aux articles. Les articles de types "lien" et "citation" font également leur apparition.</p>
						
						<p>Le portfolio pourra lui aussi avoir un format "vidéo" si vous le désirez.</p>
					</div>
					
					<div class="col-2">
					
						<img src="<?php echo get_template_directory_uri() . '/admin/img/infos-complementaires.jpg'; ?>" alt="Formats articles" />
						
						<h4>Enrichissez les éléments portfolio</h4>
						
						<p>Auparavant, deux champs étaient disponibles pour mieux décrire les éléments portfolio (client et site). À partir de maintenant, vous pouvez définir autant d'informations complémentaires que votre site a besoin.</p>
						
						<p>Vous n'en avez pas besoin ? Supprimez simplement les champs dans l'onglet portfolio des options d'Étendard.</p>
					</div>
					
					<div class="col-3 last-feature">
					
						<img src="<?php echo get_template_directory_uri() . '/admin/img/titre-sous-titre.jpg'; ?>" alt="Formats articles" />
						
						<h4>Définissez un titre et un sous-titre plus facilement</h4>
						
						<p>Dans les versions précédentes, le titre et le sous-titre de la page d'accueil utilisaient le nom et la description de votre site. Pour modifier ces textes, vous deviez donc changer le nom de votre site, ce qui n'était pas pratique.</p>
						
						<p>Avec cette nouvelle version, vous pourrez changer le texte d'accueil sans changer le nom de votre site.</p>
					</div>
				</div>
			</div>
			
			<hr>
			
			<div class="changelog">
				
				<h2 class="about-headline-callout">Découvrez 3 autres optimisations</h2>
				
				<div class="feature-section col three-col">

					<div class="col-1">
						
						<h4>Les vidéos et autres contenus externes s'affichent correctement</h4>
						
						<p>Un bug CSS faisait mal s'afficher les insertions de contenus externes comme les vidéos Youtube, les diaporamas Slideshare et les documents Google Docs. Avec cette nouvelle version, c'est de l'histoire ancienne.</p>
						
						<p class="etendard-merci">Merci à Stéphane et Ling-en pour l'info.</p>
					</div>
					
					<div class="col-2">
						
						<h4>Le bouton d'ajout de shortcodes s'affiche partout</h4>
						
						<p>Il faut avouer qu'il est bien plus pratique de passer par le bouton pour ajouter des shortcodes dans vos publications. Désormais, les éléments de portfolio et les services le proposent pour vous faciliter la vie.</p>
						
						<p class="etendard-merci">Merci à Marc d'avoir fait remonter le problème.</p>
					</div>
					
					<div class="col-3 last-feature">
						
						<h4>Une couleur secondaire a été introduite</h4>
						
						<p>Pour donner un peu plus de dynamisme, nous avons ajouté une seconde couleur à Étendard.</p>
						
						<p>Rassurez-vous vous n'avez rien à faire, Étendard la créera automatiquement afin qu'elle s'accorde au mieux avec la couleur principale.</p>
						
					</div>
				</div>
			</div>
			
			<hr>
			
			<div class="changelog">
			
				<h3>Participez à l'amélioration d'Étendard</h3>
					
				<div class="feature-section col two-col">
					
					<div class="col-1">
						<h4>Sur les réseaux sociaux</h4>
						<p>Si vous le désirez, vous pouvez contribuer à l'amélioration d'Étendard en nous faisant part de vos idées et suggestions sur les réseaux sociaux. Nous sommes sur <a href="https://www.facebook.com/ThemesDeFrance" target="_blank">Facebook</a>, <a href="https://twitter.com/themesdefrance" target="_blank">Twitter</a> et <a href="https://plus.google.com/b/108963306408977874042/108963306408977874042/posts" target="_blank">Google+</a>.</p>
					</div>
					
					<div class="col-2 last-feature">
						<h4>Sur le forum</h4>
						<p>Nous sommes également à votre écoute sur <a href="https://www.themesdefrance.fr/support/" target="_blank">le forum de support</a> pour vous aider à tirer le meilleur d'Étendard. N'hésitez surtout pas si vous avez des questions, nous avons à coeur d'avoir des clients satisfaits.</p>
					</div>
				</div>
				
			</div>
			

			<div class="return-to-dashboard">
				<a href="<?php echo admin_url( 'themes.php?page=etendard_options') ?>" class="button button-primary">Découvrir les nouvelles fonctionnalités</a>
			</div>
		</div>
		<?php
	}

	// Onglet Bienvenue
	
	public function bienvenue_screen() {
		list( $display_version ) = explode( '-', EDD_SL_THEME_VERSION );
		?>
		<div class="wrap about-wrap">
			<h1><?php printf( __( 'Bienvenue sur Étendard %s', 'etendard' ), $display_version ); ?></h1>
			<div class="about-text"><?php printf( __( 'Merci d\'avoir installé Étendard, parcourez le contenu de cette page pour découvrir comme mettre votre site en place.', 'etendard' ), $display_version ); ?></div>
			<div class="etendard-badge"><?php printf( __( 'Version %s', 'etendard' ), $display_version ); ?></div>

			<?php $this->tabs(); ?>

			<p class="about-description"><?php _e( 'Ces quelques indications vont vous permettre de prendre en main votre nouveau thème.', 'etendard' ); ?></p>

			<div class="changelog">
				<h3><?php _e( 'Les 3 premières choses à faire avec Étendard', 'etendard' );?></h3>

				<div class="feature-section">

					<img src="<?php echo get_template_directory_uri() . '/admin/img/premieres-etapes.png'; ?>" class="etendard-screenshots"/>

					<h4><?php  _e( 'Validez votre clé de licence', 'etendard' ); ?></h4>
					<p><?php  _e( 'Suite à votre commande, vous avez reçu une clé de licence. Entrez-là en allant dans "Options Étendard" &rarr; "Général" pour recevoir les mises à jour directement dans WordPress.', 'etendard' ); ?></p>

					<h4><?php _e( 'Définissez une couleur principale', 'etendard' );?></h4>
					<p><?php _e( 'Étendard peut arborer la couleur de votre choix. Rendez-vous dans l\'onglet "Apparence" des options pour la choisir avec le sélecteur de couleur.', 'etendard' );?></p>

					<h4><?php _e( 'Envoyez votre logo', 'etendard' );?></h4>
					<p><?php _e( 'Toujours dans l\'onglet "Apparence", vous pouvez définir l\'image correspondant au logo de votre site. Cliquez sur le bouton "Sélectionner" pour envoyer/choisir une image dans votre bibliothèque de médias.', 'etendard' );?></p>

				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Ce que vous pouvez faire ensuite', 'etendard' );?></h3>

				<div class="feature-section col three-col">

					<div>
						<h4><?php _e( 'Paramétrez votre page d\'accueil', 'etendard' ); ?></h4>
						<p><?php _e( 'Déterminez les éléments à afficher en allant dans "Options Étendard" &rarr; "Général". Veillez à bien définir une page en tant que page d\'accueil (d\'autres options seront également disponibles sur cette page).', 'etendard' ); ?></p>
					</div>

					<div>
						<h4><?php _e( 'Ajoutez des éléments à votre portfolio', 'etendard' );?></h4>
						<p><?php _e( 'Une fois que vous aurez défini une page portfolio, ajoutez-y des éléments pour montrer au monde ce que vous avez accompli.', 'etendard' );?></p>
					</div>
					
					<div class="last-feature">
						<h4><?php _e( 'Sans oublier...', 'etendard' );?></h4>
						<p><?php _e( 'La personnalisation du pied de page, la position de la barre latérale, l\'insertion du widget "Étendard Social", d\'appels à l\'action, etc.', 'etendard' );?></p>
					</div>
					
				</div>
			</div>
			
			<div class="return-to-dashboard">
				<a href="<?php echo admin_url( 'themes.php?page=etendard_options') ?>" class="button button-primary"><?php _e( 'C\'est bon, j\'attaque le paramétrage d\'Étendard', 'etendard' ); ?></a>
			</div>
			
			<div class="changelog">
				<h3><?php _e( 'Besoin d\'aide avec Étendard ?', 'etendard' );?></h3>

				<div class="feature-section col three-col">
					
					<div>
						<h4><?php _e( 'Consultez la documentation', 'etendard' ); ?></h4>
						<p><?php _e( 'En vous <a href="https://www.themesdefrance.fr/documentation/manuel-etendard/" target="_blank">connectant sur Thèmes de France</a>, vous pourrez accéder aux vidéos et aux tutoriels qui vous aideront à paramétrer Étendard.', 'etendard' ); ?></p>
					</div>
					
					<div>
						<h4><?php _e( 'Posez vos questions sur le forum de support', 'etendard' ); ?></h4>
						<p><?php _e( 'Toute l\'équipe de Thèmes de France est là pour vous aider à régler tous problèmes relatifs à Étendard.', 'etendard' ); ?></p>
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
